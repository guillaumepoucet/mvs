<?php
if (isset($_POST['token']) && $_POST['token'] == "messup"){
            $id = $_POST['ID'];

                $req = "UPDATE important SET isvalid=0 WHERE IDmess=$id";
                $up = $dbh->prepare($req);
                $up->execute();

            echo '<div id="sur" class="intframe" style="display:inline-block">
            <div class="fillframe">
                    <i class="txtbig">INTERFACE DE GESTION DES MESSAGES</i>
                    <div class="fillframe2">
                    <i class="txtbig">Nouveau message</i>';

                        echo '<p>Message effacé</p>';

                    echo '<form method="POST" action="#" class="formframe">
                    <label for="messtxt" class="txtmed" required>Message (250 caractères max) : </label><br>
                    <input type="text" name="messtxt" class="select" maxlength="250"><br>
                    <label for="messdate" class="txtmed" required>Date de péremption : </label>
                    <input type="date" name="messdate" class="select"><br>
                    <input type="hidden" name="token" value="mesres"><br>
                    <input type="submit" class="formbtn" value="ENVOYER">
                    </form><br>
                    </div>
                    <div class="fillframe2">
                    <i class="txtbig">Messages en cours</i>';
                    echo '<div class="messline mar2">
                    <div class="txtline">MESSAGES AFFICHES</div>
                    <div class="dateline">DATE DE FIN</div>
                    <div class="suppline">  </div>
                    </div>';
                    $current = date('Y-m-d H:i:s');
					$req = $dbh->prepare('SELECT * FROM important WHERE isvalid = 1 ');
					$req->execute();
				while ($donnees = $req->fetch()){
                    $var1 = $donnees['message'];
                    $var2 = $donnees['dateend'];
                    $var3 = $donnees['IDmess'];
                        if (strtotime($current) < strtotime($var2)){
                            echo '<div class="messline">
                            <div class="txtline2">'.$var1.'</div>
                            <div class="dateline2">'.$var2.'</div>
                            <div class="suppline2"> <form method="POST" action="#">
                            <input type="hidden" name="token" value="messup">
                            <input type="hidden" name="ID" value="'.$var3.'">
                            <input type="submit" class="suppbtn" value="SUPPRIMER">
                            </form> </div>
                            </div>';
                        }
                }
                    echo'</div>';
        }
?>