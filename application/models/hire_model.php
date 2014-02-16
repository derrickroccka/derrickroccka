<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
/**
 * Model dedicated to the DB table "hires"
 *
 * */
class Hire_model extends MY_Model {
	/**
	 * Fields to validate from a form
	 * Defines the rules for ("set_rules()")
	 * Some rules are made by @author Derrick Roccka
	 * These rules are defined in application/libraries/MY_Form_validation.php
	 * */
	public $validate = array(
		array(
			'field' => 'email',
			'label' => 'email',
			'rules' => 'required|max_length[100]|xss_clean'
		),
		array(
			'field' => 'comment',
			'label' => 'comment',
			'rules' => 'required|max_length[140]|xss_clean'
		)
	);

}