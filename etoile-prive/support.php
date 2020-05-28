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
	<link rel="icon" type="image/png" sizes="96x96" href="../images/favicon-96qx96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="../images/favicon-16x16.png">
	<link rel="manifest" href="/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">
	<!--END FAVICON-->
	<title>Support Administrateur</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" media="screen" href="css/support.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
	<link rel="stylesheet" href="dist\pell.css">

</head>

<body>

	<?php include('header.php'); ?>
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
			<div class="mt- col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">

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
			if (isset($_POST['submit'])) {
				$log = $_POST['login'];
				$mdp = $_POST['mdp'];
				$type = $_POST['type'];
				$pass_hache = password_hash($mdp, PASSWORD_BCRYPT);
				$dbh->query("INSERT INTO login (`login`, `mdp`, `islocked`, `type`) VALUES ('$log', '$pass_hache','0', '$type')");
			};
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
									while ($donnees = $req->fetch()) {
									?>
										<tr>
											<td><?php echo $donnees['login']; ?></td>

											<td><?php if ($donnees['type'] == 2) {
													echo 'Admin';
												} else {
													echo 'User';
												} ?></td>

											<td><?php if ($donnees['islocked'] == 0) {
													echo 'Non';
												} else {
													echo 'Oui';
												} ?></td>

											<div class="suppline2">

												<td>
													<a href="modif_user.php?id=<?= $donnees['IDlogin'] ?>" class="btn btn-warning">MODIFIER</a>
												</td>

											</div>


											<td><?php if ($donnees['login'] == 'Administrateur') {
													echo 'Non supprimable';
												} else {
													echo '
										<a href="inc/interface/delete_user.php?id=' . $donnees['IDlogin'] . '" class="btn btn-danger">SUPPRIMER</a>
										';
												} ?></td>
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

		<div class="espace"></div>

		<div class="row justify-content-center">

			<!-- MODIFICATION MESSAGE ACCUEIL -->
			<div class="col-lg-11 col-md-6 col-sm-12 col-12">

				<!-- Alerte message modif ok -->
				<div class="alert alert-accueil alert-success alert-dismissible fade show d-none" role="alert">
					Votre message a bien été modifié !
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<!-- /Alerte message modif ok -->

				<?php
				$result = "";
				$req = "";
				$req = $dbh->query('SELECT * FROM message WHERE id_message = 1');
				$result = $req->fetch();
				?>
				<form method="POST" id="edit-msg-form">
					<div class="card mb-5">
						<h5 class="card-header">Modifier le message d'accueil</h5>
						<div class="card-body text-left px-5">
							<div class="form-group">
								<div class="pell">
									<div class="row content">
										<div class="col-6">
											<h5 class="card-title">Éditer</h5>
											<div id="editor" class="pell"></div>
											<div style="margin-top:20px; display:none;">
												<pre id="html-output"></pre>
											</div>
										</div>
										<div class="col-6">
											<h5 class="card-title">Aperçu</h5>
											<div id="text-output"></div>
										</div>
									</div>
								</div>

							</div>
						</div>

						<div class="card-footer text-center">
							<button type="submit" id="submit3" name="accueil" class="btn btn-primary btn-lg">Modifier</button>
						</div>
					</div>
				</form>
				<?php
				$contenu = (!empty($_POST['contenu'])) ? $_POST['contenu'] : null;

				if (isset($_POST['submit3']) && (!empty($_POST['contenu']))) {
					$dbh->query("UPDATE message SET contenu='$contenu' WHERE id_message=1");
				};
				?>

			</div>
			<!-- /MODIFICATION MESSAGE ACCUEIL -->

			<!-- AJOUT DE NOUVEAUX MESSAGES -->
			<div class="col-lg-11 col-md-6 col-sm-12 col-12 ">

				<!-- Alerte message modif ok -->
				<div class="alert alert-msg alert-success alert-dismissible fade show d-none" role="alert">
					Votre message a bien été ajouter !
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<!-- /Alerte message modif ok -->

				<form method="post" id="ajout-msg">
					<div class="card">
						<h5 class="card-header">Ajouter un message</h5>
						<div class="row card-body text-left px-5">
							<div class="col-6">
								<div class="form-group">
									<h5 class="card-title">Choississez une date</h5>
									<input type="date" class="form-control col-4" name="date">
								</div>
								<div class="form-group">
									<h5 class="card-title">Titre</h5>
									<input type="text" class="form-control form-control-lg" name="titre" placeholder="Titre du message">
								</div>
								<div class="form-group">
									<h5 class="card-title">Contenu</h5>
									<div class="pell">
										<div class="content">
											<div id="editor2" class="pell"></div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-6">
								<div>
									<h5 class="card-title">Aperçu</h5>
									<div id="text-output2"></div>
								</div>
								<div style="margin-top:20px; display:none;">
									<pre id="html-output2" name="contenu"></pre>
								</div>
							</div>
						</div>
						<div class="card-footer text-center">
							<button type="submit" id="submit4" name="submit4" class="btn btn-primary btn-lg">Ajouter</button>
						</div>
						<?php
						$contenu = (!empty($_POST['contenu'])) ? ($_POST['contenu']) : null;
						$titre = (!empty($_POST['titre'])) ? ($_POST['titre']) : null;
						$date = (!empty($_POST['date'])) ? ($_POST['date']) : null;

						if ((isset($_POST['submit4'])) && (!empty($_POST['contenu']))) {
							$dbh->query("INSERT INTO message (`titre`, `contenu`, `date`) VALUES ('$titre', '$contenu','$date') ");
						}

						?>
				</form>
			</div>
			<!-- AJOUT DE NOUVEAUX MESSAGES -->
		</div>
		<!-- /ROW -->
	</div>
	<!-- /CONTAINER -->
	<div class="container-fluid">
		<!-- /row -->
		<div class="row">
			<div class="main-carousel mt-5 col-12" data-flickity='{ "cellAlign": "left", "contain": true }'>
				<?php
				$super = $dbh->query('SELECT * FROM message WHERE id_message >1 ORDER BY date DESC LIMIT 50');
				$sup = $super->fetchAll();
				foreach ($sup as $su) {
					echo ("<div class='carousel-cell w-50 text-center'>
					<div class='card mx-auto w-100 card'>
						<div class='card-body'>
							<h5 class='card-title'>" . $su['titre'] . "</h5>
							<h6 class='card-subtitle mb-2 text-muted'>" . $su['date'] . "</h6>
							<p class='card-text'>" . $su['contenu'] . "</p>
							<div class='row d-flex justify-content-center'>
								<a href='modif_mess.php?id=" . $su['id_message'] . "' class='btn btn-primary mr-3'>Modifier</a>
								<a href='inc/interface/delete_mess.php?id=" . $su['id_message'] . "' class='btn btn-danger'>Supprimer</a>
							</div>
						</div>
					</div>
				</div>");
				}
				?>
			</div>

		</div>
	</div>
	<?php include 'footer.php'; ?>

	<!----------------------------- SCRIPT ----------------------->
	<script src="js/main.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js">
	</script>
	<script src="https://cdn.jsdelivr.net/parallax.js/1.4.2/parallax.min.js"></script>
	<script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>



	<!-- EDITEUR DE TEXTE -->
	<script src="dist/pell.js"></script>

	<script>
		// EDITEUR DE TEXTE
		var editor = window.pell.init({
			element: document.getElementById('editor'),
			defaultParagraphSeparator: 'p',
			onChange: function(html) {
				document.getElementById('text-output').innerHTML = html
				document.getElementById('html-output').textContent = html
			}
		})
		var editor = window.pell.init({
			element: document.getElementById('editor2'),
			defaultParagraphSeparator: 'p',
			onChange: function(html) {
				document.getElementById('text-output2').innerHTML = html
				document.getElementById('html-output2').textContent = html
			}
		})

		$(function() {
			// insertion du message d'accueil dans l'éditeur de texte
			var text = "<?= $result['contenu'] ?>";
			$('#editor .pell-content').append(text);
			$('#text-output').html(text);
			$('#html-output').text(text);
			// declaration fonction insertion ajax dans BDD
			var insertBDD = function(param, set) {
				$.ajax({
					type: 'POST',
					data: param,
					contentType: false,
					cache: false,
					processData: false,
					success: function() {
						$('.alert-' + set).removeClass('d-none');
					},
					error: function() {
						alert('Une erreur de traitement est apparue')
					}
				})
			}

			// insertion du message d'acceuil dans la BDD
			$('#submit3').click(function(e) {
				e.preventDefault();
				var set = 'accueil';
				var contenu = $('#html-output').text();
				var fd = new FormData();
				fd.append('contenu', contenu);
				fd.append('submit3', 'ok');
				insertBDD(fd, set);
			})
			$('#submit4').click(function(e) {
				e.preventDefault();
				var set = 'msg';
				var contenu = $('#html-output2').text();
				var form = $('#ajout-msg')[0];
				var fd = new FormData(form);
				fd.append('contenu', contenu);
				fd.append('submit4', 'ok');
				for (var pair of fd.entries()) {
				    console.log(pair[0] + ', ' + pair[1]);
				}
				insertBDD(fd, set);
			})


			// var submit = function(e) {
			// 		e.preventDefault();
			// 		var set = name;
			// 		var contenu = $('#html-output').text();
			// 		var fd = new FormData();
			// 		fd.append('contenu', contenu);
			// 		fd.append(param, 'ok');
			// 		insertBDD(fd, set);
			// 	}
		})
	</script>
	<!-- /EDITEUR DE TEXTE -->


</body>

</html>