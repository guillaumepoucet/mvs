<?php session_start();
if (!isset($_SESSION['admin'])) {
	header('location:loggin.php');
} ?>
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
	<title>Modification de message</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" media="screen" href="css/support.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
	<link rel="stylesheet" href="dist\pell.css">

</head>

<body>

	<?php include('header.php'); ?>

	<div class="container-fluid edit-msg-container">
		<div class="row justify-content-center">
			<div class="mx-lg-6 col-lg-6 col-md-6 col-sm-12 col-12">
				<?php
				include 'inc/interface/co.php';
				$current_id = $_GET['id'];
				$req = $dbh->query('SELECT * from message WHERE id_message= ' . $current_id . '');
				$res = $req->fetch();
				?>
				<div class="alert alert-success alert-dismissible fade show d-none" role="alert">
					Votre message a bien été modifié !
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form method="POST" id="edit-msg-form">
					<div class="card">
						<h5 class="card-header">Modifier un message</h5>
						<div class="card-body text-left">
							<div class="form-group">
								<h5 class="card-title">Choississez une date</h5>
								<input type="date" class="form-control col-4" name="date" value="<?= $res['date'] ?>">
							</div>
							<div class="form-group">
								<h5 class="card-title">Titre</h5>
								<input type="text" class="form-control form-control-lg" name="titre" value="<?= $res['titre'] ?>" placeholder="Titre du message">
							</div>
							<div class="form-group">
								<div class="pell">
									<div class="content">
										<div id="editor" class="pell"></div>
										<div style="margin-top:20px;">
											<h5 class="card-title">Aperçu</h5>
											<div id="text-output"></div>
										</div>
										<div style="margin-top:20px; display:none;">
											<pre id="html-output"></pre>
										</div>
									</div>
								</div>

							</div>
						</div>

						<div class="card-footer text-center">
							<button type="submit" id="submit" name="submit2" class="btn btn-primary btn-lg">Modifier</button>
						</div>
					</div>
				</form>
			</div>

		</div>

	</div>

	<?php include 'footer.php'; ?>

	<!-- TRAITEMENT PHP -->
	<?php
	$contenu = (!empty($_POST['contenu'])) ? $_POST['contenu'] : null;
	$titre = (!empty($_POST['titre'])) ? $_POST['titre'] : null;
	$date = (!empty($_POST['date'])) ? $_POST['date'] : null;

	if (isset($_POST['submit2'])) {
		$dbh->query("UPDATE message SET `titre`='$titre', `contenu`='$contenu', `date`='$date' WHERE id_message=$current_id");
	}
	?>

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
		$(function() {
			var text = "<?= $res['contenu'] ?>";
			$('.pell-content').append(text);
			$('#text-output').html(text);
			$('#html-output').text(text);
		})
		// AJAX
		$(function() {
			$('#submit').click(function(e) {
				e.preventDefault();
				var newText = $('#html-output').text();
				var form = $('form')[0];
				var fd = new FormData(form);
				fd.append('contenu', newText);
				fd.append('submit2', 'ok')
				// for (var pair of fd.entries()) {
				//     console.log(pair[0] + ', ' + pair[1]);
				// }
				$.ajax({
					type: 'POST',
					data: fd,
					contentType: false,
					cache: false,
					processData: false,
					success: function(data) {
						$('.alert').removeClass('d-none');
						window.scrollTo(0,0);
					},
					error: function() {
						alert('Une erreur de traitement est apparue');
					},
					dataType: 'text'
				})
			})
		})
	</script>


</body>