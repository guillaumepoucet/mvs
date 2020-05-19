<?php session_start();
include 'inc/interface/verif_co.php';
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
	<title>Support Administrateur</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" media="screen" href="css/support.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
		integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">

</head>

<body>

	<?php include('header.php');?>
	<!----------------------- ONGLET DE NAVIGATION ----------------------->
	<div class="espace"></div>
	<div class="espace"></div>

	<div class="container-fluid text-center">
		<div class="row">
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<a href="#1">
					<p class="onglet"> Gestion de compte </p>
				</a>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<a href="#2">
					<p class="onglet"> Gestion des messages</p>
				</a>
			</div>
		</div>
	</div>


	<!----------------------- GESTION DE COMPTE ----------------------->


	<div class="container-fluid">
		<h2 id="1"><u> INTERFACE DE GESTION DE COMPTES </u></h2>

		<div class="espace"></div>

		<div class="row titreG">
			<!----------------------- COLONNE DE GAUCHE ----------------------->
			<div class="mt- col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12" >

				<h4> Création d'un nouveau compte </h4>
				<center>
					<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12 titreG">
						<form method="post">
							<div class="form-group">
								<label for="texte">Nom de compte : </label>
								<input id="texte" name="login" type="text" class="form-control" required>
							</div>
							<div class="form-group">
								<label for="texte">Mot de passe: </label>
								<input id="texte" name="mdp" class="form-control" required>
							</div>
							<div class="form-group">
								<label for="select">Type de compte : </label>
								<select id="select" name="type" class="form-control" required>
									<option value="1">Utilisateur</option>
									<option value="2">Administrateur</option>
								</select>
							</div>
							<button type="submit" name="submit" class="btn btn-primary btn-lg">Envoyer</button>
						</form>

					</div>
				</center>
			</div>
			<?php
			include 'inc/interface/co.php';
			if(isset($_POST['submit'])){
				$log= $_POST['login'];
				$mdp = $_POST['mdp'];
				$type =$_POST['type'];
				$pass_hache = password_hash($mdp, PASSWORD_BCRYPT);
				$dbh->query("INSERT INTO login (`login`, `mdp`, `islocked`, `type`) VALUES ('$log', '$pass_hache','0', '$type')");
			}
			?>

			<!------------------------- TABLEAU DE DROITE---------------------->

			<div class="mt-3 col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12" id="1">
				<h3> Comptes actifs </h2>

					<center>
						<div class="col-xl-11 col-lg-11 col-md-11 col-sm-12 col-12">

							<table class="table table-sm">
								<thead class="table-info">
									<tr>
										<th class="table-danger">Nom du compte</th>
										<th>Type de compte</th>
										<th>Compte bloqué</th>
										<th>Modification</th>
										<th>Suppression</th>
									</tr>
								</thead>
								<tbody>
									<?php
    							include 'inc/interface/co.php';
								$req = $dbh->query('SELECT * FROM `login`');
								while ($donnees = $req->fetch()){
							?>
									<tr>
										<td><?php echo $donnees['login']; ?></td>

										<td><?php if ($donnees['type']==2){echo 'Admin';}
									else {echo 'User';} ?></td>

										<td><?php if ($donnees['islocked']==0){echo 'Non';}
									else {echo 'Oui';} ?></td>

										<div class="suppline2">

											<td>
												<a href="modif_user.php?id=<?=$donnees['IDlogin']?>"
													class="btn btn-warning">MODIFIER</a>
											</td>

										</div>


										<td><?php if ($donnees['login']==Administrateur){echo 'Non supprimable';}
									else {echo '
										<a href="inc/interface/delete_user.php?id='.$donnees['IDlogin'].'" class="btn btn-danger">SUPPRIMER</a>
										';} ?></td>
									</tr>


									<?php }
        							$req->closeCursor(); // Termine le traitement de la requête
       							 ?>
								</tbody>
							</table>
						</div>
					</Center>
			</div>
		</div> <!-- FERMETURE DU ROW ligne 49 -->
	</div> <!-- FERMETURE DU CONTAINER ligne 48 -->
	<div class="espace"></div>
	<div class="espace"></div>

	<!------------------------- Parallaxe ---------------------->
	<div class="parallax-window" data-parallax="scroll" data-image-src="images/mbsP.png" alt="Competences"></div>


	<!----------------------- GESTION DES MESSAGES PRE-DEFINIS ----------------------->

	<div class="container-fluid">
		<div class="row titreG">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" id="2">
				<h2> INTERFACE DE GESTION DES MESSAGES-PREDEFINIS </h2>
			</div>
		</div>
	</div>
	<div class="espace"></div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-xl-4 col-lg-4 col-md-3 col-sm-12 col-12"> </div>
			<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
				<?php
					$result="";
					$requ="";
					$requ=$dbh->query('SELECT * FROM message');
					$result=$requ->fetch();
					$requ->closeCursor();
				?>
				<form method="post">
					<div class="form-group">
						<label for="textarea">Modifier le message d'acceuil : </label>
						<textarea id="textarea" name="cont" class="form-control"><?=$result['contenu']?></textarea>
					</div>
					<button type="submit" name="submit1" class="btn btn-primary btn-lg">Modifier</button>
				</form>
				<?php
				$cont=$_POST['cont'];
				if(isset($_POST['submit1'])){

					$dbh->query("UPDATE message SET contenu='$cont' WHERE id_message=1");
					echo'
					<SCRIPT LANGUAGE="JavaScript">
					document.location.href="support.php#2"
					</SCRIPT>';
					}
				?>
				<div class="col-xl-4 col-lg-4 col-md-3 col-sm-12 col-12"></div>
			</div>

		</div>

	</div>
	<div class="container-fluid mt-5">
		<div class="row">
			<div class="col-xl-4 col-lg-4 col-md-3 col-sm-12 col-12"> </div>
			<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
				<form method="post">
					<div class="form-group">
						<p>Ajouter un message : </p>
						<input type="text" class="form-control" name="titre" placeholder="Titre du message">
						<textarea id="textarea" name="conte" placeholder="Contenu du message" class="form-control"
							required></textarea>
						<input type="date" class="form-control" name="date">
					</div>
					<button type="submit" name="submit2" class="btn btn-primary btn-lg">Ajouter</button>
					<?php
				$conte=$_POST['conte'];
				$titre=$_POST['titre'];
				$date =$_POST['date'];
				if(isset($_POST['submit2'])){

					$dbh->query("INSERT INTO message (`titre`, `contenu`, `date`) VALUES ('$titre', '$conte','$date') ");
					echo'
					<SCRIPT LANGUAGE="JavaScript">
					document.location.href="support.php#2"
					</SCRIPT>';
					}

				?>
				</form>

				<div class="col-xl-4 col-lg-4 col-md-3 col-sm-12 col-12"></div>
			</div>

		</div>
		<div class="pb-5">
			<div class="main-carousel mt-5  col-8 offset-2" data-flickity='{ "cellAlign": "left", "contain": true }'>
				<?php
			$super=$dbh->query('SELECT * FROM message WHERE id_message >1 ORDER BY date DESC LIMIT 50');
			$sup=$super->fetchAll();
			foreach($sup as $su){
			echo ("<div class='carousel-cell w-50 text-center'>
					<div class='card mx-auto w-100 card'>
						<div class='card-body'>
							<h5 class='card-title'>".$su['titre']."</h5>
							<h6 class='card-subtitle mb-2 text-muted'>".$su['date']."</h6>
							<p class='card-text'>".$su['contenu']."</p>
							<div class='row d-flex justify-content-center'>
								<a href='modif_mess.php?id=".$su['id_message']."' class='btn btn-primary mr-3'>Modifier</a>
								<a href='inc/interface/delete_mess.php?id=".$su['id_message']."' class='btn btn-danger'>Supprimer</a>
							</div>
						</div>
					</div>
				</div>");
			}
			?>
			</div>
		</div>
	</div>
		<?php	include 'footer.php';?>

		<!----------------------------- SCRIPT ----------------------->
		<script src="js/main.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js">
		</script>
		<script src="https://cdn.jsdelivr.net/parallax.js/1.4.2/parallax.min.js"></script>
		<script src="java/jquery-1.6.1.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>

</body>

</html>
