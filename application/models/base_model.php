<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Base_model extends MY_Model {

/*
	SAVE OR UPDATE */

	public function save_form($form_data){
			
		if($form_data['id'] == -1){

			unset($form_data['id']);
			$this->insert($form_data);
			return $this->db->insert_id();
		}

		$this->update($form_data['id'], $form_data);
		return $form_data['id'];
	}

/*
	RETURNS AN EMPTY OBJECT */

	public function get_empty(){

		$table_info = $this->db
			->query("DESCRIBE ".$this->_table)
			->result();

		$returned_object = new stdClass();

		foreach($table_info as $table_field)
			$returned_object->{$table_field->Field} = '';

		$returned_object->id = -1;

		return $returned_object;
	}

/*
	SIMPLE SEARCH BY ONE PARAMETER FOR AUTOCOMPLETES */

	public function search($field, $value){

	/*
		CHECK IF FIELD EXISTS */

		$empty_object = $this->get_empty();

		if(! isset($empty_object->$field))
			throw new Exception("Field Not Exists", 1);
		
	/*
		SEARCH BY FIELD */

		return $this->db
			->like($field, $value, 'after')
			->limit(20)
			->get($this->_table)
			->result();	
	}
		
}
