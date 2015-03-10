<html>
	<head>
	 	<?php
	 		include("defaultinclude.txt"); 
	 	?>
	 	<title>
	 		Critères 
	 	</title>
	 	
	 	<script src="javascript/jquery-1.11.2.min.js"></script>
	 	<script>
	 	$(function() {
	 		var heightDiv = $(".contenu").height();
	 		var heightMenu = $(".vertical_menu").height();
	 		var result = heightDiv-heightMenu;
	 		
	 		if (heightDiv > heightMenu) {
	 			$(".contentFix").height(result);
	 		}
	 	});
	 	</script>
	</head>
	<body>
		<?php
			include("header.txt");
		?>
		<?php 
			include("verticalmenu.txt");
		?>
			<div class="contenu">
				<h1 class="titreTemplate">Dates des stages</h1>
				<p class="textTemplate">
					Pour les stages en informatique de gestion<br/><br/>
	
					Stage de 15 semaines ou 21 semaines à rémunération obligatoire : 30 mars au 10 juillet 2015 ou jusqu'au 21 août 2015
					Stages de 8 semaines à rémunération obligatoire  : 30 mars au 22 mai 2015<br/><br/><br/>
					
					
					Pour les stages en informatique industrielle<br/><br/>
					
					Stage de 7 semaines à rémunération obligatoire : 6 avril au 22 mai 2015
					Stage de 15 semaines ou 20 semaines à rémunération obligatoire : du 6 avril au 17 juillet 2015 ou jusqu’au 21 août 2015<br/><br/><br/>
					
					
					Pour les stages en gestion de réseaux<br/><br/>
					
					Stage de 16 semaines à rémunération obligatoire : date à déterminer
					<br/>
				</p>
		</div>
		<div class="contentFix"></div>
		<?php 
			include("footer.txt");
		?>
	</body>
</html>