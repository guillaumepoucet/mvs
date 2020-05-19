<?php session_start()?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
    <title>Modification Prix</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body>
 <?php
 include 'inc/interface/co.php';
 include 'header.php';
 $current_id=$_GET['id'];
 $req=$dbh->query("SELECT * FROM traction WHERE id_traction = '$current_id'");
 $prix=$req->fetch();
 ?>
    <h1 style="margin-top:8%;">MODIFIER LE TARIF :</h1>
    <h2><strong><?= $prix['DESTINATION']?> </strong> (<?=$prix['DPT']?>)<h2>
    <form class="mt-5  col-8 offset-2" method="post">

    <div class="form-group">
        <label for="texte">Département : </label>
        <input id="texte" value="<?=$prix['DPT']?>" name="dpt" type="text" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="texte">Destination : </label>
        <input id="texte" value="<?=$prix['DESTINATION']?>" name="destination" type="text" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="texte">Kilomètres : </label>
        <input id="texte" value="<?=$prix['KMS']?>" name="kms" type="text" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="texte">Prix traction à la tonne : </label>
        <input id="texte" value="<?=$prix['TONNE']?>" name="login" type="text" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="texte">Prix traction à la palette </label>
        <input id="texte" value="<?=$prix['PALETTE']?>" name="mdp" class="form-control" required>
    </div>

    </div>
    <button type="submit" name="submit1" class="btn btn-primary btn-lg">Modifier</button>
</form>
<?php
$var1= $_POST['login'];
$var2= $_POST['mdp'];
$var3= $_POST['kms'];
$var4= $_POST['destination'];
$var5= $_POST['dpt'];
if(isset($_POST['submit1'])){
$dbh->query("UPDATE `traction` SET `TONNE` = '$var1', `PALETTE` = '$var2', `KMS` = '$var3', `destination` = '$var4', `dpt` = '$var5' WHERE `traction`.`id_traction`= $current_id");
echo'
<SCRIPT LANGUAGE="JavaScript">
document.location.href="tarif-t.php"
</SCRIPT>';
}
?>
</body>
</html>
