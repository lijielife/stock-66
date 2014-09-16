<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH . 'models/base_model.php';

class Expenses_model extends Base_Model {

	var $_table = 'expenses';

/*
	DATE SUMMARY FOR CASHBOX */

	public function date_summary($date){

		return $this->db
			->select('COUNT(id) as count, SUM(amount) as total')
			->from('expenses')
			->where("DATE(stamp) = '" . $date . "'", NULL, FALSE)
			->get()
			->row();
	}

/*
	BY DATE */

 	public function date_like($date){

		$this->db
 			->like('DATE_FORMAT(stamp, "%Y-%m-%d")', $date);

 		return $this;
 	}
}