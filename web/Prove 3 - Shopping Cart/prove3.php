<?php 
   session_start();
   
   if(!isset($_SESSION["elotes"])) {
       $_SESSION["elotes"] = 0;
   }
   
   if(!isset($_SESSION["sopes"])) {
       $_SESSION["sopes"] = 0;
   }
   
   if(!isset($_SESSION["tacos"])) {
       $_SESSION["tacos"] = 0;
   }
   
   if(!isset($_SESSION["cartItems"])) {
       $_SESSION["cartItems"] = 0;
   }
?>


<!DOCTYPE html>
<html>
  <head>
  	 <link rel="stylesheet" type="text/css" href="prove3.css">
     <title>Prove 3 - Shopping Cart</title>
     <script src="prove3.js"></script>
  </head>
  <body onload="addToCart()">
     <header>
     	<h1>Shopping Cart</h1>
     	<a href="cartView.php">View Cart</a>
     </header>
     <label for="number">Items in Cart</label>
     <output id="number"></output>
     <button type="button" id="reset" onclick="reset()">Reset</button>
     <table>
       <tr>
         <th>Item</th>
         <th>Description</th>
         <th>Price</th>
         <th>Quantity</th>
         <th>Add to cart</th>
       </tr>
       <tr>
         <td><img alt="Elote" src="elote.jpg"></td>
         <td>Elote</td>
         <td>$1.50</td>
         <td><input type="number" name="elote" id="elote"></td>
         <td><button type="button" onclick="addToCart()">Add to Cart</button></td>
       </tr>
       <tr>
         <td><img alt="Sope" src="sope.jpg"></td>
         <td>Sope(3)</td>
         <td>$4.99</td>
         <td><input type="number" name="sope" id="sope"></td>
         <td><button type="button" onclick="addToCart()">Add to Cart</button></td>
       </tr>
       <tr>
         <td><img alt="Taco al Pastor" src="taco.jpg"></td>
         <td>Tacos al Pastor(5)</td>
         <td>$7.50</td>
         <td><input type="number" name="taco" id="taco"></td>
         <td><button type="button" onclick="addToCart()">Add to Cart</button></td>
       </tr>
     </table>
  </body>
</html>