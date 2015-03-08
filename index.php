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
				<td>Element 3</td>
				<td colspan="2">
					<?php include("foireemploi.txt") ?>
				</td>
			</tr>
			<tr>
				<td>Element 2</td>
				<td>Element 3</td>
				<td>Element 4</td>
				<td>Element 5</td>
			</tr>
		</table>
		
		
		<?php include("footer.txt"); ?>
	</body>
</html>