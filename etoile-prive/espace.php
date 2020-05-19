<?php session_start();
include 'inc/interface/verif_co.php';?>
<!DOCTYPE html>
<html lang="fr">


<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
  <title>Espace suivi</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" media="screen" href="css/espace.css">


<body>
  <?php include('header.php');?>
  <?php require_once 'inc/interface/co.php';?>

  <img src="images/mbsP.png" class="img-fluid" style="margin-top: 3em; height: 50vh; width:100%; object-fit:cover;" alt="Responsive image de livraison">
  <div class="container-fluid col-12 text-center mt-3">
    <hr class="col-6" style="background-color: #0477BF; margin-top: 6em; ">
    <h1>Pointage Plateforme</h1>
    <hr class="col-6" style="background-color: #0477BF;">
  </div>
  <div id="esr" class="container-fluid col-12 text-center mt-3">




    <div class="fillframe">
      <div class="container-fluid">
        <form method="POST" action="#" class="col-12 text-center offset-3 mt-5">
          <select class="select" name="name">
            <option selected>Sélection de votre partenaire remettant</option>
            <?php
              $req = $dbh->prepare('SELECT * FROM user WHERE IDuser != 40 AND zip != 00000 ORDER BY zip ');
              $req->execute();
            while ($donnees = $req->fetch()){
              $var1 = $donnees['IDuser'];
              $var2 = $donnees['nom'];
              $var3 = $donnees['zip'];
              $dep =  substr ( $var3 , 0 , 2);
              if ($var1 == $id){
                  echo '<option value="'.$var1.'">'.$var2.'('.$dep.')</option>';
              } else {
                echo '<option value="'.$var1.'">'.$var2.'('.$dep.')</option>';
              }

              }
              ?>

      </div>
      <div id="esr" class="intframe">
        <div class="fillframe">
          <form method="POST" action="#" class="formframe">
            <input type="hidden" name="token" value="suires">
            <input class="btn btn-primary btn-md mx-auto my-auto" type="submit" value="Recherche">
          </form>


        </div>
      </div>
      <div class="container-fluid text-center mt-5">
        <div class="row">
          <div class="col-xl-3 col-lg-3 col-md-4 col-sm-10 col-10">
          </div>
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <?php require_once 'inc/interface/suivis.php';?></div>
          <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">

          </div>
        </div>
      </div>
    </div>
  </div>
  <?php include('footer.php');?>
</body>

</html>