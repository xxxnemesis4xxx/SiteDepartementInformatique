<html>
	<head>
		 <?php include("defaultinclude.txt"); ?>
		 <title>Accueil</title>
	</head>
	<body>
		<?php include("header.txt"); ?>
		
		<table>
			<tr>
				<td>Element 1</td>
				<td>Element 2</td>
				<td>Element 3</td>
				<td>Element 4</td>
				<td>Element 5</td>
			</tr>
			<tr>
				<td rowspan="2">Element 1</td>
				<td>Element 2</td>
				<td>Element 3</td>
				<td colspan="2" style="text-align:center">Element 4</td>
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