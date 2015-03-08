<html>
	<head>
		 <?php include("defaultinclude.txt"); ?>
		 <title>Accueil</title>
		 <link rel="stylesheet" href="css/index.css">
		 <script src="javascript/jquery-1.11.2.min.js"></script>
		 <script src="javascript/unslider.min.js"></script>
		
		 
		 <script>
		 	$(function() {
			    $('.slider').unslider();
			});
		 </script>
	</head>
	
	<body>
		<?php include("header.txt"); ?>
		
		<table class="indexTable">
		
		<?php
			$servername = "localhost";
			$username = "root";
			$password = "admin123*";
			$dbname = "departementinformatique";
			
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
					echo "<td colspan='" . $current["colspan"] . "' rowspan='" . $current["rowspan"]  . "'>";
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
		<!--
			<tr>
				<td>
					<?php include("pub.txt") ?>
				</td>
				<td colspan="3">
					<?php include("slider.txt") ?>
				</td>
				<td>
					<?php include("pub2.txt") ?>
				</td>
			</tr>
			<tr>
				<td rowspan="2">
					<?php include("enseignant.txt") ?>
				</td>
				<td>
					<?php include("pdea.txt") ?>
				</td>
				<td>
					<?php include("diplome.txt")?>
				</td>
				<td colspan="2">
					<?php include("foireemploi.txt") ?>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<?php include("video.txt") ?>
				</td>
				<td>
					<?php include("rally.txt") ?>
				</td>
				<td>	
					<?php include("evenement.txt") ?>
				</td>
			</tr>
		-->
		</table>
		
		
		<?php include("footer.txt"); ?>
	</body>
</html>