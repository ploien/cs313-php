<?php 
   session_start();
   
   $_SESSION["elotes"] = 0;
   $_SESSION["sopes"] = 0;
   $_SESSION["tacos"] = 0;
  
?>


<!DOCTYPE html>
<html>
  <head>
     <title>Prove 3 - Shopping Cart</title>
     
     <script type="text/javascript">

	 	/*function addToCart() {
		 	var request = new XMLHttpRequest();
		 	request.onreadystatechange = function() {
		 	}
	 	}*/
     </script>
  </head>
  <body>
     <header>Shopping Cart</header>
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
         <td><input type="number" name="elote"></td>
         <td><input type="submit">Add to Cart</input></td>
       </tr>
       <tr>
         <td><img alt="Sope" src="sope.jpg"></td>
         <td>Sope(3)</td>
         <td>$4.99</td>
         <td><input type="number" name="sope"></td>
         <td><input type="submit">Add to Cart</input></td>
       </tr>
       <tr>
         <td><img alt="Taco al Pastor" src="taco.jpg"></td>
         <td>Tacos al Pastor(5)</td>
         <td>$7.50</td>
         <td><input type="number" name="taco"></td>
         <td><input type="submit">Add to Cart</input></td>
       </tr>
     </table>
  </body>
</html>