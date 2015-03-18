<html>
	<?php
				header('Content-Type: text/html; charset=utf-8');
				setlocale(LC_ALL, 'fr_CA');
	?>
	<head>
		<title>Modifier Contenu</title>
		<script src="http://205.236.12.52/projet/h2015/equipe6/javascript/jquery-1.11.2.min.js"></script>
	</head>
	<body>
		<p>Voici la liste des fichier que vous pouvez modifier : <br/>
		<b><i>
		<table>
			<?php
				$directory = "../../";

				//get all image files with a .txt extension.
				$file= glob($directory . "*.php");

				//print each file name
				foreach($file as $filew) {
					if (substr($filew,6,strlen($filew)) != "Afficher page enseignant.php" and substr($filew,6,strlen($filew)) != "TemplateWithIncludes.php" and
					substr($filew,6,strlen($filew)) != "defaultinclude.php" and substr($filew,6,strlen($filew)) != "footer.php" and substr($filew,6,strlen($filew)) != "header.php"
					and substr($filew,6,strlen($filew)) != "templatePage.php" and substr($filew,6,strlen($filew)) != "verticalmenu.php") {
						echo "<tr><td>" . substr($filew,6,strlen($filew)) . "</td></tr>";
					}
				}
			?>
		</table>
		</b></i>
	</body>
</html>