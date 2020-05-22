<?php session_start(); ?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Tarif Traction</title>
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
        <div class="row titreG">

            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12" id="1"></div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12" id="1">
                <img class="logo" src="images/logo.png">
            </div>

        </div>

        <?php
        include 'inc/interface/co.php';
        $req = $dbh->prepare('  SELECT * FROM date_traction
                                ORDER BY date_modification
                                DESC LIMIT 1');
        $req->execute();
        $date = $req->fetch(); ?>

        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" id="1">
            <h2>Tarif traction HT applicable au <span class="dateTraction"><?= date('d/m/Y', strtotime($date['date_applicable'])) ?></span></h2>

            <?php if (isset($_SESSION['admin'])) : ?>
                <a class="btn btn-warning dateEdit">Modifier la date</a>
                <a class="btn btn-warning dateEditCancel">Show</a>
                <form action="" id="dateTractionEdit">
                    <input type="date" name="date-traction" id="date-traction">
                </form>
            <?php endif ?>


            <div class="espace"></div>
            <center>
                <div class="col-xl-11 col-lg-11 col-md-11 col-sm-12 col-12">

                    <table class="table mb-3 table-sm">
                        <thead class="table-info">
                            <tr>
                                <th class="table-danger">Département</th>
                                <th>Destination</th>
                                <th>Kilomètres</th>
                                <th>Prix traction à la tonne</th>
                                <th>Prix traction à la palette</th>
                                <?php if (isset($_SESSION['admin'])) {
                                    echo '
                                         <th>Modifier<th>';
                                } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include 'inc/interface/co.php';
                            $req = $dbh->query('SELECT * FROM `traction`');
                            while ($donnees = $req->fetch()) {
                            ?>

                                <tr>
                                    <td><?php echo $donnees['DPT']; ?></td>

                                    <td><?php echo $donnees['DESTINATION']; ?></td>

                                    <td><?php echo $donnees['KMS']; ?></td>

                                    <td><?php echo $donnees['TONNE']; ?></td>


                                    <td><?php echo $donnees['PALETTE']; ?></td>

                                    <?php if (isset($_SESSION['admin'])) { ?>

                                        <td><a class="btn btn-warning" href="modif_prix.php?id=<?= $donnees['id_traction'] ?>">Modifier</a></td>

                                    <?php } ?>
                                </tr>


                            <?php }
                            $req->closeCursor(); // Termine le traitement de la requête
                            ?>
                        </tbody>
                    </table>
                </div>
            </Center>
        </div>
    </div>
    </div>






    <?php include('footer.php'); ?>

    <script src="js\editDateTraction.js"></script>

</body>

</html>