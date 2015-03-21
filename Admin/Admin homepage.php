<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/projet/h2015/equipe6/Connexion/db_connect.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/projet/h2015/equipe6/Connexion/functions.php';
 
sec_session_start(true);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  	<head>
    	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<script src="http://205.236.12.52/projet/h2015/equipe6/javascript/jquery-1.11.2.min.js"></script>
		<script src="http://205.236.12.52/projet/h2015/equipe6/javascript/jquery-ui.min.js"></script>
		<link rel="stylesheet" href="http://205.236.12.52/projet/h2015/equipe6/javascript/jquery-ui.min.css">
		<link rel="stylesheet" href="http://205.236.12.52/projet/h2015/equipe6/javascript/jquery-ui.theme.min.css">
    	<title>Admin</title>
  	</head>
  	<body>
		
        <?php if (login_check($mysqli) == true && isset($_SESSION['DroitsEnseignant']) && $_SESSION['DroitsEnseignant'] == "Tout les droits") : ?>
		<link rel="stylesheet" type="text/css" href="CSS/Tab.css">
		<?php
			$root = $_SERVER['DOCUMENT_ROOT'] . "/projet/h2015/equipe6";
			$AdminPagesFolder = "/Admin Old/Admin pages";
			$FinalAdminPagesFolder = "$root$AdminPagesFolder";
			$ArrayAdminPage = array();
			foreach (new DirectoryIterator($FinalAdminPagesFolder) as $fileInfo)
			{
				if ($fileInfo->IsDir() || $fileInfo == "adminfunctions.php")
					continue;
				$Extension = "." . $fileInfo->getExtension();
		
				switch($Extension)
				{
				   case ".html":
				   case ".php":
						$FileName = $fileInfo->getBasename($Extension);
						array_push($ArrayAdminPage, array($FileName, $Extension));
					  break;
				}
			}
		?>
		
		<ul id="AdminContent" class="tabs">	
		</ul>
		
		<script type="text/javascript" src="Javascript/Init Tab.js"></script>
		<script type="text/javascript" src="Javascript/Tab.js"></script>
		<?php
			$First = 1;
			foreach ($ArrayAdminPage as $Value)
			{
				echo "<script type='text/javascript'>CreateTab('$Value[0]', '$Value[1]', " . $First . ");</script>\n";
				$First = 0;
			}
		?>
        <?php else : ?>
            <p>
                <span class="error">Vous n'avez pas le droit d'accéder à cette Page!</span> Vous devez vous <a href="http://205.236.12.52/projet/h2015/equipe6/Connexion/index.php">connecter</a>.
            </p>
        <?php endif; ?>
	</body>
</html>

