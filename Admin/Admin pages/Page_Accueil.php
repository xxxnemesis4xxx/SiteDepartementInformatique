<html>
	<?php
				header('Content-Type: text/html; charset=utf-8');
				setlocale(LC_ALL, 'fr_CA');
	?>
	<?php
		include_once $_SERVER['DOCUMENT_ROOT'] . '/projet/h2015/equipe6/Connexion/db_connect.php';
		include_once $_SERVER['DOCUMENT_ROOT'] . '/projet/h2015/equipe6/Connexion/functions.php';
		 
		sec_session_start();
	?>
<?php if (login_check($mysqli) == true && isset($_SESSION['DroitsEnseignant']) && $_SESSION['DroitsEnseignant'] == "Tout les droits") : ?>
<head>
	<title>Update Page d'accueil</title>
	<script src="http://205.236.12.52/projet/h2015/equipe6/javascript/jquery-1.11.2.min.js"></script>
	<script>
			function showDiv() {
				var selectBox = document.getElementById('ChoixOptions');
				var divId = selectBox.options[selectBox.selectedIndex].value;
				
				for(i = 0; i < selectBox.length; i++)
				{
					document.getElementById(selectBox.options[i].value).style.display = "none";
				}
				
				document.getElementById(divId).style.display = "block";
			}
			
			$(document).ready(function(){
				$('#button1').click(function(){
					var method = $(this).val();
					var fichier = document.getElementById('nomFichier').value;
					var colspan = document.getElementById('colspan').value;
					var rowspan = document.getElementById('rowspan').value;
					var position = document.getElementById('position').value;
					var lastcol = document.getElementById('lastcols').checked;
					var ajaxurl = 'adminfunctions.php',
					data =  {'action': method,'fichier' : fichier, 'colspan' : colspan, 'rowspan' : rowspan, 'position' : position, 'lastcols' : lastcol};
					$.post(ajaxurl, data, function (response) {
						location.reload(true);
					});
				});
				
				$('#button2').click(function(){
					var method = $(this).val();
					var itemId = document.getElementById('itemId').value;
					var fichier = document.getElementById('nomFichier2').value;
					var colspan = document.getElementById('colspan2').value;
					var rowspan = document.getElementById('rowspan2').value;
					var position = document.getElementById('position2').value;
					var lastcol = document.getElementById('lastcols2').checked;
					var ajaxurl = 'adminfunctions.php',
					data =  {'action': method,'itemid' : itemId, 'fichier' : fichier, 'colspan' : colspan, 'rowspan' : rowspan, 'position' : position, 'lastcols' : lastcol};
					$.post(ajaxurl, data, function (response) {
						location.reload(true);
					});
				});
				
				$('#button3').click(function(){
					var method = $(this).val();
					var itemId = document.getElementById('itemId2').value;
					var ajaxurl = 'adminfunctions.php',
					data =  {'action': method,'itemid' : itemId};
					$.post(ajaxurl, data, function (response) {
						location.reload(true);
					});
				});
				
				$('#button4').click(function(){
					var method = $(this).val();
					var nomFichier = document.getElementById('nomFichier3').value;
					var ajaxurl = 'adminfunctions.php',
					data =  {'action': method,'fichier' : nomFichier};
					$.post(ajaxurl, data, function (response) {
						location.reload(true);
					});
				});
				
				$('#button5').click(function(){
					var method = $(this).val();
					var nomFichier = document.getElementById('nomFichier4').value;
					$("#fichierhidden").val(nomFichier);
					var ajaxurl = 'adminfunctions.php',
					data =  {'action': method,'fichier' : nomFichier};
					$.post(ajaxurl, data, function (response) {
						$("#modText").text(response);
					});
				});
				
				$('#button55').click(function(){
					var method = $(this).val();
					var nomFichier = document.getElementById('fichierhidden').value;
					var content = document.getElementById('modText').value;
					var ajaxurl = 'adminfunctions.php',
					data =  {'action': method,'fichier' : nomFichier, 'content' : content};
					$.post(ajaxurl, data, function (response) {
						location.reload(true);
					});
				});
				
				$('#button6').click(function(){
					var method = $(this).val();
					var nomFichier = document.getElementById('nomFichier5').value;
					var ajaxurl = 'adminfunctions.php',
					data =  {'action': method,'fichier' : nomFichier};
					$.post(ajaxurl, data, function (response) {
						location.reload(true);
					});
				});
			});
	</script>
</head>
<body>
		<ul>
			<li style="list-style: none;font-size:26px;">
				<a href="http://205.236.12.52/projet/h2015/equipe6/Admin/Admin%20homepage.php" style="border : 2px solid black;background-color:gray">
					<span style="color:rgb(255,224,100)">Retour</span>
				</a>
			</li>
		</ul>
		<table>
		<?php
			$servername = "localhost";
			$username = "equipe6h15";
			$password = "ebola-info";
			$dbname = "equipe6h15";
			
			// Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);
			// Check connection
			if ($conn->connect_error) {
					die("Erreur de connection: " . $conn->connect_error);
			} 
			
			$sql = "select * from displaymenu order by position;";
			$result = $conn->query($sql);
			
			if ($result->num_rows > 0) {
				echo "<tr><td>Item ID</td><td>Nom du Fichier</td><td>Colspan</td><td>Rowspan</td><td>Position Affichage</td><td>Dernière colonne de la Ligne</td></tr>";
				while ($current = $result->fetch_assoc()) {
					echo "<tr>";
					echo "<td>" . $current["itemId"] . "</td><td>" .  $current["nomFichier"] . "</td><td>" . $current["colspan"] . "</td><td>" .
					$current["rowspan"] . "</td><td>" . $current["position"] . "</td><td>" . $current["lastCols"] . "</td>";  
				}
			}
			
			$conn->close();
		?>
		</table>
		<br/><br/>
		<h2>Html Files</h2>
		<table>
		<?php
			$directory = "../../";

			//get all image files with a .txt extension.
			$file= glob($directory . "*.html");

			//print each file name
			foreach($file as $filew) {
				echo "<tr><td>" . substr($filew,6,strlen($filew)) . "</td></tr>";
			}
		?>
		</table>
		
		<select style="display: block;width:200px;" id="ChoixOptions" size="5" onchange='showDiv()'>
			<option value='1'>Ajouter un registre</option>
			<option value='2'>Modifier un registre</option>
			<option value='3'>Supprimer un registre</option>
			<option value='4'>Ajouter un fichier</option>
			<option value='5'>Modifier un fichier</option>
			<option value='6'>Supprimer un fichier</option>
		</select>
		
		<div id="1" style="display:none">
			<form>
				<br/><br/>
				***Les champs doivent être remplis ***<br/>
				Nom du fichier :<br/>
				<input type="text" id="nomFichier"/><br/>
				Colspan :<br/>
				<input type="text" id="colspan"/><br/>
				Rowspan :<br/>
				<input type="text" id="rowspan"/><br/>
				Position Affichage :<br/>
				<input type="text" id="position"/> <br/>
				Dernière colonne d'affichage : <br/>
				<input type="checkbox" value="Oui" id="lastcols"/><br/>
				<input id="button1" type="submit" name="Ajouter" value="Ajouter Registre"/>
			</form>
		</div>
		<div id="2" style="display:none">
			<form>
				<br/><br/>
				***Les champs doivent être remplis ***<br/>
				item Id <br/>
				<input type="text" id="itemId"/><br/>
				Nom du fichier :<br/>
				<input type="text" id="nomFichier2"/><br/>
				Colspan :<br/>
				<input type="text" id="colspan2"/><br/>
				Rowspan :<br/>
				<input type="text" id="rowspan2"/><br/>
				Position Affichage :<br/>
				<input type="text" id="position2"/> <br/>
				Dernière colonne d'affichage : <br/>
				<input type="checkbox" value="Oui" id="lastcols2"/><br/>
				<input id="button2" type="submit" name="Modifier" value="Modifier Registre"/>
			</form>
		</div>
		<div id="3" style="display:none">
			<form>
				<br/><br/>
				item Id <br/>
				<input type="text" id="itemId2"/><br/>
				<input id="button3" type="submit" name="Supprimer" value="Supprimer Registre"/>
			</form>
		</div>
		<div id="4" style="display:none">
			<form>
				<br/><br/>
				Nom du fichier <br/>
				<input type="text" id="nomFichier3"/><br/>
				<input id="button4" type="submit" value="Ajouter Fichier"/>
			</form>
		</div>
		<div id="5" style="display:none">
			<form>
				<br/><br/>
				Nom du fichier <br/>
				<input type="text" id="nomFichier4"/><br/>
				<input id="button5" type="button" value="Obtenir Fichier"/>
			</form>
			
			<form>
				<textarea id="modText" style="width:100%; height : 250px;" contentEditable="true"></textarea>
				<input id="fichierhidden" type="hidden" />
				<input id="button55" type="button" value="Modifier Fichier"/>
			</form>
		</div>
		<div id="6" style="display:none">
			<form>
				<br/><br/>
				Nom du fichier <br/>
				<input type="text" id="nomFichier5"/><br/>
				<input id="button6" type="submit" value="Supprimer Fichier"/>
			</form>
		</div>
		
</body>
</html>
<?php else : ?>
            <p>
                <span class="error">Vous n'avez pas le droit d'accéder à cette Page!</span> Vous devez vous <a href="http://205.236.12.52/projet/h2015/equipe6/Connexion/index.php">connecter</a>.
            </p>
        <?php endif; ?>