<?php

require 'co.php';

// Nouvelle date tarif traction réupérée en Ajax
$date_applicable = !empty($_POST['datePhp']) ? $_POST['datePhp'] : null;

if (isset($date_applicable)) {
    // Date de la modification
    $date_modification = date('Y-m-d');

    // Insertion des éléments dans la BDD
    $sql = $dbh->prepare('UPDATE date_traction 
                            SET date_applicable=:date_applicable, 
                            date_modification=:date_modification');

    $sql->execute(array(
        'date_applicable' => $date_applicable,
        'date_modification' => $date_modification
    ));
}
$sql->closeCursor();