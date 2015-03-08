<html>
	<head>
		 <?php include("defaultinclude.txt"); ?>
		 <title>Accueil</title>
		 <link rel="stylesheet" href="css/index.css">
		 <script src="javascript/jquery-1.11.2.min.js"></script>
		 <script src="javascript/unslider.min.js"></script>
		
		 
		 <script>
		 	$(function() {
			    $('.slider').unslider();
			});
		 </script>
	</head>
	
	<body>
		<?php include("header.txt"); ?>
		
		<table class="indexTable">
			<tr>
				<td>
					<?php include("pub.txt") ?>
				</td>
				<td colspan="3">
					<?php include("slider.txt") ?>
				</td>
				<td>
					<?php include("pub2.txt") ?>
				</td>
			</tr>
			<tr>
				<td rowspan="2">
					<?php include("enseignant.txt") ?>
				</td>
				<td>
					<?php include("pdea.txt") ?>
				</td>
				<td>
					<?php include("diplome.txt")?>
				</td>
				<td colspan="2">
					<?php include("foireemploi.txt") ?>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<?php include("video.txt") ?>
				</td>
				<td>
					<?php include("rally.txt") ?>
				</td>
				<td>	
					<?php include("evenement.txt") ?>
				</td>
			</tr>
		</table>
		
		
		<?php include("footer.txt"); ?>
	</body>
</html>