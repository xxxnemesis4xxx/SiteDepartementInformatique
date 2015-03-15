<html>
<head>
	<title>Update Page d'accueil</title>
</head>
<body>
		<table class="indexTable">
		<?php
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
</body>
</html>