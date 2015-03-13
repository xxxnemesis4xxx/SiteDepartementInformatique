<html>
	<head>
	 	<?php
	 		include("defaultinclude.php"); 
	 	?>
	 	<title>
	 		Enseignants
	 	</title>
	</head>
	<body>
		<?php
			include("header.php");
			include("verticalmenu.php");
		?>
		
		<div class="contenu">
		<table class="dimensionTable">
			<tr>
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
					
					$sql = "select * from enseignants order by renderPosition;";
					$result = $conn->query($sql);
					
					if ($result->num_rows > 0) {
						$Count = 0;
						while ($current = $result->fetch_assoc()) {
							echo "<td width=\"25%\">";
							echo "<div class=\"nomEnseignant\">" . utf8_encode($current["nom"])  . "</div>";
							echo "<a href=\"" . $current["pathFile"] . "\">";
							echo "<img height=\"166\" width=\"170\" src=\"" . $current["pathPicture"]   . "\" alt=\"Photo profile\" align=\"middle\">";
							echo "</a></td>";
							$Count++;
							
							if ($Count == 4) {
								echo "</tr><tr>";
								$Count = 0;
							}
						}
					}
					
					$conn->close();
				?>
			</tr>
		</table>
		</div>
		
		<div class="contentFix"></div>
		
		<?php 
			include("footer.php");
		?>
	</body>
</html>
