<?php

session_start();

if(isset($_POST['mailform']))	// Lorsque l'on clique sur envoyer
{

	// On sécurise les champs
	   $nom = htmlspecialchars($_POST['nom']);
	   $mail = htmlspecialchars($_POST['mail']);
	   $message = htmlspecialchars($_POST['message']);

	   // Si les 3 champs ne sont pas vides

	if(!empty($_POST['nom']) AND !empty($_POST['mail']) AND !empty($_POST['message']))
	{
		if(filter_var($mail, FILTER_VALIDATE_EMAIL))	
			{
					// On crée l'interface d'apparence du mail
				$header="MIME-Version: 1.0\r\n";
				$header.='From:'.$_POST['mail']."\n";
				$header.='Content-Type:text/html; charset="utf-8"'."\n";
				$header.='Content-Transfer-Encoding: 8bit';

					// Et son contenu :
				$message='
				<html>
					<body>
						<div align="center">
							<p> Nom de l\'expéditeur :' .$_POST['nom'].'<br /> </p>
							<p> Mail de l\'expéditeur :' .$_POST['mail'].'<br /></p>
							<br />
							'.nl2br($_POST['message']).'
						</div>
					</body>
				</html>
				';

					// On met le mail du destinataire, et l'objet du message.
				mail("clement.goguely@hotmail.fr", "CONTACT - bulle d'eau.fr", $message, $header);

				$msg = 'Message envoyé';
				$nom = $mail = $message = NULL;
        		unset($_POST);

			}
		else {
			$erreur = "Votre mail n'est pas valide";
		}
	}
	else
	{
		// Sinon, on affiche celle-ci en cas d'erreur
		$erreur="Tous les champs doivent être complétés !";
	}
}
?>
<html>
<head>
	<meta charset="utf-8" />
	<title> Contact </title>
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
</head>
<body>

	<p class="success"><?php if(isset($msg)){echo $msg;}?></p>
	<p class="erreur"><?php if(isset($erreur)){echo $erreur;}?></p>


	<form class="form" method="POST" action="">
		<h1>Contact</h1>
		<input class="input" type="text" name="nom" placeholder="Votre nom" value="<?php if(isset($_POST['nom'])) { echo $_POST['nom']; } ?>" />
		<input class="input" type="email" name="mail" placeholder="Votre email" value="<?php if(isset($_POST['mail'])) { echo $_POST['mail']; } ?>" />
		<textarea class="message" name="message" placeholder="Votre message"><?php if(isset($_POST['message'])) { echo $_POST['message']; } ?></textarea>
		<input class="button" type="submit" value="Envoyer !" name="mailform"/>
	</form>

</body>
</html>