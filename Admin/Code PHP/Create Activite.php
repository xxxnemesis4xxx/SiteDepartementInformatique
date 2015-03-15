<?php
$servername = "localhost";
$username = "equipe6h15";
$password = "ebola-info";
$dbname = "equipe6h15";
$TableName = "Activites";
$ActiviteNom = $_POST["ActiviteNom"];
$ActiviteDate = $_POST["ActiviteDate"];
$ActivitePrix = $_POST["ActivitePrix"];
$ActiviteLimite = $_POST["ActiviteLimite"];

mysql_connect($servername, $username, $password) or
die("Impossible de se connecter : " . mysql_error());
mysql_select_db($dbname);

$RequeteNombreActivites = mysql_query("INSERT INTO $TableName VALUES (0, \"$ActiviteNom\", \"$ActiviteDate\", \"$ActivitePrix\", \"$ActiviteLimite\")");
echo $RequeteNombreActivites . ";" . mysql_insert_id();

mysql_close();
?>
