<html>
	<head>
		<?php
			header('Content-Type: text/html; charset=utf-8');
			setlocale(LC_ALL, 'fr_CA');
		?>	
		<title>Template</title>
		<link rel="stylesheet" href="css/templatePage.css">
		<script type="text/javascript" script-name="wire-one" src="http://use.edgefonts.net/wire-one.js"></script>
	</head>
	</body>
		<header>
			<div id="titre_logo">
				<a href="http://cll.qc.ca" target="_blank"><img src="images/logoLevis.png" alt="Cégep Lévis-Lauzon" /></a>
			</div>
			<div id="titre_principal">
				<h1>Techniques de l'informatique </h1>
			</div>
			<div id="titre_menu">
				<ul>
					<li><a href="#1">
						<span>Accès Rapides</span>
					</a>
						<ul class="menuderoulant">
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
							
							$sql = "SELECT * from lienmenuderoulant;";
							$result = $conn->query($sql);
				
							if ($result->num_rows > 0) {
								// output data of each row
								while($row = $result->fetch_assoc()) {
								    echo "<li><a href='". $row["lien"] . "' ><span>" . utf8_encode($row["nomLien"]) . "</span></a></li>";
								}
							} else {
									echo "0 results";
							}
				
				
							$conn->close();
						?>
						</ul>
					</li>
				</ul>
			</div>
		</header>
	</body>
</html>
