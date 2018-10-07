<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event_model extends CI_Model {
	
	public function select($where=false)
	{
		$this->db->select('*');
		$this->db->from('event');
		$this->db->where('deletedby',null);
		if ($where) {
			$this->db->where($where);
		}
		return $this->db->get()->result();
	}
	public function select_id($id)
	{
		$this->db->where('id',$id);
		return $this->db->get('event')->result()[0];
	}
	public function num_rows($where=false)
	{
		$this->db->select('id');
		$this->db->from('event');
		if ($where) {
			$this->db->where($where);
		}
		return $this->db->get()->num_rows();
	}

	public function insert($upload_name)
	{
		$post = $this->input->post();
		$post['image'] = $upload_name;
		$post['createdby'] = $this->session->userdata('id');
		if ($this->db->insert('event',$post)) {
			return $this->db->insert_id();
		}else{
			return false;
		}
		
	}
	public function update($id,$upload_name=null)
	{
		$post = $this->input->post();
		if($upload_name!=null){
			$post['image'] = $upload_name;
			$this->delete_image($id);
		}
		$post['editedby'] = $this->session->userdata('id');
		$this->db->where('id',$id);
		if ($this->db->update('event',$post)) {
			return true;
		}else{
			return false;
		}
	}
	public function delete($id)
	{
		$post['deletedby'] = $this->session->userdata('id');
		$this->db->where('id',$id);
		if ($this->db->update('event',$post)) {
			return true;
		}else{
			return false;
		}
	}
	public function upload(){
        $config['upload_path'] = './assets/img/event/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '2048';
        $config['remove_space'] = TRUE;
        $this->load->library('upload', $config);
        if($this->upload->do_upload('image')){
            $return = array('result' => 'success', 'file' => $this->upload->data(),
            'error' => '');
            return $return;
        }else{
            $return = array('result' => 'failed', 'file' => '', 'error' =>
            $this->upload->display_errors());
            return $return;
        }
    }
    public function delete_image($id)
    {
    	$data = $this->db->get_where('event',array('id'=>$id))->result_array();
		unlink('./assets/img/event/'.$data[0]['image']);
    }
}
