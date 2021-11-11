<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_model {
	
	public function __construct()
	{
		parent::__construct();
	}
	
	public function get_products($limit, $offset, $search, $count)
	{
		$this->db->select('*');
		$this->db->from('products');
		if($search){
			$keyword = $search['keyword'];
			if($keyword){
				$this->db->group_start();
				$this->db->like("product_name",$keyword);
				$this->db->or_like("company_name",$keyword);
				$this->db->or_like("product_category",$keyword);
				$this->db->group_end();
			}
		}
		if($count){
			return $this->db->count_all_results();
		}
		else {
			$this->db->order_by("product_name","ASC");
			$this->db->limit($limit, $offset);
			$query = $this->db->get();
			
			if($query->num_rows() > 0) {
				return $query->result();
			}
		}
		
		return array();
	}

	function add_product($post){
		$product =  array(
			'product_name'=>$post['product_name'],
			'company_name'=>$post['company_name'],
			'product_category'=>$post['product_category'],
			'sku_no'=>$post['sku_no'],
			'batch_no'=>$post['batch_no'],
			'size'=>$post['size'],
			'image'=>$post['thumbnail'],
			'qty'=>$post['qty'],
			'price'=>$post['price'],
			'stock_status'=>$post['stock_status'],
		);
		$this->db->insert('products',$product);
	}

	function get_detail($post){
		$this->db->select();
		$this->db->from('products');
		$this->db->where('product_id',$post['product_id']);
		return $this->db->get()->row_array();
	}
}
?>