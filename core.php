<?php
	//ruta relativa a xajax
	require_once ("xajax_05/xajax_core/xajax.inc.php");
	require_once('recaptchalib.php');

	function validarcaptcha($testForm){
		$captchaResponse=new xajaxResponse();	
		  $privatekey = "6LeRC8kSAAAAAA8i32OVeoxPM13JrjYpXJAPLu1f";
		
		  $resp = recaptcha_check_answer ($privatekey,
					        $_SERVER["REMOTE_ADDR"],
					        $testForm['recaptcha_challenge_field'],
					        $testForm['recaptcha_response_field']);		 
		  if (!$resp->is_valid) {
		    //Código para ejecutar cuando reCaptcha es incorrecto
			$validcaptcha="captcha NO valido";				
		  } else {
		    //Código para realizar cuando reCaptcha es correcto
			$validcaptcha="El captcha es valido";
		  }

		$captchaResponse->assign( "captcha", "innerHTML",$validcaptcha);
	    	return $captchaResponse;		
	}
	function validar($usuario){
		$validResponse=new xajaxResponse();
		$validado="";
		$Users = array(1=>"diniremix", 2=>"luzsec", 3=>"compiz", 4=>"linux", 5=>"tuxedo");
		$existe = array_search($usuario, $Users); 
		switch ($existe) {						
			case 1 :
			case 2 :
			case 3 :
			case 4 :
			case 5 :
				$msg="error";
				$info=" ya existe.";				
			break;
			
			default :
				$msg="success";
				$info=" Ha sido agregado correctamente.";				
			break;
		}//switch 
		
		$validado='<div name="user_validate" id="user_validate" class="message '.$msg.'">
						<span class="strong">Informaci&oacute;n</span> El Usuario '.$usuario .$info .'
					</div>';
					
		$validResponse->assign( "information", "innerHTML",$validado);
    	return $validResponse;
	}
	
	function testForm( $formData ){
		$objResponse=new xajaxResponse();
		$nombres="";
		$apellidos="";
		$sexo="";
		$estadocivil="";
		$pais="";
		$edad="";		
		$usuario="";
		$pass="";
		$repass="";
		$codever="";
		$verified_Code=md5("codigo");
		$Error=0;
		$campo=false;
		$nuevodiv="";
		
		//si existen los campos del frm
		if (array_key_exists("nombres",$formData)){
			if (trim($formData['nombres']) == ""){
				$Error=1;
			}else{
				$nombres=$formData['nombres'];				
			}
		}else{
			$Error=-1;
		}
		
		if (array_key_exists("apellidos",$formData)){
			if (trim($formData['apellidos']) == ""){
				$Error=1;
			}else{
				$apellidos=$formData['apellidos'];				
			}
		}else{
			$Error=-1;
		}
		
		if (array_key_exists("sexo",$formData)){
			if (trim($formData['sexo']) == ""){
				$Error=1;
			}else{
				$sexo=$formData['sexo'];				
			}
		}else{
			$Error=-1;
		}
		
		if (array_key_exists("estadocivil",$formData)){
			if (trim($formData['estadocivil']) == ""){
				$Error=1;
			}else{
				$estadocivil=$formData['estadocivil'];				
			}
		}else{
			$Error=-1;
		}
		
		if (array_key_exists("pais",$formData)){
			if (trim($formData['pais']) == ""){
				$Error=1;
			}else{
				$pais=$formData['pais'];				
			}
		}else{
			$Error=-1;
		}
		if (array_key_exists("edad",$formData)){
			if (trim($formData['edad']) == ""){
				$Error=1;
			}else{
				$edad=$formData['edad'];				
			}
		}else{
			$Error=-1;
		}
		
        if (array_key_exists("username",$formData)){
			if (trim($formData['username']) == ""){
				$Error=1;
			}else{
				$usuario=$formData['username'];				
			}
		}else{
			$Error=-1;
		}
		
		if(array_key_exists("pass",$formData)){
			if (trim($formData['pass']) == ""){
				$Error=1;
			}else{
				$pass=$formData['pass'];
			}
		}else{
			$Error=-1;
		}
		
		if(array_key_exists("repass",$formData)){
			if (trim($formData['repass']) == ""){
				$Error=1;
			}else{
				$repass=$formData['repass'];
			}
		}else{
			$Error=-1;
		}
		
		if(array_key_exists("codever",$formData)){
			if (trim($formData['codever']) == ""){
				$Error=1;
			}else{
				$codever=$formData['codever'];
			}
		}else{
			$Error=-1;
		}
		
		if($sexo==0||$estadocivil==0||$pais==0){
			$Error=4;
		}
		
		if($pass!=$repass){
			$Error=2;
		}
		
		if(md5($codever)!=$verified_Code){
			$Error=3;
		}
			
		//conectar a la db y revisar si existe
		//...		
		//$Error=0;
		switch ($Error) {
			case '0' ://satisfactorio
					return validar($usuario);
			break;		
			case '1' ://Campos vacios
				$nuevodiv='<div name="warning" id="warning" class="message warning">
						<span class="strong">Advertencia '.$Error.'</span>Todos los Campos son obligatorios.</div>';   
			break;
			
			case '2' :// passwords no coincide
				$nuevodiv='<div name="error" id="error" class="message warning">
						<span class="strong">Error '.$Error.'</span>las Contrase&ntilde;as no coinciden.
					</div>';
			break;
			
			case '3' :// codigo de verificacion no coincide
				$nuevodiv='<div name="error" id="error" class="message error">
						<span class="strong">Error '.$Error.'</span>El Codigo de verificaci&oacute;n no coincide.
					</div>';
			break;
			
			case '4' :// no ha seleccionado algun select
				$nuevodiv='<div name="error" id="error" class="message warning">
						<span class="strong">Error '.$Error.'</span>seleccione una opci&oacute;n.
					</div>';
			break;				
			default :
				$nuevodiv='<div name="error" id="error" class="message error">
						<span class="strong">Error Inesperado '.$Error.'</span>Ocurri&oacute; un Error Inesperado en la Aplicaci&oacute;n</div>';
			break;
		}//switch 
						
		$objResponse->assign( "information", "innerHTML",$nuevodiv);
    	return $objResponse;		
	}

	$xajax=new xajax();
	$xajax->registerFunction( "testForm" );
	$xajax->registerFunction( "validarcaptcha" );
	$xajax->processRequest();
?>
