<?php
include 'config.php';
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=grfusion', $user, $pass);
}
catch (exception $e)
{
	die('Erreur : ' . $e->getMessage());
}

	if (isset ($_POST['register']))
	{
		$login = htmlspecialchars($_POST['login']);
		$password = sha1($_POST['pass']);
		$_password = sha1($_POST['_pass']);
		$mail = htmlspecialchars($_POST['mail']);
		$_mail = htmlspecialchars($_POST['_mail']);
		if(!empty($_POST['login'])
			AND !empty ($_POST['pass'])
			AND !empty ($_POST['_pass'])
			AND !empty ($_POST['mail'])
			AND !empty ($_POST['_mail']))
		{
			$loginlength = strlen($login);
			// LONGUEUR DU PSEUDO <= 20
			if ($loginlength <= 20)
			{
				// MAIL ET CONFIRMATION DU MAIL SONT IDENTIQUES
				if($mail == $_mail)
				{
					if(filter_var($mail, FILTER_VALIDATE_EMAIL))
					{
						// MAIL NON ULTILISE
						$reqmail = $bdd->prepare('SELECT * FROM membres WHERE mail = ?');
						$reqmail->execute(array($mail));
						$mailexist = $reqmail->rowCount();
						if ($mailexist == 0)
						{
							// PSEUDO NON UTILISE
							$reqlogin = $bdd->prepare('SELECT * FROM membres WHERE login = ?');
							$reqlogin->execute(array($login));
							$loginexist = $reqlogin->rowCount();
							if ($loginexist == 0)
							{
								// PASSWORD ET CONFIRMATION IDENTIQUES
								if(($_POST['pass']) == ($_POST['_pass']))
								{
									// INSERTION DANS LA BASE DE DONNEE
									$insertmbr = $bdd->prepare('INSERT INTO membres(login, password, mail) VALUES(?, ?, ?)');
									$insertmbr->execute(array($login, $password, $mail));
									$error = 'Compte créé. <a href="login.php">Se connecter</a>';
								} 
								else 
								{
									$error = 'Les mots de passe ne sont pas identiques, veuillez réessayer.';
								}
							}
							else
							{
								$error = 'Le login est déjà utilisé.';
							}
							
						}
						else
						{
							$error = 'L\'adresse email est déjà utilisée.';
						}
					}
					else
					{
						$error = 'L\'adresse mail utilisée n\'est pas valide.';
					}
				}
				else
				{
					$error = 'Les adresses mail ne sont pas identiques.';
				}
			}
			else
			{
				$error = 'Votre login est trop long.';
			}
		}
		else 
		{
			$error = 'Veuillez remplir tous les champs.';
		}
	}
	else
	{
		
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
	<title>S'enregistrer</title>
</head>
<body>
	
	<section>   
		<form action="" method="POST">
		<div class="box">	
			<div class="form">	
				<h2>S'enregistrer</h2><br /><br />
				<form>
					<div class="inputBx">
						
						<label class="remeber">Identifiant:</label>

					

					
						<input type="text" name="login" id="login" placeholder="Votre Pseudo" 
						value="<?php if(isset($login)) { echo $login; } ?>">
					</div>
				
					<div class="inputBx">
					
						<label class="remeber">Mot de passe : </label>
					
					
						<input type="password" name="pass" id="pass" placeholder="Votre mot de passe"/>
					</div>
				
					<div class="inputBx">
						
						<label class="remeber">Confirmez votre mot de passe : </label>
						
						<input type="password" name="_pass" id="_pass" placeholder="Confirmez votre mot de passe">
					</div>
				
					<div class="inputBx">
						
						<label class="remeber">Adresse mail : </label>
					
					
						<input type="email" name="mail" id="mail" placeholder="Votre adresse mail" 
						value="<?php if(isset($_mail)) { echo $_mail; } ?>">
					
					</div>
				
					<div class="inputBx">
						
						<label class="remeber"> Confirm mail : </label>
					
					
						<input type="email" name="_mail" id="_mail" placeholder="Confirmez votre adresse mail"
						value="<?php if(isset($_mail)) { echo $_mail; } ?>">
					</div>
				
			<div class="inputBx">
			<input type="submit" name="register" value="Je m'enregistre" id="register" >
			<br><a href="login.php"><br />déjà inscrit ?</a>
		</div>
			</form>
		
		<?php
			if (isset($error))
			{
				echo '<font color="red">' . $error . "</font>";
			}
		?>

	</div>	
	</div> 
	</section> 
</body>
</html>