<?php
$OldDir = $_SERVER['DOCUMENT_ROOT'] . "/projet/h2015/equipe6/Images/" . $_POST["NomDossierAncien"];
$NewDir = $_SERVER['DOCUMENT_ROOT'] . "/projet/h2015/equipe6/Images/" . $_POST["NomDossierNouveau"];
rename($OldDir, $NewDir);
?>
