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
        echo '
            <form id="address-form">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <span class="col-md-1"><i class="fas fa-home"></i></span>
                                    <div class="col-md-11">
                                        <li id="li"><small>Adresse postale</small><p>' . $var2 . '</p></li>
                                        <li id="li"><small>Complément d\'adresse</small><p>' . $var3 . '</p></li>
                                        <li id="li"><small>Code Postal</small><p>' . $var4 . '</p></li>
                                        <li id="li"><small>Ville</small><p>' . $var5 . '</p></li>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <span class="col-md-1"><i class="fas fa-phone"></i></span>
                                    <li id="li"><small>Téléphone</small><p>' . $var6 . '</p></li>                                    <li id="li"><small>Complément d\'adresse</small><p>' . $var3 . '</p></li>
                                    <span class="col-md-1"><i class="fas fa-fax"></i></span>
                                    <li id="li"><small>Fax</small><p>' . $var7 . '</p></li>
                                    <span class="col-md-1"><i class="far fa-envelope"></i></span>
                                    <li id="li"><small>Email</small><p>' . $var8 . '</p></li>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        '
    }
    echo '</div>';
}


echo '<form id="address-form">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <li id="li" class="company-name"><h2>' . $var1 . '</h2></li>
                        </div>';
        echo '<div class="col-12">
        <span class="col-md-2"><i class="fas fa-home"></i></span>
        <li id="li"><small>Adresse postale</small><p>' . $var2 . '</p></li>
        </div>';
        echo '<div class="col-12">
        <span></span>
        <li id="li"><small>Complément d\'adresse</small><p>' . $var3 . '</p></li>
        </div>';
        echo '<div class="col-12">
        <span></span>
        <li id="li"><small>Code Postal</small><p>' . $var4 . '</p></li>
        </div>';
        echo '<div class="col-12">
        <span></span>
        <li id="li"><small>Ville</small><p>' . $var5 . '</p></li>
        </div>';
        echo '<div class="col-12">
        <span><i class="fas fa-phone"></i></span>
        <li id="li"><small>Téléphone</small><p>' . $var6 . '</p></li>
        </div>';
        echo '<div class="col-12">
        <span><i class="fas fa-fax"></i></span>
        <li id="li"><small>Fax</small><p>' . $var7 . '</p></li>
        </div>';
        echo '<div class="col-12">
        <span><i class="far fa-envelope"></i></span>
        <li id="li"><small>Email</small><p>' . $var8 . '</p></li>
        </div>
        </div>
        <!-- /row -->
        </div>
        <!-- /container-fluid -->
        </form>';
    }
    echo '</div>';
}


echo '
<form id="address-form">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="row">
                    <span><i class="fas fa-home"></i></span>
                    <div>
                        <li id="li"><small>Adresse postale</small><p>' . $var2 . '</p></li>
                        <li id="li"><small>Complément d\'adresse</small><p>' . $var3 . '</p></li>
                        <li id="li"><small>Code Postal</small><p>' . $var4 . '</p></li>
                        <li id="li"><small>Ville</small><p>' . $var5 . '</p></li>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="row">
                    <span class="col-md-1"><i class="fas fa-phone"></i></span>
                    <li id="li" class="col-md-11"><small>Téléphone</small><p>' . $var6 . '</p></li>                                    <li id="li"><small>Complément d\'adresse</small><p>' . $var3 . '</p></li>
                    <span class="col-md-1"><i class="fas fa-fax"></i></span>
                    <li id="li" class="col-md-11"><small>Fax</small><p>' . $var7 . '</p></li>
                    <span class="col-md-1"><i class="far fa-envelope"></i></span>
                    <li id="li" class="col-md-11"><small>Email</small><p>' . $var8 . '</p></li>
                </div>
            </div>
        </div>
    </div>
</form>
';
}
echo '</div>';
}