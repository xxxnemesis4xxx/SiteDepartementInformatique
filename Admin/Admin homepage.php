<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/projet/h2015/equipe6/Connexion/db_connect.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/projet/h2015/equipe6/Connexion/functions.php';
 
sec_session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  	<head>
    	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    	<title>Apache2 Ubuntu Default Page: It works</title>
  	</head>
  	<body>
		
        <?php if (login_check($mysqli) == true && isset($_SESSION['DroitsEnseignant']) && $_SESSION['DroitsEnseignant'] == "Tout les droits") : ?>
		<link rel="stylesheet" type="text/css" href="CSS/Tab.css">
		
		<div id="AdminTabs" class="Tabs">
			<?php
				$root = $_SERVER['DOCUMENT_ROOT'] . "/projet/h2015/equipe6";
				$AdminPagesFolder = "/Admin/Admin pages";
				$FinalAdminPagesFolder = "$root$AdminPagesFolder";
				$ArrayAdminPage = array();
				foreach (new DirectoryIterator($FinalAdminPagesFolder) as $fileInfo)
				{
					if ($fileInfo->IsDir())
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
		</div>
		<div id="AdminContent" class="Content">
		</div>
		
		<script type="text/javascript" src="Javascript/Init Tab.js"></script>
		<script type="text/javascript" src="Javascript/Tab.js"></script>
		<?php
			foreach ($ArrayAdminPage as $Value) {
				echo "<script type='text/javascript'>CreateTab('$Value[0]', '$Value[1]');</script>\n";
			}
		?>
		<script type="text/javascript">
		var anc_onglet = 'Empty';
		ChangeTab(anc_onglet);
		</script>
        <?php else : ?>
            <p>
                <span class="error">You are not authorized to access this page.</span> Please <a href="index.php">login</a>.
            </p>
        <?php endif; ?>
	</body>
</html>

