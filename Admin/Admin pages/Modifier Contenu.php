<html>
	<?php
				header('Content-Type: text/html; charset=utf-8');
				setlocale(LC_ALL, 'fr_CA');
	?>
	<?php
		include_once $_SERVER['DOCUMENT_ROOT'] . '/projet/h2015/equipe6/Connexion/db_connect.php';
		include_once $_SERVER['DOCUMENT_ROOT'] . '/projet/h2015/equipe6/Connexion/functions.php';

		sec_session_start(false);

		if (login_check($mysqli) == true && isset($_SESSION['DroitsEnseignant']) && $_SESSION['DroitsEnseignant'] == "Tout les droits") : ?>
	<head>
		<title>Modifier Contenu</title>
		<script>
			$(document).ready(function(){
				$('#obtfichierphp').click(function(){
						var method = $(this).val();
						var nomFichier = document.getElementById('nomFichierPhp').value;
						$("#fichierhiddenphp").val(nomFichier);
						var ajaxurl = 'adminfunctions.php',
						data =  {'action': method,'fichier' : nomFichier};
						$.post(ajaxurl, data, function (response) {
							$("#modTextPHP").text(response);
						});
					});

				$('#sauvmodphp').click(function(){
					var method = 'Modifier Fichier';
					var nomFichier = document.getElementById('fichierhiddenphp').value;
					var content = document.getElementById('modTextPHP').value;
					var ajaxurl = 'adminfunctions.php',
					data =  {'action': method,'fichier' : nomFichier, 'content' : content};
					$.post(ajaxurl, data, function (response) {
					});
				});
			});
		</script>
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
		
		<form>
				<br/><br/>
				Nom du fichier <br/>
				<input type="text" id="nomFichierPhp"/><br/>
				<input id="obtfichierphp" type="button" value="Obtenir Fichier"/>
		</form>
		
		<form>
			<textarea id="modTextPHP" style="width:100%; height : 250px;" contentEditable="true"></textarea>
			<input id="fichierhiddenphp" type="hidden" />
			<input id="sauvmodphp" type="button" value="Modifier Fichier"/>
		</form>
	</body>
</html>
<?php else : ?>
            <p>
                <span class="error">Vous n'avez pas le droit d'accéder à cette Page!</span> Vous devez vous <a href="http://205.236.12.52/projet/h2015/equipe6/Connexion/index.php">connecter</a>.
            </p>
        <?php endif; ?>