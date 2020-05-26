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

        <!-- récupération de la date dans la BDD -->
        <?php
        include 'inc/interface/co.php';
        $req = $dbh->prepare('  SELECT * FROM date_traction
                                ORDER BY date_modification
                                DESC LIMIT 1');
        $req->execute();
        $date = $req->fetch(); ?>
        <!-- /récupération de la date dans la BDD -->

        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" id="1">

            <!-- affichage de la date -->
            <h2>Tarif traction HT applicable au <span class="dateTraction"><?= date('d/m/Y', strtotime($date['date_applicable'])) ?></span></h2>
            <!-- /affichage de la date -->

            <!-- Pour les admin, possibilité de changer la date -->
            <?php if (isset($_SESSION['admin'])) : ?>
                <a class="btn btn-warning dateEdit">Modifier la date</a>
                <form action="" id="dateTractionEdit" class="hidden">
                    <input type="date" name="date-traction" id="date-traction"><br>
                    <span class="verify-date error">* Veuillez entrer une date valide<br></span>
                    <a class="btn btn-warning dateSave" data-toggle="modal">Appliquer</a>
                    <a class="btn btn-danger dateEditCancel">Annuler</a>


                    <!-- Modal -->
                    <div class="modal fade" id="myModal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Nouvelle date tarif traction HT</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Sauvegarder la nouvelle date ?<br>
                                    <strong class="dateModal"></strong>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary modal-cancel" data-dismiss="modal">Annuler</button>
                                    <button type="button" class="btn btn-primary modal-ok">Sauvegarder</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Modal -->

                </form>
            <?php endif ?>
            <!-- /Pour les admin, possibilité de changer la date -->

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

    <?= var_dump($_SESSION); ?> <?php include('footer.php'); ?>

    <script>
        $(function() {
            var date = $('.dateTraction');
            var cancel = function() {
                $('.hidden').removeClass('hidden');
                $('#dateTractionEdit').addClass('hidden');
            }
            $('.dateEdit').click(function() {
                $('.hidden').removeClass('hidden');
                $('.dateEdit').addClass('hidden');
            });
            $('.dateEditCancel').click(function() {
                cancel();
            });
            // récupére et formate la date
            $('.dateSave').click(function(e) {
                var dateForm = new Date($('#date-traction').val());
                var dateBrut = dateForm.getTime();
                if (isNaN(dateBrut)) {
                    $('.error').addClass('display-block');
                } else {
                    day = dateForm.getDate();
                    month = dateForm.getMonth() + 1;
                    year = dateForm.getFullYear();
                    if ((day >= 1) && (day <= 9)) {
                        day = '0' + day
                    }
                    if ((month >= 1) && (month <= 9)) {
                        month = '0' + month
                    }
                    // formate date pour la page
                    var newDate = ([day, month, year].join('/'));
                    // formate date SQL
                    var datePhp = ([year, month, day].join('-'));
                    // modal pour confirmer ou non la nouvelle date
                    $('#myModal').modal('show');
                    $('.dateModal').text(newDate);
                    $('.modal-ok').click(function() {
                        // envoi de la nouvelle date ajax
                        $.post('inc\\interface\\edit_date_traction.php', {
                            datePhp: datePhp
                        }, function(data) {
                            $('#myModal').modal('hide');
                            cancel();
                            date.text(newDate);
                            $('#date-traction').val("");
                        })
                        // /envoi de la nouvelle date ajax
                    })
                    $('.modal-cancel').click(function() {
                        cancel();
                    })
                    // /modal pour confirmer ou non la nouvelle date
                }
            })
        })
    </script>

</body>

</html>