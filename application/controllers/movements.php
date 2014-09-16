<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Movements extends MY_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('movements_model', 'mov');
	}

	public function by_date($date = NULL)
	{ 
		$this->_data['date'] = $date;

		if(! $date)
			$this->_data['date'] = date("Y-m-d");

		$this->_data['movements'] = $this->mov
			->date_like($this->_data['date'])
			->order_by('id', 'desc')
			->with('products')
			->with('movementstypes')
			->get_all();

		$this->_data['form_btn_submit_text'] = 'Confirmar';

		$this->_data['modal_content'] = '';
		$this->_data['modal_title'] = 	'Ingresar Nuevo Movimiento';
		$this->_data['modal_id'] = 		'movements_modal';

		$this->_data['scripts'][] = base_url('assets/js/movements.js');
		$this->_data['scripts'][] =	base_url('assets/vendor/select2/select2.js'); 

		$this->_data['styles'][] = base_url('assets/vendor/select2/select2.css');	
		

		$this->load->view('template/header'		, $this->_data);
		$this->load->view('movements/main'		, $this->_data);
		$this->load->view('partials/modal'		, $this->_data);
		$this->load->view('template/footer'		, $this->_data);
	}

/*
	PROCESS THE CATEGORIES FORM */
	
	function process(){ 

		$this->load->library('form_validation');
		$this->form_validation->set_rules('movementstypes_id', 'movementstypes_id', 'required');
		$this->form_validation->set_rules('products_id', 'products_id', 'required');			
		$this->form_validation->set_rules('quantity', 'quantity', 'required');
		$this->form_validation->set_rules('comment', 'comment', '');

		$this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
		
	
		if ($this->form_validation->run() == FALSE){
			$data['showMessage'] = TRUE;
			
			echo validation_errors();

		}
		else{

			$this->load->model('movementstypes_model', 'movtypes');
		/*
			GET THE PRODUCT TO KNOW THE PRICE */

			$the_product = $this->products->get(set_value('products_id'));

		/*
			GET THE TYPE OF MOVEMENT TO KNOW IF IS A + OR - OPERATION */

			$the_type = $this->movtypes->get(set_value('movementstypes_id'));
			
			$form_data = array(
							'id' => -1,
					       	'products_id' => set_value('products_id'),
					       	'movementstypes_id' => set_value('movementstypes_id'),
					       	'quantity' => set_value('quantity') * $the_type->sign,
					       	'unitprice' => $the_product->price,
					       	'comment' => set_value('comment')
						);
			
			$id = $this->mov->save_form($form_data);
			if($id){
			
			/*
				UPDATE THE STOCK */
				$this->products->update_stock(set_value('products_id'), set_value('quantity') * $the_type->sign);				

				redirect(site_url('movimientos'));
			}
			else
			{

				echo 'An error occurred saving your information. Please try again later';
			}			
		}
		
	}


/*
	RETURNS THE FORM HTML */
	public function form(){

		$this->load->model('movementstypes_model', 'movtypes');

		$this->_data['combo_movementstypes'] = $this->movtypes->dropdown('name');

		$this->_data['combo_products'] = $this->products->dropdown('code');

		$this->_data['form_btn_submit_text'] = 'Confirmar';

		$this->load->view('movements/form_movement', $this->_data);
	}
}
