<?php 
	require_once("core.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html; charset=windows-1251" />
	<title>Formulario de Administraci&oacute;n</title>
	<link rel="stylesheet" type="text/css" href="css/styles.css" media="screen" />
	<!--[if lte IE 7]>
	<link rel="stylesheet" type="text/css" href="css/ie7.css" media="screen" />
	<![endif]-->
	<!--[if IE 8]>
	<link rel="stylesheet" type="text/css" href="css/ie8.css" media="screen" />
	<![endif]-->
	<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
	<script type="text/javascript" src="js/custom.auth.min.js"></script>
    <?php $xajax->printJavascript("./xajax_05") ?>
</head>
<body>
<div id="page-body">
	<div id="wrapper">
		<!-- Authorization [begin] -->
		<div class="sb-box auth">
			<div class="sb-box-inner content">
				<!-- Authorization block header [begin] -->
				<div class="header"><h3>Ingreso de Usuarios</h3></div>
				<!-- Authorization block header [end] -->
				<div class="bcont">
					<!-- Authorization content [begin] -->
					
					<!-- notification [begin] -->
					<div id="information" name="information">
						<div name="tip" id="tip" class="message tip">
							<span class="strong">INFORMACI&Oacute;N!</span>ingrese su nombre de usuario y contrase&ntilde;a.
						</div>						
					</div>				
					<!-- notification [end] -->
					
					<!-- form elements [start] -->
					<form id="frmlogin" name="frmlogin" onsubmit = "return false;">
					
						<p>
							<label>Nombres:</label>
							<input id="nombres" name="nombres" type="text" placeholder="Nombres" class="inputtext small" />
						</p>
						<p>
							<label>Apellidos:</label>
							<input id="apellidos" name="apellidos" type="text" placeholder="Apellidos" class="inputtext small" />													
						</p>
						<p>
							<label>Sexo:</label>
							<select id="sexo" name="sexo">
								<option value="0" selected >Seleccione</option>
								<option value="1">Masculino</option>
								<option value="2">Femenino</option>
								<option value="3">Otros</option>
							</select>													
						</p>
						<p>
							<label>Estado Civil:</label>
							<select id="estadocivil" name="estadocivil">
								<option value="0" selected >Seleccione</option>
								<option value="1">Soltero(a)</option>
								<option value="2">Uni&oacute;n libre</option>
								<option value="3">Casado(a)</option>
								<option value="4">Divorciado(a)</option>
								<option value="5">Separado(a)</option>
								<option value="6">Viudo(a)</option>							
							</select>													
						</p>
						<p>
							<label>Pa&iacute;s de origen:</label>
							<select id="pais" name="pais">
								<option value="0" selected >Seleccione</option>
								<option value="1">Colombia</option>
							</select>													
						</p>
						<p>
							<label>Edad:</label>
							<input id="edad" name="edad" type="text" placeholder="Edad" class="inputtext small" />
														
						</p>
						<p>
							<label>Usuario:</label>
							<input id="username" name="username" type="text" placeholder="Nombre de usuario" class="inputtext small" />
														
						</p>
						<p>
							<label>Contrase&ntilde;a:</label>
							<input id="pass" name="pass" type="password" placeholder="Contrase&ntilde;a"class="inputtext small" />
						</p>
						<p>
							<label>Confirme Contrase&ntilde;a:</label>
							<input id="repass" name="repass" type="password" placeholder="Confirme Contrase&ntilde;a"class="inputtext small" />
						</p>
						<p>
							<label>Codigo de seguridad:</label></p>
						<div id="captcha" name="captcha">
<script type="text/javascript">
var RecaptchaOptions = {
   lang : 'es'
   //theme : 'clean'
};
</script>
							 <script type="text/javascript"
    src="http://www.google.com/recaptcha/api/challenge?k=6LeRC8kSAAAAAM7UQslHDYbVPbptPGUhG_DEo1SQ">
  </script>
  <noscript>
    <iframe src="http://www.google.com/recaptcha/api/noscript?k=6LeRC8kSAAAAAM7UQslHDYbVPbptPGUhG_DEo1SQ"
        height="300" width="500" frameborder="0"></iframe>

    <textarea name="recaptcha_challenge_field" rows="3" cols="40">
    </textarea>
    <input type="hidden" name="recaptcha_response_field" value="manual_challenge">
  </noscript>
						</div>

						<!--<p>						
							<label>Codigo de verificaci&oacute;n:</label>							
							<input id="codever" name="codever" type="text" placeholder="Codigo de verificaci&oacute;n"class="inputtext small" />
						</p>-->
						
						<p>
							<input type="checkbox" id="remember" checked="checked" class="checkbox" /> <label for="remember">Recuerdame</label>
							<button type="submit" class="button blue floatright" onclick = "xajax_validarcaptcha(xajax.getFormValues('frmlogin')); return false;"><span>Entrar</span></button>
							<button type="reset" class="button green floatright" ><span>Reestablecer</span></button>							
						</p>
						<div class="clearingfix"></div>
					</form>
					<div name="msg" id="msg"></div>
					<!-- form elements [end] -->

					<!-- Authorization content [end] -->
				</div>
			</div>
		</div>
		<!-- Authorization [end] -->
	</div>
</div>
</body>
</html>
