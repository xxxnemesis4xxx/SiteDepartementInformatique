<?php
if (isset($_POST['action'])) {
	switch ($_POST['action']) {
		case 'Ajouter Registre' :
			newIndexElement(databaseConnection());
			exit;
		case 'Modifier Registre' :
			modifierIndexElement(databaseConnection());
			exit;
		case 'Supprimer Registre' :
			supprimerIndexElement(databaseConnection());
			exit;
	}
}

function databaseConnection() {
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
	
	return $conn;
}

function newIndexElement($conn) {
	$fichier = filter_input(INPUT_POST, 'fichier', FILTER_SANITIZE_STRING);
	$colspan = $_POST['colspan'];
	$rowspan = $_POST['rowspan'];
	$position = $_POST['position'];
	$lastcols = ($_POST['lastcols'] == 'true'?1:0);
	
	
	if (filter_var($colspan,FILTER_VALIDATE_INT) and filter_var($rowspan,FILTER_VALIDATE_INT) and
		filter_var($position,FILTER_VALIDATE_INT) and (filter_var($lastcols, FILTER_VALIDATE_INT) or filter_var($lastcols, FILTER_VALIDATE_INT) === 0)) {
			$insert_stmt = $conn->prepare("INSERT INTO displaymenu (nomFichier,colspan,rowspan,position,lastCols) VALUES (?,?,?,?,?)");
			$insert_stmt->bind_param('siiii',$fichier,$colspan,$rowspan,$position,$lastcols);
			$insert_stmt->execute();
	}
	
	$conn->close();
}

function modifierIndexElement($conn) {
	$fichierId = $_POST['itemid'];
	$fichier = filter_input(INPUT_POST, 'fichier', FILTER_SANITIZE_STRING);
	$colspan = $_POST['colspan'];
	$rowspan = $_POST['rowspan'];
	$position = $_POST['position'];
	$lastcols = ($_POST['lastcols'] == 'true'?1:0);
	
	
	if (filter_var($fichierId,FILTER_VALIDATE_INT) and filter_var($colspan,FILTER_VALIDATE_INT) and filter_var($rowspan,FILTER_VALIDATE_INT) and
		filter_var($position,FILTER_VALIDATE_INT) and (filter_var($lastcols, FILTER_VALIDATE_INT) or filter_var($lastcols, FILTER_VALIDATE_INT) === 0)) {
			$insert_stmt = $conn->prepare("UPDATE displaymenu SET nomFichier = ?, colspan = ?, rowspan = ?, position = ?, lastCols = ? where itemId = ?");
			$insert_stmt->bind_param('siiiii',$fichier,$colspan,$rowspan,$position,$lastcols,$fichierId);
			$insert_stmt->execute();
	}
	
	$conn->close();
}

function supprimerIndexElement($conn) {
	$fichierId = $_POST['itemid'];
	
	if (filter_var($fichierId,FILTER_VALIDATE_INT)) {
			$insert_stmt = $conn->prepare("DELETE FROM displaymenu where itemId = ?");
			$insert_stmt->bind_param('i',$fichierId);
			$insert_stmt->execute();
	}
	
	$conn->close();
}
?>