<div class="row">
      	<div class="span12" >
      		<div class="widget stacked" style="margin-left: 128px;">
				<div class="widget-header">
					<i class="icon-check"></i>
					<h3>Configuraci&oacute;n de Componentes</h3>
				</div> <!-- /widget-header -->
				<div class="widget-content">
					<div id="tabs">
						<ul>
							<li><a href="#tabs-gen">Grupos</a></li>
							<li><a href="#tabs-priv">Privilegios</a></li>
							<li><a href="#tabs-cat">Categorias</a></li>
						</ul>
						<div id="tabs-gen">							
								<fieldset>
									<fieldset id="user_autentificacion">
										<legend>Grupo</legend>
										<div class="control-group">
										  <label for="name" class="control-label titulo">Nombre</label>
										  <div class="tituloslog">
											Nombre del grupo
										  </div>
										  <div class="controls">
											<input class="nuevo_todo" type="text" id="codigo_grup" name="codigo_grup" value="" class="input-large preg_conf" >
										  </div>
										</div>
										<div id="alertas_grupo" name="alertas_grupo"></div>
										<input class="nuevo_todo" value="" type="hidden" id="grup_modific" name="grup_modific"/>
										<div class="form-actions">
											<button name="boton_agregar_grup" id="boton_agregar_grup" class="btn btn-info" type="button">Agregar</button>
											<button name="boton_modific_grup" id="boton_modific_grup" class="btn btn-info" type="button">Modificar</button>
											<button name="boton_nuevo_grup" id="boton_nuevo_grup" class="btn btn-info" type="button">Nuevo</button>
										</div>
									
									</fieldset>
									<fieldset id="user_autentificacion">
										<legend>Lista de Grupos</legend>
										<div class="control-group">
											{tabla_grup}
										</div>
									</fieldset>
									<fieldset id="privilegios">
										<legend>Privilegios</legend>
										<div class="control-group">
											<label for="validateSelect" class="control-label titulo">Asignaci&oacute;n de Privilegios</label>
											<div class="tituloslog">
												Permitir cambiar de privilegios los usuarios administradores.
											</div>
											<div name="privileg" id="privileg" class="controls">
												{tabla_privilegios}
											</div>
										</div>
										<div id="alertas2" name="alertas2"></div>
										
									</fieldset>
								   
									<div class="form-actions">
										Nota: Los cambios de privilegio que realize, se agregaran instantaneamente.
									</div>
								  </fieldset>
						</div>
						<div id="tabs-priv">
							<fieldset id="user_autentificacion">
								<legend>Privilegio</legend>
								<div class="control-group">
									<label for="name" class="control-label titulo">Nombre</label>
									<div class="tituloslog">
										Nombre del Privilegio
									</div>
									<div class="controls">
										<input class="nuevo_todo" type="text" id="codigo_priv" name="codigo_priv" value="" class="input-large preg_conf" >
									</div>
								</div>
								<div id="alertas_priv" name="alertas_priv"></div>
								<input value="" class="nuevo_todo" type="hidden" id="priv_modific"/>
								<div class="form-actions">
									<button name="boton_agregar_priv" id="boton_agregar_priv" class="btn btn-info" type="button">Agregar</button>
									<button name="boton_modific_priv" id="boton_modific_priv" class="btn btn-info" type="button">Modificar</button>
									<button name="boton_nuevo_priv" id="boton_nuevo_priv" class="btn btn-info" type="button">Nuevo</button>
								</div>
								
							</fieldset>
							<fieldset id="user_autentificacion">
								<legend>Lista de Privilegios</legend>
								<div class="control-group">
									{tabla_privilegios2}
								</div>
							</fieldset>
						</div>
						
						<div id="tabs-cat">
							<fieldset id="user_autentificacion">
								<legend>Categoria</legend>
								<div class="control-group">
									<label for="name" class="control-label titulo">Categoria</label>
									<div class="tituloslog">
										Nombre de la Categoria
									</div>
									<div class="controls">
										<input type="text" class="nuevo_todo" id="codigo_cat" name="codigo_cat" value="" class="input-large preg_conf" >
									</div>
								</div>
								<div id="alertas_cat" name="alertas_cat"></div>
								<input class="nuevo_todo" value="" type="hidden" id="cat_modific"/>
								<div class="form-actions">
									<button name="boton_agregar_cat" id="boton_agregar_cat" class="btn btn-info" type="button">Agregar</button>
									<button name="boton_modific_cat" id="boton_modific_cat" class="btn btn-info" type="button">Modificar</button>
									<button name="boton_nuevo_cat" id="boton_nuevo_cat" class="btn btn-info" type="button">Nuevo</button>
								</div>
								
							</fieldset>
							<fieldset id="user_autentificacion">
								<legend>Lista de Categorias</legend>
								<div class="control-group">
									{tabla_cat}
								</div>
							</fieldset>
						</div>
						</div>
					</div>
				</div> <!-- /widget-content -->
			</div> <!-- /widget -->
	    </div> <!-- /span12 -->
	</div>