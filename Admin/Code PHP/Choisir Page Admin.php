<?php
	$root = $_SERVER['DOCUMENT_ROOT'] . "/projet/h2015/equipe6";
	$AdminPagesFolder = "/Admin/Admin pages/" . $_POST["NomPageAdmin"];
	$FinalFolder = "$root$AdminPagesFolder";
	echo file_get_contents($FinalFolder);
?>
