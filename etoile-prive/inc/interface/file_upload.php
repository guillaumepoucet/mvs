<?php

require 'co.php';

// récupére le type de document dans l'URL, qui correspond aussi à $_FILES[]
$doc = $_POST['doc'];

// type_doc #1 : Charte réseau
// type_doc #2 : Tarif distribution
// type_doc #3 : Règlement intérieur

// On vérifie que l'utilisateur a bien choisi un fichier
if (!empty($_FILES['file']['name'])) {
    // conditions dépendent du $_FILE[name]
    // type_doc est uploadé dans BDD plus bas
    if ($doc == 'distrib') {
        $type_doc = 2;
    } elseif ($doc == 'charte') {
        $type_doc = 1;
    } elseif ($doc == 'reglement') {
        $type_doc = 3;
    }
} else {
    throw new Exception('Vous n\'avez pas sélectionner de fichier.');
}

$file = basename($_FILES['file']['name']);
$imageFileType = strtolower(pathinfo($file, PATHINFO_EXTENSION));
// Vérification que le fichier soit bien au format PDF
if ($imageFileType != "pdf") {
    $uploadOk = 0;
    // erreur prise en charge dans fonction ajax
    echo 0;
    exit;
};

$uploadOk = 1;

// Dossier où se trouvera le document
$doc_dir = "pdf\\";

// On définit l'URL complète finale du fichier
$targetdocPath = $doc_dir . $file;

// Date d'upload du fichier
$date = date('Y-m-d');

// Insertion des éléments dans la BDD
$sql = $dbh->prepare('INSERT INTO documents (url_doc, type_doc, date_upload)
                      VALUES (:url_doc, :type_doc, :date_upload)');

$sql->execute(array(
    'url_doc' => $targetdocPath,
    'type_doc' => $type_doc,
    'date_upload' => $date
));

// Upload du fichier
move_uploaded_file($_FILES['file']["tmp_name"], "..\..\\" . $targetdocPath);

$sql->closeCursor();

echo $targetdocPath;

// if ($type_doc == 3) {
//     header('location:..\..\reglement.php');
// } elseif ($type_doc == 2) {
//     header('location:..\..\tarif-d.php');
// } elseif ($type_doc == 3) {
//     header('location:..\..\charte.php');
// };
