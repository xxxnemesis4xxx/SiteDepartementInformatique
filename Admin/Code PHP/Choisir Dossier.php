<?php
	$root = $_SERVER['DOCUMENT_ROOT'] . "/projet/h2015/equipe6";
	$AdminPagesFolder = "/Images/" . $_POST["NomDossier"];
	$FinalFolder = "$root$AdminPagesFolder";
	$ArrayAdminPage = array();
	foreach (new DirectoryIterator($FinalFolder) as $fileInfo)
	{
		if ($fileInfo->IsDir() || $fileInfo->isDot())
			continue;

		$FileName = $fileInfo->getBasename();
		echo "$FileName;";
	}
?>
