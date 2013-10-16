<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class userAdmin_model extends CI_model{
	    function __construct(){
			parent::__construct();
		}
		
		//Metodo para seleccionar los user_admin
		function Nilv_vista_usuario($usuario=""){
			if(isset($usuario) and $usuario!=""){
				return $this->db->get_where('user_admin', array("id" => $usuario));
			}else{
    		    echo "fatal error";
			}
        }
		//Metodo para que los administradores modifiquen sus propios perfiles
		function Nilv_Actualizacion_user($grupo,$nombre,$apellido,$email,$firma,$usuario=""){
				$consulta = $this->db->get_where('user_admin', array("id" => $usuario));
				if($consulta->num_rows() > 0){
						$data = array(
						   'nombre' => $nombre,
						   'apellido' => $apellido,
						   'email' => $email,
						   'firma' => $this->input->post("firma"),
						   'grupo' => $this->input->post("grupo")
						);

						//Expecificar que el usuario sea administrador
						if($usuario==""){
								$usuario = $_SESSION["ID_usr"];
						}else{
								$data["id"] = $usuario;
						}
						
						$this->db->where('id', $usuario);
						$this->db->update('user_admin', $data);

						return true;
				}else{
						return false;
				}
		}
				
		//Metodo para modificar los user_admin
		function Nilv_modificar_usuario($usuario,$nombre,$apellido,$email,$grupo){
			$consulta = $this->db->get_where('user_admin', array("id" => $usuario));
			if($consulta->num_rows() > 0){
				$data = array(
				   'nombre' => $nombre,
				   'apellido' => $apellido,
				   'email' => $email,
				   'grupo' => $this->input->post("grupo")
				);
				$this->db->where('id', $usuario);
				$this->db->update('user_admin', $data);

				return true;
			}else{
				echo $consulta->num_rows();
				return false;
			}
		}
		
		//Metodo para registrar los user_admin
		function Nilv_insertar_usuario($usuario,$nombre,$apellido,$email,$grupo){
			$consulta = $this->db->get_where('user_admin', array("id" => $usuario));
            
			if($consulta->num_rows() > 0){
				return false;
			}else{
				$data = array(
                   'id' => $usuario,
                   'nombre' => $nombre,
                   'apellido' => $apellido,
                   'email' => $email,
                   'grupo' => $grupo,
                   'passwd' => md5("adminnilv".$usuario)
                );
                
                $this->db->insert('user_admin', $data);
				return true;
			}
		}
		
		//Metodo de login / conexion para los user_admin
		function Nilv_login($usuario,$passwd){
			if((!isset($usuario) or $usuario=="") or (!isset($passwd) or $passwd=="" or $passwd==" ")){
				$_SESSION["ID_usr"] = "";
				return "false_error";
			}else{
				$q = "select rug.id_grupo,rpg.id_priv from user_admin t
				left join rel_usu_grup rug on t.id=rug.id_usuario
				left join rel_priv_grup rpg on rpg.id_grupo=rug.id_grupo
				where t.id='".$usuario."' and t.passwd='".md5($passwd.$usuario)."'";
				$query = $this->db->query($q);
				
				if($query->num_rows()>0){
					$n=0;
					foreach($query->result_array() as $permisos){
						$perm[] = $permisos["id_priv"];
					$n++;
					}
					
					//Inicio de session del usuario
					$_SESSION["grupo"] = $permisos["id_grupo"];
					$_SESSION["permisos"] = $perm;
					$_SESSION["ID_usr"] = $usuario;
					return "true";
				}else{
					$_SESSION["ID_usr"] = "";
					return "false";
				}
			}
		}
		
		//Metodo para crear o modificar grupos
		function Nilv_modif_insert_grupos($accion,$nombre,$codigo=""){
			if($accion=="insertar" and isset($nombre)){
                $data = array(
                   'nombre' => $nombre ,
                   'estado' => 'A',
                   'fecha' => date("Y-m-d"),
				   'estado' => "A",
                   'id_usuario' => $_SESSION["ID_usr"]
                );
                
                $this->db->insert('grupos', $data);
                
				return "insed";
			}elseif($accion=="modificar" and isset($nombre) and $codigo!=""){
                
                $consulta = $this->db->get_where('grupos', array("id" => $codigo));
                
				if($consulta->num_rows() > 0){
					$data = array(
					   'nombre' => $nombre,
					   'id_usuario' => $_SESSION["ID_usr"],
					   'fecha' => date("Y-m-d")
					);

					$this->db->where('id', $codigo);
					$this->db->update('grupos', $data); 
					
					return "modied";
				}else{
					return "noexist";
				}
			}else{
				return "False error data";
			}
		}
		
		
		//Elimina los grupos
		function Nilv_delete_grupo($codigo){
			$data = array(
			   'estado' => "I"
			);

			$this->db->where('id', $codigo);
			$this->db->update('grupos', $data);
		}
		
		//MEtodo para crear o modificar privilegios
		function Nilv_modif_insert_priv($accion,$nombre,$codigo=""){
			if($accion=="insertar" and isset($nombre)){
                $data = array(
                   'nombre' => $nombre ,
                   'fecha' => date("Y-m-d"),
				   'estado' => "A",
                   'id_usuario' => $_SESSION["ID_usr"]
                );
                
                $this->db->insert('Privilegios', $data);
                
                return "insed";
			}elseif($accion=="modificar" and isset($nombre) and $codigo!=""){
                $consulta = $this->db->get_where('Privilegios', array("id" => $codigo));
				if($consulta->num_rows() > 0){
					$data = array(
					   'nombre' => $nombre ,
					   'id_usuario' => $_SESSION["ID_usr"],
					   'fecha' => date("Y-m-d")
					);
					
					$this->db->where('id', $codigo);
					$this->db->update('Privilegios', $data);
					
					return "modied";
				}else{
					return "noexist";
				}
			}else{
				return "False error data";
			}
		}
		
		//Elimina los Privilegios
		function Nilv_delete_priv($codigo){
			$data = array(
			   'estado' => "I"
			);

			$this->db->where('id', $codigo);
			$this->db->update('Privilegios', $data);
		}
		
		//Muestra los Privilegios
		function Nilv_select_priv($codigo=""){
			if($codigo!=""){
				$this->db->where('id', $codigo);
			}
			$this->db->where('estado', "A");
			return $this->db->get('Privilegios');
		}

		//Muestra los Grupos
		function Nilv_select_grup($codigo=""){
			if($codigo!=""){
				$this->db->where('id', $codigo);
			}
			$this->db->where('estado', "A");
			return $this->db->get('grupos');
		}
		
		//Muestra las categorias
		function Nilv_select_cat($codigo=""){
			if($codigo!=""){
				$this->db->where('id', $codigo);
			}
			$this->db->where('estado', "A");
			return $this->db->get('categorias');
		}

		//MEtodo para crear o modificar Categorias
		function Nilv_modif_insert_cat($accion,$nombre,$codigo=""){
			if($accion=="insertar" and isset($nombre)){
                $data = array(
                   'nombre' => $nombre ,
                   'fecha' => date("Y-m-d"),
                   'estado' => "A",
                   'id_usuario' => $_SESSION["ID_usr"]
                );
                $this->db->insert('categorias', $data);
				return "insed";
			}elseif($accion=="modificar" and isset($nombre) and $codigo!=""){
				$consulta = $this->db->get_where('categorias', array("id" => $codigo));
                if($consulta->num_rows() > 0){
					$data = array(
					   'nombre' => $nombre ,
					   'id_usuario' => $_SESSION["ID_usr"],
					   'fecha' => date("Y-m-d")
					);
					
					$this->db->where('id', $codigo);
					$this->db->update('categorias', $data);
					
					return "modied";
				}else{
					return "noexist";
				}
			}else{
				return "False error data";
			}
		}
		
		//Elimina las categorias
		function Nilv_delete_cat($codigo){
			$data = array(
			   'estado' => "I"
			);

			$this->db->where('id', $codigo);
			$this->db->update('categorias', $data);
		}
		
		//MEtodo para Agregar usuario a los grupos
		function Nilv_rel_usu_grup($usuario,$grupo){
			if(isset($usuario) and isset($grupo)){				
				$this->db->delete('rel_usu_grup', array('id_usuario' => $usuario));
				
				foreach($grupo as $grup){
                    $data = array(
                       'id_usuario' => $usuario ,
                       'id_grupo' => $grup
                    );
                
                $this->db->insert('rel_usu_grup', $data);
				}
				
				return "insed";
			}else{
				return "false";
			}
		}

		//Metodo para seleccionar los privilegios de un grupo
		function Nilv_rel_priv_grup_select($grupo){
			if(isset($grupo) and $grupo!=""){
				$this->db->where('id_grupo', $grupo);
				return $this->db->get('rel_priv_grup');
			}else{
				return "false";
			}
		}
		
		//MEtodo para Agregar privilegios a los grupos
		function Nilv_rel_priv_grup($grupo,$priv){
			if(isset($priv) and $priv!="" and isset($grupo) and $grupo!=""){
				//$this->db->delete('rel_priv_grup', array('id_grupo' => $grupo));
				$data = array(
				   'id_priv' => $priv,
				   'id_grupo' => $grupo
				);
                $this->db->insert('rel_priv_grup', $data);
				
				return "insed";
			}else{
				return "false";
			}
		}
		
		//MEtodo para Agregar privilegios a los grupos
		function Nilv_rel_priv_grup_delete($grupo,$priv){
			if(isset($priv) and $priv!="" and isset($grupo) and $grupo!=""){
				$this->db->delete('rel_priv_grup', array('id_grupo' => $grupo,'id_priv' => $priv));
				return "deleted";
			}else{
				return "false";
			}
		}
		
		function Nilv_notas_person_insert($nota){
			$data = array(
			   'id_usuario' => $_SESSION["ID_usr"],
			   'nota' => $nota,
			   'fecha' => date("Y-m-d")
			);
			
           $this->db->insert('notas', $data);
		   
		   return true;
		}	
		
		function Nilv_notas_person_select($accion=""){
			if($accion=="2"){
				$query = $this->db->query("select * from notas where id = (select max(id) as id from notas)");
			}else{
				$this->db->order_by("id", "desc"); 
				$this->db->limit(5);
				$query = $this->db->get('notas');
			}
		   
		   return $query;
		}
		
		function Nilv_cambio_clave($codigo){
			$data = array(
			   'passwd' => md5($this->input->post("passwd").$codigo)
			);

			$this->db->where('id', $codigo);
			$this->db->update('user_admin', $data);
		}
		
		
		function Nilv_usuarios_select($usuario=""){
			if($usuario==""){
				return $query = $this->db->get("user_admin");
			}else{
				$this->db->where('id', $usuario);
				return $query = $this->db->get("user_admin");
			}
		}
		
	}