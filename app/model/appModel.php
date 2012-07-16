<?php
# ------------------------------------------ #
#  Desarrollado por : Camax y Cromanelli     #
#  Este es el Core del App 	                 #
# ------------------------------------------ #

// Declarando variables globales //


/* Clase encargada de conectar con Facebook  */


class Face{
	function init() {
		Global $fbAppId;
		Global $fbAppSecret;
		Global $path;
		//require('/config.php');
		require_once ($path.'app/facebook/facebook.php');
		$fb = new Facebook(array(
			'appId' => "$fbAppId",
			'secret' => "$fbAppSecret",
			));

		return $fb;
	}
	function loginFacebook($scope) { // devuelve  un array que contiene el user de facebook, nombre, e email de usuario. 
		
//$scope deberia contener un string similar a este - "user_about_me,email,user_birthday,publish_stream" //

		$fb = $this->init();
		$par = array();
		$par['scope'] = $scope;
		$flag = 0;
		$nombre = null;
		$email = null;
		
		$user = $fb->getUser();
		$_SESSION['$uid'] = $user;
		if ($user) {
			$logoutUrl = $fb->getLogoutUrl();
		} else {
			$loginUrl = $fb->getLoginUrl($par);
		}


		if ($user) {
			try {
				$user_profile = $fb->api('/me');
				$nombre = $user_profile['name'];
				$email = $user_profile['email'];
				$flag = $user;
			} catch (FacebookApiException $e) {
				error_log($e);
				$user = null;
				$flag = $user;
			}
		}
		$userInfo = array(
			"id"     => $flag,
			"nombre" => $nombre,
			"email"  => $email,
			"login"  => $fb->getLoginUrl($par),
			"logout" => $fb->getLogoutUrl(),
		);
		
		return $userInfo; 
	}
	function postWall($mensaje, $name, $caption, $link, $description, $picture ) { // esta Funcion postea en el Wall de facebook ojo debo modificar esto 
			$fb = $this->init();
			$flag = 0;
				$attachment = array('message' => "$mensaje",
				    'name' => $name,
				    'caption' => $caption,
				    'link' => $link,
				    'description' => $description,
				    'picture' => $picture,
				    'actions' => array(array('name' => 'Get Search',
				    'link' => 'http://www.google.com/ '))
				    );
				try {
					$user_profile = $fb->api('/me');
					$result = $fb->api('/me/feed/','post',$attachment);
					$flag = 1;

				} catch (FacebookApiException $e) {
					error_log($e);
					$user = null;
					$flag = 0;

				}
	return $flag;	
	}
	
}

class DbConn{
		
		 function db_connect(){ 
		 	Global $dbhost;
		 	Global $dbuser;
		 	Global $dbpass;

		 $connect = @mysql_connect($dbhost,$dbuser,$dbpass); 
		 if(!$connect){ 
		 @mysql_close($connect); 
		 @mysql_query("SET names 'UTF8'"); 
		 @mysql_query("SET charset 'UTF8'"); 
		 @mysql_query("SET character_set_client = UTF8"); 
		 @mysql_query("SET character_set_connection = UTF8"); 
		 @mysql_query("SET character_set_database = UTF8"); 
		 @mysql_query("SET character_set_results = UTF8"); 
		 @mysql_query("SET character_set_server = UTF8"); 
		 die ("<h1><font color='#000000'><center>MySQL DataBase No se pudo<font color='#FF0000'style='text-decoration:blink;'> conectar !</font></center></font></h1>"); 
		 return false; 
		 } 
		 return true; 
		} 


		 function db_select($database){ 

		 $select = @mysql_select_db($database); 
		 if(!$select){ 
		 @mysql_close($connect); 
		 die ("<h1><font color='#000000'><center>No hay base de datos <font color='#FF0000'style='text-decoration:blink;'>Seleccionada</font> !</center></font></h1>"); 
		 return false; 
		 } 
		 return true; 
		} 




		 function close(){ 
		 global $connect; 
		 @mysql_close($connect); 
		 } 
		
} /*Uso de esta clase dbconn

Llamar clase

$db->db_connect(); 
$db->db_select(); 

// Close connect 
//$db->close(); 


*/

	function mailIt($correo,$urlmensaje){ //Revisar variables 
			require_once($path.'app/class.phpmailer.php');

				public $mailFrom;
				public $mailFromName;
				public $mailUsername;
				public $mailPassword;
				public $mailHost;
				public $asunto;


				$file = file_get_contents($urlmensaje);
				$mail = new PHPMailer();
				$body = $file;
				$mail->IsSMTP(); 
				$mail->Host = $mailHost;
				$mail->From = $mailFrom;
				$mail->FromName = $mailFromName;
				$mail->Subject = $asunto;
				$mail->AltBody = ""; 
				$mail->MsgHTML($body);
				$mail->AddAddress($correo, '');
				$mail->SMTPAuth = true;
				$mail->Username = $mailUsername;
				$mail->Password = $mailPassword; 
				if(!$mail->Send()) {
				echo "Mailer Error: " . $mail->ErrorInfo;
				}

	}
class Nombre_Clase {
	
}
include ($path.'app/class.phpmailer.php');
include ('devCama.php');
include ('devRoma.php');
?>