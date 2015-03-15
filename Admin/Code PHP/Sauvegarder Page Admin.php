<?php
	$root = $_SERVER['DOCUMENT_ROOT'] . "/projet/h2015/equipe6";
	$AdminPagesFolder = "/Admin/Admin pages/" . $_POST["NomPageAdmin"];
	$FinalFolder = "$root$AdminPagesFolder";
	file_put_contents($FinalFolder, html_entity_decode($_POST["ContenuPageAdmin"]));
	include $FinalFolder;
?>
