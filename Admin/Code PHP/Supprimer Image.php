<?php
unlink($_SERVER['DOCUMENT_ROOT'] . "/projet/h2015/equipe6/Images/" . $_POST["NomDossier"] . "/" . $_POST["NomImage"]);
unlink($_SERVER['DOCUMENT_ROOT'] . "/projet/h2015/equipe6/Images/" . $_POST["NomDossier"] . "/mini/" . $_POST["NomImage"]);
?>
