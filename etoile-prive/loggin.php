<?php session_start()?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Etoile Champenoise - Connexion</title>
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/loggin.css">
</head>

<body>

    <form  method="post" class="form-signin ">
        <div id="logo" class="mb-5 mx-auto text-center">
    <img class="mt-5" src="images/logo.png" width="200px" alt="logo étoile champenoise">
        </div>
        <h1 class="h3 mb-3 text-light text-center font-weight-normal">Connectez vous !</h1>
        <label for="inputEmail" class="sr-only">Email</label>
        <input type="text" name="email" id="inputUserName" class="form-control" placeholder="Votre Identifiant" required
            autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Votre mot de passe"
            required>
        <div class="checkbox mb-3">
        </div>
        <button class="btn btn-lg btn-primary btn-block" name="submit" type="submit">Se connecter</button>
        <a href="../index.php" class="ac">Retour à l'Accueil</a>
        <p class="mt-5 mb-3 text-light text-center">&copy; Etoile Champenoise 2019</p>
    </form>
    <?php

    include 'inc/interface/co.php';

    $req = $dbh->prepare('SELECT * FROM login WHERE login = :email ');

    if(isset($_POST['submit'])){

        $req->execute([
        'email' => $_POST['email']
        ]);
        $user = $req->fetch();
        $isPasswordCorrect = password_verify($_POST['password'], $user['mdp']);
        if($user && $isPasswordCorrect){
            if($user['type']==1){
            $_SESSION['user'] = $_POST['email'];
            echo'
                <SCRIPT LANGUAGE="JavaScript">
                document.location.href="index.php"
                </SCRIPT>';}
            elseif($user['type']==2){
                $_SESSION['admin'] = $_POST['email'];
                echo'
                <SCRIPT LANGUAGE="JavaScript">
                document.location.href="index.php"
                </SCRIPT>';
            }
        }else{
           echo "<div class='alert alert-light fixed-top col-8 offset-2 mt-5 text-center' role='alert'>
           identifiants incorrects !
         </div>";
       }
    }

    ?>
<body>
