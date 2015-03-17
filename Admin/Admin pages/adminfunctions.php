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
		case 'Ajouter Fichier' :
			nouvFichier();
			exit;
		case 'Supprimer Fichier' :
			suppFichier();
			exit;
		case 'Obtenir Fichier' :
			exit(obtFichier());
		case 'Modifier Fichier' :
			modFichier();
			exit;
		case 'Ajouter Lien' :
			ajouterLien(databaseConnection());
			exit;
		case 'Supprimer Lien' :
			supprimerLien(databaseConnection());
			exit;
		case 'Obtenir Lien Information' :
			exit(obtLienInformation(databaseConnection()));
		case 'Modifier Lien' :
			modifierLien(databaseConnection());
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


function nouvFichier() {
	$fichier = "../../" . filter_input(INPUT_POST, 'fichier', FILTER_SANITIZE_STRING);

	if ($fp = fopen($fichier,"w+")) {
		fwrite($fp,"<style>\n   .default {\n   width: 100%\n   max-height : 100%;\n}\n</style>\n\n <a href...>\n   <img ... >\n </a>");
		fclose($fp);
	}
}

function suppFichier() {
	$fichier = "../../" . filter_input(INPUT_POST, 'fichier', FILTER_SANITIZE_STRING);
	unlink($fichier);
}

function obtFichier() {
	$fichier = "../../" . filter_input(INPUT_POST, 'fichier', FILTER_SANITIZE_STRING);
	$content = file_get_contents($fichier);
	
	return $content;
}

function modFichier() {
	$fichier = "../../" . filter_input(INPUT_POST, 'fichier', FILTER_SANITIZE_STRING);
	$content = $_POST['content'];
	if ($fp = fopen($fichier,"w+")) {
		fwrite($fp,$content);
		fclose($fp);
	}
}

function ajouterLien($conn) {
	$nomlien = $_POST['nomlien'];
	$lien = $_POST['lien'];
	$position = $_POST['position'];
	$maxPosition = 1;
	
	$sql = "select max(renderHtmlPosition) as max from lienmenuderoulant";
	$result = $conn->query($sql);
	
	if ($result->num_rows > 0) {
		$value = $result->fetch_assoc();
		$maxPosition = $value['max'];
	}
	
	if ($position <= $maxPosition) {
		for ($i = $maxPosition; $position <= $i; $i--) {
			$insert_stmt = $conn->prepare("UPDATE lienmenuderoulant set renderHtmlPosition = ? where renderHtmlPosition = ?");
			$newval = $i + 1;
			$insert_stmt->bind_param('ii', $newval, $i);
			$insert_stmt->execute();
		}
	}
	
	$insert_stmt = $conn->prepare("INSERT INTO lienmenuderoulant (nomLien,lien,renderHtmlPosition) VALUES (?,?,?)");
	$insert_stmt->bind_param('ssi',$nomlien,$lien,$position);
	$insert_stmt->execute();
	
	$conn->close();
}

function supprimerLien($conn) {
	$id = $_POST['idlien'];
	$maxPosition = 1;
	$itemPosition = 0;
	
	$sql = "select max(renderHtmlPosition) as max from lienmenuderoulant";
	$result = $conn->query($sql);
	
	if ($result->num_rows > 0) {
		$value = $result->fetch_assoc();
		$maxPosition = $value['max'];
	}
	
	$insert_stmt = $conn->prepare("select renderHtmlPosition from lienmenuderoulant where menuId = ?");
	$insert_stmt->bind_param('i',$id);
	$insert_stmt->execute();
	$insert_stmt->store_result();
	$result = $insert_stmt->fetch();
	$itemPosition = $result['renderHtmlPosition'];
	
	$insert_stmt = $conn->prepare("DELETE FROM lienmenuderoulant where menuId = ?");
	$insert_stmt->bind_param('i',$id);
	$insert_stmt->execute();

	if ($itemPosition < $maxPosition) {
		for ($i = $itemPosition; $i < $maxPosition; $i++) {
			$insert_stmt = $conn->prepare("UPDATE lienmenuderoulant set renderHtmlPosition = ? where renderHtmlPosition = ?");
			$newval = $i + 1;
			$insert_stmt->bind_param('ii', $i, $newval);
			$insert_stmt->execute();
		}
	}
}

function obtLienInformation($conn) {
	$idlien = $_POST['idlien'];
	
	$insert_stmt = $conn->prepare("select renderHtmlPosition,nomLien,lien from lienmenuderoulant where menuId = ?");
	$insert_stmt->bind_param('i',$idlien);
	$insert_stmt->execute();
	$insert_stmt->bind_result($itemPosition, $itemTitre,$itemLien);
	$result = $insert_stmt->fetch();
	
	$conn->close();
	
	$bus = array();
	$bus['titre'] = utf8_encode($itemTitre);
	$bus['lien'] = utf8_encode($itemLien);
	$bus['position'] = $itemPosition;

	return html_entity_decode(json_encode($bus));
}

function modifierLien($conn) {
	$idlien = $_POST['idlien'];
	$titre = utf8_decode($_POST['titre']);
	$lien = utf8_decode($_POST['lien']);
	$position = $_POST['position'];
	$positionDB = 0;
	$maxPosition = 1;
	
	$insert_stmt = $conn->prepare("select renderHtmlPosition from lienmenuderoulant where menuId = ?");
	$insert_stmt->bind_param('i',$idlien);
	$insert_stmt->execute();
	$insert_stmt->bind_result($positionDB);
	$insert_stmt->fetch();
	
	$conn->close();
	$conn = databaseConnection();
	//Same position - Easy!
	if ($positionDB == $position) {
		$insert_stmt2 = $conn->prepare("update lienmenuderoulant set nomLien = ?, lien = ?  where menuId = ?");
		$insert_stmt2->bind_param('ssi', $titre, $lien, $idlien);
		$insert_stmt2->execute();
	} else {
		//Get the max Position
		$sql = "select max(renderHtmlPosition) as max from lienmenuderoulant";
		$result = $conn->query($sql);
		
		if ($result->num_rows > 0) {
			$value = $result->fetch_assoc();
			$maxPosition = $value['max'];
		}
		//Easy!
		if ($position > $maxPosition) {
			$newposition = $maxPosition + 1;
			$insert_stmt = $conn->prepare("UPDATE lienmenuderoulant SET nomLien = ?, lien = ?, renderHtmlPosition = ? where menuId = ?");
			$insert_stmt->bind_param('ssii', $titre,$lien, $newposition ,$idlien);
			$insert_stmt->execute();
			
			for ($i = $positionDB; $i <= $maxPosition; $i++) {
				$insert_stmt = $conn->prepare("UPDATE lienmenuderoulant set renderHtmlPosition = ? where renderHtmlPosition = ?");
				$newval = $i + 1;
				$insert_stmt->bind_param('ii', $i, $newval);
				$insert_stmt->execute();
			}
		} else {
			//Put current position at the end
			$max = $maxPosition + 1;
			$insert_stmt = $conn->prepare("UPDATE lienmenuderoulant SET renderHtmlPosition = ? where renderHtmlPosition = ?");
			$insert_stmt->bind_param('ii', $max ,$position);
			$insert_stmt->execute();
			
			//Set the new value at the current position
			$insert_stmt = $conn->prepare("UPDATE lienmenuderoulant SET nomLien = ?, lien = ?, renderHtmlPosition = ? where menuId = ?");
			$insert_stmt->bind_param('ssii', $titre,$lien, $position ,$idlien);
			$insert_stmt->execute();
			
			//Value at the end take the position of the value that took his place
			$insert_stmt = $conn->prepare("UPDATE lienmenuderoulant SET renderHtmlPosition = ? where renderHtmlPosition = ?");
			$insert_stmt->bind_param('ii', $positionDB ,$max);
			$insert_stmt->execute();
		}
	}
	$conn->close();
}
?>