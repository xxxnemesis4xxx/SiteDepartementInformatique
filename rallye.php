<html>
	<head>
	 	<?php
	 		include("defaultinclude.txt"); 
	 	?>
	 	<title>
	 		Rallye
	 	</title>
	 	
	 	
	</head>
	<body>
		<?php
			include("header.txt");
		?>
		<?php 
			include("verticalmenu.txt");
		?>
		
		<?php
			function showImgs($Path) {

					 /*************************************/
					 /* Affichage des images dans la page */
					 /*************************************/
				      
					 $dossier = opendir("$Path");
					 while($image = readdir($dossier)){
					    //$info = pathinfo($image);
					    $extension = strtolower ( pathinfo($image)["extension"]);

					    
					    switch($extension){
					       case "jpg":
						  $imgSrc = imagecreatefromjpeg("$imageDir/$image");
						  break;
					       case "png":
						  $imgSrc = imagecreatefrompng("$imageDir/$image");
						  break;
					       case "gif":
						  $imgSrc = imagecreatefromgif("$imageDir/$image");
						  break;
					       default:
						  unset($imgSrc);
						  break;
					    }
					    
					    if(isset($imgSrc)){ 
					       printf ("<img class=\"rallyeImg2 rallyeImg\" src=\"/SiteDepartementInformatique/%s%s\" alt=\"Rallye\" /></a>\n", $Path, $image);
					    }            
					 }    
			}
		?>
		<div class="contenu">
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
				});
			</script>
			<h1 class="titreTemplate">Rallye Informatique</h1>
			
			<h2 class="sousTitre">Rallye 2014</h2>
			<img class="arrow" src="images/arrowdown.png">
				<div class="Hide">
					<p class="textTemplate">
						<?php
							showImgs("images/rallye2014/");
						?>
					</p>
				</div>
			
			
			<h2 class="sousTitre">Rallye 2013</h2>
			<img class="arrow" src="images/arrowdown.png">
				<div id="photo" class="Hide">
					<p class="textTemplate">
						<?php
							showImgs("images/rallye2013/");
						?>
					</p>
				</div>
			
			
			<h2 class="sousTitre">Rallye 2012</h2>
			<img class="arrow" src="images/arrowdown.png">
				<div class="Hide">
					<p class="textTemplate">
						<?php
							showImgs("images/rallye2012/");
						?>
					</p>
				</div>
			
			
			<h2 class="sousTitre">Rallye 2006</h2>
			<img class="arrow" src="images/arrowdown.png">
				<div class="Hide">
					<p class="textTemplate">
						<?php
							showImgs("images/rallye2006/");
						?>
					</p>
				</div>
			
			
			<h2 class="sousTitre">Rallye 2004</h2>
			<img class="arrow" src="images/arrowdown.png">
				<div class="Hide">
					<p class="textTemplate">
						<?php
							showImgs("images/rallye2004/");
						?>
					</p>
				</div>
			
			
			<h2 class="sousTitre">Rallye 2002</h2>
			<img class="arrow" src="images/arrowdown.png">
				<div class="Hide">
					<p class="textTemplate">
						<?php
							showImgs("images/rallye2002/");
						?>
					</p>
				</div>
			</p>
			
			<h2 class="sousTitre">Rallye 2000</h2>
			<img class="arrow" src="images/arrowdown.png">
				<div class="Hide">
					<p class="textTemplate">
						<?php
							showImgs("images/rallye2000/");
						?>
					</p>
				</div>
			
		</div>
		<div class="contentFix"></div>
		<?php 
			include("footer.txt");
		?>
	</body>
</html>
