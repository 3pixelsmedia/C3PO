<?php
# Developed by Camax and Roma. 
include_once ('config.php');
$host = $dbhost;
$user = $dbuser;
$pass = $dbpass;
$db = $database;
echo "<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />";
if ($host == "") echo "No pude establecer la conexión Error: Debes introducir la dirección de la DB ";
if ($user == "") echo "No pude establecer la conexión Error: Debes introducir el usuario";
if ($pass == "") echo "No pude establecer la conexión Error: Debes introducir el password ";
if ($db == "") echo "No pude establecer la conexión Error: Debes seleccionar la DB a usar ";
$con = mysql_connect("$host","$user","$pass");
if (!$con)
  {
  die('No pude establecer la conexión Error: ' . mysql_error());
  }

mysql_select_db("$db", $con);
mysql_query("SET NAMES 'utf8'");
?>
