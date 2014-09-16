<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH . 'models/base_model.php';

class Categories_model extends Base_Model {

	var $_table = 'categories';

	protected $protected_attributes = array( 'id' );
}