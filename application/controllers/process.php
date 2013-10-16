<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Process extends CI_Controller {

	function __construct(){
		parent::__construct();
		
		ini_set('display_errors', 1);
		
		$this->load->model('userAdmin_model');
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
		$resultado = $this->userAdmin_model->modificar_usuario($nombre,$apellido,$email,$usuario);
		if($resultado==true){
			echo "Actualizacion realizada";
		}else{
			echo "El usuario no existe";
		}
	}

	public function Nilv_insert_usuario($nombre,$apellido,$email,$usuario,$passwd){
		$resultado = $this->userAdmin_model->insertar_usuario($nombre,$apellido,$email,$usuario,$passwd);
		if($resultado==true){
			echo "Registro realizado";
		}else{
			echo "El usuario ya existe";
		}
	}

	public function Nilv_login_usuario(){
		$usuario = $this->input->post("username"); //$_POST['username'];
		$passwd = $this->input->post("password"); //$_POST['password'];
		
		if($passwd!="" and $usuario!=""){
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
	//Estadisticas para jquery
	public function Nilv_setting_jquery($accion){
		$mem_usage = memory_get_usage(true); 
        if(!$mem_usage < 1048576)
            echo round($mem_usage/1048576,2).",".str_replace("M","",ini_get('memory_limit'));
	}
	
	//Notas personales
	public function Nilv_notas_person($accion){
		if($accion=="1"){
			$resultado = $this->userAdmin_model->Nilv_notas_person_insert($this->input->post("notas"));
			if($resultado){
				echo "agregada";
			}
		}
	}
	
	//Actualizacion de datos de los usuarios
	public function Nilv_Actualizacion_user(){
		if($this->input->post("grupo") and $this->input->post("nombre") and $this->input->post("apellido") and $this->input->post("email")){
			if($this->input->post("firma")){
				$firma = $this->input->post("firma");
			}else{
				$firma = "";
			}

			$resultado = $this->userAdmin_model->Nilv_Actualizacion_user($this->input->post("grupo"),$this->input->post("nombre"),$this->input->post("apellido"),$this->input->post("email"),$firma,$_SESSION["ID_usr"]);
			
			
			if($resultado=="true"){
				$_SESSION["error_config_user"] = '<div class="alert alert-success">Actualizacion realizada</div>';
				redirect("vistas/perfil");
			}else{
				$_SESSION["error_config_user"] = '<div class="alert alert-danger">Un problema con el servidor de base de datos a ocurrido.</div>';
				redirect("vistas/perfil");
			}
		}else{
			$_SESSION["error_config_user"] = '<div class="alert alert-danger">Parametros vacios o incorrectos</div>';
			redirect("vistas/perfil");
		}
	}
	//Actualizacion de clave de los usuarios
	public function Nilv_cambio_clave($enganio=""){
		if($this->input->post("passwd") and $this->input->post("passwd2")){
			if($this->input->post("passwd")==$this->input->post("passwd2")){
				$resultado = $this->userAdmin_model->Nilv_cambio_clave($_SESSION["ID_usr"]);
				echo '<div class="alert alert-success">Contrase&ntilde;a Actualizada</div>';
			}else{
				echo '<div class="alert alert-danger">Los datos ingresados no coinciden</div>';
			}
		}else{
			echo '<div class="alert alert-danger">Parametros vacios</div>';
		}
	}
	
	public function Nilv_modif_insert_grupos($accion=""){
		if($accion=="insertar"){
			if($this->input->post("nombre")){
				$resultado = $this->userAdmin_model->Nilv_modif_insert_grupos($accion,$this->input->post("nombre"));
				if($resultado=="insed"){
					echo '<div class="alert alert-success">Grupo Agregado Correctamente</div>';
				}
			}else{
				echo '<div class="alert alert-danger">Campo Nombre vacio</div>';
			}
		}elseif($accion=="modificar"){
			if($this->input->post("nombre") and $this->input->post("codigo")){
				$resultado2 = $this->userAdmin_model->Nilv_modif_insert_grupos($accion,$this->input->post("nombre"),$this->input->post("codigo"));
				if($resultado2=="modied"){
					echo '<div class="alert alert-success">Grupo Modificado Correctamente</div>';
				}
			}else{
				echo '<div class="alert alert-danger">Campo vacio</div>';
			}
		}
	}
	
	public function Nilv_modif_insert_priv($accion=""){
		if($accion=="insertar"){
			if($this->input->post("nombre")){
				$resultado = $this->userAdmin_model->Nilv_modif_insert_priv($accion,$this->input->post("nombre"));
				if($resultado=="insed"){
					echo '<div class="alert alert-success">Privilegio Agregado Correctamente</div>';
				}
				}else{
				echo '<div class="alert alert-danger">Campo Nombre vacio</div>';
			}
			}elseif($accion=="modificar"){
			if($this->input->post("nombre") and $this->input->post("codigo")){
				$resultado2 = $this->userAdmin_model->Nilv_modif_insert_priv($accion,$this->input->post("nombre"),$this->input->post("codigo"));
				if($resultado2=="modied"){
					echo '<div class="alert alert-success">Privilegio Modificado Correctamente</div>';
				}
			}else{
				echo '<div class="alert alert-danger">Campo vacio</div>';
			}
		}
	}
	
	public function Nilv_modif_insert_cat($accion=""){
		if($accion=="insertar"){
			if($this->input->post("nombre")){
				$resultado = $this->userAdmin_model->Nilv_modif_insert_cat($accion,$this->input->post("nombre"));
				if($resultado=="insed"){
					echo '<div class="alert alert-success">Categoria Agregada Correctamente</div>';
				}
				}else{
				echo '<div class="alert alert-danger">Campo Nombre vacio</div>';
			}
			}elseif($accion=="modificar"){
			if($this->input->post("nombre") and $this->input->post("codigo")){
				$resultado2 = $this->userAdmin_model->Nilv_modif_insert_cat($accion,$this->input->post("nombre"),$this->input->post("codigo"));
				if($resultado2=="modied"){
					echo '<div class="alert alert-success">Categoria Modificada Correctamente</div>';
				}
				}else{
				
			}
		}
	}
	
	/*
	 Metodo para seleccionar los grupos
	public function Nilv_select_grup(){
		if($this->input->post("codigo")){
			$resultado = $this->userAdmin_model->Nilv_select_grup($this->input->post("codigo"));
			print_r($resultado->result_array());
		}else{
			echo '<div class="alert alert-danger">Problema al seleccionar grupo, actualize la pagina y intente nuevamente</div>';
		}
	}*/
	
	
	public function Nilv_delete_cat(){
		if($this->input->post("codigo")){
			$this->userAdmin_model->Nilv_delete_cat($this->input->post("codigo"));
			echo '<div class="alert alert-success">Categoria Eliminada Correctamente</div>';
		}else{
			echo '<div class="alert alert-danger">Problema al seleccionar grupo, actualize la pagina y intente nuevamente</div>';
		}
		
	}
	
	public function Nilv_delete_priv(){
		if($this->input->post("codigo")){
			$this->userAdmin_model->Nilv_delete_priv($this->input->post("codigo"));
			echo '<div class="alert alert-success">Privilegio Eliminado Correctamente</div>';
			}else{
			echo '<div class="alert alert-danger">Problema al seleccionar grupo, actualize la pagina y intente nuevamente</div>';
		}
		
	}	
	public function Nilv_delete_grupo(){
		if($this->input->post("codigo")){
			$this->userAdmin_model->Nilv_delete_grupo($this->input->post("codigo"));
			echo '<div class="alert alert-success">Grupo Eliminado Correctamente</div>';
			}else{
			echo '<div class="alert alert-danger">Problema al seleccionar grupo, actualize la pagina y intente nuevamente</div>';
		}
		
	}
	
	public function Nilv_rel_priv_grup_select(){
		if($this->input->post("codigo")){
			$datos = $this->userAdmin_model->Nilv_rel_priv_grup_select($this->input->post("codigo"));
			$retornando = "";
			foreach($datos->result_array() as $rows){
				$retornando .= "_".$rows["id_priv"];
			}
			
			echo $retornando;
		}else{
			echo '<div class="alert alert-danger">Problema al seleccionar grupo, actualize la pagina y intente nuevamente</div>';
		}
		
	}
	
	public function Nilv_rel_priv_grup(){
		if($this->input->post("codigo") and $this->input->post("codigo_priv")){
			echo $this->userAdmin_model->Nilv_rel_priv_grup($this->input->post("codigo"),$this->input->post("codigo_priv"));
		}else{
			echo "false";
		}
	}
	
	public function Nilv_rel_priv_grup_delete(){
		if($this->input->post("codigo") and $this->input->post("codigo_priv")){
			echo $this->userAdmin_model->Nilv_rel_priv_grup_delete($this->input->post("codigo"),$this->input->post("codigo_priv"));
		}else{
			echo "false";
		}
	}
	
	
	public function Nilv_usuarios_select(){
		if($this->input->post("codigo")){
			$datos =  $this->userAdmin_model->Nilv_usuarios_select($this->input->post("codigo"));
			$row = $datos->row_array();
			
			echo $row["id"]."]".$row["nombre"]."]".$row["apellido"]."]".$row["email"]."]".$row["firma"]."]".$row["grupo"];
		}else{
			echo "false";
		}
	}
	
	public function Nilv_insertar_usuario(){
		if($this->input->post("codigo")){
			if($this->input->post("codigo") and $this->input->post("nombre") and $this->input->post("apellido") and $this->input->post("email") and $this->input->post("grupo") and $this->input->post("formulario_actu_reg")=="nuevo_form"){
				$datos =  $this->userAdmin_model->Nilv_insertar_usuario($this->input->post("codigo"),$this->input->post("nombre"),$this->input->post("apellido"),$this->input->post("email"),$this->input->post("grupo"));
				if($datos){
					echo '<div class="alert alert-success">Registrado Correctamente</div>';
				}else{
					echo '<div class="alert alert-danger">Existe un usuario con ese Codigo de usuario, o en su defecto existe un error.</div>';
				}
			}elseif($this->input->post("codigo") and $this->input->post("nombre") and $this->input->post("apellido") and $this->input->post("email") and $this->input->post("grupo") and $this->input->post("formulario_actu_reg")=="actual_form"){
				$datos2 =  $this->userAdmin_model->Nilv_modificar_usuario($this->input->post("codigo"),$this->input->post("nombre"),$this->input->post("apellido"),$this->input->post("email"),$this->input->post("grupo"));
				if($datos2){
					echo '<div class="alert alert-success">Usuario Actualizado Correctamente</div>';
				}elseif($datos2==false){
					echo '<div class="alert alert-danger">El usuario no existe, o en su defecto existe un error.</div>';
				}
			}else{
				echo '<div class="alert alert-danger">Existio un problema en el registro, o uno de los campos obligatorios esta vacio.</div>';
			}
		}else{
			echo '<div class="alert alert-danger">Campo(s) vacio(s)</div>';		
		}
	}
	
}