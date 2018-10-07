<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model {
	
	public function orders()
	{
		$this->db->select("(select count(*) from orders where date > NOW() - INTERVAL 3 DAY) as new");
		return $this->db->get('orders')->result()[0];
	}
	public function customer()
	{
		$this->db->select("(select count(*) from customer where datecreated > NOW() - INTERVAL 3 DAY) as new");
		return $this->db->get('customer')->result()[0];
	}
	public function product()
	{
		$this->db->select("(select count(*) from product where datecreated > NOW() - INTERVAL 3 DAY) as new");
		return $this->db->get('product')->result()[0];
	}
	public function orders_detail()
	{
		$this->db->select("(select count(*) from orders_detail) as this_month");
		return $this->db->get('orders_detail')->result()[0];
	}
	public function employee()
	{
		$this->db->select('employee.id,employee.name,
			((select count(*) from customer where createdby = employee.id)+
			(select count(*) from employee where createdby = employee.id)+
			(select count(*) from event where createdby = employee.id)+
			(select count(*) from news where createdby = employee.id)+
			(select count(*) from product where createdby = employee.id)+
			(select count(*) from product_image where createdby = employee.id)+
			(select count(*) from product_stock where createdby = employee.id)+
			(select count(*) from shipment where createdby = employee.id)+
			(select count(*) from videos where createdby = employee.id)	
			) as point');
		return $this->db->get('employee')->result();
	}
	public function profit($year = null)
	{
		$this->db->select(
			'
			month(orders.date) as month,
			monthname(orders.date) as month_name,
			(sum(product_stock.price * orders_detail.quantity)) as debet,
			(select count(ord.id) from orders ord left join shipment on ord.id =shipment.fk_id_orders where service is not null AND month(ord.date)=month(orders.date)) as count_orders,
			(select sum(cost) from shipment inner join orders o on shipment.fk_id_orders=o.id where month(o.date)=month(orders.date)) as kredit,
			(sum(product_stock.price*orders_detail.quantity)-(select sum(cost) from shipment inner join orders o on shipment.fk_id_orders=o.id where month(o.date)=month(orders.date))) as profit'
		);
		$this->db->from('orders');
		$this->db->join('customer','orders.fk_id_customer=customer.id');
		$this->db->join('orders_detail','orders_detail.fk_id_orders=orders.id');
		$this->db->join('product_stock','orders_detail.fk_id_product_stock=product_stock.id');
		$this->db->join('product','product_stock.fk_id_product=product.id');
		$this->db->join('shipment','orders.id=shipment.fk_id_orders','left');
		$this->db->group_by('month(orders.date)');
		if ($year != null) {
			$this->db->where('year(orders.date)',$year);
		}else{
			$this->db->where('year(orders.date)',date('Y'));
		}
		$this->db->where('orders.deletedby',null);
		$this->db->where('shipment.date !=',null);
		return $this->db->get()->result();
	}
}
