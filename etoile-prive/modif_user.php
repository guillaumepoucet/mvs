<?php session_start();
include 'inc/interface/verif_co.php';
?>
<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Modification Utilisateurs</title>
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
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" media="screen" href="css/support.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
		integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />

</head>

<body>

	<?php include('header.php');?>
    <?php
        include 'inc/interface/co.php';
        $current_id= $_GET['id'];
        $req=$dbh->query("SELECT * FROM login WHERE IDlogin='$current_id'");
        $compte= $req->fetch();
    ?>
    <h1 class="mt-5 pt-5">MODIFIER LE COMPTE :</h1>
    <form class="mt-5  col-8 offset-2" method="post">
    <div class="form-group">
        <label for="texte">Nom de compte : </label>
        <input id="texte" value="<?=$compte['login']?>" name="login" type="text" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="texte">Mot de passe: </label>
        <input id="texte" name="mdp" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="select">Type de compte : </label>
        <select id="select" name="type" class="form-control" required>
            <option value="1" <?php if($compte['type']==1){echo'selected';}?>>Utilisateur</option>
            <option value="2" <?php if($compte['type']==2){echo'selected';}?>>Administrateur</option>
        </select>
    </div>
    <button type="submit" name="submit" class="btn btn-primary btn-lg">Modifier</button>
</form>
<?php
$var1= $_POST['login'];
$var2= $_POST['type'];
$pass_hache = password_hash($_POST['mdp'], PASSWORD_BCRYPT);
if(isset($_POST['submit'])){
$dbh->query("UPDATE `login` SET `login` = '$var1', `mdp` = '$pass_hache', `type`= '$var2' WHERE `login`.`IDlogin`= $current_id");
echo'
<SCRIPT LANGUAGE="JavaScript">
document.location.href="support.php#1"
</SCRIPT>';
}
?>
</body>
</html>
