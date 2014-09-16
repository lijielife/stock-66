<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class BoxMovementTypes_model extends MY_Model {

	protected $_table = 'boxmovementtypes';

	public $has_many = array('boxmovements');

}