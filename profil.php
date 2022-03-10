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

include_once('cookie.php');
if(isset($_GET['id']) AND $_GET['id'] > 0)
{
	$getid = intval($_GET['id']);
	$requser = $bdd->prepare('SELECT * FROM membres WHERE id = ?');
	$requser->execute(array($getid));
	$userinfo = $requser->fetch();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="styleslog.css">
	<link rel="stylesheet" type="text/css" href="main.css">	
	
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Krona+One&family=Montserrat:wght@100;300&display=swap" rel="stylesheet">
	<title>Profil</title>
</head>
<body>
	<section>
	
	<div align="center">
		<section>
		<form>
		<div class="box">
			<div class="form">
		<h2>Profil de <?php echo $userinfo['login']; ?></h2>
		
		<br><p>Login = <?php echo $userinfo['login']; ?></p>
		<br><p>Adresse mail = <?php echo $userinfo['mail']; ?> </p><br>
		<?php
			if(isset($_SESSION['id']) AND $userinfo['id'] == $_SESSION['id'])
			{
			?>
				<br><br><br><br><a href="edit.php">Modifier mon profil</a> <br>
				<a href="unlog.php">Se déconnecter</a><br><br><br>
				<a href="Accueil.php">Revenir à l'Accueil</a>
			<?php
			}
		?>
	</div>	
	</div> 
	</form>
</section>
</body>
</html>
<?php
}
?>