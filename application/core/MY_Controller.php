<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	protected $_data = array();
	protected $_default_model = NULL;

	protected $_header = 'template/header';
	protected $_sidebar = 'template/sidebar';
	protected $_footer = 'template/footer';


	public function __construct(){

		parent::__construct();

	/*
		CHECK LOGGED IN IN ALL CONTROLLERS BUT AUTH */

		if(get_class($this) != 'Auth')
			$this->check_logged_in();

	/*
		CONTINUE LOADING THINGS */

		$this->_data['styles'] = array(
			base_url('assets/css/bootstrap.css'),
			base_url('assets/css/simple-sidebar.css'),
			base_url('assets/css/style.css'),
			base_url('assets/font-awesome/css/font-awesome.min.css')
			);

		$this->_data['scripts'] = array(
			base_url('assets/js/jquery.js'),
			base_url('assets/js/bootstrap.js'),
			base_url('assets/js/main.js')
			);

	/*
		MODELS */

		$this->_load_default_model();

		$this->load->model('categories_model', 'categories');

		$this->load->model('products_model', 'products');

	/*
		LOAD CONFIG */

		$user_config = $this->db
			->get('configuration')
			->row();

		$this->lang->load('sk', $user_config->language);
		
	}

/*
	RENDERS HEADER, CURRENT VIEW AND FOOTER BY TYPE OF CALL */

	protected function render($view, $data){

		if(! $this->input->is_ajax_request()){

			$this->load->view($this->_header, $data);
			$this->load->view($this->_sidebar, $data);
		}

		$this->load->view($view, $data);

		if(! $this->input->is_ajax_request())
			$this->load->view($this->_footer, $data);
	}

/*
	CHECK FOR LOGIN */

	protected function check_logged_in(){

		$this->load->model('patoauth/patoauth_model', 'patoauth');

	/*
		TRY TO AUTOLOGIN */

		if(! $this->patoauth->is_logged_in())
			$this->patoauth->autologin();

	/*
		IF STILLS NO LOGGED IN GET OUT OF HERE */

		if(! $this->patoauth->is_logged_in())
			redirect(site_url('auth/login'));
	}

/*
	SIMPLE SEARCH IMPLEMENTATION FOR AUTOCOMPLETES */

	protected function search_by($field, $value = ''){

		if(! $this->_default_model)
			die("This class default model doesnt exist");

		$search_result = $this->{$this->_default_model}->search($field, $value);

		die(json_encode($search_result));

	}

/*
	AUTOMATICALLY LOADS THE DEFALT MODEL IF EXISTS */

	private function _load_default_model(){

		$default_model_name = strtolower(get_class($this)) . '_model';

		if(file_exists(APPPATH . 'models/' . $default_model_name . '.php')){

			$this->load->model($default_model_name, strtolower(get_class($this)));
			$this->_default_model = strtolower(get_class($this));
		}

	} 
}