<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="styles.css">
	<title>Fusion</title>
	<style>
		html , body {
			margin: 0;
			display: table;
			height: 100%;
			width: 100%;
			overflow-x: hidden;
			overflow-y: hidden;
			
			

		}

		.container
		{
			height: auto;
		}
		footer{
			display: table-row;
			height: 10px;
		
		}
	</style>
</head>
<body id="membres">

	<?php
     include 'header.php';
     ?>

<div class="imageCentre">
	
	
	<a href="#"><img src="images/gallerie1.png"  title="Biographie du Groupe" class="stylePhoto" /></a>
	<a href="#"><img src="images/gallerie2.png"  title="Gallerie Photo" class="stylePhoto"/></a>
	<a href="#"><img src="images/gallerie3.png"  title="Gallerie Photo" class="stylePhoto"/></a>
	<a href="#"><img src="images/gallerie4.png"  title="Gallerie Photo" class="stylePhoto"/></a>
	<a href="#"><img src="images/gallerie5.png"  title="Gallerie Photo" class="stylePhoto"/></a>
	<a href="#"><img src="images/gallerie6.png"  title="Gallerie Photo" class="stylePhoto"/></a>
	

</div>
	
	
	<?php
     include 'footer.php';
     ?>


</body>
</html>