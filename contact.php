<?php session_start();
?>
<html>
    <head>
        <meta charset="utf8">
        <title>Nous contacter</title>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="css/mdb.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="css/modules/animations-extended.css">
        <?php include "elements_fixes/favicon.php"; ?>
    </head>
    <body class="bg">
        <?php include('./elements_fixes/navbar.inc.php') ?>
        <div class="formulaire" style="padding:20px;margin-top:20px;">
                
            <!--Section: Contact v.2-->
            <section class="mb-4">

            <!--Section heading-->
            <h2 class="h1-responsive font-weight-bold text-center my-4">Nous contacter</h2>
            <!--Section description-->
            <p class="text-center w-responsive mx-auto mb-5">Vous avez des questions? N'hésitez pas à nous contacter directement. Nos equipes prendront en charges vos demandes
                au plus vite</p>

            <div class="row">

                <!--Grid column-->
                <div class="col-md-9 mb-md-0 mb-5">
                    <form id="contact-form" name="contact-form" action="emailConfirm.php" method="POST">

                        <!--Grid row-->
                        <div class="row">

                            <!--Grid column-->
                            <div class="col-md-6">
                                <div class="md-form mb-0">
                                    <input type="text" id="name" name="name" class="form-control">
                                    <label for="name" class="">Votre nom</label>
                                </div>
                            </div>
                            <!--Grid column-->

                            <!--Grid column-->
                            <div class="col-md-6">
                                <div class="md-form mb-0">
                                    <input type="text" id="email" name="email" class="form-control">
                                    <label for="email" class="">Votre mail</label>
                                </div>
                            </div>
                            <!--Grid column-->

                        </div>
                        <!--Grid row-->

                        <!--Grid row-->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="md-form mb-0">
                                    <input type="text" id="subject" name="subject" class="form-control">
                                    <label for="subject" class="">Sujet</label>
                                </div>
                            </div>
                        </div>
                        <!--Grid row-->

                        <!--Grid row-->
                        <div class="row">

                            <!--Grid column-->
                            <div class="col-md-12">

                                <div class="md-form">
                                    <textarea type="text" id="message" name="message" rows="2" class="form-control md-textarea"></textarea>
                                    <label for="message">Votre message</label>
                                </div>

                            </div>
                        </div>
                        <!--Grid row-->

                    </form>

                    <div class="text-center text-md-left">
                        <a class="btn btn-primary" onclick="validateForm()">Envoyer</a>
                    </div>
                    <div class="status" id="status"></div>
                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-md-3 text-center">
                    <ul class="list-unstyled mb-0">
                        <li><i class="fas fa-map-marker-alt fa-2x"></i>
                            <p>Les peyrons, 05000, Gap</p>
                        </li>

                        <li><i class="fas fa-phone mt-4 fa-2x"></i>
                            <p>04 92 00 00 00</p>
                        </li>

                        <li><i class="fas fa-envelope mt-4 fa-2x"></i>
                            <p>Alpes-Drive@btsinfogap.org</p>
                        </li>
                    </ul>
                </div>
                <!--Grid column-->

            </div>

            </section>
            <!--Section: Contact v.2-->
        </div>
        
        <?php include('./elements_fixes/footer.inc.php') ?>
    </body>
    <script>
        function validateForm() {
        var name =  document.getElementById('name').value;
        if (name == "") {
            document.getElementById('status').innerHTML = "Nom ne peut pas etre vide";
            return false;
        }
        var email =  document.getElementById('email').value;
        if (email == "") {
            document.getElementById('status').innerHTML = "Email ne peut pas etre vide";
            return false;
        } else {
            var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            if(!re.test(email)){
                document.getElementById('status').innerHTML = "Email format invalide";
                return false;
            }
        }
        var subject =  document.getElementById('subject').value;
        if (subject == "") {
            document.getElementById('status').innerHTML = "Sujet ne peut pas etre vide";
            return false;
        }
        var message =  document.getElementById('message').value;
        if (message == "") {
            document.getElementById('status').innerHTML = "Message ne peut pas etre vide";
            return false;
        }
        document.getElementById('status').innerHTML = "Envoi...";
        document.getElementById('contact-form').submit();

        }
    </script>
</html>