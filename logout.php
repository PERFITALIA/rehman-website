<?php
   session_start();
   unset($_SESSION["username"]);
   unset($_SESSION["password"]);
   unset($_SESSION["valid"]);
   $newURL="investor-relations.php";
  header('Location: '.$newURL);
?>