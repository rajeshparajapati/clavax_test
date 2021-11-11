<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('product_model');
		$this->load->library('upload');
	}
	
	public function index()
	{	
		
		$this->load->view('index');
		
	}
	
	public function index_ajax($offset=null)
	{
		$search = array(
			'keyword' => trim($this->input->post('search_key')),
		);
		
		$this->load->library('pagination');
		
		$limit = 5;
		$offset = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

		
		$config['base_url'] = site_url('products/index_ajax/');
		$config['total_rows'] = $this->product_model->get_products($limit, $offset, $search, $count=true);

		$config['per_page'] = $limit;
		$config['uri_segment'] = 3;
		$config['num_links'] = 3;
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li><a href="" class="current_page">';
		$config['cur_tag_close'] = '</a></li>';
		$config['next_link'] = '>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_link'] = '<';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['first_link'] = '<<';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_link'] = '>>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		
		$this->pagination->initialize($config);

		$data['products'] = $this->product_model->get_products($limit, $offset, $search, $count=false);
	
		$data['pagelinks'] = $this->pagination->create_links();
		$data['row_numbers']=$offset;
		
		$this->load->view('index_ajax', $data);
	}


	public function add(){
		$post = $this->input->post();
		if($post){ 			
			$config = array(
					'file_name'=>time(),
					'overwrite'=>TRUE,				
					'max_size'=>'2000',
					'allowed_types' => "gif|jpg|png|jpeg",				
					'upload_path'=>'public/images' 
				); 
			$this->upload->initialize($config); 

			if($this->upload->do_upload('image')){

			$imageData = $this->upload->data();

			$this->load->library('image_lib');

			 $configer =  array(
              'image_library'   => 'gd2',
              'source_image'    =>  $imageData['full_path'],
              'maintain_ratio'  =>  TRUE,
              'width'           =>  250,
              'height'          =>  135,
            );
            
            $this->image_lib->initialize($configer);
            $this->image_lib->resize();
            $this->image_lib->clear();
            $post['thumbnail'] = $imageData['file_name'];
			
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
			$this->form_validation->set_rules('product_name','Product Name','required|is_unique[products.product_name]');
			$this->form_validation->set_rules('company_name','Company Name','required');
			$this->form_validation->set_rules('product_category','Category','required');	
			$this->form_validation->set_rules('sku_no','SKU No','required|is_unique[products.sku_no]');
			$this->form_validation->set_rules('batch_no','Batch No','required|is_unique[products.batch_no]');
			$this->form_validation->set_rules('size','Size','required');
			$this->form_validation->set_rules('qty','Quantity','required');
			$this->form_validation->set_rules('price','Price','required');
			$this->form_validation->set_rules('stock_status','Stock Status','required');

			
			if($this->form_validation->run() !== FALSE){

				$this->product_model->add_product($post);
				$this->session->set_flashdata('message', '<div class="alert alert-success text-center"><b>Product Added Successfully</b></div>');
				redirect('products');
			}


		}
		 else{	
		 		$this->session->set_flashdata('message', '<div class="alert alert-success text-center"><b>'.$this->upload->display_errors().'</b></div>');
				
				 redirect('products/add');
			}  
	}
		$this->load->view('add-product');	
	}

	function get_detail(){
		$post = $this->input->post();
	
		$product = $this->product_model->get_detail($post);
		$html = "";
		$html .= '
			  <div class="container-fluid">
			    <div class="row">
			      <div class="col-md-4">Product Name : '.$product['product_name'].'</div>
			      <div class="col-md-4">Company Name : '.$product['company_name'].'</div>
			      <div class="col-md-4">Category : '.$product['product_category'].'</div>			      
			    </div>
			    <div class="row">
			      <div class="col-md-4">SKU : '.$product['sku_no'].'</div>
			      <div class="col-md-4">Batch : '.$product['batch_no'].'</div>
			      <div class="col-md-4">Size : '.$product['size'].'</div>			      
			    </div>
			    <div class="row">
			      <div class="col-md-4">Quantity : '.$product['qty'].'</div>
			      <div class="col-md-4">Price : '.$product['price'].'</div>
			      <div class="col-md-4">Stock : '.$product['stock_status'].'</div>			      
			    </div>
			    <div class="row">
			      <div class="col-md-4"><img src="'.base_url('public/images/').$product['image'].'"></div>			     		      
			    </div>			    
			  </div>';

			echo $html;
	}

	
}
?>
