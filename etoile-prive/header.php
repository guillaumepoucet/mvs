<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <title>Bar nav</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  <link rel="stylesheet" href="css/header.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>

<body>
  <!--Barre nav avec images-->
  <div class="main">
    <nav id="nav">
      <div class="img"><img src="images/logo2.png" style="width:110px; height:70px; margin-top: 0.2em;"></div>
      <div class="toggle">
        <i class="fas fa-bars menu"></i>
      </div>
      <!--Icone de connexion et de déconnexion-->
      <ul class="ul">
        <li class="li"><a href="index.php">Accueil</a></li>
        <li class="li"><a href="espace.php">Espace Suivi</a></li>
        <li class="dropdown2">
          <a href="javascript:void(0)" class="dropbtn2">Documents</a>
          <div class="dropdown-content2">
            <a href="reglement.php">Règlement Intérieur</a>
            <a href="charte.php">Charte Réseau</a>
            <a href="tarif-t.php">Tarif Traction</a>
            <a href="tarif-d.php">Tarif Distibution</a>
          </div>
        <li class="li"><a href="repertoire.php">Répertoire</a></li>
        <li class="li"><a href="carte.php">Carte Interactive</a></li>
        <?php if ($_SESSION['type'] == 2) {
          echo '
          <li class="li"><a href="support.php" class="dropbtn">Support Administrateur</a></li>';
        } ?>
        <li class="li"><a href="inc/interface/log_out.php"><i class="fas fa-sign-in-alt"></i></a></li>
        <!--<li><a><i class="fas fa-sign-out-alt"></i></a></li>-->

      </ul>
    </nav>
  </div>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script><link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/cookieconsent@3/build/cookieconsent.min.css" />
<script src="https://cdn.jsdelivr.net/npm/cookieconsent@3/build/cookieconsent.min.js"></script>
<script>
  $('document').ready(function() {
    $('.menu').click(function() {
      $('.ul').toggleClass('active');
    })
  })
  window.addEventListener("load", function() {
    window.cookieconsent.initialise({
      "palette": {
        "popup": {
          "background": "black"
        },
        "button": {
          "background": "#f1d600"
        }
      },
      "showLink": false,
      "theme": "edgeless",
      "content": {
        "message": "Ce site utilise des cookies pour vous garantir la meilleure expérience sur notre site.",
        "dismiss": "J'ai compris"
      }
    })
  });
</script>

</html>