<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="styles.css">
	<title>THEO</title>
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
			height: 5px;
		
		}
	</style>
</head>
<body id="membres">
	<header>
    <nav class="wrapper">
      <ul>
                  <li>
                    <a href="index.php">ACCUEIL</a>
                  </li>
          <li> 
            <a href="infos.php">INFOS</a>
            <ul class="sub-menu">
            	
                  <li class="text">
                    <a href="biographie.php">BIO</a>
                  </li>
                  <li class="text">
                    <a href="galerie.php">GALERIE</a>
                  </li>
                 
            </ul>
          </li>
        
        <li class="bagdad">
          <a href="index.php"><img src="images/logo.png" class="tamere"></a>
        </li>

        <li> 
            <a href="membres.php">MEMBRES</a>
            <ul class="sub-menu">
                  <li class="text">
                    <a href="Theo.php">ISAAC</a>
                  </li>
                  <li class="text">
                    <a href="Nirva.php">NIRVA</a>
                  </li>
            </ul>
        </li>  
          
        
        
                  <li>
                    <a href="contact.php">CONTACT</a>
                  </li>
      </ul>
    </nav>
  </header>
	
	<br /><br /><br />
	<div align="center" id="bio">
		
				<a href="photoinfo.php" id="photo"><img src="images/prestige.png" class="stylePhoto"  /></a>

				<br /><br /><br /><br /><br /><br />


	
			<hr>
			<table width= "60%" align="center" class="sombre">
				<tr>
					
					<td width="30%">
						<article  class="article"><div align="center">Matériel utilisé: <br /><br /> -Ibanez Prestige <br /> -Line 6 POD HD500 <br />Guitare bas de gamme </div></article>
					</td>
					


				</tr>


			</table>

			
			<hr>
	</div>
	<?php
 	include 'footer.php';
 	?>
	

</body>
</html>