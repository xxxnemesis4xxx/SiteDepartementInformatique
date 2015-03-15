<?php
	$root = $_SERVER['DOCUMENT_ROOT'] . "/projet/h2015/equipe6";
	$AdminPagesFolder = "/Admin/Admin pages/" . $_POST["NomPageAdmin"] . $_POST["Extension"] ;
	$FinalFolder = "$root$AdminPagesFolder";
	include $FinalFolder;
?>
