<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
	AUTHOR:		PATRICIO GABRIEL MASEDA - <PATRICIO.MASE@GMAIL.COM> */
	

class Cashboxes extends MY_Controller {

	public function __construct(){
		parent::__construct();

		$this->load->model('sales_model', 'sales');
		$this->load->model('expenses_model', 'expenses');
		$this->load->model('boxmovements_model', 'boxmovements');
	}

	public function index($date = NULL){

		//$this->_data['scripts'][] = base_url('assets/vendor/jquery.form/jquery.form.min.js');
		//$this->_data['scripts'][] = base_url('assets/js/sales.js');

		$this->_data['date'] = $date;

		if(! $this->_data['date'])
			$this->_data['date'] = date("Y-m-d");

	/*
		GET THIS DATE'S SALES */

		$this->_data['cash'] = $this->sales->date_summary($this->_data['date'], CASH_SALES);
		$this->_data['card'] = $this->sales->date_summary($this->_data['date'], CARD_SALES);
	/*
		GET THIS DATE'S EXTRA CASH FLOW */

		$this->_data['movements'] = $this->boxmovements
			->from_this_date($this->_data['date'])
			->with('boxmovementstypes')
			->get_all();

	/*
		GET THIS DATES'S EXPENSES */

		$this->_data['expenses'] = $this->expenses->date_summary($this->_data['date']);


		self::render('cashboxes/main', $this->_data);
	}


}
