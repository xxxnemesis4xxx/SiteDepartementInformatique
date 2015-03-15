<style>
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
table {
    margin-bottom: 20px;
}
th, td {
    padding: 5px;
    text-align: left;
}
</style>
<div id='ContainerActivite'>
	<?php
	$servername = "localhost";
	$username = "equipe6h15";
	$password = "ebola-info";
	$dbname = "equipe6h15";
	$TableName = "Activites";

	mysql_connect($servername, $username, $password) or
	die("Impossible de se connecter : " . mysql_error());
	mysql_select_db($dbname);

	$RequeteNombreActivites = mysql_query("SELECT * FROM $TableName");

	while ($row = mysql_fetch_array($RequeteNombreActivites, MYSQL_NUM))
	{
		$ActiviteId = $row[0];
		$Participants = mysql_query("SELECT * FROM $TableName A JOIN ParticipantsActivite P ON A.id = P.ActiviteId WHERE A.id = $ActiviteId");

		echo '<table style="width:100%">';
	  	echo '<caption style="text-align: left">';
	   	printf("Nom : %s  Date : %s  Prix d'inscription : %s   ", $row[1], $row[2], $row[3] == 0 ? "Gratuit" : $row[3] . "$");
		echo '<input type="button" value="Supprimer" onclick="DeleteActivite(this, ' . $row[0] . ')">';
	  	echo '</caption>';

		echo "<tr>";
		echo "<th>";
		echo "Prenom";
		echo "</th>";
		echo "<th>";
		echo "Nom";
		echo "</th>";
		echo "<th>";
		echo "Date inscription";
		echo "</th>";
		echo "<th>";
		echo "Status";
		echo "</th>";
		echo "</tr>";

		while ($row = mysql_fetch_array($Participants, MYSQL_NUM))
		{
			printf("<tr>");
		   	printf("<td>%s</td><td>%s</td><td>%s</td>", $row[4], $row[5], $row[6]);
			printf("</tr>");
		}

		echo '</table>';
		mysql_free_result($Participants);
	}
	mysql_free_result($RequeteNombreActivites);

	mysql_close();
	?>
</div>
<script type="text/javascript" src="Javascript/Create Activite.js"></script>
<br />
<br />
<form  method="post" enctype="multipart/form-data">
Ajouter nouvelle activité
<br />
Nom activité:  	<input type='text' id='ActiviteNom'>
Date activité:  <input type='text' id='ActiviteDate'>
Prix activité:  <input type='text' id='ActivitePrix'>
Limite de personnes:  <input type='text' id='ActiviteLimite'>
                <input type='button' value='Envoyer' onclick="CreateActivite()">

</form>
<script type="text/javascript" src="Javascript/Init Activite.js"></script>
