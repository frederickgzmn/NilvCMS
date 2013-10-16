<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>NilvCMS</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<meta name="apple-mobile-web-app-capable" content="yes" />
	 <link rel="shortcut icon" href="{base_url}themes/cms/img/favicon.ico" />
	<link href="{base_url}themes/cms/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="{base_url}themes/cms/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css" />
	<link href="{base_url}themes/cms/css/font-awesome.css" rel="stylesheet" />
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet" />
	<link href="{base_url}themes/cms/css/base-admin.css" rel="stylesheet" type="text/css" />
	<link href="{base_url}themes/cms/css/pages/signin.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="{base_url}themes/cms/css/pages/base-admin-2.css">
    <link rel="stylesheet" href="{base_url}themes/cms/css/pages/base-admin-2-responsive.css">
	<link href="{base_url}themes/cms/css/pages/dashboard.css" rel="stylesheet" />
	<link href="{base_url}themes/cms/css/custom_base.css" rel="stylesheet" />
	{customcss}
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<!---<script src="{base_url}themes/cms/js/jquery-1.7.2.min.js"></script>
	<script src="{base_url}themes/cms/js/jqueryui/js/jquery-1.9.1.js"></script>-->
	<link rel="stylesheet" href="{base_url}themes/cms/js/jqueryui/css/smoothness/jquery-ui-1.10.3.custom.css" />
	<script src="{base_url}themes/cms/js/jquery-1.7.2.min2.js"></script>
	<script src="{base_url}themes/cms/js/jqueryui/js/jquery-ui-1.10.3.custom.js"></script>
	<script src="{base_url}themes/cms/js/validate/jquery.validate.js"></script>
	<script src="{base_url}themes/cms/js/custom_base.js"></script>
	{customjs}
	<script>
	$(function() {
		$( "#tabs" ).tabs();
	});
	</script>
	<script src="{base_url}themes/cms/js/bootstrap.js"></script>
	<script src="{base_url}themes/cms/js/excanvas.min.js"></script>
	<script src="{base_url}themes/cms/js/jquery.flot.js"></script>
	<script src="{base_url}themes/cms/js/jquery.flot.pie.js"></script>
	<script src="{base_url}themes/cms/js/jquery.flot.orderBars.js"></script>
	<script src="{base_url}themes/cms/js/jquery.flot.resize.js"></script>
	<script src="{base_url}themes/cms/js/charts/area.js"></script>
	<!--<script src="{base_url}themes/cms/js/charts/donut.js"></script>-->
	<script src="{base_url}themes/cms/js/base.js"></script>
</head>

<body>

<div class="navbar navbar-fixed-top">
	<div class="navbar-inner">
		<div class="container">
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>
			<a class="brand" href="{base_url}vistas/tablero">
				<img width="250" src="{base_url}themes/cms/img/logon100.png">			
			</a>
			<div class="nav-collapse">
				<ul class="nav pull-right">
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="icon-cog"></i>
							Settings
							<b class="caret"></b>
						</a>
						<ul class="dropdown-menu">
							<li><a href="javascript:;">Account Settings</a></li>
							<li><a href="javascript:;">Privacy Settings</a></li>
							<li class="divider"></li>
							<li><a href="javascript:;">Help</a></li>
						</ul>
					</li>
			
					<li class="dropdown">
						
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							<i class="icon-user"></i> 
							{nombre} {apellidos} Me!!
							<b class="caret"></b>
						</a>
						
						<ul class="dropdown-menu">
							<li><a href="{base_url}vistas/perfil">My Profile</a></li>
							<li><a href="{base_url}vistas/grupos">My Groups</a></li>
							<li class="divider"></li>
							<li><a href="{base_url}process/Nilv_logout_usuario">Logout</a></li>
						</ul>
						
					</li>
				</ul>
			
				<form class="navbar-search pull-right" />
					<input type="text" class="search-query" placeholder="Search" />
				</form>
			</div><!--/.nav-collapse -->	
		</div> <!-- /container -->
	</div> <!-- /navbar-inner -->
</div> <!-- /navbar -->
<div class="subnavbar">
	<div class="subnavbar-inner">
		<div class="container">
			<ul class="mainnav">
				<li class="active">
					<a href="{base_url}vistas/tablero">
						<i class="icon-home"></i>
						<span>Tablero</span>
					</a>	    				
				</li>
				
				<li>
					<a href="Reportes">
						<i class="icon-bar-chart"></i>
						<span>Reportes</span>
					</a>    				
				</li>
				
				<li>
					<a href="{base_url}vistas/useradmins">
						<i class="shortcut-icon icon-user"></i>
						<span>Users Admin</span>
					</a>
				</li>

				<li>					
					<a href="{base_url}vistas/tareas" class="dropdown-toggle">
						<i class="icon-th-large"></i>
						<span>Tareas</span>
					</a>	  				
				</li>
				
				<li class="dropdown">					
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="icon-pushpin"></i>
						<span>Modulos</span>
						<b class="caret"></b>
					</a>	

					<ul class="dropdown-menu">
						<li><a href="{base_url}vistas/config">Usuarios</a></li>
						<li><a href="{base_url}vistas/perfil">Paginas</a></li>
						<li class="divider"></li>
						<li><a href="{base_url}process/Nilv_logout_usuario">Redes Sociales</a></li>
					</ul>    				
				</li>
				
				<li class="dropdown">					
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="icon-share-alt"></i>
						<span>Configuraci&oacute;n</span>
						<b class="caret"></b>
					</a>	

					<ul class="dropdown-menu">
						<li><a href="{base_url}vistas/config">General</a></li>
						<li><a href="{base_url}vistas/perfil">Cuenta</a></li>
						<li><a href="{base_url}vistas/componentes">Componentes</a></li>
						<li class="divider"></li>
						<li><a href="{base_url}process/Nilv_logout_usuario">Signup</a></li>
					</ul>    				
				</li>
			</ul>
		</div> <!-- /container -->
	</div> <!-- /subnavbar-inner -->
</div> <!-- /subnavbar -->