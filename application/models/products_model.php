<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH . 'models/base_model.php';

class Products_model extends Base_Model {

	var $_table = 'products';

/*
	UPDATE PRODUCT STOCK */

	public function update_stock($id, $variation){

		$this->db
			->set('stock', 'stock + ' . $variation, FALSE)
			->where('id', $id)
			->update($this->_table);
	}
}