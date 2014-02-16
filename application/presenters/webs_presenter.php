<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Webs_Presenter extends Presenter {
	/**
	 * Devuelve la id de una web
	 * */
	public function id() {
		return $this->webs->id ;
	}
	/**
	 * Devuelve el nombre de una web
	 * */
	public function name() {
		return $this->webs->name ;
	}
	/**
	 * Devuelve la url de una web
	 * */
	public function url() {
		return $this->webs->url ;
	}

}
