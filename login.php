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
	if(isset($_POST['login']))
	{
		$loginconnect = htmlspecialchars($_POST['loginconnect']);
		$passwordconnect = sha1($_POST['passwordconnect']);
		if(!empty($loginconnect) AND !empty($passwordconnect)) 
		{
			$requser = $bdd->prepare('SELECT * FROM membres WHERE login = ? AND password = ?');
			$requser->execute(array($loginconnect, $passwordconnect));
			$userexist = $requser->rowCount();
			if($userexist == 1)
			{
				if(isset($_POST['rememberMe']))
				{
					setcookie('login', $loginconnect, time()+365*24*3600,null,null,false,true);
					setcookie('password', $passwordconnect, time()+365*24*3600,null,null,false,true);
				}
				$userinfo = $requser->fetch();
				$_SESSION['id'] = $userinfo['id'];
				$_SESSION['login'] = $userinfo['login'];
				$_SESSION['mail'] = $userinfo['mail'];
				header("Location: profil.php?id=".$_SESSION['id']."");
			}
			else
			{
				$error = 'Adresse mail ou mot de passe invalide.';
			}
		}
		else
		{
			$error = 'Veuillez remplir tous les champs.';
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	
	<link rel="stylesheet" type="text/css" href="styleslog.css">
	<link rel="stylesheet" type="text/css" href="main.css">	
	
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Krona+One&family=Montserrat:wght@100;300&display=swap" rel="stylesheet">
	<title>Login</title>
</head>
<body>
	<section>
		<form action="" method="POST">
		<div class="box">
			<div class="form">
				<h2>Se Connecter</h2><br /><br /><br /><br />
				<form>
					<div class="inputBx">
						<label class="remeber">Identifiant :</label>
						<input type="text" placeholder="Pseudo" name="loginconnect" id="loginconnect">
						
					</div>
					<div class="inputBx">
						<label class="remeber">Mot de passe : </label>
						<input type="password" placeholder="Mot de Passe" name="passwordconnect" id="passwordconnect">
						
					</div>
					<label class="remeber"><input type="checkbox" name="rememberMe" id="remembercheckbox">Se Souvenir de Moi</label><br /><br />
					<div class="inputBx">
						<input type="submit" value="Connexion" name="login" id="login"><br /><br />
					</div>
				</form>
				<br /><br />
				<!--<a href="#">Mot de Passe oublié</a><br />-->
				<a href="register.php">Créer un Compte</a><br /><br /><br />
				<a href="Accueil.php">Revenir à l'Accueil</a>
				<br /><br />

<?php
			if (isset($error))
			{
				echo '<font color="red" class="error">' . $error . '</font>';
			}
		?>
	
			</div>
		</div>





		
</section>
</form>
</body>
</html>