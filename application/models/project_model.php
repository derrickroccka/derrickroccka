<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
/**
 * Model dedicated to the DB table "projects"
 *
 * */
class Project_model extends MY_Model {
	/**
	 * Fields to validate from a form
	 * Defines the rules for ("set_rules()")
	 * Some rules are made by @author Derrick Roccka
	 * These rules are defined in application/libraries/MY_Form_validation.php
	 * */
	public $validate = array(
	);

}
