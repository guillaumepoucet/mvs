<?php
$req = $conn->prepare('SELECT * FROM utilisateurs WHERE login = :email AND mdp = :passsword');
?>
