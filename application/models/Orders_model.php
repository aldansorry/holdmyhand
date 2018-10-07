<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders_model extends CI_Model {
	
	public function select($where=false)
	{
		$this->db->select('orders.*,customer.id as id_customer,customer.name,customer.address,customer.telp,customer.email,
			shipment.date as shipment_date,shipment.service,shipment.receipt,
			group_concat(product.name,"-",product_stock.size,"-",orders_detail.quantity,"-",product_stock.price SEPARATOR "<br>") as list_product,
			sum(orders_detail.quantity*product_stock.price) as total,');
		$this->db->from('orders');
		$this->db->join('customer','orders.fk_id_customer=customer.id','left');
		$this->db->join('shipment','orders.id=shipment.fk_id_orders','left');
		$this->db->join('orders_detail','orders_detail.fk_id_orders=orders.id');
		$this->db->join('product_stock','orders_detail.fk_id_product_stock=product_stock.id');
		$this->db->join('product','product_stock.fk_id_product=product.id');
		$this->db->group_by('orders.id');
		$this->db->where('orders.deletedby',null);
		if ($where) {
			$this->db->where($where);
		}
		return $this->db->get()->result();
	}
	public function select_report($year = "all",$month = null)
	{
		$this->db->select(
			'orders.no,orders.date,
			customer.name,
			group_concat(product.name,"-",product_stock.size,"-",orders_detail.quantity,"-",product_stock.price SEPARATOR "<br>") as list_product,
			sum(orders_detail.quantity*product_stock.price) as total,
			customer.name as customer_name,
			shipment.date as shipment_date,shipment.service,shipment.cost'
		);
		$this->db->from('orders');
		$this->db->join('customer','orders.fk_id_customer=customer.id');
		$this->db->join('orders_detail','orders_detail.fk_id_orders=orders.id');
		$this->db->join('product_stock','orders_detail.fk_id_product_stock=product_stock.id');
		$this->db->join('product','product_stock.fk_id_product=product.id');
		$this->db->join('shipment','orders.id=shipment.fk_id_orders','left');
		$this->db->group_by('orders.id');
		$this->db->where('orders.deletedby',null);
		$this->db->where('shipment.date !=',null);
		if ($month != null) {
			$this->db->where('month(orders.date)',$month);
		}
		if ($year != "all") {
			$this->db->where('year(orders.date)',$year);
		}
		return $this->db->get()->result();
	}
	public function select_id($id)
	{
		$this->db->where('id',$id);
		return $this->db->get('orders')->result()[0];
	}
	public function num_rows($where=false)
	{
		$this->db->select('orders.id');
		$this->db->from('orders');
		$this->db->join('shipment','orders.id=shipment.fk_id_orders','left');
		$this->db->where('shipment.deletedby',null);
		if ($where) {
			$this->db->where($where);
		}
		return $this->db->get()->num_rows();
	}
	public function get_customer()
	{
		return $this->db->where('deletedby',null)->get('customer')->result();
	}
	public function insert($data=false)
	{
		if ($data) {
			$post = array(
				'date' => date('Y-m-d'),
				'fk_id_customer' => $this->session->userdata('id')
			);
		}else{
			$post = $this->input->post();
		}
		$post['no'] = $this->generate_no();
		$post['createdby'] = $this->session->userdata('id');
		if ($this->db->insert('orders',$post)) {
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
		if ($this->db->update('orders',$post)) {
			return true;
		}else{
			return false;
		}
	}
	public function delete($id)
	{
		$post['deletedby'] = $this->session->userdata('id');
		$this->db->where('id',$id);
		if ($this->db->update('orders',$post)) {
			return true;
		}else{
			return false;
		}
	}
	public function generate_no()
	{
		$query = $this->db->query("select * from orders order by no desc limit 1");
		$result = $query->result();
		$row = $result[0];
		$id = (int) substr($row->no, 3,5)+1;
		$newid = substr('00000'.($id), -5);
		return 'HMH'.$newid;
	}
	public function select_detail($id)
	{
		$this->db->select('orders_detail.*,product_stock.size,product.name,product.color');
		$this->db->from('orders_detail');
		$this->db->join('product_stock','orders_detail.fk_id_product_stock=product_stock.id','left');
		$this->db->join('product','product_stock.fk_id_product=product.id','left');
		$this->db->where('orders_detail.fk_id_orders',$id);
		return $this->db->get()->result();
	}
	public function insert_detail($id,$data)
	{
		$data['fk_id_orders'] = $id;
		$this->db->insert('orders_detail',$data);
	}
	public function list_month()
	{
		$this->db->select("distinct(month(date)) as month,monthname(date) as month_name");
		return $this->db->get('orders')->result();
	}
	public function list_year()
	{
		$this->db->select("distinct(year(date)) as year");
		return $this->db->get('orders')->result();
	}
}
