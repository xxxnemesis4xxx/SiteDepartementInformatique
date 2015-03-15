<html>
	<head>
	 	<?php
	 		include("../defaultinclude.php"); 
	 	?>
	 	<title>
	 		Enseignant 
	 	</title>
		
		<script src="/projet/h2015/equipe6/ckeditor/ckeditor.js"></script>
		
		<script>
			$(function() {
				CKEDITOR.disableAutoInline = true;
				CKEDITOR.inline( 'editor1' );
			});
			
			$(document).ready(function(){
				$('.button').click(function(){
					var content = CKEDITOR.instances.editor1.getData();
					var ajaxurl = 'ajax.php',
					data =  {'action': content,'fichier' : 'tuynguyen.txt'};
					$.post(ajaxurl, data, function (response) {
						alert("Sauvegarde Réussi!");
					});
				});
			});
		</script>
	</head>
	<body>
		<?php
			include("../header.php");
			include("../verticalmenu.php");
		?>
		
			<div class="contenu">
			<form>
					<div name="editor1" id="editor1" contenteditable="true">
						<?php include("tuynguyen.txt"); ?>
					</div>
					
					<input type="submit" class="button" name="insert" value="Sauvegarde" />
			</form>
			</div>
		
		<div class="contentFix"></div>
		<?php 
			include("../footer.php");
		?>
	</body>
</html>