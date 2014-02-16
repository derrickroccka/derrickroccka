<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class MY_Model extends CI_Model {
	public $_table = '';
	public function __construct() {
		parent::__construct();
		$this -> load -> helper('inflector');
		if (!$this -> _table) {
			$this -> _table = strtolower(plural(str_replace('_model', '', get_class($this))));
		}
	}

	//------------------------------------------------------------

	public function get() {
		$args = func_get_args();
		/**
		 * Corrected by 
		 * @author Derrick Roccka
		 * 
		 * count($args[0]) instead of count($args)
		 * where($args[0]) instead of where($args)
		 * */
		//checks first if $args has something inside
		if(!empty($args)){
			if (count($args[0]) > 1 || is_array($args[0])) {
				$this -> db -> where($args[0]);
			}
			elseif (is_numeric($args[0])) {
				$this -> db -> where('id', $args[0]);
			}
		}
		return $this -> db -> get($this -> _table) -> row();
	}

	//------------------------------------------------------------

	public function get_all() {
		$args = func_get_args();
		/**
		 * Corrected by 
		 * @author Derrick Roccka
		 * 
		 * count($args[0]) instead of count($args)
		 * where($args[0]) instead of where($args)
		 * */
		//checks first if $args has something inside
		if(!empty($args)){
			if (count($args[0]) > 1 || is_array($args[0])) {
				$this -> db -> where($args[0]);
			}
			elseif (is_numeric($args[0])){
				$this -> db -> where('id', $args[0]);
			}
		}

		return $this -> db -> get($this -> _table) -> result();
	}

	//------------------------------------------------------------

	public function insert($data, $skip_validation = FALSE) {
		$data['created_at'] = $data['updated_at'] = date('Y-m-d H:i:s');
		if (!$skip_validation && !$this -> validate($data)) {
			$success = FALSE;
		}
		else {
			$success = $this -> db -> insert($this -> _table, $data);
		}
		//Si $success es true devuelve $this -> db -> insert_id(), si no devuelve FALSE
		//Es lo mismo que había en el primer formato de función insert(), esta es la actualización
		return ($success) ? $this -> db -> insert_id() : FALSE;
	}

	//------------------------------------------------------------

	public function update() {
		$args = func_get_args();
		$args[1]['updated_at'] = date('Y-m-d H:i:s');
		$validate = (isset($args[2])) ? !$args[2] : TRUE;
		if ($validate && $this -> validate($args[1])) {
			if (is_array($args[0])) {
				/**
				 * Corrected by 
				 * @author Derrick Roccka
				 * 
				 * 
				 * where($args[0]) instead of where($args)
				 * */
				$this -> db -> where($args[0]);
			}
			else {
				$this -> db -> where('id', $args[0]);
			}
			return $this -> db -> update($this -> _table, $args[1]);
		}
		else {
			return FALSE;
		}
	}

	//------------------------------------------------------------

	public function delete() {
		$args = func_get_args();
		/**
		 * Corrected by 
		 * @author Derrick Roccka
		 * 
		 * count($args[0]) instead of count($args)
		 * where($args[0]) instead of where($args)
		 * */
		if (count($args[0]) > 1 || is_array($args[0])) {
			$this -> db -> where($args[0]);
		}
		else {
			$this -> db -> where('id', $args[0]);
		}
		return $this -> db -> delete($this -> _table);
	}

	//------------------------------------------------------------

	/**
	 * Valida los campos del formulario, según las normas definidas en $validate
	 * @return	TRUE	Si no hay campos definidos
	 * @return 	$this->form_validation->run()	Si hay campos definidos
	 * */
	public function validate($data) {
		if (!empty($this -> validate)) {
			foreach ($data as $key => $value) {
				$_POST[$key] = $value;
			}
			$this -> form_validation -> set_rules($this -> validate);
			return $this -> form_validation -> run();
		}
		else {
			return TRUE;
		}
	}

    //------------------------------------------------------------

	/**
	 * Filters fields by something
	 * @param 	$key 		Name of the field
	 * @param 	$value 		Value of the field
	 * @return	$this 		Returns context 
	 * */
 	public function by($key, $value)
	{
		$this-> db -> where($key, $value);
		return $this;
	}
}
