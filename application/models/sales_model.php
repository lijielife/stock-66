<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH . 'models/base_model.php';

class Sales_model extends Base_Model {

	var $_table = 'sales';

	public function add_lines($sale_id, $lines_array){

		foreach($lines_array as $line){

			$line['sales_id'] = $sale_id;

			unset($line['code']);

			$this->_database->insert('saleslines', $line);
		}
	}

/*
	DATE SUMMARY FOR CASHBOX */

	public function date_summary($date, $payment_type = NULL){

		if($payment_type)
			$this->db->where('s.salespaymenttypes_id', $payment_type);

		return $this->db
			->select('COUNT(s.id) as salescount, SUM(sl.quantity * sl.unitprice) as salestotal')
			->from('sales s')
			->join('saleslines sl', 's.id = sl.sales_id')
			->where("DATE(stamp) = '" . $date . "'", NULL, FALSE)
			->get()
			->row();
	}
}