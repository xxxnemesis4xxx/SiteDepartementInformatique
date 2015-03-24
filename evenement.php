<html>
	<head>
	 	<?php
	 		include("defaultinclude.php"); 
	 	?>
	 	<title>
	 		Événements
	 	</title>
		<style>
					#paypal1 {
					  display: block;
					  padding-left: 9%;
					  margin-top: -50;
					}
		</style>
	</head>
	<body>
		<?php
			include("header.php");
			include("verticalmenu.php");
		?>
			<div class="contenu">
				<h1 class="titreTemplate">Les Événements </h1>
				
				<?php
					$servername = "localhost";
					$username = "equipe6h15";
					$password = "ebola-info";
					$dbname = "equipe6h15";
					date_default_timezone_set('America/New_York');
					$currentDate = date('Y-m-d');
					
					// Create connection
					$conn = new mysqli($servername, $username, $password, $dbname);
					// Check connection
					if ($conn->connect_error) {
							die("Erreur de connection: " . $conn->connect_error);
					} 
					
					//Select Activites where current date is inferior 
					$sql = "select * from Activites where Date >= '" . $currentDate. "'";
					$result = $conn->query($sql);
				
					if ($result->num_rows > 0)
					{
						//Fetch results
						while($current = $result->fetch_assoc()) {
							//Display Activites Name + Paypal button. 
							echo "<h2 class=\"sousTitre\">" . $current['Nom'] . "</h2>";
							if ($current["Prix"] > 0) {
								echo '<div id="paypal1">';
								echo '<script async="async" src="https://www.paypalobjects.com/js/external/paypal-button.min.js?merchant=somerandomassemail@stuff.com" ';
										echo 'data-button="buynow" ';
										echo 'data-name="' . $current["Nom"] . '"';
										echo 'data-quantity="1" ';
										echo 'data-amount="' . $current["Prix"] . '"';
										echo 'data-currency="USD" ';
										echo 'data-shipping="0" ';
										echo 'data-tax="0" ';
										echo 'data-tamere="0" ';
										echo 'data-callback="http://205.236.12.52/projet/h2015/equipe6/Inscription.php" ';
										echo 'data-custom="' . $current["ID"] . '"';
										echo 'data-env="sandbox"';
									echo '></script>';
								echo '</div>';
							}
							
							//Display Participants currently subcribed to the Activity
							$sql2 = "SELECT * FROM ParticipantsActivite P JOIN Activites A ON A.id = P.ActiviteId WHERE A.id = " . $current["ID"];
							$result2 = $conn->query($sql2);
							if ($result2->num_rows > 0) {
								echo "<p class=\"textTemplate\">";
								while($participant = $result2->fetch_assoc()) {
									printf("   - %s  %s  %s<br/>", $participant["DateInscription"], $participant["Prenom"], $participant["Nom"]);
								}
								echo "</p>";
							}
						}
					}
					$conn->close();
				?>
			</div>
			<div class="contentFix"></div>
		<?php 
			include("footer.php");
		?>
	</body>
</html>
