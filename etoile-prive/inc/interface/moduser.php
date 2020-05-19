<?php
if (isset($_POST['token']) && $_POST['token'] == "moduse"){
    $id = $_POST['IDm'];

    $req = $dbh->prepare('SELECT * FROM login WHERE IDlogin ='.$id);
    $req->execute();
while ($donnees = $req->fetch()){
    $var00 = $donnees['IDlogin'];
    $var01 = $donnees['login'];
    $var02 = $donnees['islocked'];
    $var03 = $donnees['type'];
}

        echo '<div id="mou" class="intframe" style="display:inline-block">
        <div class="fillframe">
                <i class="txtbig">INTERFACE DE GESTION DE COMPTES >> MODIFICATION</i>
                <div class="fillframe2">
                <form method="POST" action="#" class="formframe">
                <label for="cptname" class="txtmed">Nom compte (50 caractères max) : </label><br>
                <input type="text" name="cptname" class="select" maxlength="50" required value="'.$var01.'" autocomplete="off"><br>
                <label for="cptpass" class="txtmed">Mot de passe (50 caractères max) : </label><br>
                <input type="text" name="cptpass" class="select" maxlength="50" autocomplete="off"><br>
                <label for="cpttype" class="txtmed">Type de Compte : </label><br>';
                if ($var03 == 1){
                echo '<select class="select" name="cpttype">
                        <option value="1" selected="selected">Utilisateur</option>
                        <option value="2">Administrateur</option>
                </select>';
                } else {
                echo '<select class="select" name="cpttype">
                    <option value="1">Utilisateur</option>
                    <option value="2" selected="selected">Administrateur</option>
                </select>';
                }
                echo '<br>';
                if ($var02 == 0){
                echo '<label for="cptvalid" class="txtmed">Compte Bloqué : </label><br>
                <select class="select" name="cptvalid">
                        <option value="0" selected="selected">Non</option>
                        <option value="1">Oui</option>
                </select>';
                } else if ($var02 = 1){
                echo '<label for="cptvalid" class="txtmed">Compte Bloqué : </label><br>
                <select class="select" name="cptvalid">
                        <option value="0" selected="selected">Non</option>
                        <option value="1">Oui</option>
                </select>';
                } else if ($id == 1){
                    echo 'Compte administrateur principal. Ne peut être bloqué.';
                }
                echo'<input type="hidden" name="token" value="modval"><br>
                <input type="hidden" name="id" value="'.$var00.'"><br>
                <input type="submit" class="formbtn2" value="MODIFIER">
                </form><br>
                </div>
                </div>
        </div>';
    }
?>