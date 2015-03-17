<html>
	<?php
				header('Content-Type: text/html; charset=utf-8');
				setlocale(LC_ALL, 'fr_CA');
	?>
	<head>
		<title>Menu</title>
		<script src="http://205.236.12.52/projet/h2015/equipe6/javascript/jquery-1.11.2.min.js"></script>
		<script src="http://205.236.12.52/projet/h2015/equipe6/javascript/jquery-ui.min.js"></script>
		<link rel="stylesheet" href="http://205.236.12.52/projet/h2015/equipe6/javascript/jquery-ui.min.css">
		<link rel="stylesheet" href="http://205.236.12.52/projet/h2015/equipe6/javascript/jquery-ui.theme.min.css">

		<script>
			$(function() {
				var spinner = $( "#position" ).spinner();
				$( "#position" ).spinner( "option", "min", 1);
			});
			
			$(document).ready(function(){
				$('#ajouterlien').click(function(){
					var method = $(this).val();
					var nomlien = document.getElementById('nomlien').value;
					var lien = document.getElementById('lien').value;
					var position = document.getElementById('position').value;
					var ajaxurl = 'adminfunctions.php',
					data =  {'action': method, 'nomlien' : nomlien, 'lien' : lien, 'position' : position};
					$.post(ajaxurl, data, function (response) {
						location.reload(true);
					});
				});
			});
		
			function showDivFirstMenu() {
				var selectBox = document.getElementById('menu');
				var divId = selectBox.options[selectBox.selectedIndex].value;
				for(i = 0; i < selectBox.length; i++)
				{
					document.getElementById(selectBox.options[i].value).style.display = "none";
				}
				
				document.getElementById(divId).style.display = "block";
			}
			
			function showDivSecondMenu1() {
				var selectBox = document.getElementById('deuxiememenu1');
				var divId = selectBox.options[selectBox.selectedIndex].value;
				for(i = 0; i < selectBox.length; i++)
				{
					document.getElementById(selectBox.options[i].value).style.display = "none";
				}
				
				document.getElementById(divId).style.display = "block";
			}
			
			function showDivSecondMenu2() {
				var selectBox = document.getElementById('deuxiememenu2');
				var divId = selectBox.options[selectBox.selectedIndex].value;
				for(i = 0; i < selectBox.length; i++)
				{
					document.getElementById(selectBox.options[i].value).style.display = "none";
				}
				
				document.getElementById(divId).style.display = "block";
			}
			
		</script>
	</head>
	<body>
		<p>
			Qu'elle menu voulez-vous modifier ? <br/>
			<select id="menu" onchange='showDivFirstMenu()'>
				<option value="menuhorizontale">Menu Horizontale</option>
				<option value="menuverticale">Menu Vertical</option>
			</select>
			
			<div id="menuhorizontale" style="display:block">
				<br/><br/>
				Choisir l'option que vous souhaitez ?<br/>
				<select id="deuxiememenu1" onchange='showDivSecondMenu1()'>
					<option value="sm11">Ajouter</option>
					<option value="sm12">Modifier</option>
					<option value="sm13">Supprimer</option>
				</select>
				
				<div id="sm11" style="display:block">
					<form>
						<br/><br/>
						Titre du lien : <br/>
						<input type="text" id="nomlien"/><br/>
						Adresse du lien: <br/>
						<input type="text" id="lien"/><br/>
						Indiquer la position à laquelle vous souhaitez voir apparaître votre titre<br/>
						<input id="position"/><br/>
						<i>Voici la liste actuelle des liens avec leur position :
						<ul style="list-style : none">
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
								
								$sql = "select * from lienmenuderoulant order by renderHtmlPosition;";
								$result = $conn->query($sql);
								
								if ($result->num_rows > 0) {
									$Position = 1;
									while ($current = $result->fetch_assoc()) {
										echo "<li>" . $Position . " - " . utf8_encode($current["nomLien"]) . "</li>";
										$Position++;
									}
								}
								
								$conn->close();
							?>
						</ul></i>
						
						<input type="button" id="ajouterlien" value="Ajouter Lien"/>
					<form>
				</div>
				
				<div id="sm12" style="display:none">
					Hello Div 2
				</div>
				
				<div id="sm13" style="display:none">
					Hello Div 3
				</div>
				
			</div>
			
			<div id="menuverticale" style="display:none">
				<br/><br/>
				Choisir l'option que vous souhaitez ?<br/>
				<select id="deuxiememenu2" onchange='showDivSecondMenu2()'>
					<option value="sm21">Ajouter</option>
					<option value="sm22">Modifier</option>
					<option value="sm23">Supprimer</option>
				</select>
				
				<div id="sm21" style="display:block">
					Hello Div 1
				</div>
				
				<div id="sm22" style="display:none">
					Hello Div 2
				</div>
				
				<div id="sm23" style="display:none">
					Hello Div 3
				</div>
			</div>
		</p>
	</body>
</html>