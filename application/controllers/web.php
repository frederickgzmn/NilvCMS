<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Web extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		ini_set('display_errors', 1);
		$this->load->model('Param_model');
		$this->load->model('userAdmin_model');
	}
	
	function index(){
		//print_r(scandir("application/controllers/vistas.php"));
		$this->load->library("application/controllers/vistas");
		//$this->vistas->NilvController("");
		
		//$this->NilvController("");
	}
	
}