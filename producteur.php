<?php session_start(); 
?>
<html>

<head>
    <meta charset="utf8">
    <title>Inscription producteur</title>
    <?php include "assets/styles.php"; ?>
</head>

<body class="bg">
    <?php include "assets/navbar.php"; ?>
    <div class="site-section" >
        <div class="formulaire">
            <form class="border border-light p-5" method="POST" action="enregistrer.php">
                <p>
                    Champs obligatoires
                    <b class="obligatoire">(*)</b>
                </p>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputPrenom">Prénom<b class="obligatoire">*</b></label>
                        <input class="form-control" name="prenom" id="inputPrenom" placeholder="Votre prénom" type="text" onkeyup="verifChamp(inputPrenom)" minlength="3" maxlength="40" required>
                        <span id="alertPrenom"></span>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputNom">Nom<b class="obligatoire">*</b></label>
                        <input class="form-control" name="nom" id="inputNom" placeholder="Votre nom" type="text" onkeyup="verifChamp(inputNom)" minlength="3" maxlength="40" required>
                        <span id="alertNom"></span>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputNumPort">Numero de téléphone portable<b class="obligatoire">*</b></label>
                        <input class="form-control" name="numPort" id="inputNumPort" placeholder="06 45 21 78 54" type="phonenumber" onkeyup="verifChamp(inputNumPort)" minlength="10" maxlength="10" required>
                        <span id="alertNumPort"></span>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputNumFix">Numero de téléphone fixe</label>
                        <input class="form-control" name="numFix" id="inputNumFix" placeholder="04 92 45 14 96" type="phonenumber" onkeyup="verifChamp(inputNumFix)" minlength="10" maxlength="10">
                        <span id="alertNumFix"></span>
                    </div>
                </div>
                <!--ADRESSE POSTALE-->
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputCodePostal">Code postal<b class="obligatoire">*</b></label>
                        <input type="text" class="form-control" name="codePostal" id="inputCodePostal" placeholder="93500" onkeyup="verifChamp(inputCodePostal)" maxlength="5" minlength="5" required>
                        <span id="alertCodePostal"></span>
                    </div>
					<div class="form-group col-md-6">
						<label for="inputVille">Ville<b class="obligatoire">*</b></label>
						<select class="form-control" name="ville" id="inputVille" size=1>
							<option selected="selected"> -- Choisissez une ville -- </option>
						</select>
					</div>
                </div>
                <div class="form-group">
                    <label for="inputAdresse">Adresse<b class="obligatoire">*</b></label>
                    <input type="text" class="form-control" name="adresse" id="inputAdresse" placeholder="Champs-Elysées" onkeyup="verifChamp(inputAdresse)" minlength="8" maxlength="50" required>
                </div>
                <div class="form-group">
                    <label for="inputAdresse2">Adresse 2</label>
                    <input type="text" class="form-control" name="adresse2" id="inputAdresse2" placeholder="Complément d'adresse" onkeyup="verifChamp(inputAdresse2)" minlength="3" maxlength="50">
                </div>
                <!-- FIN ADRESSE POSTALE -->
                <div class="form-group">
                    <label for="inputNumSiretSiren">Numéro SIRET ou SIREN<b class="obligatoire">*</b></label>
                    <input class="form-control mb-4" name="numSiretSiren" id="inputNumSiretSiren" placeholder="231 654 987 12315" type="text" onkeyup="verifChamp(inputNumSiretSiren)" minlength="14" maxlength="14" required>
                    <span id="alertNumSiretSiren"></span>
                </div>
                <div class="form-group">
                    <label for="inputEmail">Adresse e-mail<b class="obligatoire">*</b></label>
                    <input name="email" id="inputEmail" class="form-control mb-4" placeholder="JeanLaffont@exemple.com" type="email" onkeyup="verifChamp(inputEmail)" minlength="8" maxlength="50" required>
                    <span id="alertEmail"></span>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputMotDePasse">Mot de passe<b class="obligatoire">*</b></label>
                        <input class="form-control" name="motDePasse" id="inputMotDePasse" placeholder="Mot de passe" type="password" onkeyup="verifChamp(inputMotDePasse)" minlength="8" maxlength="30" required>
                        <span id="aideMdp"></span>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputMotDePasseConfirm">Confirmer mot de passe<b class="obligatoire">*</b></label>
                        <input class="form-control" id="inputMotDePasseConfirm" placeholder="Confimer mot de passe" type="password" onkeyup="verifChamp(inputMotDePasseConfirm)" minlength="8" maxlength="30" required>
                        <span id="aideMdpConfirm"></span>
                    </div>
                </div>
                <small id="defaultRegisterFormPhoneHelpBlock" class="form-text text-muted mb-4">
					                Longueur de 8 caractères minimum            
				</small>
                <button class="btn btn-info my-4 btn-block" value="Valider" onclick="validerInscription()" type="submit" name="validerProducteur"  id="submitButton">S'inscrire</button>
                <p>
                    En cliquant sur
                    <em>Valider</em> vous adhérez à nos
                    <a href="conditions.php" target="_blank">conditions d'utilisations</a>
                </p>
            </form>
        </div>
    </div>
    <?php include "assets/footer.inc.php";?>

    </body>
    <?php include "assets/scripts.php"; ?>
    <script src="assets/js/script_prod.js"></script>

</html>