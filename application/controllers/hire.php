<?php
require(APPPATH.'libraries/REST_Controller.php');  
class Hire extends REST_Controller {

	public function index_get(){

	}
	public function index_post(){
		//retrieving info from app.js (hire.save())
		$data = json_decode(file_get_contents('php://input'), TRUE);
		//checking if the same comment exists
		$id = $this -> hire_model -> get_all($data);
		if(!$id){
			if($response = $this -> hire_model -> insert($data)){
				$this->response($data);
			}
			else{
				$this->response("epic fail");
			}
		}
	}
	public function index_put(){
		
	}
	public function index_delete(){
		
	}

}

/* End of file hire.php */
/* Location: ./application/controllers/hire.php */