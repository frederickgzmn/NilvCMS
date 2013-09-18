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
		
		//Metodo para modificar los user_admin
		function Nilv_modificar_usuario($nombre,$apellido,$email,$usuario=""){
			$consulta = $this->db->get_where('user_admin', array("id" => $usuario));
            print_r($consulta->num_rows());
			if($consulta->num_rows() > 0){
				//Expecificar que el usuario sea administrador
				if($usuario==""){
					$usuario = $_SESSION["ID_usr"];
					$setid = "";
				}else{
					$setid = ",id='".$usuario."'";
				}
				$q = "update user_admin set nombre='".$nombre."',apellido='".$apellido."',email='".$email."'".$setid." where id='".$usuario."'";
				$this->db->query($q);
				return true;
			}else{
				return false;
			}
		}
		
		//Metodo para registrar los user_admin
		function Nilv_insertar_usuario($nombre,$apellido,$email,$usuario,$passwd){
			$consulta = $this->db->get_where('user_admin', array("id" => $usuario));
            
			if($consulta->num_rows() > 0){
				return false;
			}else{
				$data = array(
                   'id' => $usuario ,
                   'nombre' => $nombre ,
                   'apellido' => $apellido,
                   'email' => $email,
                   'passwd' => md5($passwd.$usuario)
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
		function Nilv_modif_insert_grupos($accion,$nombre,$estado="",$codigo=""){
			if($accion=="insertar" and isset($nombre)){
                $data = array(
                   'nombre' => $nombre ,
                   'estado' => 'A',
                   'fecha' => date("Y-m-d"),
                   'id_usuario' => $_SESSION["ID_usr"]
                );
                
                $this->db->insert('grupos', $data);
                
				return "insed";
			}elseif($accion=="modificar" and isset($nombre) and isset($estado) and $codigo!=""){
                
                $consulta = $this->db->get_where('grupos', array("id" => $codigo));
                
				if($consulta->num_rows() > 0){
					$q = "update grupos set nombre='".$nombre."',estado='".$estado."',id_usuario='".$_SESSION["ID_usr"]."', fecha='".date("Y-m-d")."' where id='".$codigo."'";
					$this->db->query($q);

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
				$q = "update grupos set estado='I' where id='".$codigo."'";
				$this->db->query($q);
		}
		
		//MEtodo para crear o modificar privilegios
		function Nilv_modif_insert_priv($accion,$nombre,$estado="",$codigo=""){
			if($accion=="insertar" and isset($nombre)){
                $data = array(
                   'nombre' => $nombre ,
                   'estado' => 'A',
                   'fecha' => date("Y-m-d"),
                   'id_usuario' => $_SESSION["ID_usr"]
                );
                
                $this->db->insert('Privilegios', $data);
                
                return "insed";
			}elseif($accion=="modificar" and isset($nombre) and isset($estado) and $codigo!=""){
                $consulta = $this->db->get_where('Privilegios', array("id" => $codigo));
				if($consulta->num_rows() > 0){
					$q = "update Privilegios set nombre='".$nombre."',estado='".$estado."',id_usuario='".$_SESSION["ID_usr"]."', fecha='".date("Y-m-d")."' where id='".$codigo."'";
					$this->db->query($q);

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
				$q = "update Privilegios set estado='I' where id='".$codigo."'";
				$this->db->query($q);
		}

		//MEtodo para crear o modificar Categorias
		function Nilv_modif_insert_cat($accion,$nombre,$estado="",$codigo=""){
			if($accion=="insertar" and isset($nombre)){
                $data = array(
                   'nombre' => $nombre ,
                   'estado' => 'A',
                   'fecha' => date("Y-m-d"),
                   'id_usuario' => $_SESSION["ID_usr"]
                );
                $this->db->insert('categorias', $data);
				return "insed";
			}elseif($accion=="modificar" and isset($nombre) and isset($estado) and $codigo!=""){
				$consulta = $this->db->get_where('categorias', array("id" => $codigo));
                if($consulta->num_rows() > 0){
					$q = "update categorias set nombre='".$nombre."',estado='".$estado."',id_usuario='".$_SESSION["ID_usr"]."', fecha='".date("Y-m-d")."' where id='".$codigo."'";
					$this->db->query($q);

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
				$q = "update categorias set estado='I' where id='".$codigo."'";
				$this->db->query($q);
		}
		
		//MEtodo para Agregar usuario a los grupos
		function Nilv_rel_usu_grup($usuario,$grupo){
			if(isset($usuario) and isset($grupo)){
				$q = "delete from rel_usu_grup where  id_usuario='".$usuario."'";
				$this->db->query($q);
				
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

		//MEtodo para Agregar privilegios a los grupos
		function Nilv_rel_priv_grup($grupo,$priv){
			if(isset($priv) and isset($grupo)){
				$q = "delete from rel_priv_grup where  id_grupo='".$grupo."'";
				$this->db->query($q);
				
				foreach($priv as $pri){
					foreach($grupo as $grup){
                    $data = array(
                       'id_priv' => $pri,
                       'id_grupo' => $grup
                    );
                
                    $this->db->insert('rel_priv_grup', $data);
					}
				}
				
				return "insed";
			}else{
				return "false";
			}
		}
		
	}