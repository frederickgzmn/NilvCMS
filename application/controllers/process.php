<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Process extends CI_Controller {

	function __construct(){
		parent::__construct();
		ini_set('display_errors', 1);
	}
	
	function index(){
		//Cargada de datos a la vista
		$data = array();
		//url_base en las vistas
		$data["base_url"] = base_url();
		redirect("vistas");
	}
	
	public function Nilv_set_settings($form=""){
		$this->load->model('Param_model');
		if($form=="1" or $form == "2"){
			$resultado = $this->Param_model->Nilv_set_settings($form);
		}else{
			$resultado = false;
		}
		
		if($resultado==true){
			$_SESSION["error_config"] = '<div class="alert alert-success">Actualizacion realizada</div>';
		}else{
			$_SESSION["error_config"] = '<div class="alert alert-danger">Parametros vacios o incorrectos</div>';
		}
		
		redirect("vistas/config");
	}
	
	public function Nilv_modific_usuario($nombre,$apellido,$email,$usuario=""){
		$this->load->model('userAdmin_model');
		$resultado = $this->userAdmin_model->modificar_usuario($nombre,$apellido,$email,$usuario);
		if($resultado==true){
			echo "Actualizacion realizada";
		}else{
			echo "El usuario no existe";
		}
	}

	public function Nilv_insert_usuario($nombre,$apellido,$email,$usuario,$passwd){
		$this->load->model('userAdmin_model');
		$resultado = $this->userAdmin_model->insertar_usuario($nombre,$apellido,$email,$usuario,$passwd);
		if($resultado==true){
			echo "Registro realizado";
		}else{
			echo "El usuario ya existe";
		}
	}

	public function Nilv_login_usuario(){
		$usuario = $_POST['username'];
		$passwd = $_POST['password'];
		if($passwd!="" and $usuario!=""){
			$this->load->model('userAdmin_model');
			$resultado = $this->userAdmin_model->Nilv_login($usuario,$passwd);
			
			if($resultado=="true"){
				$_SESSION["errores"] = "";
				redirect("vistas/tablero");
			}elseif($resultado=="false"){
				$_SESSION["errores"] = "Passwd o usuario incorrecto";
				redirect("vistas");
			}else{
				$_SESSION["errores"] =  "Error al introducir los datos";
				redirect("vistas");
			}
		}else{
			$_SESSION["errores"] = "Campo vacio";
			redirect("vistas");
		}
	}

	public function Nilv_logout_usuario(){
		//Destruccion de session del usuario
		$_SESSION["grupo"] = "";
		$_SESSION["permisos"] = "";
		$_SESSION["ID_usr"] = "";
		session_destroy();
		redirect("vistas");
	}
	
	public function Nilv_priv_crea_modif($accion,$nombre,$estado="",$codigo=""){
		$this->load->model('userAdmin_model');
		$resultado = $this->userAdmin_model->modif_insert_priv($accion,$nombre,$estado,$codigo);
		if($resultado=="insed"){
			echo "Privilegio registrado correctamente";
		}elseif($resultado=="modied"){
			echo "Privilegio modificado Correctamente";
		}elseif($resultado=="noexist"){
			echo "Este Privilegio no existe";
		}else{
			echo $resultado;
		}
	}

	public function Nilv_cat_crea_modif($accion,$nombre,$estado="",$codigo=""){
		$this->load->model('userAdmin_model');
		$resultado = $this->userAdmin_model->modif_insert_cat($accion,$nombre,$estado,$codigo);
		if($resultado=="insed"){
			echo "Categoria registrado correctamente";
		}elseif($resultado=="modied"){
			echo "Categoria modificado Correctamente";
		}elseif($resultado=="noexist"){
			echo "Esta Categoria no existe";
		}else{
			echo $resultado;
		}
	}
	
	public function Nilv_rel_usuario_grupo($usuario,$grupo){
		if(isset($usuario) and isset($grupo)){
			$this->load->model('userAdmin_model');
			$gruparray = explode("_",$grupo);
			$resultado = $this->userAdmin_model->rel_usu_grup($usuario,$gruparray);
			if($resultado=="insed"){
				echo "Grupos del usuario actualizados";
			}else{
				echo "Fatal Error rug";
			}
		}else{
			echo "False data error rel_ug";
		}
	}

	public function Nilv_rel_priv_grupo($grupo,$priv){
		if(isset($priv) and isset($grupo)){
			$this->load->model('userAdmin_model');
			$gruparray = explode("_",$priv);
			$resultado = $this->userAdmin_model->rel_priv_grup($grupo,$gruparray);
			if($resultado=="insed"){
				echo "Privilegios del grupos actualizados";
			}else{
				echo "Fatal Error rug";
			}
		}else{
			echo "False data error rel_ug";
		}
	}
	
}