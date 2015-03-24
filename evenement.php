<html>
	<head>
	 	<?php
	 		include("defaultinclude.php"); 
	 	?>
	 	<title>
	 		Événements
	 	</title>
	</head>
	<body>
		<?php
			include("header.php");
			include("verticalmenu.php");
		?>
			<div class="contenu">
				<h1 class="titreTemplate">Les Événements </h1>
				<style>
					#paypal1 {
					  display: block;
					  padding-left: 9%;
					  margin-top: -50;
					}
				</style>
				<?php
					$servername = "localhost";
					$username = "equipe6h15";
					$password = "ebola-info";
					$dbname = "equipe6h15";
					$TableName = "Activites";
					
					// Create connection
					$conn = new mysqli($servername, $username, $password, $dbname);
					// Check connection
					if ($conn->connect_error) {
							die("Erreur de connection: " . $conn->connect_error);
					} 
					
					$sql = "select * from Activites";
					$result = $conn->query($sql);
				
					if ($result->num_rows > 0)
					{
						while($current = $result->fetch_assoc()) {
							echo "<h2 class=\"sousTitre\">" . $current['Nom'] . "</h2>";
							if ($current["Prix"] > 0)
							{
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
							/*
							echo "<div id=\"paypal1\">" 
							.   "<script async=\"async\" src=\"https://www.paypalobjects.com/js/external/paypal-button.min.js?merchant=Wargamer3@hotmail.com\"" 
							.	"data-button=\"buynow\"" 
							.	"data-name=\"Cegep\"" 
							.	"data-quantity=\"1\"" 
							.	"data-amount=\"100\"" 
							.	"data-currency=\"USD\"" 
							.	"data-shipping=\"0\"" 
							.	"data-tax=\"0\"" 
							.	"data-callback=\"http://205.236.12.52/projet/h2015/equipe6/evenement.php\"" 
							.	"data-env=\"sandbox\""
							.	"data-country=\"ca-fr\""
							.	"></script>"
							. "</div>";
							*/
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
