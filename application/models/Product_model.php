<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model {
	
	public function select($where=false)
	{
		$this->db->select('*');
		$this->db->from('product');
		$this->db->where('deletedby',null);
		if ($where) {
			$this->db->where($where);
		}
		return $this->db->get()->result();
	}
	public function select_with_image($where=false)
	{
		$this->db->select('product.*,product_image.image');
		$this->db->from('product');
		$this->db->join('product_image','product.id=product_image.fk_id_product','left');
		$this->db->group_by('product.id');
		$this->db->where('product.deletedby',null);
		if ($where) {
			$this->db->where($where);
		}
		return $this->db->get()->result();
	}
	public function select_availible()
	{
		$this->db->select('
			product.id,product.name,product.category,product.color,
			(select image from product_image where deletedby is null AND fk_id_product=product.id limit 1) as image,
			sum(product_stock.stock) as allstock,
			min(product_stock.price) as min_price,
			max(product_stock.price) as max_price,
			group_concat(product_stock.size,"-",product_stock.stock,"-",product_stock.price separator ";:") as list_size
			');
		$this->db->from('product');
		$this->db->join('product_stock','product.id=product_stock.fk_id_product');
		$this->db->where('product.deletedby',null);
		$this->db->where('product_stock.deletedby',null);
		$this->db->group_by('product.id');
		return $this->db->get()->result();
	}
	public function select_featured()
	{
		$this->db->select('
			product.id,product.name,product.category,product.color,
			(select image from product_image where deletedby is null AND fk_id_product=product.id limit 1) as image,
			sum(product_stock.stock) as allstock,
			min(product_stock.price) as min_price,
			max(product_stock.price) as max_price,
			group_concat(product_stock.size,"-",product_stock.stock,"-",product_stock.price separator ";:") as list_size
			');
		$this->db->from('product');
		$this->db->join('product_stock','product.id=product_stock.fk_id_product');
		
		$this->db->order_by('product.datecreated','desc');
		$this->db->limit(4);
		$this->db->having('sum(product_stock.stock) >',0);
		$this->db->where('product.deletedby',null);
		$this->db->group_by('product.id');
		return $this->db->get()->result();
	}
	public function datalist()
	{
		$data['category'] = $this->db->select('distinct(category)')->where('deletedby',null)->get('product')->result();
		$data['color'] = $this->db->select('distinct(color)')->where('deletedby',null)->get('product')->result();
		return $data;
	}
	public function search($word)
	{
		$this->db->select('
			product.id,product.name,product.category,product.color,
			(select image from product_image where deletedby is null AND fk_id_product=product.id limit 1) as image,
			sum(product_stock.stock) as allstock,
			min(product_stock.price) as min_price,
			max(product_stock.price) as max_price,
			group_concat(product_stock.size,"-",product_stock.stock,"-",product_stock.price separator ";:") as list_size
			');
		$this->db->from('product');
		$this->db->join('product_stock','product.id=product_stock.fk_id_product');
		$this->db->group_by('product.id');
		$this->db->where('product.deletedby',null);
		$this->db->where('product_stock.stock >',0);
		$this->db->group_start();
		$this->db->like('product.name', $word);
		$this->db->or_like('product.description', $word);
		$this->db->or_like('product.category', $word);
		$this->db->or_like('product.color', $word);
		$this->db->or_like('product_stock.price',$word);
		$this->db->like('product_stock.size',$word);
		$this->db->group_end();
		return $this->db->get()->result();
	}
	public function select_id($id)
	{
		$this->db->where('id',$id);
		return $this->db->get('product')->result()[0];
	}
	public function num_rows($where=false)
	{
		$this->db->select('id');
		$this->db->from('product');
		if ($where) {
			$this->db->where($where);
		}
		return $this->db->get()->num_rows();
	}
	public function insert()
	{
		$post = $this->input->post();
		$post['createdby'] = $this->session->userdata('id');
		if ($this->db->insert('product',$post)) {
			return $this->db->insert_id();
		}else{
			return false;
		}
		
	}
	public function update($id)
	{
		$post = $this->input->post();
		$post['editedby'] = $this->session->userdata('id');
		$this->db->where('id',$id);
		if ($this->db->update('product',$post)) {
			return true;
		}else{
			return false;
		}
	}
	public function delete($id)
	{
		$post['deletedby'] = $this->session->userdata('id');
		$this->db->where('id',$id);
		if ($this->db->update('product',$post)) {
			return true;
		}else{
			return false;
		}
	}

	public function show_product_stock($id,$where=null)
	{
		$this->db->where('fk_id_product',$id);
		$this->db->where('deletedby',null);
		if ($where != null) {
			$this->db->where($where);
		}
		return $this->db->get('product_stock')->result();
	}

	public function detail_insert($id)
	{
		$query = $this->db->where('fk_id_product',$id)->where('size',$this->input->post('size'))->where('deletedby',null)->get('product_stock');
		if ($query->num_rows() > 0) {
			$set['stock'] = $query->row(0)->stock+$this->input->post('stock');
			$this->db->update('product_stock',$set);
		}else{
			$post = $this->input->post();
			$post['fk_id_product'] = $id;
			$post['createdby'] = $this->session->userdata('id');
			if ($this->db->insert('product_stock',$post)) {
				return $this->db->insert_id();
			}else{
				return false;
			}
		}
		
	}
	public function detail_update($id)
	{
		$post = $this->input->post();
		foreach ($post as $key => $value) {
			$value['editedby'] = $this->session->userdata('id');
			$this->db->where('id',$key);
			$this->db->update('product_stock',$value);
		}
	}

	public function detail_delete($id)
	{
		$post['deletedby'] = $this->session->userdata('id');
		$this->db->where('id',$id);
		if ($this->db->update('product_stock',$post)) {
			return true;
		}else{
			return false;
		}
	}

	public function show_product_image($id)
	{
		return $this->db->where('fk_id_product',$id)->where('deletedby',null)->get('product_image')->result();
	}

	public function insert_product_image($id)
	{
		$config['upload_path'] = './assets/img/product/';
		$config['allowed_types'] = 'jpg|png|jpeg';
		$config['max_size'] = '2048';
		$config['remove_space'] = TRUE;
		$this->load->library('upload', $config);
		if($this->upload->do_upload('image')){
			$return = array('result' => 'success', 'file' => $this->upload->data(),
				'error' => '');
			$data = array(
				"image"=>$return['file']['file_name'],
				"fk_id_product" => $id,
				"createdby" => $this->session->userdata('id')
			);
			$this->db->insert('product_image',$data);
			return $return;
		}else{
			$return = array('result' => 'failed', 'file' => '', 'error' =>
				$this->upload->display_errors());
			return $return;
		}
	}
	public function image_delete($id)
	{
		$set['deletedby'] = $this->session->userdata('id');
		$this->db->where('id',$id);
		$this->db->update('product_image',$set);
	}
	public function rows_product_image($id)
	{
		return $this->db->where('fk_id_product',$id)->get('product_image')->num_rows();
	}
}