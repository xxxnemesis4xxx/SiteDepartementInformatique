<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/projet/h2015/equipe6/Connexion/db_connect.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/projet/h2015/equipe6/Connexion/functions.php';
 
sec_session_start();
?>
<?php if (login_check($mysqli) == true && isset($_SESSION['DroitsEnseignant']) && $_SESSION['DroitsEnseignant'] == "Tout les droits") : ?>
<script type="text/javascript" src="Javascript/Enseignant.js"></script>
<script type="text/javascript" src="/projet/h2015/equipe6/Connexion/Javascript/sha512.js"></script>
<table id="TableEnseignants" style="width:100%">
	<tr>
		<th>
			Droits
		</th>
		<th>
			Prenom
		</th>
		<th>
			Nom
		</th>
		<th>
			Usager
		</th>
		<th>
			Supprimer
		</th>
	</tr>
	<?php	
	$servername = "localhost";
	$username = "equipe6h15";
	$password = "ebola-info";
	$dbname = "equipe6h15";

	mysql_connect($servername, $username, $password) or
	die("Impossible de se connecter : " . mysql_error());
	mysql_select_db($dbname);

	$result = mysql_query("SELECT D.NomDroit, E.Prenom, E.Nom, E.Usager, E.ID FROM Enseignants E JOIN Droits D ON E.IDDroits = D.ID");

	while ($row = mysql_fetch_array($result, MYSQL_NUM))
	{
		printf("<tr>");
		printf("<td>%s</td><td>%s</td><td>%s</td><td>%s</td><td><input type='button' value='Supprimer' onclick='SupprimerEnseignant(this, %s)'></td>", $row[0], $row[1], $row[2], $row[3], $row[4]);
		printf("</tr>");
	}

	mysql_free_result($result);
	mysql_close();
	?>
</table>
<br/>
<form name="registration_form" method="post" enctype="multipart/form-data">
	Prénom: <input type='text' name='Prenom' id='Prenom' />
	Nom: <input type='text' name='Nom' id='Nom' />
	Usager: <input type='text' name='Usager' id='Usager' />
	Mot de passe: <input type="password"name="MotDePasse" id="MotDePasse"/>
	Confirmer mot de passe: <input type="password" name="ConfirmMDP" id="ConfirmMDP" />
	
	<input type="button" 
		   value="Créer nouvel enseignant" 
		   onclick="return ConfirmerEnregistrement(this.form,
						   this.form.Prenom,
						   this.form.Nom,
						   this.form.Usager,
						   this.form.MotDePasse,
						   this.form.ConfirmMDP);" /> 
</form>

<script type="text/javascript" src="Javascript/Init Enseignant.js"></script>
<?php else : ?>
            <p>
                <span class="error">Vous n'avez pas le droit d'accéder à cette Page!</span> Vous devez vous <a href="http://205.236.12.52/projet/h2015/equipe6/Connexion/index.php">connecter</a>.
            </p>
        <?php endif; ?>