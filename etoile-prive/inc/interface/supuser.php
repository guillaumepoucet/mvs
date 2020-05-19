<?php
if (isset($_POST['token']) && $_POST['token'] == "supuse"){
    $id = $_POST['ID'];

    $del =  $dbh->exec('DELETE FROM login WHERE IDlogin = '.$id);

    echo'<div id="suu" class="intframe" style="display:inline-block">
    <i class="txtbig">INTERFACE DE GESTION DE COMPTES</i>
    <div class="fillframer">

            <div class="col">
            <i class="txtbig">Création d\'un nouveau compte</i>
            <form method="POST" action="#" class="formframe">
            <label for="cptname" class="txtmed">Nom compte (50 caractères max) : </label><br>
            <input type="text" name="cptname" class="select" maxlength="50" required><br>
            <label for="cptpass" class="txtmed">Mot de passe (50 caractères max) : </label><br>
            <input type="password" name="cptpass" class="select" maxlength="50" required><br>
            <label for="cpttype" class="txtmed">Type de Compte : </label><br>
            <select class="select" name="cpttype">
                    <option value="1" selected="selected">Utilisateur</option>
                    <option value="2">Administrateur</option>
               </select>
            <input type="hidden" name="token" value="crecpt"><br>
            <input type="submit" class="formbtn2" value="CREER">
            </form><br><br><br>
            </div>
            <div class="col">
            <i class="txtbig margin2">Comptes actifs</i>
            <div class="messline mar2">
            <div class="txtline3">NOM DU COMPTE</div>
            <div class="dateline">TYPE DE COMPTE</div>
            <div class="dateline">COMPTE BLOQUE</div>
            <div class="suppline">  </div>
            <div class="suppline">  </div>
            </div>';
            $req = $dbh->prepare('SELECT * FROM login');
            $req->execute();
        while ($donnees = $req->fetch()){
            $var0 = $donnees['IDlogin'];
            $var1 = $donnees['login'];
            $var2 = $donnees['islocked'];
            $var3 = $donnees['type'];

if ($var2 == 0){
$var2 = "Non";
} else {
$var2 = "Oui";
}

if ($var3 == 1){
$var3 = "User";
} else {
$var3 = "Admin";
}

                    echo '<div class="messline">
                    <div class="txtline4">'.$var1.'</div>
                    <div class="dateline2">'.$var3.'</div>
                    <div class="dateline2">'.$var2.'</div>
                    <div class="suppline2"> <form method="POST" action="#">
                    <input type="hidden" name="token" value="moduse">
                    <input type="hidden" name="IDm" value="'.$var0.'">
                    <input type="submit" class="suppbtn" value="MODIFIER">
                    </form> </div>
                    <div class="suppline2"> ';
                    if ($var0 == 1){
                        echo'Non supprimable';
                    } else {
                    echo '<form method="POST" action="#">
                    <input type="hidden" name="token" value="supuse">
                    <input type="hidden" name="ID" value="'.$var0.'">
                    <input type="submit" class="suppbtn" value="SUPPRIMER">
                    </form>'; }
                    echo '</div>
                    </div>';
    }}
?>