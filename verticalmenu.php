<ul class="vertical_menu">
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
		
		$sql = "select * from verticalmenu order by renderHtmlPosition, layer,position;";
		$result = $conn->query($sql);
	
		if ($result->num_rows > 0) {
			$current = $result->fetch_assoc();
			while($current != null) {
				$next = $result->fetch_assoc();
				if ($current["layer"] ==  $next["layer"]) {
					echo "<li><a href='". $current["lien"] . "' " 
					. (($current["openNewPage"] == true)?"target='_blank' ":"") 
					. "style='border-left : 5px solid #" . $current["htmlCouleur"] 
					. "'><span>" . utf8_encode($current["nomLien"]) . "</span></a></li>";
				} elseif ($current["layer"] < $next["layer"]) {
					echo "<li><a href='". $current["lien"] . "' " 
					. (($current["openNewPage"] == true)?"target='_blank' ":"") 
					. "style='border-left : 5px solid #" . $current["htmlCouleur"] 
					. "'><span>" . utf8_encode($current["nomLien"]) . "</span></a><ul>";
				} elseif ($current["layer"] > $next["layer"]) {
					echo "<li><a href='". $current["lien"] . "' " 
					. (($current["openNewPage"] == true)?"target='_blank' ":"") 
					. "style='border-left : 5px solid #" . $current["htmlCouleur"] 
					. "'><span>" . utf8_encode($current["nomLien"]) 
					. (($current["layer"] - $next["layer"] == 1)?"</span></a></li></ul></li>":"</span></a></li></ul></li></ul></li>");
				}
						
				$current = $next;
			}
		}
		
		$conn->close();
	?>
</ul>