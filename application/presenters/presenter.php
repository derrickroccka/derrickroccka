<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
class Presenter {
	/**
	 * Según el nombre del presenter (EJ: Webs_Presenter)
	 * hace una ref al objeto con la var $this->nombredelpresentersin_presenter
	 * Es decir, esto permite en el presenter en concreto acceder a un atributo
	 * usando esta estructura: return $this->nombredelpresenter->atributo 
	 * (EJ: $this->webs->id o $this->casas->direccion, siendo Webs_Presenter y Casas_Presenter los presentadores)
	 * */
	public function __construct($object) {
		//toma el nombre de la clase presenter en cuestión (EJ: De Webs_Presenter queda 'webs')
		$name = strtolower(str_replace("_Presenter", "", get_class($this)));
		/* ahora, en $this->nombredearriba existirá una referencia al objeto ($object)
		 * que contiene los datos de la bdd
		 * */
		$this -> $name = $object;
		
	}

	public function __get($attr) {
		if (isset(get_instance() -> $attr)) {
			return  get_instance() -> $attr;
		}
	}

}
