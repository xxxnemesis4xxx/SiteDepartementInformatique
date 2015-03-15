<html>
<head>
	<title>Update Page d'accueil</title>
	
	<script>
			function showDiv() {
				var selectBox = document.getElementById('ChoixOptions');
				var divId = selectBox.options[selectBox.selectedIndex].value;
				
				for(i = 0; i < selectBox.length; i++)
				{
					document.getElementById(selectBox.options[i].value).style.display = "none";
				}
				
				document.getElementById(divId).style.display = "block";
			}
	</script>
</head>
<body>
		<table class="indexTable">
		<?php
			$state = 0;
			$servername = "localhost";
			$username = "equipe6h15";
			$password = "ebola-info";
			$dbname = "equipe6h15";
			
			// Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);
			// Check connection
			if ($conn->connect_error) {
					die("Erreur de connection: " . $conn->connect_error);
			} 
			
			$sql = "select * from displaymenu order by position;";
			$result = $conn->query($sql);
			
			if ($result->num_rows > 0) {
				echo "<tr><td>Item ID</td><td>Nom du Fichier</td><td>Colspan</td><td>Rowspan</td><td>Position Affichage</td><td>Dernier column de la Ligne</td></tr>";
				while ($current = $result->fetch_assoc()) {
					echo "<tr>";
					echo "<td>" . $current["itemId"] . "</td><td>" .  $current["nomFichier"] . "</td><td>" . $current["colspan"] . "</td><td>" .
					$current["rowspan"] . "</td><td>" . $current["position"] . "</td><td>" . $current["lastCols"] . "</td>";  
				}
			}
			
			$conn->close();
		?>
		</table>
		
		<select style="display: block;width:200px;" id="ChoixOptions" size="5" onchange='showDiv()'>
			<option value='1'>Ajouter un registre</option>
			<option value='2'>Modifier un registre</option>
			<option value='3'>Supprimer un registre</option>
			<option value='4'>Ajouter un fichier</option>
			<option value='5'>Modifier un fichier</option>
			<option value='6'>Supprimer un fichier</option>
		</select>
		
		<div id="1" style="display:none">
			Hello 1
		</div>
		<div id="2" style="display:none">
			Hello 2
		</div>
		<div id="3" style="display:none">
			Hello 3
		</div>
		<div id="4" style="display:none">
			Hello 4
		</div>
		<div id="5" style="display:none">
			Hello 5
		</div>
		<div id="6" style="display:none">
			Hello 6
		</div>
		
</body>
</html>