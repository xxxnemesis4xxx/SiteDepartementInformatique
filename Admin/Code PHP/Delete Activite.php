<?php
$servername = "localhost";
$username = "equipe6h15";
$password = "ebola-info";
$dbname = "equipe6h15";
$TableName = "Activites";
$id = $_POST["id"];

mysql_connect($servername, $username, $password) or
die("Impossible de se connecter : " . mysql_error());
mysql_select_db($dbname);

$RequeteNombreActivites = mysql_query("DELETE FROM $TableName WHERE id=\"$id\"");
echo $RequeteNombreActivites;

mysql_close();
?>
