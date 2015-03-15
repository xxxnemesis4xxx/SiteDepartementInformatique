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
		</script>
	</head>
	<body>
		<?php
			include("../header.php");
			include("../verticalmenu.php");
		?>
		<form>
			<div class="contenu">
					<div name="editor1" id="editor1" contenteditable="true">
					</div>
			</div>
		</form>
		<div class="contentFix"></div>
		<?php 
			include("../footer.php");
		?>
	</body>
</html>