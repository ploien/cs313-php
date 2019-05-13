<?php
   session_start();
   
   $elotes = $_GET["elote"];
   $sopes = $_GET["sope"];
   $tacos = $_GET["taco"];
   
   $_SESSION["elotes"] += $elotes;
   $_SESSION["sopes"] += $sopes;
   $_SESSION["tacos"] += $tacos;
   
   $cart = $elotes + $sopes + $tacos;
   $_SESSION["cartItems"] +=  $cart;
   
   class items {
       
       public $number;
   }
   
   $numItems = new items();
   $numItems->number = $cart;
   
   $json = json_encode($numItems);
   
   
   echo $json;
   
?>