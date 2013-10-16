<div class="row">
      	<div class="span12" >
      		<div class="widget stacked" style="margin-left: 128px;">
				<div class="widget-header">
					<i class="icon-check"></i>
					<h3>Configuraci&oacute;n de Perfil</h3>
				</div> <!-- /widget-header -->
				<div class="widget-content">
					<div id="tabs">
						<ul>
							<li><a href="#tabs-gen">General</a></li>

						</ul>
						<div id="tabs-gen">
						{error_config_user}
							<form class="form-horizontal" method="post" id="form_config" name="form_config" action="{base_url}index.php/process/Nilv_Actualizacion_user" novalidate="novalidate">
								<fieldset>
									<fieldset id="user_autentificacion">
										<legend>Autentificaci&oacute;n</legend>
										<div class="control-group">
										  <label for="name" class="control-label titulo">Codigo Usuario</label>
										  <div class="tituloslog">
											Codigo unico del usuario
										  </div>
										  <div class="controls">
											<input type="text" id="codigo" disabled="disabled" name="codigo" value="{codigo}" class="input-large preg_conf" >
										  </div>
										</div>
										<div class="control-group">
										  <label for="email" class="control-label titulo">Cambiar clave</label>
										  <div class="tituloslog">
											Ingrese una contrase&ntilde;a para realizar el cambio.
										  </div>
										  <div class="controls">
											<input type="password" id="passwd" name="passwd" value="AdminNilv" class="input-large preg_conf">
										  </div>
										</div>
										<div class="control-group">
										  <label for="email" class="control-label titulo">Confirmar clave</label>
										  <div class="tituloslog">
											Ingrese nuevamente la contrase&ntilde;a.
										  </div>
										  <div class="controls">
											<input type="password" id="passwd2" name="passwd2" value="AdminNilv" class="input-large preg_conf">
										  </div>
										</div>
										<div id="alertas" name="alertas"></div>
										<div class="form-actions">
									  <button name="boton_cambio_clave" id="boton_cambio_clave" class="btn btn-info" type="button">Cambiar contrase&ntilde;a</button>&nbsp;&nbsp;
									</div>
									
									</fieldset>
									<fieldset id="user_data">
										<legend>Datos personales</legend>
										<div class="control-group">
										  <label for="email" class="control-label titulo">Grupo</label>
										  <div class="tituloslog">
											Grupo del usuario, este sera el rol que ejercera el mismo en la app.
										  </div>
										  <div class="controls">
											<select name="grupo" id="grupo">
												{list_grupos}
											</select>
											
										  </div>
										</div>
										
										<div class="control-group">
										  <label for="subject" class="control-label titulo">Nombre</label>
										  <div class="tituloslog">
											Nombre del usuario.
										  </div>
										  <div class="controls">
											<input type="text" id="nombre" name="nombre" value="{nombre_user}" class="input-large preg_conf">
										  </div>
										</div>
										<div class="control-group">
										  <label for="subject" class="control-label titulo">Apellido</label>
										  <div class="tituloslog">
											Apellido o apellidos del usuario.
										  </div>
										  <div class="controls">
											<input type="text" id="apellido" name="apellido" value="{apellido}" class="input-large preg_conf">
										  </div>
										</div>
										<div class="control-group">
										  <label for="subject" class="control-label titulo">Email</label>
										  <div class="tituloslog">
											Correo del usuario, a este correo se le enviaran notificaciones y alertas.
										  </div>
										  <div class="controls">
											<input type="email" id="email" name="email" value="{email}" class="input-large preg_conf">
										  </div>
										</div>
										<div class="control-group">
										<label for="validateSelect" class="control-label titulo">Firma</label>
										<div class="tituloslog">
											Breve informacion o firma relacionada con su rol.
										</div>
										<div class="controls">
										  <textarea rows="4" id="firma" name="firma" class="span4 preg_conf">{firma}</textarea>
										</div>
									  </div>
										
									</fieldset>
								   
									<div class="form-actions">
									  <button class="btn btn-danger btn" type="submit">Guardar</button>&nbsp;&nbsp;
									  <button class="btn" type="reset">Cancel</button>
									</div>
								  </fieldset>
							</form>
						</div>
						</div>
					</div>
				</div> <!-- /widget-content -->
			</div> <!-- /widget -->
	    </div> <!-- /span12 -->
	</div>