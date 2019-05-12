<?php
   session_start();
   
   $elotes = $_GET["elote"];
   $sopes = $_GET["sope"];
   $tacos = $_GET["taco"];
   
   $_SESSION["elotes"] += $elotes;
   $_SESSION["sopes"] += $sopes;
   $_SESSION["tacos"] += $tacos;
   
   $cartItems = $elotes + $sopes + $tacos;
   $_SESSION["cartItems"] +=  $cartItems;
   
   echo "{ \"numItems\":\"" . $cartItems . "\" }";
   
?>