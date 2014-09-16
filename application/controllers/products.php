<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Products extends MY_Controller {

	public function __construct(){

		parent::__construct();

	}

	public function index(){

		$this->_data['products'] = $this->products->order_by('id', 'desc')->get_all();

		$this->_data['form_btn_submit_text'] = 'Confirmar';

		$this->_data['modal_content'] = '';
		$this->_data['modal_title'] = 	'Nuevo / Editar art&iacute;culo';
		$this->_data['modal_id'] = 		'products_modal';

		$this->_data['scripts'][] =		base_url('assets/js/products.js'); 	

		$this->load->view('template/header'		, $this->_data);
		$this->load->view('products/main'		, $this->_data);
		$this->load->view('partials/modal'		, $this->_data);
		$this->load->view('template/footer'		, $this->_data);
	}

/*
	AJAX CALL TO RETRIEVE THE LIST */

	public function listing($offset = 0){

		$this->load->library('pagination');

		$this->_config['base_url'] 			= site_url('products/listing');
		$this->_config['total_rows'] 		= $this->products->count_all();
		$this->_config['per_page'] 			= 10; 

		$this->_config['full_tag_open'] 	= '<ul class="pagination">';
		$this->_config['full_tag_close']	= '</ul>';
		$this->_config['cur_tag_open']		= '<li class="active"><a href="#">';
		$this->_config['cur_tag_close']		= '</a></li>';
		$this->_config['num_tag_open']		= '<li>';
		$this->_config['num_tag_close']		= '</li>';
		$this->_config['prev_tag_open']		= '<li>';
		$this->_config['prev_tag_close']	= '</li>';
		$this->_config['next_tag_open']		= '<li>';
		$this->_config['next_tag_close']	= '</li>';		

		$this->pagination->initialize($this->_config); 

		$this->_data['products'] = $this->products->order_by('id', 'desc')->limit(10, $offset)->get_all();

		$this->load->view('products/listing', $this->_data);

	}

	public function form($id = -1){

		$this->_data['dropdown_categories'] = $this->categories->order_by('id', 'desc')->dropdown('name');
		$this->_data['product'] = $this->products->get($id);

		if(! $this->_data['product'])
			$this->_data['product'] = $this->products->get_empty();		

		$this->render('products/form', $this->_data);

	}

	public function process(){ 

		$this->load->library('form_validation');
		$this->form_validation->set_rules('id', 'id', '');
		$this->form_validation->set_rules('code', 'code', 'required');			
		$this->form_validation->set_rules('description', 'description', 'required');
		$this->form_validation->set_rules('categories_id', 'categories_id', 'required');
		$this->form_validation->set_rules('stock', 'stock', '');
		$this->form_validation->set_rules('price', 'price', 'required');

		$this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
	
		if ($this->form_validation->run() == FALSE){
			
			echo validation_errors();

		}else{

			
			$form_data = array(
						'id' => set_value('id'),
						'code' => set_value('code'),
						'description' => set_value('description'),
						'categories_id' => set_value('categories_id'),
						'price' => set_value('price'),							
						);

			if(isset($_POST['stock']))
				$form_data['stock'] = set_value('stock');

			$this->db->trans_begin();
			
			$new_id = $this->products->save_form($form_data);
			if($new_id){
			/*
				IF A NEW PRODUCT WAS SAVED, THEN SAVE THE MOVEMENT */

				if($form_data['id'] == -1){

					$this->load->model('movements_model', 'mov');

				/*
					GENERATE THE ARRAY TO INSERT THE MOVEMENT */
					$data = array(
						'movementstypes_id' => BUY_MOVEMENT_ID,
						'products_id' => $new_id,
						'quantity' => $form_data['stock'],
						'comment' => BUY_MOVEMENT_CONCEPT,
						'unitprice' => set_value('price')
						);

					$this->mov->insert($data);
				}

				$this->db->trans_commit();

				redirect(site_url('articulos'));
			
			}else{

				$this->db->trans_rollback();

				echo 'An error occurred saving your information. Please try again later';



			}			
		}
		
	}


	public function by_code($code){

		$product = $this->products->get_by('code', $code);

		if(is_array($product))
			die(json_encode(array('error' => TRUE, 'message' => 'No existe el producto')));

		header('Content-Type: application/json');
		die(json_encode(array('product' => $product, 'error' => FALSE), TRUE));
	}
}
