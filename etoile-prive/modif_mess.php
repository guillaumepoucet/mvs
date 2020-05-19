<?php session_start();
if(!isset($_SESSION['admin'])){
	header('location:loggin.php');}?>
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
	<title>Modification de message</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" media="screen" href="css/support.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
		integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">

</head>

<body>

	<?php include('header.php');?>

	<div class="container-fluid mt-5">
		<div class="row mt-5">
			<div class="col-xl-4 col-lg-4 col-md-3 col-sm-12 col-12 mt-5"> </div>
			<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 mt-5">
				<form method="post">
				<?php
				include 'inc/interface/co.php';
					$current_id=$_GET['id'];
					$req=$dbh->query('SELECT * from message WHERE id_message= '.$current_id.'');
					$res=$req->fetch();
					?>
					<div class="form-group">
						<p>modifier un message :</p>
						<input type="text" class="form-control" name="titre" value="<?=$res['titre']?>" placeholder="Titre du message">
						<textarea id="textarea" name="conte" placeholder="Contenu du message" class="form-control"
							required><?=$res['contenu']?></textarea>
						<input type="date" class="form-control" value="<?=$res['date']?>" name="date">
					</div>
					<button type="submit" name="submit2" class="btn btn-primary btn-lg">Modifier</button>
					<?php
				$conte=$_POST['conte'];
				$titre=$_POST['titre'];
				$date =$_POST['date'];
				if(isset($_POST['submit2'])){

					$dbh->query("UPDATE message SET `titre`='$titre', `contenu`='$conte', `date`='$date' WHERE id_message=$current_id");
					echo'
					<SCRIPT LANGUAGE="JavaScript">
					document.location.href="index.php"
					</SCRIPT>';
					}

				?>
				</form>

				<div class="col-xl-4 col-lg-4 col-md-3 col-sm-12 col-12"></div>
			</div>

		</div>
</body>
