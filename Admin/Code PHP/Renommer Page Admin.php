<?php
$OldDir = $_SERVER['DOCUMENT_ROOT'] . "/projet/h2015/equipe6/Admin/Admin pages/" . $_POST["NomPageAdminAncien"];
$NewDir = $_SERVER['DOCUMENT_ROOT'] . "/projet/h2015/equipe6/Admin/Admin pages/" . $_POST["NomPageAdminNouveau"];
rename($OldDir, $NewDir);
?>
