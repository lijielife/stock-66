<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class About extends MY_Controller {

	public function __construct(){
		parent::__construct();

	}


	public function index(){

		$this->render('about/main', $this->_data);
	}
}
