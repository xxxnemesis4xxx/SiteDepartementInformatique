<html>
	<head>
		 <?php include("defaultinclude.php"); ?>
		 <title>Accueil</title>
		 <link rel="stylesheet" href="css/index.css">
		
	</head>
	
	<body>
		<?php include("header.txt"); ?>
		
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
				$firstValue = true;
				$current = $result->fetch_assoc();
				while ($current != null) {
					$nextValue = $result->fetch_assoc();
					if ($firstValue == true) {
						echo "<tr>";
						$firstValue = false;
					}
					echo "<td colspan='" . $current["colspan"] . "' rowspan='" . $current["rowspan"]  . "'" . (($current["backgroundColor"] == false)?"style='background-color:transparent'":"") .">";
					include ($current["nomFichier"]);
					echo "</td>";
					if ($current["lastCols"] == true and $nextValue != null) {
						echo "</tr><tr>";
					}
					if ($current != null and $nextValue == null) {
						echo "</tr>";
					}
					
					$current = $nextValue;
				}
			}
			
			$conn->close();
		?>
		</table>
		
		
		<?php include("footer.php"); ?>
	</body>
</html>