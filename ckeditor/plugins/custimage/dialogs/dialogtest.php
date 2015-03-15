<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<base target="_self">
<title>Image Dialog</title>
<script type="text/javascript">

	function onClose()
	{
		if (ImageChoisie != null)
		{
			var result="<img src='" + ImageChoisie + "' style='width:110px; height:100px;'>";
			var element = window.opener.CKEDITOR.dom.element.createFromHtml( result );
			var CKEDITOR   = window.opener.CKEDITOR;

			for ( var i in CKEDITOR.instances ){
			   var currentInstance = i;
			   break;
			}
			var oEditor   = window.opener.CKEDITOR.instances[currentInstance];
			oEditor.insertElement(element);
			window.close();
		}
	}
</script>
</head>
<body>
<style>
.Selected
{
    border: 1px solid black;
}
</style>
<?php
	$UsingCKEditor = true;
	include $_SERVER['DOCUMENT_ROOT'] . "/projet/h2015/equipe6/Admin/Admin pages/Upload.php";
?>
<input type="button" value="Insérer image" onClick="return onClose()">
</body>
</html>
