<?php
   session_start();
   
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