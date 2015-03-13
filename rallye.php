<html>
	<head>
	 	<?php
	 		include("defaultinclude.php"); 
	 	?>
	 	<title>
	 		Rallye
	 	</title>
	 	
	</head>
	<body>
		<?php
			include("header.php");
			include("verticalmenu.php");
		?>
		<script>
			$(function() {
				$('.arrow').click(function() {
						$(this).next('div').toggleClass("Hide");
						
						if ($(this).attr('src') === "images/arrowdown.png") {
							$(this).attr('src','images/arrowup.png')
						} else { 
							$(this).attr('src','images/arrowdown.png')
						}
						
						$(window).trigger("resize");
				});
				
				$("img").click(function() {
					$(this).toggleClass("rallyeImg");
					$(window).trigger("resize");
				});
			});
		</script>
		
		<div class="contenu">
			<h1 class="titreTemplate">Rallye Informatique</h1>
			
			<?php
				//Get Years of all rallye Folders
				$dossier = opendir("images/");
				$rallyeFolders = array();
				 while($image = readdir($dossier)){
				    //$extension = strtolower ( pathinfo($image)["extension"]);
				    $info = pathinfo($image);
				    if (strpos(array_shift(array_slice($info,1,2)),'rallye') !== false) {
				    	    $annee = preg_replace('/\D/', '', array_shift(array_slice($info,1,2)));
				    	    array_push($rallyeFolders,$annee);
				    	    
				    }
				 }
				 
				 //Sort Year
				 arsort($rallyeFolders);
				 
				 //Get Images for Each Year
				 foreach($rallyeFolders as $key => $val) {
				 	 echo "<h2 class=\"sousTitre\">". $val . "</h2>"; 
				 	 echo "<img class=\"arrow\" src=\"images/arrowdown.png\">";
				 	 echo "<div class=\"Hide\">";
				 	 echo "<p class=\"textTemplate\">";
				 	 
				 	 $dossier = opendir("images/rallye". $val . "/");
					 while($image = readdir($dossier)){
					    $info = pathinfo($image);
					    
					    switch(strtolower(array_shift(array_slice($info,2,3)))) {
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
					       echo "<img class=\"rallyeImg2 rallyeImg\" src=\"images/rallye".$val. "/" . array_shift(array_slice($info,1,2)) .  "\">";
					    } 
					 }
					 
					 echo "</p></div>";
					 
				 }
			?>
		</div>
		<div class="contentFix"></div>
		<?php 
			include("footer.php");
		?>
	</body>
</html>
