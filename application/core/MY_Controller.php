<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class MY_Controller extends CI_Controller{
	
	//Page info
	protected $data = Array();
	protected $hasModals = FALSE;
	protected $hasNav = TRUE;
	protected $hasSwip = FALSE;
	protected $mobile = FALSE;
	protected $pageName = FALSE;
	protected $slogan = FALSE;
	protected $template = "main";

	//Javascript libs
	protected $javascript = array(
		//'dform.js',
		//'less.js',
		//'jquery.roundabout.min.js',
		//'jquery.roundabout-shapes.min.js',
		//'jquery.nouislider.min.js',
		);

	//Each full width section js
	protected $section = array(
		//'nav.js',
		//'derrick.js',
		);
	//Extra CSS
	protected $css = array();
	//Google Web Fonts
	protected $fonts = array(
		
		);
	//Other fonts
	protected $fonts2 = array(
		
		);
	//Page Meta
	protected $title = FALSE;
	protected $description = FALSE;
	protected $author = FALSE;
	
	function __construct()
	{	

		parent::__construct();
		//loading minify driver
		$this->load->driver('minify');
		//data passed to the view and others
		$this->data["uri_segment_1"] = $this->uri->segment(1);
		$this->data["uri_segment_2"] = $this->uri->segment(2);
		$this->title = $this->config->item('site_title');
		$this->description = $this->config->item('site_description');
		$this->author = $this->config->item('site_author');
		$this->slogan = $this->config->item('site_slogan');
		//recognizing the pagename via getting class name
		$this->pageName = strToLower(get_class($this));
		//detecting type of device used and loading some scripts more
	    $detect = new Mobile_Detect();
	    if ($detect->isMobile() || $detect->isTablet()) {
	    	array_push($this-> javascript,'shake.js');
	    	$this-> mobile = TRUE;
	    }
	    else{
	    	array_push($this-> javascript, 'skrollr.min.js');
	    }
	}
	
	
	protected function _render($view) {
		//static
		$toTpl["javascript"] = $this->javascript;
		$toTpl["section"] = $this->section;
		$toTpl["css"] = $this->css;
		$toTpl["fonts"] = $this->fonts;
		$toTpl["fonts2"] = $this->fonts2;
		//meta
		$toTpl["title"] = $this->title;
		$toTpl["description"] = $this->description;
		$toTpl["mobile"] = $this->mobile;
		$toTpl["author"] = $this->author;
		$toTpl["slogan"] = $this->slogan;

		//swipable menu
		if($this->hasSwip){
			$this->load->helper("nav");
			$toMenu["pageName"] = $this->pageName;
			$toTpl["nav"] = $this->load->view("template/nav",$toMenu,true);
		}		
		//data
		$toBody["content_body"] = $this->load->view($view,array_merge($this->data,$toTpl),true);
		
		//nav menu
		if($this->hasNav){
			$this->load->helper("nav");
			$toMenu["pageName"] = $this->pageName;
			$toHeader["nav"] = $this->load->view("template/nav",$toMenu,true);

		}

		$toHeader["basejs"] = $this->load->view("template/basejs",$this->data,true);

		if($this->hasModals){
			$toBody["modals"] = $this->load->view("template/modals",'',true);
		}
		$toBody["header"] = $this->load->view("template/header",$toHeader,true);
		$toBody["footer"] = $this->load->view("template/footer",'',true);
		
		$toTpl["body"] = $this->load->view("template/".$this->template,$toBody,true);
		
		//render view
		$this->load->view("template/skeleton",$toTpl);
		
	}
}
