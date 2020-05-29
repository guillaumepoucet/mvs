<?php
session_start();

include 'co.php';

$current_id = $_GET['id'];

$sql = "DELETE FROM message WHERE id_message=$current_id";

$dbh->query($sql);

if ($dbh) {
    echo "success";
} else {
    echo "error";
}

?>