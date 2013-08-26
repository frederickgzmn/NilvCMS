<html>
<head>
<title>Mi Formulario</title>
</head>
<body>
{base_url}
<form method='POST'>
<h5>Nombre</h5>
<input type="text" name="nombre_usu" id="nombre_usu" value="{nombre}" size="50" />
<h5>Apellido</h5>
<input type="text" name="apell_usu" id="apell_usu" value="{apellidos}" size="50" />
<h5>Usuario</h5>
<input type="text" name="username" value="{usuario}" size="50" />
<h5>Contraseña</h5>
<input type="text" name="password" value="" size="50" />
<h5>Confirmar contraseña</h5>
<input type="text" name="passconf" value="" size="50" />
<h5>Email</h5>
<input type="text" name="email" value="{email}" size="50" />
<div><input type="submit" value="Enviar" /></div>
</form>
</body>
</html>