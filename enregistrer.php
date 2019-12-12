<?php session_start(); ?>
<?php
	include "assets/connect.php";

	// Variable bouleenne , si la page a été actualisé, la valeur prend "true", sinon la valeur prend "false"
	$pageWasRefreshed = isset($_SERVER['HTTP_CACHE_CONTROL']) && $_SERVER['HTTP_CACHE_CONTROL'] === 'max-age=0';

	// Si la page à été actualisé, on renvoie la personne à l'accueil
	if($pageWasRefreshed || (!(isset($_POST))) ) {
	   $error=1;
	}
	// Sinon
	else 
	{
		// Si il existe des variable POST ( formulaire ) on verifie que l'email n'existe pas déjà dans la base de données et on verifie que tout les champs sont bien remplis
		if (isset($_POST))
		{
			$reqVerif='SELECT utilisateurMail FROM utilisateur WHERE utilisateurMail = \''.$_POST['email'].'\';';
			$res=mysqli_query($maBase,$reqVerif);
			$row=mysqli_fetch_row($res);

			// Si l'email existe déjà dans la base de donnée, la variable emailExists prend la valeur 1
			if($_POST['email']==$row[0])
			{
				$emailExists=1;
			}
			// Sinon la valeur emailExists prend la valeur 0
			else $emailExists=0;

			// Variables de verification
			$inputVide         = 0;
			$compteur          = 0;
			$validation        = 0;

			// Initialisation des variables de l'utilisateur, on ne les utilisera que si les champs entrées passent la verification
			$id           	   = time() - 1552001000;
			$dateInscription   = date("Y-m-d");
			$cleMail           = rand(1 , 2147483647);

			// Verification que tout les champs sont bien remplis (sauf facultatifs)
			foreach ($_POST as $valeur) {
				if (empty($valeur)) 
				{
					$inputVide = 1; //Si un seul des champs obligatoir est vide, inputVide recoit 1
					echo "L'input ".$compteur." est vide \n";
					header("location:./producteur.php"); //Renvoi a la page d'inscription
					$validation = 0;
				}
				$compteur++;
			}
		}
		// Sinon, on passe à une verification plus minutieuse, la variable validation passe à 1 si un des champs n'est pas correctement rempli
		if($inputVide!=1)
			{
			$validation = 1;
			//verification du prenom
			if ((strlen($_POST['prenom']) < 3 || strlen($_POST['prenom']) > 40) && $validation == 1) {
				$validation = 0;
			}
			if ((strlen($_POST['nom']) < 3 || strlen($_POST['nom'] > 40)) && $validation == 1) {
				$validation = 0;
			}
			if ((strlen($_POST['numPort']) != 10) && $validation == 1) {
				$validation = 0;
			}
			if ((strlen($_POST['adresse']) > 50) && $validation == 1) {
				$validation = 0;
			}
			if ((strlen($_POST['codePostal']) != 5) && $validation == 1) {
				$validation = 0;
			}
			if ((strlen($_POST['ville']) < 3 || strlen($_POST['ville']) > 30) && $validation == 1) {
				$validation = 0;
			}
			if (isset($_POST['numSiretSiren']) && (strlen($_POST['numSiretSiren']) != 14) && $validation == 1) {
				$validation = 0;
			}
			if ((strlen($_POST['email']) < 7 || strlen($_POST['email']) > 50) && $validation == 1) {
				$validation = 0;
			}
			if ((strlen($_POST['motDePasse']) < 8 || strlen($_POST['motDePasse']) > 30) && $validation == 1) {
				$validation = 0;
			}
		}

		// Apres les verifications

		// Si tout les champs sont correctement rempli, que l'email n'existe pas déjà dans la base de données et que cette inscription concerne un producteur
		if ($validation == 1 && $emailExists==0 && isset($_POST['validerProducteur'])) 
		{
			// Type d'utilisateur : 1 pour producteur, 2 pour Client, 3 pour point Relais
			$userType=1;

			// Inserer les information d'authentification dans la table user

			$requete = "INSERT INTO User (userMail, userMotDePasse, userDateInscription, userCleMail, userVerifMail,userType)
			VALUES ('".$_POST['email']."','".md5($_POST['motDePasse'])."','".$dateInscription."','".$cleMail."','false','".$userType."');";
			$maBase->query($requete);


			//preparation de la requete
			$requete = "INSERT INTO Producteur ( prodId, prodNom, prodPrenom, prodNumPort, prodNumFixe, prodAdresse, prodAdresse2, prodVille, prodCodePostal, prodNumSiretSiren, userMail) 
					VALUES ('" . $id . "','" . $_POST['nom'] . "','" . $_POST['prenom'] . "','" . $_POST['numPort'] . "',NULL,'" . $_POST['adresse'] . "',NULL,'" . $_POST['ville'] . "','" . $_POST['codePostal'] . "','" . $_POST['numSiretSiren'] . "','".$_POST['email']."');";
				
			// inserer les informations du producteur dans la table producteur
			$maBase->query($requete);
		

		}
		// Sinon
		else 
		{
			// Si tout les champs sont correctement rempli, que l'email n'existe pas déjà dans la base de données et que cette inscription concerne un client
			if ($validation == 1 && $emailExists==0 && isset($_POST['validerClient'])) 
			{
				// Type d'utilisateur : 1 pour producteur, 2 pour Client, 3 pour point Relais
				$userType=2;

				// Inserer les information d'authentification dans la table user

				$requete = "INSERT INTO User (userMail, userMotDePasse, userDateInscription, userCleMail, userVerifMail, userType)
				VALUES ('".$_POST['email']."','".md5($_POST['motDePasse'])."','".$dateInscription."','".$cleMail."','false','".$userType."');";
				$maBase->query($requete);

				//preparation de la requete
				$requete = "INSERT INTO Client ( cliId, cliNom, cliPrenom, cliNumPort, cliNumFixe, cliAdresse, cliAdresse2, cliVille, cliCodePostal, userMail) 
						VALUES ('" . $id . "','" . $_POST['nom'] . "','" . $_POST['prenom'] . "','" . $_POST['numPort'] . "',NULL,'" . $_POST['adresse'] . "',NULL,'" . $_POST['ville'] . "','" . $_POST['codePostal'] . "','".$_POST['email']."');";


				// inserer les informations du client dans la table client
				$maBase->query($requete);

			}
			else
			{
				// Si tout les champs sont correctement rempli, que l'email n'existe pas déjà dans la base de données et que cette inscription concerne un point Relais
				if ($validation == 1 && $emailExists==0 && isset($_POST['validerPointRelais'])) 
				{
					// Type d'utilisateur : 1 pour producteur, 2 pour Client, 3 pour point Relais
					$userType=3;

					// Inserer les information d'authentification dans la table user

					$requete = "INSERT INTO User (userMail, userMotDePasse, userDateInscription, userCleMail, userVerifMail, userType)
					VALUES ('".$_POST['email']."','".md5($_POST['motDePasse'])."','".$dateInscription."','".$cleMail."','false','".$userType."');";
					$maBase->query($requete);

					//preparation de la requete
					$requete = "INSERT INTO PointRelais ( pointRelaisId, pointRelaisNomGerant, pointRelaisPrenomGerant, pointRelaisNumPort, pointRelaisNumFixe, pointRelaisAdresse,pointRelaisAdresse2, pointRelaisVille, pointRelaisCodePostal, pointRelaisNumSiretSiren, pointRelaisNomEntreprise, pointRelaisActivite, userMail)
							VALUES ('" . $id . "','" . $_POST['nom'] . "','" . $_POST['prenom'] . "','" . $_POST['numPort'] . "','NULL','" . $_POST['adresse'] . "','NULL','" . $_POST['ville'] . "','" . $_POST['codePostal'] . "','".$_POST['numSiretSiren']."','".$_POST['nomEntreprise']."','".$_POST['activite']."','".$_POST['email']."');";	
						

					// inserer les informations du client dans la table client
					$maBase->query($requete);
				}

					
			}
		}

		// Si tout les champs sont correctement remplis, et que l'email n'existe pas déjà dans la base de donnée, on prepare et envoie le mail
		if ($validation == 1 && $emailExists==0) 
		{
			//Variables du formulaire
			$email  = $_POST['email'];
			$nom    = $_POST['nom'];
			$prenom = $_POST['prenom'];
			$phone  = $_POST['numPort'];
			$date   = $dateInscription;
			//$message = $_POST['message'];
			
			// Mail
			$objet   = 'Confirmation de votre inscrition';
			$contenu = '
				<html>
					<head>
						<title>Bienvenue</title>
					</head>
					<body>
						<div >
							<h1 style="margin-left:40%;">Alpes Drive</h1>
							<h2>Bienvenue Mr/Mme ' . $nom . '</h2>
							<div style="margin-left:20px;">
								<p>Nous vous remercions de votre inscription sur notre site</p>
								<p> Si il ne s\'agit pas de vous, veuillez nous excuser de la gêne occasionnée, veuillez ne pas cliquer sur le lien ci dessous et ignorer ce message </p>
							</div>
						</div>
						<div >
							<p> Veuillez appuyer sur ce lien d\'activation : http://127.0.0.1/~sbourbousse/Alpes-Drive/emailConfirm.php?id=' . $id . '&key=' . md5($cleMail) . '&uT=' . $userType . '</p>
						</div>
					</body>
				</html>';
			/*<br><br>*/
			$entetes = "From: Alpes-Drive@btsinfogap.org \r\n";
			//$entetes .= "Reply-To: ". strip_tags($_POST['req-email']) . "\r\n";
			$entetes .= "CC: " . $email . "\r\n";
			$entetes .= "MIME-Version: 1.0\r\n";
			$entetes .= "Content-Type: text/html; charset=UTF-8\r\n";
			
			// Envoi du mail
			mail($email, $objet, $contenu, $entetes);
		}

	}
		

?>
<html>
	<head>
		<meta charset="utf8"/>
		<title>Confirmation</title>
		<?php include "assets/styles.php"; ?>
	</head>
	<body class="bg">
		<?php include "assets/navbar.php" ?>	

		<blockquote class="blockquote bq-<? if (isset($email)) echo 'success'; else echo 'warning';?>">
		<p class="bq-title">Confirmation de votre mail</p>
		<p>
<?php 
	// Si des variable POST existent et que la variable email préparé existe
	if ($_POST && isset($email))
	{
		// Si l'email a été envoyé, on confirme dans la page que l'email a bien été envoyé
		if ($email) 
		{
			echo 'Un mail à été envoyé à '.$email;
		}
		// Sinon on ecris qu'une erreur s'est produite à l'utilisateur
		else echo 'Une erreur s\'est produite lors de l\'envoi';
		//header("location:./emailConfirm.php");
	}
	// Autrement, si l'email existe déjà dans la abse de données, on ecris à l'utilisateur que cette email est déjà pris
	else if (@$emailExists==1)
	{
		echo "Erreur : l'email ".$_POST['email']." est déjà inscrit.";
	}
	// Pour un quelconque autre probleme, on ecris qu'une erreur est survenue
	else if ($error=1)
	{
		echo "Cette page est expiré";
	}
	else
	{
		echo 'Une erreur est survenue';
	}
	
?>
		</p>
		</blockquote>

	    <?php include "assets/footer.inc.php";?>
	</body>

    <?php include "assets/scripts.php"; ?>

</html>