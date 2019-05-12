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
     
     <script type="text/javascript">

	 	function addToCart() {

		 	var elotes = document.getElementById("elote").value;
		 	var sopes = document.getElementById("sope").value;
		 	var tacos = document.getElementById("taco").value;

		 	var cartItems = "elote=" + elotes + "&sopes=" + sopes + "&tacos=" + tacos;
		 	
		 	var request = new XMLHttpRequest();
		 	request.onreadystatechange = function() {
		 		if (this.readyState == 4 && this.status == 200) {
			 		
					var itemsInCart = json.parse(this.responseText);
	                document.getElementById("number").value = itemsInCart[0].numItems;
	            }
		 	};

		 	request.open("GET", addToCart.php? + cartItems, true);
		 	request.send();

		 	
	 	}

	 	
     </script>
  </head>
  <body>
     <header><h1>Shopping Cart</h1></header>
     <output id="number"></output>
     <label for="number">Items in Cart</label>
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
         <td><input type="submit">Add to Cart</input></td>
       </tr>
       <tr>
         <td><img alt="Sope" src="sope.jpg"></td>
         <td>Sope(3)</td>
         <td>$4.99</td>
         <td><input type="number" name="sope" id="sope"></td>
         <td><input type="submit">Add to Cart</input></td>
       </tr>
       <tr>
         <td><img alt="Taco al Pastor" src="taco.jpg"></td>
         <td>Tacos al Pastor(5)</td>
         <td>$7.50</td>
         <td><input type="number" name="taco" id="taco"></td>
         <td><input type="submit">Add to Cart</input></td>
       </tr>
     </table>
  </body>
</html>