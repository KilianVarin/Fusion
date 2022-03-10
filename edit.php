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
if(isset($_SESSION['id']))
{
	$requser = $bdd->prepare('SELECT * FROM membes WHERE id = ?');
	$requser->execute(array($_SESSION['id']));
	$user = $requser->fetch();
	if(isset($_POST['_login']) AND !empty($_POST['_login']) AND $_POST['_login'] != $user['login'])
	{

		{
			$newlogin = htmlspecialchars($_POST['_login']);
			$insertlogin  = $bdd->prepare('UPDATE membres SET login = ? WHERE id = ?');
			$insertlogin->execute(array($newlogin, $_SESSION['id']));
			header("location: profil.php?id=".$_SESSION['id']);

		}
	}
	if(isset($_POST['_mail']) AND !empty($_POST['_mail']) AND $_POST['_mail'] != $user['mail'])
	{
		$newmail = htmlspecialchars($_POST['_mail']);
		$insertmail  = $bdd->prepare('UPDATE membres SET mail = ? WHERE id = ?');
		$insertmail->execute(array($newmail, $_SESSION['id']));
		header("location: profil.php?id=".$_SESSION['id']);
	}
	if(isset($_POST['_password']) AND !empty($_POST['_password']) AND isset($_POST['__password']) AND !empty($_POST['__password']))
	{
		$new_password = sha1($_POST['_password']);
		$new__password = sha1($_POST['__password']);
		if($new_password == $new__password)
		{
			$insertpassword = $bdd->prepare('UPDATE membres SET password = ? WHERE id = ?');
			$insertpassword->execute(array($new_password, $_SESSION['id']));
			header("location: profil.php?id=".$_SESSION['id']);
		}
		else
		{
			$msg = 'les mots de passe ne sont pas identiques';
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="styleslog.css">
	<link rel="stylesheet" type="text/css" href="main.css">	
	<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Krona+One&family=Montserrat:wght@100;300&display=swap" rel="stylesheet">
	<title>Profile</title>
</head>
<body>
	<section>
		<div class="box">
			<div class="form">
	
	<div align="center">
		<h2>Modifier mon profil</h2><br><br>
		<div>
			<form method = "post" action="" enctype="multipart/form-data">
				<div class="inputBx">
				<label>Pseudo : </label>
				<input type="text" name="_login" placeholder="Pseudo" value="<?php echo $user['login']; ?>"><br><br>
				<label>Mail : </label>
				<input type="email" name="_mail" placeholder="Mail" value="<?php echo $user['mail']; ?>"><br><br>
				<label>Password : </label>
				<input type="password" name="_password" placeholder="Mot de Passe"><br><br>
				<label>Password Confirmation : </label>
				<input type="password" name="__password" placeholder="Confirmation Mot de Passe"><br><br>
				<input type="submit" value="Submit"><br><br>	
				<a href="Accueil.php">Revenir à l'Accueil</a>

			</form>
			<?php if(isset($msg)) { echo $msg;} ?>
		</div>	
	</div> 
</section>
</body>
</html>
<?php
}
else
{
	header("location: login.php");
}
?>