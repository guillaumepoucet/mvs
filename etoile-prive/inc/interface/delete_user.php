<?php

   session_start();
   include 'co.php';
   $current_id=$_GET['id'];
   $sql="DELETE FROM login WHERE IDlogin=$current_id";
   $dbh->query($sql);
   if ($dbh->query($sql) === TRUE) {
       echo "<div class='alert alert-success'>Record deleted successfully</div>";
       
   } else {
       echo "Error deleting record: " . $conn->error;
   }
   echo'
   <SCRIPT LANGUAGE="JavaScript">
   document.location.href="../../support#1.php"
   </SCRIPT>';
  
   
   ?>