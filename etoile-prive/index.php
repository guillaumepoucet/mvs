<?php session_start();
include 'inc/interface/verif_co.php'
?>

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
<link rel="icon" type="image/png" sizes="192x192"  href="../images/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="../images/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="../images/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="../images/favicon-16x16.png">
<link rel="manifest" href="/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">
<!--END FAVICON-->

  <title>Etoile Champenoise - Espace utilisateurs</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" media="screen" href="css/index.css">
  <script src="main.js"></script>
  <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
    integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
</head>

<body>
  <?php include('header.php');?>

  <div id="jumbotron" class="mt-5">
  <h1 class="w-100 text-center mt-4 pt-5 text-light" id="tit">Bonjour <span><?php if(isset($_SESSION['admin'])){echo $_SESSION['admin'];}else{echo$_SESSION['user'];}; ?></span> !</h1>
  <?php
  include "inc/interface/co.php";
  $sql=$dbh->query('SELECT * FROM message WHERE id_message=1');
  $res=$sql->fetch();
  echo'<h2 class="pop w-100 text-center">'.$res['contenu'].'</h2>';
 ?>

 <img src='images/mbsP.png' width="100%">

  </div>
  <div class="main-carousel  col-12" data-flickity='{ "cellAlign": "left", "contain": true }'>
      <?php

			$super=$dbh->query('SELECT * FROM message WHERE id_message >1 ORDER BY date DESC LIMIT 50');
			$sup=$super->fetchAll();
			foreach($sup as $su){
			echo ("<div class='carousel-cell w-50 text-center'>
					<div class='card mx-auto w-100 card'>
						<div class='card-body'>
							<h5 class='card-title'>".$su['titre']."</h5>
							<h6 class='card-subtitle mb-2 text-muted'>".$su['date']."</h6>
              <p class='card-text'>".$su['contenu']."</p>");
              if(isset($_SESSION['admin'])){
                echo "<div class='row d-flex justify-content-center'>
								<a href='modif_mess.php?id=".$su['id_message']."' class='btn btn-primary mr-3'>Modifier</a>
								<a href='inc/interface/delete_mess.php?id=".$su['id_message']."' class='btn btn-danger'>Supprimer</a>
							</div>";
              }
							echo"
						</div>
					</div>
				</div>";
			}
			?>
      </div>

  <?php include('footer.php');?>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
  integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
</body>


</html>
