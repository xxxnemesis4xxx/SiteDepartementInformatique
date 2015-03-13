<?php
			header('Content-Type: text/html; charset=utf-8');
			setlocale(LC_ALL, 'fr_CA');
?>
<link rel="stylesheet" href="css/templatePage.css">
<!-- Adobe Text Style for Title -->
<script type="text/javascript" script-name="wire-one" src="http://use.edgefonts.net/wire-one.js"></script>
<script src="javascript/jquery-1.11.2.min.js"></script>
<script>
	$(function() {
		var heightDiv = $(".contenu").height();
		var heightMenu = $(".vertical_menu").height();
		var result = heightDiv-heightMenu;
		
		if (heightDiv > heightMenu) {
			$(".contentFix").height(result);
		} else {
			$(".contentFix").height(10);
		}
	});

	$(window).resize(function() {
		var heightDiv = $(".contenu").height();
		var heightMenu = $(".vertical_menu").height();
		var result = heightDiv-heightMenu;
		
		if (heightDiv > heightMenu) {
			$(".contentFix").height(result);
		} else {
			$(".contentFix").height(10);
		}
		
	});
</script>