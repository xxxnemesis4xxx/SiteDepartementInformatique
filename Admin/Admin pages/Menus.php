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
		<title>Menu</title>
		<style>
		  #sortable { list-style-type: none; margin: 0; padding: 0; margin-bottom: 10px; }
		  #sortable li { margin: 5px; padding: 5px; width: 150px; }
		 </style>
		<script>
			$(document).ready(function(){
				$('#ajouterlienhorizontal').click(function(){
					var method = $(this).val();
					var nomlien = document.getElementById('nomlienajouthorizontal').value;
					var lien = document.getElementById('lienajouthorizontal').value;
					var position = document.getElementById('positionmenuajouthorizontal').value;
					var ajaxurl = 'adminfunctions.php',
					data =  {'action': method, 'nomlien' : nomlien, 'lien' : lien, 'position' : position};
					$.post(ajaxurl, data, function (response) {
						location.reload(true);
					});
				});
				
				$("#obtlienhorizontal").click(function() {
					var method = $(this).val();
					var idlien = document.getElementById('idlienmodhorizontal').value;
					var ajaxurl = 'adminfunctions.php',
					data = {'action' : method,'idlien' : idlien};
					$.post(ajaxurl, data, function (response) {
						var result = jQuery.parseJSON(response);
						$("#positionmodifier").val(result.position);
						$("#lienmodifier").val(result.lien);
						$("#nomlienmodifier").val(result.titre);
					});
				});
				
				$("#modlienhorizontal").click(function() {
					var method = $(this).val();
					var idlien = document.getElementById('idlienmodhorizontal').value;
					var position = document.getElementById('positionmodifier').value;
					var lien = document.getElementById('lienmodifier').value;
					var titre = document.getElementById('nomlienmodifier').value;
					var ajaxurl = 'adminfunctions.php',
					data = {'action' : method,'idlien' : idlien, 'position' : position, 'lien' :  lien, 'titre' :titre};
					$.post(ajaxurl, data, function (response) {
						location.reload(true);
					});
				});
				
				$('#supplienhorizontal').click(function(){
					var method = $(this).val();
					var idlien = document.getElementById('idliensupphorizontal').value;
					var ajaxurl = 'adminfunctions.php',
					data =  {'action': method, 'idlien' : idlien};
					$.post(ajaxurl, data, function (response) {
						location.reload(true);
					});
				});
				
				$('#newverticallink').click(function() {
					var method = $(this).val();
					var titre = document.getElementById('titleverticalmenu').value;
					var link = document.getElementById('linkverticalmenu').value;
					var position = document.getElementById('positiontitre').value;
					var layerBox = document.getElementById('layer');
					var layer = layerBox.options[layerBox.selectedIndex].value;
					var htmlcolor = document.getElementById('htmlcolor').value;
					var newpage = document.getElementById('newpage').checked;
					var ajaxurl = 'adminfunctions.php',
					data =  {'action': method, 'titre' : titre, 'link' : link, 'position' : position, 'layer' : layer, 'htmlcolor' : htmlcolor, 'newpage' : newpage};
					$.post(ajaxurl, data, function (response) {
						location.reload(true);
					});
				});
				   
				$('#suppverticallink').click(function() {
					var method = $(this).val();
					var position = document.getElementById('positiontitresupp').value;
					var ajaxurl = 'adminfunctions.php',
					data =  {'action': method, 'position' : position};
					$.post(ajaxurl, data, function (response) {
						alert(response);
					});
				});
				
				$("#obtinfopos").click(function() {
					var method = $(this).val();
					var position = document.getElementById('poslienmod').value;
					var ajaxurl = 'adminfunctions.php',
					data = {'action' : method,'position' : position};
					$.post(ajaxurl, data, function (response) {
						var result = jQuery.parseJSON(response);
						$("#nomverticalmod").val(result.titre);
						$("#lienverticalmod").val(result.lien);
						$("#htmlcolorverticalmod").val(result.couleur);
						$("#newpageverticalmod").prop('checked',result.newpage);
					});
				});
				
				$("#modlienvertical").click(function() {
					var method = $(this).val();
					var titre = document.getElementById('nomverticalmod').value;
					var lien = document.getElementById('lienverticalmod').value;
					var htmlcolor = document.getElementById('htmlcolorverticalmod').value;
					var newpage = document.getElementById('newpageverticalmod').checked;
					var position = document.getElementById('poslienmod').value;
					var ajaxurl = 'adminfunctions.php',
					data = {'action' : method, 'titre' : titre, 'lien' : lien, 'htmlcolor' : htmlcolor, 'newpage' : newpage, 'position' : position};
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
			
			function showDivThirdMenu1() {
				var selectBox = document.getElementById('troisiememenu1');
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
				<option value="menuverticale">Menu Verticale</option>
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
						<input type="text" id="nomlienajouthorizontal"/><br/>
						Adresse du lien: <br/>
						<input type="text" id="lienajouthorizontal"/><br/>
						Indiquer la position à laquelle vous souhaitez voir apparaître votre titre<br/>
						<input id="positionmenuajouthorizontal"/><br/>
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
						<input type="button" id="ajouterlienhorizontal" value="Ajouter Lien"/>
					<form>
				</div>
				
				<div id="sm12" style="display:none">
						<br/><br/>
						<i>Voici la liste actuelle des liens avec leur id :
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
									while ($current = $result->fetch_assoc()) {
										echo "<li>Item Id : " . $current['menuId'] . " - Item Position : ". $current['renderHtmlPosition'] . " - " . utf8_encode($current["nomLien"]) . "</li>";
									}
								}
								
								$conn->close();
							?>
						</ul></i>
						<br/>
						Id du lien : <br/>
						<input type="text" id="idlienmodhorizontal"/><br/>
						<input type="button" id="obtlienhorizontal" value="Obtenir Lien Information"/><br/><br/>
						
						Titre du lien :<br/>
						<input type="text" id="nomlienmodifier"/><br/>
						Adresse du lien :<br/>
						<input type="text" id="lienmodifier"/><br/>
						Position :<br/>
						<input type="text" id="positionmodifier"/><br/>
						<input type="button" id="modlienhorizontal" value="Modifier Lien"/>
				</div>
				
				<div id="sm13" style="display:none">
					<i>Voici la liste actuelle des liens avec leur id :
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
									while ($current = $result->fetch_assoc()) {
										echo "<li>" . $current['menuId'] . " - " . utf8_encode($current["nomLien"]) . "</li>";
										$Position++;
									}
								}
								
								$conn->close();
							?>
						</ul></i>
						<br/>
						Id du lien : <br/>
						<input type="text" id="idliensupphorizontal"/><br/>
						<input type="button" id="supplienhorizontal" value="Supprimer Lien"/>
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
				
				<style>
							ul, ul ul, ul ul ul {
								list-style : none;
							}
						</style>
						<ul><i>
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
								
								$sql = "select * from verticalmenu order by renderHtmlPosition";
								$result = $conn->query($sql);
							
								if ($result->num_rows > 0) {
									$current = $result->fetch_assoc();
									while($current != null) {
										$next = $result->fetch_assoc();
										if ($current["layer"] ==  $next["layer"]) {
											echo "<li>Position : " . $current["renderHtmlPosition"] . " - " .utf8_encode($current["nomLien"]) ."</li>";
										} elseif ($current["layer"] < $next["layer"]) {
											echo "<li>Position : " . $current["renderHtmlPosition"] . " - " .utf8_encode($current["nomLien"]) . "<ul>";
										} elseif ($current["layer"] > $next["layer"]) {
											echo "<li>Position : " . $current["renderHtmlPosition"] . " - " . utf8_encode($current["nomLien"]) 
											. (($current["layer"] - $next["layer"] == 1)?"</li></ul></li>":"</li></ul></li></ul></li>");
										}
												
										$current = $next;
									}
								}
								
								$conn->close();
							?>
						</ul></i>
				---------------------------------------------------------------<br/>
				<div id="sm21" style="display:block">
					<form>
						Titre du lien : <br/>
						<input type="text" id="titleverticalmenu" /><br/>
						Adresse du lien : <br/>
						<input type="text" id="linkverticalmenu" /><br/>
						À quelle position souhaitez-vous voir apparaître votre titre<br/>
						<input id="positiontitre"/><br/><br/>
						Niveau du lien : 
						<select id="layer" >
							<option value="1">Niveau 1</option>
							<option value="2">Niveau 2</option>
							<option value="3">Niveau 3</option>
						</select><br/>
						<i>
						<ul>
							<li>Niveau 1
								<ul>
									<li>Niveau 2
										<ul>
											<li>Niveau 3</li>
										</ul>
									</li>
								</ul>
							</li>
						</ul>
						</i><br/>
						Couleur html(Ex : #fff): <br/>
						<input type="text" id="htmlcolor"/><br/>
						Ouvrir sur une nouvelle page :
						<input type="checkbox" id="newpage"><br/><br/>
						
						<input type="button" id="newverticallink" value="Ajouter Lien Vertical"/>
						<br/><br/>
					<form>
				</div>
				
				<div id="sm22" style="display:none">
					Position : <br/>
					<input type="text" id="poslienmod"/><br/>
					<input type="button" id="obtinfopos" value="Obtenir Info Position"/><br/><br/>
					
					Titre du lien :<br/>
					<input type="text" id="nomverticalmod"/><br/>
					Adresse du lien :<br/>
					<input type="text" id="lienverticalmod"/><br/>
					Couleur html(Ex : #fff): <br/>
					<input type="text" id="htmlcolorverticalmod"/><br/>
					Ouvrir sur une nouvelle page :
					<input type="checkbox" id="newpageverticalmod"><br/><br/>
					
					<input type="button" id="modlienvertical" value="Modifier Lien Vertical"/>
				</div>
				
				<div id="sm23" style="display:none">   
					Indiquer la position de l'item que vous souhaitez supprimer<br/>
					<input id="positiontitresupp"/><br/><br/>
					<input type="button" id="suppverticallink" value="Supprimer Lien Vertical"/>
					<br/><br/>
				</div>
			</div>
		</p>
	</body>
</html>
<?php else : ?>
    <p>
        <span class="error">Vous n'avez pas le droit d'accéder à cette Page!</span> Vous devez vous <a href="http://205.236.12.52/projet/h2015/equipe6/Connexion/index.php">connecter</a>.
    </p>
<?php endif; ?>