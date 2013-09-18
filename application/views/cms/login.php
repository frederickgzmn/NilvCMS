<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Login - NilvCMS</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<link rel="shortcut icon" href="{base_url}themes/cms/img/favicon.ico" />
	<link href="{base_url}themes/cms/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="{base_url}themes/cms/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css" />
	<link href="{base_url}themes/cms/css/font-awesome.css" rel="stylesheet" />
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet" />
	<link href="{base_url}themes/cms/css/base-admin.css" rel="stylesheet" type="text/css" />
	<link href="{base_url}themes/cms/css/pages/signin.css" rel="stylesheet" type="text/css" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body style="background: #333333;">
<div style="margin-top: 60px;">
	<div style="display: block; text-align: center;">
		<img width="300px" src="{base_url}themes/cms/img/logon.png">
	</div>
	<div class="account-container">
		<div class="content clearfix">
			<form id=login-form method="post" accept-charset="utf-8" action="{base_url}/process/Nilv_login_usuario">
				<div class="login-fields">				
					<p>Sign in using your registered account:</p>
					<div class="field">
						<label for="username">Username:</label>
						<input type="text" id="username" name="username" value="" placeholder="Username" class="login username-field" />
					</div> <!-- /field -->
					<div class="field">
						<label for="password">Password:</label>
						<input type="password" id="password" name="password" value="" placeholder="Password" class="login password-field" />
					</div> <!-- /password -->
				</div> <!-- /login-fields -->
				<div class="login-actions">
					<span class="login-checkbox">
						<input id="Field" name="Field" type="checkbox" class="field login-checkbox" value="First Choice" tabindex="4" />
					</span>
					<button class="button btn btn-warning">Sign In</button>
					<div style="text-align: center;">
						{errores}
					</div>
				</div> <!-- .actions -->
			</form>
		</div> <!-- /content -->
	</div> <!-- /account-container -->
	
	<!-- Text Under Box -->
	<div class="login-extra">
		Don't have an account? <a href="./signup.html">Sign Up</a><br />
		Remind <a href="#">Password</a>
	</div> <!-- /login-extra -->
</div>
	<script src="{base_url}themes/cms/js/jquery-1.7.2.min.js"></script>
	<script src="{base_url}themes/cms/js/bootstrap.js"></script>
	<script src="{base_url}themes/cms/js/signin.js"></script>
</body>
</html>
