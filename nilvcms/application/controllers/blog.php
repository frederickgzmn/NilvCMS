<?php
class Blog extends CI_Controller {
	
	public function index(){
		$this->load->library('parser');
		$data["usuario"] = "asdasdasda";
		$this->parser->parse("login",$data);
	}

}

?>