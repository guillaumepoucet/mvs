<?php

require 'co.php';

// nouvelle date tarif traction applicable
$newDate = !empty($_POST['date']) ? $_POST['date'] : null;
// date à laquelle la modif est faîte
$dateModif = date('Y-m-d');

$sql = $dbh->prepare('INSERT INTO date_traction (date_applicable, date_modification)
                      VALUES (:date_applicable, :date_modification)');

$sql->execute(array(
    'date_applicable' => $newDate,
    'date_modif' => $date
));

$sql->closeCursor();

header('location:..\..\tarif-t.php');