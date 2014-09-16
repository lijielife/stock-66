<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
	AUTHOR:		PATRICIO GABRIEL MASEDA - <PATRICIO.MASE@GMAIL.COM> */
	

class Sales extends MY_Controller {

	public function __construct(){
		
		parent::__construct();

	}

	public function index(){

		$this->_data['scripts'][] = base_url('assets/vendor/jquery.form/jquery.form.min.js');
		$this->_data['scripts'][] = base_url('assets/js/sales.js');

		$this->_data['today_date'] = date("d - m - Y");
		$this->_data['sale_number'] = 00001;

		$this->load->model('salespaymenttypes_model', 'payment_types');
		$this->_data['payment_types'] = $this->payment_types->dropdown('description');

		self::render('sales/main', $this->_data);
	}

/*
	PROCESS THE SALE FORM */
	
	public function process(){ 

	/*
		TURNS THE POST ARRAY INTO AN ARRAY ACCORDING TO INSERT PARAMETERS */

		$sale_products = array();

		foreach ($this->input->post('products_id') as $key => $value)
			if($value != "")
				foreach($_POST as $field_name => $trash)
					if(isset($_POST[$field_name][$key]))
						if(is_array($_POST[$field_name]))
							$sale_products[$value][$field_name] = $_POST[$field_name][$key];


	/*
		INSERTS THE NEW SALE */

		$this->db->trans_start();

		$sale_id = $this->sales
			->insert(array(
				'status' => 'confirmed',
				'salespaymenttypes_id' => $this->input->post('salespaymenttypes_id')
				));
	/*
		GET THE CURRENT PRODUCT PRICE */

		foreach($sale_products as $key => $sale_line)
			$sale_products[$key]['unitprice'] = $this->products->get($key)->price;

		$this->sales->add_lines($sale_id, $sale_products);

	/*
		UPDATE PRODUCTS STOCK */

		foreach ($sale_products as $key => $product)
			$this->products->update_stock($key, $product['quantity'] * -1);
			
		$result = $this->db->trans_complete();

		if($result)
			die(json_encode(array(
				'error' => FALSE, 
				'message' => 'Compra guardada'
				)));

		die(json_encode(array(
			'error' => TRUE, 
			'message' => 'Error guardando la compra'
			)));
	}

/*
	RETURNS THE BILL ROW HTML */
	public function form_line(){

		$this->load->view('sales/form_line');
	}
}
