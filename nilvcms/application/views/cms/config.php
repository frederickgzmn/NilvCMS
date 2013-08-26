<div class="row">
      	<div class="span12" >
      		<div class="widget stacked" style="margin-left: 128px;">
				<div class="widget-header">
					<i class="icon-check"></i>
					<h3>Configuraci&oacute;n</h3>
				</div> <!-- /widget-header -->
				<div class="widget-content">
					<div id="tabs">
						<ul>
							<li><a href="#tabs-gen">General</a></li>
							<li><a href="#tabs-user">Usuarios</a></li>
						</ul>
						<div id="tabs-gen">
							<form class="form-horizontal" id="form_config" name="form_config" action="{base_url}index.php/vistas/config" novalidate="novalidate">
								<fieldset>
									<div class="control-group">
									  <label for="name" class="control-label titulo">Titulo</label>
									  <div class="tituloslog">
										El nombre del sitio web o aplicacion para los titulos de pagina.
									  </div>
									  <div class="controls">
										<input type="text" id="titulo" name="titulo" class="input-large preg_conf" >
									  </div>
									</div>
									<div class="control-group">
									  <label for="email" class="control-label titulo">Slogan</label>
									  <div class="tituloslog">
										El slogan del sitio web o aplicacion.
									  </div>
									  <div class="controls">
										<input type="text" id="slogan" name="slogan" class="input-large preg_conf">
									  </div>
									</div>
									<div class="control-group">
									  <label for="subject" class="control-label titulo">Meta Topico</label>
									  <div class="tituloslog">
										Breve explicacion de la pagina o aplicacion.
									  </div>
									  <div class="controls">
										<input type="text" id="meta_p" name="meta_p" class="input-large preg_conf">
									  </div>
									</div>
									<div class="control-group">
									  <label for="subject" class="control-label titulo">Email del sistema</label>
									  <div class="tituloslog">
										Los correos enviados desde el sistema, seran enviados con esta direcci&oacute;n.
									  </div>
									  <div class="controls">
										<input type="email" id="emailsis" name="emailsis" class="input-large preg_conf">
									  </div>
									</div>
									<div class="control-group">
									  <label for="subject" class="control-label titulo">Email de contacto</label>
									  <div class="tituloslog">
										Correo electronico de contacto al adminitrador del sistema.
									  </div>
									  <div class="controls">
										<input type="email" id="emailcon" name="emailcon" class="input-large preg_conf">
									  </div>
									</div>
									<div class="control-group">
									<label for="validateSelect" class="control-label titulo">Idioma del sistema</label>
									<div class="tituloslog">
										Idioma en que se mostrara el sistema, de forma predeterminada para los usuarios.
									</div>
									<div class="controls">
									  <select name="idiomat" id="idiomat" class="preg_conf">
										<option value="">Seleccione idioma...</option>
										<option value="es">Spanish</option>
										<option value="en">English</option>
									  </select>
									</div>
								  </div>
								  
									<div class="control-group">
									<label class="control-label titulo">Estado del Sistema</label>
									<div class="tituloslog">
										Estado en que se encuentra el sistema para los usuarios.
									  </div>
									 <div class="controls">
									  <select name="estadoweb" id="estadoweb" class="preg_conf">
										<option value="">Elegir opcion...</option>
										<option value="S">Activo</option>
										<option value="N">En Mantenimiento</option>
									  </select>
									</div>
								  </div>
									<div class="control-group">
									  <label for="message" class="control-label titulo">Mensaje de Mantenimiento</label>
									  <div class="tituloslog">
										Mensaje que se mostrara a los visitantes o usuarios cuando el estado del sistema, se encuentre en mantenimiento.
									  </div>
									  <div class="controls">
										<textarea rows="4" id="msgmante" name="msgmante" class="span4 preg_conf"></textarea>
									  </div>
									</div>
								   
									<div class="form-actions">
									  <button class="btn btn-danger btn" type="submit">Guardar</button>&nbsp;&nbsp;
									  <button class="btn" type="reset">Cancel</button>
									</div>
								  </fieldset>
							</form>
						</div>
						<div id="tabs-user">
							<form class="form-horizontal" id="form_config_2" name="form_config_2" action="{base_url}index.php/vistas/config" novalidate="novalidate">
							<!--------- Petaña de configuracion de usuarios-------->
							<div class="control-group">
									<label for="validateSelect" class="control-label titulo">Habilitar Perfiles</label>
									<div class="tituloslog">
										Permitir a los usuarios editar sus perfiles.
									</div>
									<div class="controls">
									  <select name="perfilon" id="perfilon" class="preg_conf_2">
										<option value="">Elegir opcion...</option>
										<option value="S">Si</option>
										<option value="N">No</option>
									  </select>
									</div>
							</div>
							
							<div class="control-group">
									<label for="validateSelect" class="control-label titulo">Notificaciones</label>
									<div class="tituloslog">
										Enviar mensajes de correo electronico, cuando un usuario se registre.
									</div>
									<div class="controls">
									  <select name="notificmsg" id="notificmsg" class="preg_conf_2">
										<option value="">Elegir opcion...</option>
										<option value="S">Si</option>
										<option value="N">No</option>
									  </select>
									</div>
							</div>
							<div class="control-group">
									<label for="validateSelect" class="control-label titulo">Estado de registro</label>
									<div class="tituloslog">
										Permitir que los usuarios se registren al sistema.
									</div>
									<div class="controls">
									  <select name="statregister" id="statregister" class="preg_conf_2">
										<option value="">Elegir opcion...</option>
										<option value="S">Si</option>
										<option value="N">No</option>
									  </select>
									</div>
							</div>
							<div class="form-actions">
									  <button class="btn btn-danger btn" type="submit">Guardar</button>&nbsp;&nbsp;
									  <button class="btn" type="reset">Cancel</button>
							</div>
							</form>
						</div>
					</div>
				</div> <!-- /widget-content -->
			</div> <!-- /widget -->
	    </div> <!-- /span12 -->
	</div>