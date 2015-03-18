<html>
	<head>
	 	<?php
	 		include("defaultinclude.php"); 
	 	?>
	 	<title>
	 		Événements
	 	</title>
	</head>
	<body>
		<?php
			include("header.php");
			include("verticalmenu.php");
		?>
		
			
			<div class="contenu">
				<h1 class="titreTemplate">Les Événements </h1>
				<p class="textTemplate">
					Voici un texte ou je place le bouton paypal a cote!
				</p>
				<style>
					#paypal1 {
					  display: block;
					  padding-left: 70%;
					  margin-top: -38;
					}
				</style>
				<div id="paypal1">
					<script src="https://www.paypalobjects.com/js/external/paypal-button.min.js?merchant=somerandomassemail@stuff.com" async="async" 
						data-name="Nom activité" 
						data-button="buynow" 
						data-quantity="1" 
						data-currency="CAN" 
						data-shipping="0" 
						data-tax="0" 
						data-env="sandbox"
					></script>
				</div>
			</div>
		<?php 
			include("footer.php");
		?>
	</body>
</html>
