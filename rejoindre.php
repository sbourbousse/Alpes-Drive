<?php
session_start();
?>
<!doctype HTML>
<html>
    <head>
        <title>Nous rejoindre</title>
        <?php include "assets/styles.php" ?>
    </head>
    <body class="bg">
        <?php include "assets/navbar.php" ?>




        <section class="site-section">
            <div class="container login-container">
                <div class="row">
                    <div class="col-md-6 login-form-1 white">
                        <h3>S'inscrire</h3>
                        <form>
                            <h4>Vous êtes un particulier</h4>
                            <div class="form-group py-3">
                                <div class="button_cont pb-2" align="center"><a class="example_f" href="client.php" rel="nofollow"><span>Je suis un client</a></div>
                            </div>
                            <h4>Vous êtes un Profesionnel</h4>
                            <div class="form-group py-3">
                                <div class="button_cont" align="center"><a class="example_f" href="producteur.php" rel="nofollow"><span>Inscription producteur</a></div>
                            </div>
                            <div class="form-group py-3">
                                <div class="button_cont" align="center"><a class="example_f" href="pointRelais.php" rel="nofollow"><span>Inscription point relais</a></div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6 login-form-2">
                        <h3 class="pb-5">Vous possédez un compte</h3>
                        <form>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Votre mail *" value="" />
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Mot de passe *" value="" />
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btnSubmit" value="Se connecter" />
                            </div>
                            <div class="form-group">

                                <a href="#" class="ForgetPwd" value="Login">Mot de passe oublié?</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>  
        </section>





    <?php include "assets/footer.inc.php";?>

    </body>
    <?php include "assets/script.php" ?>
</html>
