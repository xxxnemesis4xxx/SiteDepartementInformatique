<html>
	<?php
				header('Content-Type: text/html; charset=utf-8');
				setlocale(LC_ALL, 'fr_CA');
	?>
	<head>
		<title>Menu</title>
		<script src="http://205.236.12.52/projet/h2015/equipe6/javascript/jquery-1.11.2.min.js"></script>
		<script>
			function showDiv() {
				var selectBox = document.getElementById('menu');
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
			<select id="menu"onchange='showDiv()'>
				<option value="menuhorizontale">Menu Horizontale</option>
				<option value="menuverticale">Menu Vertical</option>
			</select>
			
			<div id="menuhorizontale" style="display:block">
				Bonjour World!
			</div>
			
			<div id="menuverticale" style="display:none">
				Hello Monde!
			</div>
		</p>
	</body>
</html>