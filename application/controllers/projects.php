<?php
require(APPPATH.'libraries/REST_Controller.php');  
/**
*
* Class Projects
* RESTful class for the BDD table 'projects'
* @author Derrick Roccka
**/

class Projects extends REST_Controller {
	/**
	*
	* Gets all the projects in the BDD table 'projects'
	* @author Derrick Roccka
	**/
	
	public function index_get(){
		//$_SERVER['HTTP_X_PJAX'] = true;
		if($data = $this -> project_model -> get_all()){
			$this->response($data);
		}
		else{
			$this->response("There's been a problem :( Please, try later");
		}
		// if (isset($_SERVER["HTTP_X_PJAX"])) {
		// 	$d = $this->load->view('partials/_projects', $data, true);
		// 	echo $d;
		// 	exit;
		// }
		// else{
		// 	$d = $this->load->view('test', $data, true);
		// 	echo $d;
		// 	exit;
		// }
		//$a=$this->get('name');
		//$this->response(json_encode($a));//probando routes php para pasar directamente controlador/parametro asumiendo que name siempre es el param y index el metodo
		//$this->response($data);//este es el else real, lo de ahora es test
	}
	public function index_post(){
		
	}
	public function index_put(){
		
	}
	public function index_delete(){
		
	}
}

/* End of file derrick.php */
/* Location: ./application/controllers/derrick.php */