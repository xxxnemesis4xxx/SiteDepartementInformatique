<header>
	<?php
		error_reporting(0);
		include_once $_SERVER['DOCUMENT_ROOT'] . '/projet/h2015/equipe6/Connexion/db_connect.php';
		include_once $_SERVER['DOCUMENT_ROOT'] . '/projet/h2015/equipe6/Connexion/functions.php';
		 
		sec_session_start();
	?>
	<div id="titre_logo">
		<a href="http://cll.qc.ca" target="_blank"><img src="http://205.236.12.52/projet/h2015/equipe6/Images/logoLevis.png" alt="Cégep Lévis-Lauzon" /></a>
	</div>
	<div id="titre_principal">
		<h1>Techniques de l'informatique </h1>
	</div>
	<div class="menu">
		<ul>
			<li><a href="#1">
				<span>Accès Rapides</span>
			</a>
				<ul class="menuderoulant">
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