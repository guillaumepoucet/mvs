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
  <link rel="icon" type="image/png" sizes="192x192" href="../images/android-icon-192x192.png">
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
  <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
</head>

<body>
  <?php include('header.php'); ?>

  <!-- jumbotron -->
  <h2 class="hello display-4">Bonjour
    <span>
      <?php if (isset($_SESSION['admin'])) {
        echo $_SESSION['admin'];
      } else {
        echo $_SESSION['user'];
      }; ?></span> !
  </h2>
  <div id="jumbotron"></div>
  <?php
  include "inc/interface/co.php";
  $sql = $dbh->query('SELECT * FROM message WHERE id_message=1');
  $res = $sql->fetch();
  echo '<h4 class="pop w-100 text-center"><br>' . $res['contenu'] . '</h4>';
  ?>

  <!-- /jumbotron -->
  <div id="msg-container" class="container">
    <div class="row justify-content-center">
      <h4 class="col-12 my-3 my-md-4">Derniers messages</h4>

      <?php
      $super = $dbh->query('SELECT * FROM message WHERE id_message >1 ORDER BY date DESC LIMIT 50');
      $sup = $super->fetchAll();
      foreach ($sup as $su) : ?>
        <div class="card w-100 m-2 my-md-3 mx-md-5">
          <h5 class="card-header"><?= $su['titre'] ?></h5>
          <div class="card-body text-left">
            <h6 class="card-subtitle mb-2 text-muted"><?= date('d M Y', strtotime($su['date'])) ?></h6>
            <p class="card-text"><?= $su['contenu'] ?></p>
          </div>
            <div class="card-footer text-left"><?php if (isset($_SESSION['admin'])) : ?>
                <a href='modif_mess.php?id=<?= $su['id_message'] ?>' class='btn btn-primary mr-3'>Modifier</a>
                <a href='inc/interface/delete_mess.php?id=<?= $su['id_message'] ?>' class='btn btn-danger'>Supprimer</a>
              <?php endif ?></div>
        </div>

      <?php endforeach ?>

    </div>
  </div>
  <?php include('footer.php'); ?>

  <script src=" https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
</body>


</html>