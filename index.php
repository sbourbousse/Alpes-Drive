<?php
session_start();
?>
<!doctype HTML>
<html>
    <head>
        <title>Bienvenue sur Alpes Drive</title>
        <?php include "assets/styles.php"; ?>
    </head>
    <body class="bg">
      <div id="page-container">
      <div id="container-wrap">
      <?php include "assets/navbar.php" ?>
      <div class="site-section">
        <div class="container">
          <div class="row align-items-center justify-content-center">
            <div class="col-md-7 text-center text-white">
              <h1 class="mb-4">Alpes-Drive</h1>
              <p class="mb-4">Bienvenue sur notre site de vente de produits locaux. Nos producteur sont fiers de vous présenter leurs produits bio qui garantissent le respect de l'environnement !</p>
              <p><a href="rejoindre.php" class="btn btn-primary btn-outline-white py-3 px-5">Nous rejoindre</a></p>
            </div>
          </div>
        </div>
      </div>

        <div class="container">
          <div class="card p-5">
            <div class="car-body">
              <h4 class="card-title text-center">Selectionnez les points de ventes dans lesquelles vous pouvez récuperer vos achats</h4>
              <div class="md-form form-row">
                <div class="col-1 text-center">
                  <a><i class="fas fa-map-marker px-7  prefix" aria-hidden="true"></i></a>
                </div>
                <div class="col-6">
                  <i class="fas fa-home prefix"></i>
                  <input type="text" id="adresse" class="form-control" placeholder="Adresse">
                </div>
                <div class="col-2">
                  <i class="far fa-map prefix"></i>
                  <input type="text" id="codePostale" class="form-control" placeholder="Code postale">
                </div>  
                <div class="col-3">
                  <i class="fas fa-city prefix"></i>
                  <input type="text" id="ville" class="form-control" placeholder="Ville">
                </div>
              </div>
              <div class="row">
                <div class="col-4">
                </div>
                <div class="col-4">
                  <p class="mx-auto"><a href="#" class="btn btn-info  py-3 px-5">Points relais proches</a></p>
                </div>
                
              </div>
              <div class="text-center">
                <img src="assets/img/agriculteur.jpg" width="512" class="rounded-circle">
              </div>
            </div>
          </div>
        </div>
      </div>
      

    <?php include "assets/footer.inc.php";?>
</div>
      
    </body>
    <?php include "assets/scripts.php"; ?>
</html>
