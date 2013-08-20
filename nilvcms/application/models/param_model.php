<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Param_model extends CI_model{
	
	function __construct(){
		parent::__construct();
	}
	
    //Agregar configuraciones generales
    function set_settings($codigo,$valor,$req){
		if(isset($codigo) and $codigo !="" and isset($valor) and $valor !="" and isset($req) and $req !=""){
    	    $data = array(
                   'nombre' => $codigo,
                   'valor' => $valor,
                   'es_requerida' => $req
                );
                
            $this->db->where('slug', $codigo);
            $this->db->update('settings', $data);
            
            return "true";
		}else{
    	    return "error";
		}
        
	}
	
	
}