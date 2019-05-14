<?php
   session_start();
   
   $elotes = $_GET["elote"];
   $sopes = $_GET["sope"];
   $tacos = $_GET["taco"];
   
   $_SESSION["elotes"] = $elotes;
   $_SESSION["sopes"] = $sopes;
   $_SESSION["tacos"] = $tacos;
   
   $cart = $elotes + $sopes + $tacos;
   $_SESSION["cartItems"] =  $cart;
   
   class cartItems {
       
       function cartItems() {
           $this->elotes = $_SESSION["elotes"];
           $this->sopes = $_SESSION["sopes"];
           $this->tacos = $_SESSION["tacos"];
       }
   }
   
   $items = new cartItems();
   $json = json_encode($items);
   echo $json;
   
?>