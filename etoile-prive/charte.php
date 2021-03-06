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
    <title>Charte Réseaux</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/reglement.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />

</head>

<body>

    <?php include('header.php'); ?>
    <div class="espace"></div>
    <div class="espace"></div>
    <div class="espace"></div>
    <div class="container-fluid">
        <div class="row">
            <?php if ($_SESSION['type'] == 2) : ?>
                <div class="col-lg-3 order-2">
                    <!-- select -->
                    <!-- upload -->
                    <div class="card">
                        <div class="card-header">Mettre à jour</div>

                        <div class="card-body">
                            <h5 class="card-title">Charte RESEAU</h5>
                            <form id="charte-doc" method="POST" action="inc\interface\file_upload.php" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="exampleFormControlFile1">Choisissez le document</label>
                                    <input type="file" name="charte" class="form-control-file input-file" id="exampleFormControlFile1">
                                    <small>* Le fichier doit être au format .PDF</small>
                                    <input type="submit" class="form-control-file" id="exampleFormControlFile1">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 order-1">
                <?php else : ?>
                    <div class="col-md-12">
                    <?php endif ?>
                    <?php include 'inc/interface/co.php';
                    $req = $dbh->query('SELECT * FROM `documents` 
                                        WHERE type_doc = 1
                                        ORDER BY date_upload
                                        DESC LIMIT 1');
                    $doc = $req->fetch(); ?>
                    <iframe class="pdf" src="<?= $doc['url_doc'] ?>" height="1200px"></iframe>
                    </div>
                </div>
        </div>

        <div class="espace"></div>
        <div class="espace"></div>

        <?php include('footer.php'); ?>

        <script src="js\file_upload.js"></script>

</body>

</html>