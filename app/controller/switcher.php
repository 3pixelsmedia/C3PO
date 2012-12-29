<?php


// el path es relativo a la carpeta raiz y no a la ubicación de home.php
if(isset($_GET['l'])){

	$mod = $_GET['l'];
	$mod = str_replace('?', '', $mod);

} else {
	$mod = null;

}
if ($useDB =="1") {
		$d = new DbConn;
		$db = $d->db_connect(); 

	//$db->db_select($database); 
}

if($mod == null){

	include($path."app/controller/home.php");
	exit;

} else {

	include($path."app/controller/$mod.php"); // creo que esto esta mal preguntar a Camax //Si estaba mal apuntaba a la vista y debe apuntar al controlador
	exit;
}
if ($useDB =="1") {
	$d->close(); 
}
	
?>