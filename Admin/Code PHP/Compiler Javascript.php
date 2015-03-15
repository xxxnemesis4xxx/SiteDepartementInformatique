<?php
	if ($_POST["Chemin"] != null)
		echo html_entity_decode(file_get_contents($_POST["Chemin"]));
?>
