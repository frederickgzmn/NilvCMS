<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Param_model extends CI_model{
	
	function __construct(){
		parent::__construct();
	}
	
    //Agregar configuraciones generales
    public function Nilv_set_settings($form){
		$datos_post = $this->input->post();
		
		if(!empty($datos_post)){
			//Limpiando configuraciones
			$this->db->delete('settings', array('form' => $form));
			
			foreach($datos_post as $key=>$valores){
				$data = array(
				   'nombre' => $key,
				   'slug' => $key,
				   'valor' => $valores,
				   'form' => $form
				);
				
				$this->db->insert('settings', $data) or die ($this->db->empty_table('settings'));
			}
			
		return "true";
		}else{
    	    return "error";
		}
        
	}

    //Agregar configuraciones generales
    public function Nilv_select_settings(){
		//Seleccion de configuraciones
		return $this->db->get('settings');
	}
}