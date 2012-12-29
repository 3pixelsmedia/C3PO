<?php

// configurar modo production o developer 
ini_set('display_errors','1');
date_default_timezone_set('America/Caracas');


$title = "Sin Titulo"; // titulo del app o web site. 
$path = "";	// path absoluto a la carpeta del app  
$webpath = ""; // webpath a la carpeta del app

//Datos de DB

$useDB = ""; // 0 no se usa la DB , 1 se usa la DB 
$dbhost = ""; // Host del DB
$dbuser = ""; // user del DB
$dbpass = ""; // password del DB 
$dbname = ""; // DB al cual nos vamos a conectar. 

// VARIABLES
	// FACEBOOK
	$fbAppId = ""; //Face App ID 
	$fbAppSecret = ""; //face App Secret 
	$fbAppNameSpace = ""; // Nombre del app en Face. 
	$fbtabactive = "1"; // Si yo soy yo . Facebook Stand Alone Protect 0 desactivado
	$fbtaburl = "http://www.facebook.com/$fbAppNameSpace/app_$fbAppId";

	// Variables mail

	$mailFrom = ""; // Direccion Email  del Emisor 
	$mailFromName = ""; // Nombre del emisor del Mail 
	$mailUsername = "sender@c3po.cmxhost.com"; // NO TOCAR username server mail 
	$mailPassword = "c3pothebest"; // NO TOCAR Password server mail 
	$mailHost = "c3po.cmxhost.com"; // NO TOCAR Host  server mail 
	$asunto = ""; // Asunto del Mail 
	
	//Twitter app
	
	$twitterApp = "";
	$twitterSecret = "";
	$twUsertoken = "";
	$twUsersecret = "";


?>