<?php (defined('BASEPATH')) OR exit('No direct script access allowed');
/**
 * NilvCMS
	*
 * Sistema Web para el Manejo de contenido
	*
 * @paquete		NilvCMS
 * @autor		Equipo de NilvBug.com
 * @copyright	Copyright (c) 2014, NilvBug.com
 * @desde		Version 1.0
 * @filesource
 */

// ------------------------------------------------------------------------

/**
 * Clase de Funciones Comunes de NilvCMS
	*
 * Este clase permite alojar funciones comunes para ser reutilizadas
 * en varias secciones de la aplicacion.
	*
 * @paquete		NilvCMS
 * @sub_paquete	Librerias
 * @categoria	Librerias
 * @autor		Frederick Guzman Santana
 */

class nilv_controller_class{
	
	var $ci; // atributo que almacena el valor de referencia del metodo get_instance.
	/**
	* Constructor - Setea las preferencias de las funciones comunes
	**/
	public function __construct(){
		/*
			*Pasando por referencia get_instance a la atributo ci para poder utilizar
			*las funciones de codeigniter dentro de esta libreria
		 */
		$this->ci =& get_instance();
		
		//llamando modelo
		$this->ci->load->library('parser');	
		$this->ci->load->model('userAdmin_model');
	}
	
	
	public function NilvController($pages="",$data_insert="",$schem="cms"){
		
		//Declaracion inicial
		$data = array();
		
		$vista_user = $this->ci->userAdmin_model->Nilv_vista_usuario($_SESSION["ID_usr"]);
		
		//Datos a cargar a la vista
		$n=0;
		foreach($datodb = $vista_user->result_array() as $rows){
			$data["usuario"] = $datodb[$n]["id"];
			$data["nombre"] = $datodb[$n]["nombre"];
			$data["apellidos"] = $datodb[$n]["apellido"];
			$data["email"] = $datodb[$n]["email"];
			$n++;
		}
		
		//url_base en las vistas
		$data["base_url"] = base_url();
		
		//Uniendo el arreglo enviado con el arreglo master
		if($data_insert!="" and is_array($data_insert)){
			//Union de array
			$data = array_merge($data, $data_insert);		
		}
		
		//cargando custom javascript
		if(isset($data["custom_js"]) and $data["custom_js"]!=""){
			$data["customjs"] = "";
			foreach($data["custom_js"] as $customJs){
				$data["customjs"] .= '<script src="'.$data["base_url"].'themes/'.$schem.'/js/'.$customJs.'.js"></script>';
			}
			}else{
			$data["customjs"] = "";
		}
		
		//cargando custom css		
		if(isset($data["custom_css"]) and $data["custom_css"]!=""){
			$data["customcss"] = "";
			foreach ($data["custom_css"] as $custom_css){
				$data["customcss"] .= '<link href="'.$data["base_url"].'themes/'.$schem.'/css/'.$custom_css.'.css" rel="stylesheet" type="text/css" />' . "/n/t";
			}
			}else{
			$data["customcss"] = "";
		}
		
		//Vaciando datos
		if(empty($data) or $_SESSION["ID_usr"]==""){
			$data["usuario"] = "";
			$data["nombre"] = "";
			$data["apellidos"] = "";
			$data["email"] = "";
		}
		
		//Envio del usuario al tablero
		if($pages=="" or $pages == "header" or $pages == "footer"){
			$pages = "tablero";
		}
		
		//Comprobacion de que la vista exista
		$dir = scandir("application/views/".$schem."/");
		
		if(in_array($pages.".php",$dir)){
			//Cargada de datos a la vista
			$this->ci->parser->parse($schem."/header.php",$data);
			$this->ci->parser->parse($schem."/".$pages.".php",$data);
			$this->ci->parser->parse($schem."/footer.php",$data);			
			}else{
			//si la vista no existe mostramos un 404
			$this->ci->parser->parse($schem."/header.php",$data);
			$this->ci->parser->parse($schem."/404.php",$data);
			$this->ci->parser->parse($schem."/footer.php",$data);
		}
	}
	
	public function NilvControllerM($pages="",$data_insert="",$module_name="",$schem="cms"){
		
		//Declaracion inicial
		$data = array();
		$vista_user = $this->ci->userAdmin_model->Nilv_vista_usuario($_SESSION["ID_usr"]);
		
		//Datos a cargar a la vista
		$n=0;
		foreach($datodb = $vista_user->result_array() as $rows){
			$data["usuario"] = $datodb[$n]["id"];
			$data["nombre"] = $datodb[$n]["nombre"];
			$data["apellidos"] = $datodb[$n]["apellido"];
			$data["email"] = $datodb[$n]["email"];
			$n++;
		}
		
		//url_base en las vistas
		$data["base_url"] = base_url();
		
		//Uniendo el arreglo enviado con el arreglo master
		if($data_insert!="" and is_array($data_insert)){
			//Union de array
			$data = array_merge($data, $data_insert);		
		}
		
		//cargando custom javascript
		if(isset($data["custom_js"]) and $data["custom_js"]!=""){
			$data["customjs"] = "";
			foreach($data["custom_js"] as $customJs){
				$data["customjs"] .= '<script src="'.$data["base_url"].'themes/'.$module_name.'/js/'.$customJs.'.js"></script>';
			}
			}else{
			$data["customjs"] = "";
		}
		
		//cargando custom css		
		if(isset($data["custom_css"]) and $data["custom_css"]!=""){
			$data["customcss"] = "";
			foreach ($data["custom_css"] as $custom_css){
				$data["customcss"] .= '<link href="'.$data["base_url"].'themes/'.$module_name.'/css/'.$custom_css.'.css" rel="stylesheet" type="text/css" />' . "/n/t";
			}
			}else{
			$data["customcss"] = "";
		}
		
		//Vaciando datos
		if(empty($data) or $_SESSION["ID_usr"]==""){
			$data["usuario"] = "";
			$data["nombre"] = "";
			$data["apellidos"] = "";
			$data["email"] = "";
		}
		
		//Envio del usuario al tablero
		if($pages=="" or $pages == "header" or $pages == "footer"){
			$pages = "tablero";
		}
		
		//Comprobacion de que la vista exista
		$dir = scandir("application/views/".$schem."/");
		/*
		if(in_array($pages.".php",$dir)){
			//Cargada de datos a la vista
			$this->ci->parser->parse($schem."/header.php",$data);
			$this->ci->parser->parse("../../".$pages.".php",$data);
			$this->ci->parser->parse($schem."/footer.php",$data);			
			}else{
			//si la vista no existe mostramos un 404
			$this->ci->parser->parse($schem."/header.php",$data);
			$this->ci->parser->parse($schem."/404.php",$data);
			$this->ci->parser->parse($schem."/footer.php",$data);
		}*/
	}
}