<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Categories extends MY_Controller {

	public function __construct(){
		parent::__construct();

	}

	public function index()
	{

		$this->_data['categories'] = $this->categories->order_by('id', 'desc')->get_all();

		$this->_data['form_btn_submit_text'] = 'Confirmar';

		$this->_data['modal_content'] = '';
		$this->_data['modal_title'] = 	'Nueva / Editar categor&iacute;a';
		$this->_data['modal_id'] = 		'categories_modal';

		$this->_data['scripts'][] =		base_url('assets/js/categories.js'); 	

		$this->load->view('template/header'		, $this->_data);
		$this->load->view('categories/main'		, $this->_data);
		$this->load->view('partials/modal'		, $this->_data);
		$this->load->view('template/footer'		, $this->_data);
	}

/*
	PROCESS THE CATEGORIES FORM */
	
	function process(){ 

		$this->load->library('form_validation');
		$this->form_validation->set_rules('id', 'id', '');
		$this->form_validation->set_rules('name', 'name', 'required|max_length[45]');			
		
		$this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
		
		$this->form_validation->set_message('required', 'Por favor complete el campo');
		$this->form_validation->set_message('min_length', 'La contrase&ntilde;a debe ser al menos de 6 caracteres');
	
		if ($this->form_validation->run() == FALSE){
			$data['showMessage'] = TRUE;
			
			echo validation_errors();

		}
		else{
			
			$form_data = array(
							'id' => set_value('id'),
					       	'name' =>set_value('name'),
						);
			
			$category = $this->categories->save_form($form_data);
			if($category){
				
				redirect(site_url('categorias'));
			}
			else
			{

				echo 'An error occurred saving your information. Please try again later';
			}			
		}
		
	}


/*
	RETURNS THE FORM HTML */
	public function form($id = -1){

		$this->_data['category'] = $this->categories->get($id);

		if(! $this->_data['category'])
			$this->_data['category'] = $this->categories->get_empty();

		$this->_data['form_btn_submit_text'] = 'Confirmar';

		$this->load->view('categories/form_category', $this->_data);
	}
}
