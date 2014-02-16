<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Home extends MY_Controller {
	/**
	 * INDEX
	 * 
	 * Loads presenters (if needed)
	 * Sets titles, keywords and other basic information (if needed)
	 * Renders the page
	 * @author Derrick Roccka
	 * */
	 	
	public function index() {
		//require_once APPPATH . 'presenters/webs_presenter.php';
		/*
		 *set up title and keywords (if not the default in custom.php config file will be set)...
		 */
		//minifiying JS files into resources/js/libs/test.js
		$files = array(
			// 'resources/js/libs/jquery-1.10.2.min.js',
			// 'resources/js/libs/underscore-min.js',
			// 'resources/js/libs/backbone-min.js',
			'resources/js/adjustment.js',
			'resources/js/plugins.js',
			'resources/js/app.js',
			'resources/js/libs/jquery.roundabout.min.js',
			'resources/js/libs/jquery.roundabout-shapes.min.js',
			'resources/js/sections/nav.js',
			'resources/js/sections/derrick.js',
		);
		$contents = $this->minify->combine_files($files, 'js');
		$this->minify->save_file($contents, 'resources/js/libs/test.js');

		//renders the desired page in /application/views/pages/
		$this -> _render('pages/home');
		
	}

	
}