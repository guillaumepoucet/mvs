<?php session_start();
include 'inc/interface/verif_co.php'; ?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <!--FAVICON-->
  <link rel="apple-touch-icon" sizes="57x57" href="../images/apple-icon-57x57.png">
  <link rel="apple-touch-icon" sizes="60x60" href="../images/apple-icon-60x60.png">
  <link rel="apple-touch-icon" sizes="72x72" href="../images/apple-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="76x76" href="../images/apple-icon-76x76.png">
  <link rel="apple-touch-icon" sizes="114x114" href="../images/apple-icon-114x114.png">
  <link rel="apple-touch-icon" sizes="120x120" href="../images/apple-icon-120x120.png">
  <link rel="apple-touch-icon" sizes="144x144" href="../images/apple-icon-144x144.png">
  <link rel="apple-touch-icon" sizes="152x152" href="../images/apple-icon-152x152.png">
  <link rel="apple-touch-icon" sizes="180x180" href="../images/apple-icon-180x180.png">
  <link rel="icon" type="image/png" sizes="192x192" href="../images/android-icon-192x192.png">
  <link rel="icon" type="image/png" sizes="32x32" href="../images/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="96x96" href="../images/favicon-96x96.png">
  <link rel="icon" type="image/png" sizes="16x16" href="../images/favicon-16x16.png">
  <link rel="manifest" href="/manifest.json">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
  <meta name="theme-color" content="#ffffff">
  <!--END FAVICON-->
  <title>Répertoire Partenaire Etoile Champenoise</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="./css/repertoire.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>

<body>
  <?php include('header.php');
  require_once 'inc/interface/co.php'; ?>
  <img class="img-fluid-1 mx-auto my-auto" style="height: 55vh; width:100%; object-fit:cover;" src="./images/business.jpg" alt="Responsive-Image Répertoire">
  <div class="container-fluid text-center mt-3">
    <hr class="col-6" style="background-color: #0477BF; margin-top:6em;">
    <h1>Répertoire des Partenaires</h1>
    <hr class="col-6" style="background-color: #0477BF;">
  </div>
  <div id="rer" class="container-fluid col-12 text-center mt-3">




    <div class="fillframe">
      <div class="container">
        <div class="row">
          <form method="POST" action="#" class="col-12 text-center offset-3 mt-5">
            <select class="select" name="name">
              <option selected>Sélection de votre partenaire</option>
              <?php
              $req = $dbh->prepare('SELECT * FROM user ORDER BY nom ');
              $req->execute();
              while ($donnees = $req->fetch()) {
                $var1 = $donnees['IDuser'];
                $var2 = $donnees['nom'];
                if ($var1 == $id) {
                  echo '<option value="' . $var1 . '">' . $var2 . '</option>';
                } else {
                  echo '<option value="' . $var1 . '">' . $var2 . '</option>';
                }
              }
              ?>




              <div id="rer" class="intframe">
                <div class="fillframe">
                  <form method="POST" action="#" class="formframe">
                    <input type="hidden" name="token" value="repres">
                    <input class="btn btn-primary btn-lg mb-5" type="submit" value="Recherche">

                  </form>
                </div>
              </div>




              <div class="resframe2"></div>

              <?php include 'inc/interface/repertoire.php'; ?>

              <div class="col col-md-7 mx-auto">
                <li id="li" class="repertoire-dl">
                  <p class="txtmed"><a href="data/repertoire-2018.xlsx" class="y-txtmed">Téléchargez la liste complète : ICI !</a> </p>
                </li>
              </div>
            </select>
          </form>
        </div>
      </div>

      <?php include('footer.php'); ?>
</body>

</html>