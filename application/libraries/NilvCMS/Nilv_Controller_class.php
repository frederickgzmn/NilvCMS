<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

class Nilv_Controller_class {
	
	private	$data_user;
	
	public function NilvController($pages="",$data_insert="",$schem="cms"){
		
		//Declaracion inicial
		$data = array();
		
		//llamando modelo
		$this->load->library('parser');
		$vista_user = $this->data_user;
		
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
			$this->parser->parse($schem."/header.php",$data);
			$this->parser->parse($schem."/".$pages.".php",$data);
			$this->parser->parse($schem."/footer.php",$data);			
			}else{
			//si la vista no existe mostramos un 404
			$this->parser->parse($schem."/header.php",$data);
			$this->parser->parse($schem."/404.php",$data);
			$this->parser->parse($schem."/footer.php",$data);
		}
	}

}