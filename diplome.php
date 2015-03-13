<html>
	<head>
	 	<?php
	 		include("defaultinclude.txt"); 
	 	?>
	 	<title>
	 		Diplômés
	 	</title>
	</head>
	<body>
		<?php
			include("header.txt");
		?>
		<?php 
			include("verticalmenu.txt");
		?>
			<div class="contenu">
				<h1 class="titreTemplate">Diplômés</h1>
				<p class="textTemplate">
					<?php
						 $dossier = opendir("images/diplome/");
						 while($image = readdir($dossier)){
						    $info = pathinfo($image);
						    
						    
						    //$extension = strtolower ( info["extension"]);
						    switch(array_shift(array_slice($info,2,3))) {
						    case "jpg":
						    case "png" :
						    case "gif" :
						    	    $uneImage = true;
						    	    break;
						    default :
						    	    $uneImage = false;
						    	    break;
						    }
						    
						    if($uneImage){ 
						       echo "<h2 class=\"sousTitre\">". explode(".",array_shift(array_slice($info,1,2)))[0] . "</h2><p class=\"textTemplate\">"; 
						       echo "<img style=\"width:100%;\" src=\"images/diplome/" . array_shift(array_slice($info,1,2)) .  "\"></p>";
						    } 
						 }
					 ?>
				</p>
		</div>
		<div class="contentFix"></div>
		<?php 
			include("footer.txt");
		?>
	</body>
</html>
