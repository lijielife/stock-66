<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH . 'models/base_model.php';

class BoxMovements_model extends Base_Model {

	protected $_table = 'boxmovements';

	public $belongs_to = array('boxmovementstypes');

/*
	DATE SUMMARY FOR CASHBOX */

	public function from_this_date($date){

		$this->db
			->where("DATE(stamp) = '" . $date . "'", NULL, FALSE);

		return $this;
	}
}