<div class="row">
      	<div class="span12" >
      		<div class="widget stacked" style="margin-left: 128px;">
				<div class="widget-header">
					<i class="icon-check"></i>
					<h3>Manager de Usuarios Administradores</h3>
				</div> <!-- /widget-header -->
				<div class="widget-content">
					<div id="tabs">
						<ul>
							<li><a href="#tabs-gen">Usuarios</a></li>
						</ul>
						<div id="tabs-gen">
							<fieldset>
								<fieldset style="display: none;" id="user_registro_actualiz" name="user_registro_actualiz">
										<legend>Registro/Actualizaci&oacute;n de usuarios</legend>
										<div class="control-group">
										  <label for="name" class="control-label titulo">ID</label>
										  <div class="tituloslog">
											Codigo del usuario
										  </div>
										  <div class="controls">
											<input class="nuevo_todo" type="text" id="codigo_user" name="codigo_user" value="" class="input-large preg_conf" >
										  </div>
										</div>
										<div class="control-group">
										  <label for="name" class="control-label titulo">Nombre</label>
										  <div class="tituloslog">
											Nombre del usuario
										  </div>
										  <div class="controls">
											<input class="nuevo_todo" type="text" id="nombre_user" name="nombre_user" value="" class="input-large preg_conf" >
										  </div>
										</div>
										<div class="control-group">
										  <label for="name" class="control-label titulo">Apellido</label>
										  <div class="tituloslog">
											Apellido del usuario
										  </div>
										  <div class="controls">
											<input class="nuevo_todo" type="text" id="apellido_user" name="apellido_user" value="" class="input-large preg_conf" >
										  </div>
										</div>
										<div class="control-group">
										  <label for="name" class="control-label titulo">Email</label>
										  <div class="tituloslog">
											Correo del usuario
										  </div>
										  <div class="controls">
											<input class="nuevo_todo" type="text" id="email_user" name="email_user" value="" class="input-large preg_conf" >
										  </div>
										</div>
										<div class="control-group">
										  <label for="name" class="control-label titulo">Grupo</label>
										  <div class="tituloslog">
											Grupo del usuario
										  </div>
										  <div class="controls">
											<select name="grupo_user" id="grupo_user">
												{list_grupos}
											</select>
										  </div>
										</div>
										<input class="nuevo_todo" value="" type="hidden" id="user_modific" name="user_modific"/>
										<div class="form-actions">
											<button style="display: none;" name="boton_agregar_user" id="boton_agregar_user" class="btn btn-success" type="button">Completar Registro</button>
											<button style="display: none;" name="boton_modific_user" id="boton_modific_user" class="btn btn-info" type="button">Modificar</button>
											<button name="boton_limpiar_user" id="boton_limpiar_user" class="btn btn-inverse" type="button">Limpiar</button>
										</div>
								</fieldset>
								<fieldset style="display: none;" id="user_alert_ver" name="user_alert_ver">
									<div id="alertas_user_insert_act" name="alertas_user_insert_act"></div>
								</fieldset>
								
								<fieldset id="user_autentificacion">
										<button name="boton_agregar_user_vista" id="boton_agregar_user_vista" class="btn btn-danger" type="button">Agregar Nuevo</button>
										<legend>Lista de usuarios</legend>
										<div class="control-group">
										<table class='table table-bordered table-hover table-striped' id='tabla_privilegios' name='tabla_privilegios'>
											<tr>
												<td>ID</td>
												<td>Nombre Completo</td>
												<td>Email</td>
												<td>Firma</td>
												<td>Grupo</td>
												<td>Acci&oacute;n</td>
											</tr>
												{listado_usuarios_admins}
										</table>
										
										</div>
										<div id="alertas_grupo" name="alertas_grupo"></div>
								</fieldset>

							</fieldset>
						</div>
					</div>
				</div> <!-- /widget-content -->
			</div> <!-- /widget -->
	    </div> <!-- /span12 -->
	</div>