<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Vistas extends CI_Controller {
		
	function __construct(){
		parent::__construct();
		ini_set('display_errors', 1);
		$this->load->model('Param_model');
	}
	
	function index(){
		//$this->vista_usu($_SESSION["ID_usr"]);
		//Cargada de datos a la vista
		$data = array();
		//url_base en las vistas
		$data["base_url"] = base_url();
		if(isset($_SESSION["errores"])){
			$data["errores"] = '<div style="background: red; width: 180px; color: yellow;" id="alertBox-generated">'.$_SESSION["errores"].'.</div>';
		}else{
			$data["errores"] = "";		
		}

		$this->load->library('parser');
		$this->parser->parse("cms/login.php",$data);
	}
	
	public function vista_usu($usuario=""){
		//Declaracion inicial
		ini_set('display_errors', 0);
		$data = array();
		
		//llamando modelo
		$this->load->model('userAdmin_model');
		$vista_user = $this->userAdmin_model->vista_usuario($usuario);

        
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
		
		//Vaciando datos
		if(empty($data) or $usuario==""){
			$data["usuario"] = "";
			$data["nombre"] = "";
			$data["apellidos"] = "";
			$data["email"] = "";
		}
		
		//Cargada de datos a la vista
		$this->load->library('parser');
		$this->parser->parse("cms/login.php",$data);
	}
	
	//
	public function NilvController($pages="",$data_insert=""){
		//Declaracion inicial
		$data = array();
		
		//llamando modelo
		$this->load->model('userAdmin_model');
		$this->load->library('parser');
		$vista_user = $this->userAdmin_model->Nilv_vista_usuario($_SESSION["ID_usr"]);

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
			$data["custom_js"] = '<script src="'.$data["base_url"].'themes/cms/js/'.$data["custom_js"].'.js"></script>';
		}else{
			$data["custom_js"] = "";
		}
		
		//cargando custom css		
		if(isset($data["custom_css"]) and $data["custom_css"]!=""){
			$data["custom_css"] = '<link href="'.$data["base_url"].'themes/cms/css/'.$data["custom_css"].'.css" rel="stylesheet" type="text/css" />';
		}else{
			$data["custom_css"] = "";
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
		$dir = scandir("application/views/cms/");
		if(in_array($pages.".php",$dir)){
			//Cargada de datos a la vista
			$this->parser->parse("cms/header.php",$data);
			$this->parser->parse("cms/".$pages.".php",$data);
			$this->parser->parse("cms/footer.php",$data);			
		}else{
			//si la vista no existe mostramos un 404
			$this->parser->parse("cms/header.php",$data);
			$this->parser->parse("cms/404.php",$data);
			$this->parser->parse("cms/footer.php",$data);
		}
		
	}
	
	public function tablero(){
		$this->NilvController();
	}
	
	public function config(){
		$data["custom_js"] = "config";
		if(isset($_SESSION["error_config"]))
			$data["error_config"] = $_SESSION["error_config"];
		
		$resultado = $this->Param_model->Nilv_select_settings();
		
		$n=0;
		//enviando los datos a parsear al archivo html
		foreach ($resultado->result_array() as $row){
			if($row["valor"]!="" and isset($row["valor"])){
				$data[$row["slug"]] = $row["valor"];
			}else{
				$data[$row["slug"]] = "";
			}
		$n++;
		}
		
		//seleccionando los select correspondientes Form 1
		if($data["idiomat"] == "en"){
			$data["idiomat"] = "selected='selected'";
		}else{
			$data["idiomat"] = "";
		}
		
		if($data["estadoweb"] == "N"){
			$data["estadoweb"] = "selected='selected'";
		}else{
			$data["estadoweb"] = "";
		}

		//seleccionando los select correspondientes Form 1
		if($data["perfilon"] == "N"){
			$data["perfilon"] = "selected='selected'";
		}else{
			$data["perfilon"] = "";
		}
		
		if($data["notificmsg"] == "N"){
			$data["notificmsg"] = "selected='selected'";
		}else{
			$data["notificmsg"] = "";
		}			
		if($data["statregister"] == "N"){
			$data["statregister"] = "selected='selected'";
		}else{
			$data["statregister"] = "";
		}
		
		$this->NilvController("config",$data);
		$_SESSION["error_config"]="";
	}
	
}