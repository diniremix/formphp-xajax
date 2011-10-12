<?php
  require_once('recaptchalib.php');
  $privatekey = "6LeRC8kSAAAAAA8i32OVeoxPM13JrjYpXJAPLu1f";
  $resp = recaptcha_check_answer ($privatekey,
                                $_SERVER["REMOTE_ADDR"],
                                $_POST["recaptcha_challenge_field"],
                                $_POST["recaptcha_response_field"]);
 
  if (!$resp->is_valid) {
    //Código para ejecutar cuando reCaptcha es incorrecto
         echo $resp->error;
	echo '<h1>captcha NO valido</h1>';
  } else {
    //Código para realizar cuando reCaptcha es correcto
	echo '<h1>captcha validado</h1>';
	return $resp;
  }
  ?>
