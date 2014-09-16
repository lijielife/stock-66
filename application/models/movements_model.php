<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH . 'models/base_model.php';

class Movements_model extends Base_Model {

	protected $_table = 'movements';

 	protected $belongs_to = array( 'products', 'movementstypes' );

 	public function date_like($date){

		$this->db
 			->like('DATE_FORMAT(stamp, "%Y-%m-%d")', $date);

 		return $this;
 	}
}