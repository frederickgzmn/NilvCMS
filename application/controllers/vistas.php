<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Vistas extends CI_Controller {
		
	function __construct(){
		parent::__construct();
		ini_set('display_errors', 1);
		$this->load->model('Param_model');
		$this->load->model('userAdmin_model');
		if(isset($_SESSION["ID_usr"]) and $_SESSION["ID_usr"]=="guest"){
			$_SESSION["ID_usr"] = "aceptado";
			redirect("vistas");
		}
		
		if(!isset($_SESSION["ID_usr"]) or $_SESSION["ID_usr"]==""){
			$_SESSION["ID_usr"] = "guest";
			redirect("vistas");
		}
	}
	
	function index(){
		unset($_SESSION["ID_usr"]);
		
		//Cargada de datos a la vista
		$data = array();
		//url_base en las vistas
		$data["base_url"] = base_url();
		if(isset($_SESSION["errores"])){
			$data["errores"] = '<div style="background: red; width: 180px; color: yellow;" id="alertBox-generated">'.$_SESSION["errores"].'.</div>';
		}else{
			$data["errores"] = "";		
		}
		
		//echo md5("eclipse80theeclipce");
		//61ae1a3efb32af41d28decad9402f43f
		$this->load->library('parser');
		$this->parser->parse("cms/login.php",$data);
	}
	
	public function vista_usu($usuario=""){
		//Declaracion inicial
		ini_set('display_errors', 0);
		$data = array();
		
		//llamando modelo
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
	
	public function NilvController($pages="",$data_insert=""){
		
		//Declaracion inicial
		$data = array();
		
		//llamando modelo
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
			$data["customjs"] = "";
			foreach($data["custom_js"] as $customJs){
				$data["customjs"] .= '<script src="'.$data["base_url"].'themes/cms/js/'.$customJs.'.js"></script>';
			}
		}else{
			$data["customjs"] = "";
		}
		
		//cargando custom css		
		if(isset($data["custom_css"]) and $data["custom_css"]!=""){
			$data["customcss"] = "";
			foreach ($data["custom_css"] as $custom_css){
				$data["customcss"] .= '<link href="'.$data["base_url"].'themes/cms/css/'.$custom_css.'.css" rel="stylesheet" type="text/css" />' . "/n/t";
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
		$data["customjs"] = array("tablero");
		
		//Hora del servidor
		$horaservidor = localtime();
		$data["timeserver"] = $horaservidor[2].":".$horaservidor[1].":".$horaservidor[0];
		
		//Memoria ram utilizada
		$size = memory_get_usage(true);
		$unit=array('b','kb','mb','gb','tb','pb');
		$data["ramserver"] = @round($size/pow(1024,($i=floor(log($size,1024)))),2).' '.$unit[$i];
		
		//Memoria ram disponible para la aplicacion
		$data["ramdispo"] = ini_get('memory_limit');
		
		//Lista de las notas registradas
		$resultado = $this->userAdmin_model->Nilv_notas_person_select();
		$data["notas_list"] = "";
		foreach($resultado->result_array() as $datos){
			$data["notas_list"] .= "<tr><td title='".$datos["nota"]."'>".substr($datos["nota"],0,70)."</td><td>".$datos["fecha"]."</td></tr>";
		}
		
		//Lista de las notas registradas
		$resultado2 = $this->userAdmin_model->Nilv_notas_person_select(2);
		$data["notaprincipal"] = "";
		
		if($resultado2->num_rows() > 0){
		   $row = $resultado2->row_array();
		   $data["notaprincipal"] = $row['nota'];
		}
		$this->NilvController("",$data);
	}
	
	public function config(){
		$data["customjs"] = array("config");
		if(isset($_SESSION["error_config"]))
			$data["error_config"] = $_SESSION["error_config"];
		else
			$data["error_config"] = "";
			
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
	//Vista de la configuracion de los perfiles
	public function perfil(){
		$data = array();
		$resultado = $this->userAdmin_model->Nilv_vista_usuario($_SESSION["ID_usr"]);
		$usuario_datos = $resultado->row();
		
		$resultado_priv = $this->userAdmin_model->Nilv_select_priv();
		
		$data["tabla_privilegios"] = "<table class='table table-bordered table-hover table-striped' id='tabla_privilegios' name='tabla_privilegios'>
			<tr>
				<td>Acci&oacute;n</td>
				<td>Privilegio</td>
			</tr>
		";
		foreach($resultado_priv->result_array() as $privileg){
			$data["tabla_privilegios"] .= "<tr><td><input class='privileg_grup' name='".$privileg["id"]."' id='".$privileg["id"]."' type='checkbox'/></td><td> ".$privileg["nombre"]."</td></tr>";
		}
		
		$data["tabla_privilegios"] .= "</table>";
		//Error de guardado
		if(isset($_SESSION["error_config_user"]))
			$data["error_config_user"] = $_SESSION["error_config_user"];
		else
			$data["error_config_user"] = "";
		
		$data["codigo"] = $usuario_datos->id;
		$data["nombre_user"] = $usuario_datos->nombre;
		$data["apellido"] = $usuario_datos->apellido;
		$data["email"] = $usuario_datos->email;
		$data["firma"] = $usuario_datos->firma;
		
		$query_grupos = $this->userAdmin_model->Nilv_select_grup();
		$data["list_grupos"] = "";
		foreach($query_grupos->result_array() as $row2){
			if($usuario_datos->grupo==$row2["id"]){
				$selected = "selected='selected'";
			}else{
				$selected = "";
			}
			$data["list_grupos"] .= "<option ".$selected." value='".$row2["id"]."'>".$row2["nombre"]."</option>";
		}
		
		$this->NilvController("perfil",$data);
		$_SESSION["error_config_user"] = "";
	}
	
	public function componentes(){
		//Lista de privilegios checkbox
		$resultado_priv = $this->userAdmin_model->Nilv_select_priv();
		$cabezera_tabla = "<table class='table table-bordered table-hover table-striped' id='tabla_privilegios' name='tabla_privilegios'>
		<tr>
		<td>Privilegio</td>
		<td>Acci&oacute;n</td>
		</tr>
		";
		$data["tabla_privilegios"] = $cabezera_tabla;
		$data["tabla_privilegios2"] = $cabezera_tabla;
		foreach($resultado_priv->result_array() as $privileg){
			$data["tabla_privilegios"] .= "<tr><td> ".$privileg["nombre"]."</td><td><input class='privileg_grup' name='".$privileg["id"]."' id='".$privileg["id"]."' type='checkbox'/></td></tr>";
		}
		$data["tabla_privilegios"] .= "</table>";
		
		//Lista de privilegios img
		foreach($resultado_priv->result_array() as $privileg2){
			$data["tabla_privilegios2"] .= "<tr><td> ".$privileg2["nombre"]."</td><td><a href='javascript:;'><img width='25' src='".base_url()."themes/cms/img/editar.png' title='".$privileg2["nombre"]."' class='priv_edit' name='".$privileg2["id"]."' id='".$privileg2["id"]."'></a><a href='javascript:;'><img width='20' src='".base_url()."themes/cms/img/delete.png' title='Eliminar privilegio ".$privileg2["nombre"]."' class='priv_delete' name='".$privileg2["id"]."' id='".$privileg2["id"]."'></a></td></tr>";
		}
		$data["tabla_privilegios2"] .= "</table>";
		
		
		//Lista de grupos
		$resultado_grup = $this->userAdmin_model->Nilv_select_grup();
		$data["tabla_grup"] = "<table class='table table-bordered table-hover table-striped' id='tabla_privilegios' name='tabla_privilegios'>
		<tr>
		<td>Grupo</td>
		<td>Acci&oacute;n</td>
		</tr>
		";
		foreach($resultado_grup->result_array() as $grup){
			$data["tabla_grup"] .= "<tr><td> ".$grup["nombre"]."</td><td><a href='javascript:;'><img class='grupos_edit' width='25' src='".base_url()."themes/cms/img/editar.png' title='".$grup["nombre"]."' name='".$grup["id"]."' id='".$grup["id"]."' /></a><a href='javascript:;'><img class='grup_delete' width='20' src='".base_url()."themes/cms/img/delete.png' title='Eliminar Grupo ".$grup["nombre"]."' name='".$grup["id"]."' id='".$grup["id"]."' /></a></td></tr>";
		}
		$data["tabla_grup"] .= "</table>";
		
		//Lista de categoria
		$resultado_cat = $this->userAdmin_model->Nilv_select_cat();
		$data["tabla_cat"] = "<table class='table table-bordered table-hover table-striped' id='tabla_privilegios' name='tabla_privilegios'>
		<tr>
		<td>Categoria</td>
		<td>Acci&oacute;n</td>
		</tr>
		";
		foreach($resultado_cat->result_array() as $cat){
			$data["tabla_cat"] .= "<tr><td> ".$cat["nombre"]."</td><td><a href='javascript:;'><img width='25' class='cat_edit' src='".base_url()."themes/cms/img/editar.png' title='".$cat["nombre"]."' name='".$cat["id"]."' id='".$cat["id"]."'></a><a href='javascript:;'><img width='20' class='cat_delete' src='".base_url()."themes/cms/img/delete.png' title='Eliminar categoria ".$cat["nombre"]."' name='".$cat["id"]."' id='".$cat["id"]."'></a></td></tr>";
		}
		$data["tabla_cat"] .= "</table>";
		
		$this->NilvController("componentes",$data);
	}
	
	public function UserAdmins(){
		$data["custom_js"] = array("useradmins");
		$data["list_grupos"] = "";
		
		$query_usu = $this->userAdmin_model->Nilv_usuarios_select();
		$data["listado_usuarios_admins"] = "";
		foreach($query_usu->result_array() as $row){
			$data["listado_usuarios_admins"] .= "<tr><td>".$row["id"]."</td><td>".$row["nombre"]."".$row["apellido"]."</td><td>".$row["email"]."</td><td>".$row["firma"]."</td><td>".$row["grupo"]."</td><td><a href='javascript:;'><img width='25' id='".$row["id"]."' name='".$row["id"]."' class='usuario_edit' src='".base_url()."themes/cms/img/editar.png'><a/></td></tr>";
		}
		
		$query_grupos = $this->userAdmin_model->Nilv_select_grup();
		foreach($query_grupos->result_array() as $row2){
			$data["list_grupos"] .= "<option value='".$row2["id"]."'>".$row2["nombre"]."</option>";
		}
		$this->NilvController("useradmins",$data);
	}
	
	
}