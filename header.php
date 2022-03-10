<?php
  session_start();
  include 'config.php';
  try
  {
    $bdd = new PDO('mysql:host=localhost;dbname=grfusion', $user, $pass);
  }
  catch (exception $e)
  {
    die('Erreur : ' . $e->getMessage());
  } 
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="styles.css">
  <link rel="stylesheet" type="text/css" href="main.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Krona+One&display=swap" rel="stylesheet">
  <title>MENU</title>
</head>
<body>
  
  <header><nav class="wrapper" id="d2" align="center">
      <ul class="d1">
                  <li>
                    <a href="Accueil.php">ACCUEIL</a>
                  </li>
          <li> 
            <a href="infos.php" class="">INFOS</a>
            <ul class="sub-menu">
              
                  <li class="text">
                    <a href="biographie.php">BIO</a>
                  </li>
                  <li class="text">
                    <a href="galerie.php">GALERIE</a>
                  </li>
                 
            </ul>
          </li>
        
        <li>
          <p class="FUSION">FUSION<p>
        </li>

        <li> 
            <a href="membres.php">GROUPE</a>
            <ul class="sub-menu">
                  <li class="text" id="groupe">
                    <a href="Isaac.php">ISAAC</a>
                  </li>
                  <li class="text">
                    <a href="Nirva.php">NIRVA</a>
                  </li>
            </ul>
        </li>  
          
        
        
                  <li>
                    <a href="contact.php">CONTACT</a>
                  </li>
     
<div id="Connect">
    <?php
      if (isset($_SESSION['id'])) 
      {
        ?> <a href="profil.php?id=<?php echo $_SESSION['id']?>"><p><?php echo $_SESSION['login'] ?></p></a><?php
      }
      else
      {
        ?> <a href="login.php"><p><img src="images/login.png"></p></a><?php
      }
    ?>
   </div>   
 </ul>
    </nav>  
    
  </header>
</body>
</html>