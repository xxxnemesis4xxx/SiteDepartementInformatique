<?php	
$servername = "localhost";
$username = "equipe6h15";
$password = "ebola-info";
$dbname = "equipe6h15";
$TableName = "Enseignants";

mysql_connect($servername, $username, $password) or
die("Impossible de se connecter : " . mysql_error());
mysql_select_db($dbname);

$result = mysql_query("SELECT * FROM $TableName");

while ($row = mysql_fetch_array($result, MYSQL_NUM))
{
   printf("ID : %s  Prenom : %s  Nom : %s", $row[0], $row[1], $row[2]);
   printf("<br>");
}

mysql_free_result($result);
mysql_close();
?>
<br/>
<form name="registration_form" method="post" enctype="multipart/form-data">
	Prénom: <input type='text' name='Prenom' id='Prenom' />
	Nom: <input type='text' name='Nom' id='Nom' />
	Usager: <input type='text' name='Usager' id='Usager' />
	Mot de passe: <input type="password"name="MotDePasse" id="MotDePasse"/>
	Confirmer mot de passe: <input type="password" name="ConfirmMDP" id="ConfirmMDP" />
	
	<input type="button" 
		   value="Créer nouvel enseignant" 
		   onclick="return regformhash(this.form,
						   this.form.Prenom,
						   this.form.Nom,
						   this.form.Usager,
						   this.form.MotDePasse,
						   this.form.ConfirmMDP);" /> 
</form>
