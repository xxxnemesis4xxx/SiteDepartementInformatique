<html>
	<?php
				header('Content-Type: text/html; charset=utf-8');
				setlocale(LC_ALL, 'fr_CA');
	?>
	<head>
		<title>Menu</title>
		<script src="http://205.236.12.52/projet/h2015/equipe6/javascript/jquery-1.11.2.min.js"></script>
		<script>
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
					Hello Div 1
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