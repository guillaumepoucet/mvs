<?php
if (isset($_POST['token']) && $_POST['token'] == "suires"){
$id = $_POST['name'];
$req = $dbh->prepare('SELECT * FROM user WHERE IDuser = "'.$id.'" ');
$req->execute();
while ($donnees = $req->fetch()){
$var1 = $donnees['link'];
$var2 = $donnees['nom'];
echo '<br><li id="li"><p text-center">(Cliquez ci-dessous si la redirection automatique ne fonctionne pas)</p></li><br>';
echo '<li id="li"><p class="res" text-center"><a class="ralink" href="'.$var1.'" target="_blank">Lien tracking '.$var2.'</a><p></li><br>';
echo '<script language="javascript">
window.open("'.$var1.'", "_blank");
</script>';
    }
  }


?>
