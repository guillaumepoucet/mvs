<?php session_start();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Reglement</title>
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
            <?php if (isset($_SESSION['admin'])) : ?>
                <div class="col-md-3">
                    <!-- select -->
                    <!-- upload -->
                    <div class="card">
                        <div class="card-header">Mettre à jour</div>

                        <div class="card-body">
                            <h5 class="card-title">Règlement Intérieur</h5>
                            <form id="reglement-doc" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="exampleFormControlFile1">Choisissez le document</label>
                                    <input type="file" name="reglement" id="file" class="form-control-file" id="exampleFormControlFile1">
                                    <input type="submit" class="form-control-file" id="btn-upload">
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                <?php else : ?>
                    <div class="col-md-12">
                    <?php endif ?>
                    <?php include 'inc/interface/co.php';
                    $req = $dbh->query('SELECT * FROM `documents` 
                                        WHERE type_doc = 3
                                        ORDER BY date_upload
                                        DESC LIMIT 1');
                    $doc = $req->fetch(); ?>
                    <iframe class="pdf" src="<?= $doc['url_doc'] ?>" height="1200px"></iframe>
                    </div>
                </div>
                <script>
                    $(function() {
                        // type de document
                        var typeDoc = $('#file').attr('name');
                        $('#btn-upload').click(function(e) {
                            e.preventDefault();
                            var pdfPath = $('iframe').attr('src');
                            var files = $('#file')[0].files[0];
                            var fd = new FormData();
                            fd.append('file', files);
                            fd.append('doc', typeDoc);
                            // for (var pair of fd.entries()) {
                            //     console.log(pair[0] + ', ' + pair[1]);
                            // }
                            $.ajax({
                                url: "inc\\interface\\file_upload.php",
                                type: 'POST',
                                data: fd,
                                contentType: false,
                                processData: false,
                                success: function(response) {
                                    if (response != 0) {
                                        pdfPath = response;
                                    } else {
                                        alert('pasmarché');
                                    }
                                },
                                error: function() {
                                    alert('error');
                                }
                            })
                        })

                    });
                </script>
        </div>
        <div class="espace"></div>
        <div class="espace"></div>
        <?php include('footer.php'); ?>

</body>
<!-- action="inc\interface\file_upload.php?doc=reglement" -->

</html>