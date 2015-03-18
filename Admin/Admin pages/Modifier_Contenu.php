<html>
	<?php
				header('Content-Type: text/html; charset=utf-8');
				setlocale(LC_ALL, 'fr_CA');
	?>
	<head>
		<title>Modifier Contenu</title>
		<script src="http://205.236.12.52/projet/h2015/equipe6/javascript/jquery-1.11.2.min.js"></script>
		<script src="http://205.236.12.52/projet/h2015/equipe6/javascript/jquery-ui.min.js"></script>
		<link rel="stylesheet" href="http://205.236.12.52/projet/h2015/equipe6/javascript/jquery-ui.min.css">
		<link rel="stylesheet" href="http://205.236.12.52/projet/h2015/equipe6/javascript/jquery-ui.theme.min.css">
		<script>
			$(document).ready(function(){
				$('#button1').click(function(){
						var method = $(this).val();
						var nomFichier = document.getElementById('nomFichier4').value;
						$("#fichierhidden").val(nomFichier);
						var ajaxurl = 'adminfunctions.php',
						data =  {'action': method,'fichier' : nomFichier};
						$.post(ajaxurl, data, function (response) {
							$("#modText").text(response);
						});
					});
					
				$( "#dialog-confirm" ).dialog({
				  autoOpen: false,
				  resizable: false,
				  height:250,
				  width:370,
				  modal: true,
				  buttons: {
					"Sauvegarder": function() {
						var method = 'Modifier Fichier';
						var nomFichier = document.getElementById('fichierhidden').value;
						var content = document.getElementById('modText').value;
						var ajaxurl = 'adminfunctions.php',
						data =  {'action': method,'fichier' : nomFichier, 'content' : content};
						$.post(ajaxurl, data, function (response) {
							location.reload(true);
						});
					   $( this ).dialog( "close" );
					},
					Cancel: function() {
					  $( this ).dialog( "close" );
					}
				  }
				});
					
				$('#button2').click(function(){
					$( "#dialog-confirm" ).dialog("open");
				});
			});
		</script>
	</head>
	<body>
		<div id="dialog-confirm" title="Modification?">
		  <p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>Êtes-vous certain de vouloir modifier le fichier? Les modifications seront permanentes</p>
		</div>
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
				<input type="text" id="nomFichier4"/><br/>
				<input id="button1" type="button" value="Obtenir Fichier"/>
		</form>
		
		<form>
			<textarea id="modText" style="width:100%; height : 250px;" contentEditable="true"></textarea>
			<input id="fichierhidden" type="hidden" />
			<input id="button2" type="button" value="Modifier Fichier"/>
		</form>
	</body>
</html>