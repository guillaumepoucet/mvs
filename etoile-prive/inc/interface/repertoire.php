<?php
if (isset($_POST['token']) && $_POST['token'] == "repres") {
    $id = $_POST['name'];
    $req = $dbh->prepare('SELECT * FROM user WHERE IDuser = "' . $id . '" ');
    $req->execute();
    while ($donnees = $req->fetch()) {
        $var1 = $donnees['nom'];
        $var2 = $donnees['Adresse1'];
        $var3 = $donnees['Adresse2'];
        $var4 = $donnees['zip'];
        $var5 = $donnees['ville'];
        $var6 = $donnees['tel'];
        $var7 = $donnees['fax'];
        $var8 = $donnees['email'];
        if ($var2 == '') {
            $var2 = "Non renseigné";
        }
        if ($var3 == '') {
            $var3 = "Aucun";
        }
        if ($var4 == 00000) {
            $var4 = "Non renseigné";
        }
        if ($var5 == '') {
            $var5 = "Non renseigné";
        }
        if ($var6 == '') {
            $var6 = "Non renseigné";
        }
        if ($var7 == '') {
            $var7 = "Non renseigné";
        }
        if ($var8 == '') {
            $var8 = "Non renseigné";
        }
?>

        <form id="address-form">
            <!-- container -->
            <div class="container">
                <!-- first row -->
                <div class="row">
                    <div class="col-12">
                        <h2><?= $var1 ?></h2>
                    </div>
                    <!-- first column -->
                    <div class="col-12 col-md-6 column1">
                        <!-- row -->
                        <div class="row">
                            <span class="col-2"><i class="fas fa-home"></i></span>
                            <div class="col-10">
                                <li id="li"><small>Adresse postale</small>
                                    <p><?= $var2 ?></p>
                                </li>
                                <li id="li"><small>Complément d'adresse</small>
                                    <p><?= $var3 ?></p>
                                </li>
                                <li id="li"><small>Code Postal</small>
                                    <p><?= $var4 ?></p>
                                </li>
                                <li id="li"><small>Ville</small>
                                    <p><?= $var5 ?></p>
                                </li>
                            </div>
                        </div>
                    </div>
                    <!-- /first column -->
                    <!-- second column -->
                    <div class="col-12 col-md-6 column2">
                        <div class="row">
                            <span class="col-2"><i class="fas fa-phone"></i></span>
                            <div class="col-10">
                                <li id="li"><small>Téléphone</small>
                                    <p><?= $var6 ?></p>
                                </li>
                            </div>
                            <span class="col-2"><i class="fas fa-fax"></i></span>
                            <div class="col-10">
                                <li id="li"><small>Fax</small>
                                    <p><?= $var7 ?></p>
                                </li>
                            </div>
                            <span class="col-2"><i class="far fa-envelope"></i></span>
                            <div class="col-10">
                                <li id="li"><small>Email</small>
                                    <p><?= $var8 ?></p>
                                </li>
                            </div>
                        </div>
                    </div>
                    <!-- /second column -->
                </div>
                <!-- /first-row -->
            </div>
            <!-- /container -->
        </form>

<?php
    };
};
?>