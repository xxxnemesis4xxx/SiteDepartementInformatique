<?php
	$dir = $_POST["NomDossier"];
	mkdir($_SERVER['DOCUMENT_ROOT'] . "/projet/h2015/equipe6/Images/" . $dir);
	mkdir($_SERVER['DOCUMENT_ROOT'] . "/projet/h2015/equipe6/Images/" . $dir . "/mini");
?>
