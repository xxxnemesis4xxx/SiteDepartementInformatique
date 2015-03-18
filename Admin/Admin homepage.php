<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/projet/h2015/equipe6/Connexion/db_connect.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/projet/h2015/equipe6/Connexion/functions.php';
 
sec_session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  	<head>
    	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    	<title>Admin</title>
		<style>
			a {
				padding-left : 20px;
				font-size : 20px;
			}
		</style>
  	</head>
  	<body>
        <?php if (login_check($mysqli) == true && isset($_SESSION['DroitsEnseignant']) && $_SESSION['DroitsEnseignant'] == "Tout les droits") : ?>
		
			<ul>
			<?php
				$root = $_SERVER['DOCUMENT_ROOT'];
				$ip = $_SERVER['SERVER_NAME'];
				$default = "/projet/h2015/equipe6";
				$AdminPagesFolder = "/Admin/Admin pages";
				$FinalAdminPagesFolder = "$root$default$AdminPagesFolder";
				foreach (new DirectoryIterator($FinalAdminPagesFolder) as $fileInfo)
				{
					if ($fileInfo != "." && $fileInfo != "..") {
						echo "<li><a href=\"http://" . $ip.$default.$AdminPagesFolder . "/" . $fileInfo ."\">" . explode(".",$fileInfo)[0]. "</a></li>";
					}
				}
			?>
			</ul>
        <?php else : ?>
            <p>
                <span class="error">Vous n'avez pas le droit d'accéder à cette Page!</span> Vous devez vous <a href="http://205.236.12.52/projet/h2015/equipe6/Connexion/index.php">connecter</a>.
            </p>
        <?php endif; ?>
	</body>
</html>

