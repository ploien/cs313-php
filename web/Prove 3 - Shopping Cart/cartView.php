<!DOCTYPE html>
<html>
<head>
	<title>Shopping Cart</title>
	
	<script type="text/javascript">

	   function loadPage() {

		   var request = new XMLHttpRequest();

		   request.onreadystatechange = function() {
			   if (this.readyState == 4 && this.status == 200) {

				    var tableText = "<tr><th>Item</th><th>Quantity</th><th>Price</th></tr>";
               		var cartItems = JSON.parse(this.responseText);

               		tableText += "<tr><td>Elote</td><td>" + cartItems.elotes + "</td><td>$" + (1.50*cartItems.elotes) + "</td></tr>";
               		tableText += "<tr><td>Sopes</td><td>" + cartItems.sopes + "</td><td>$" + (4.99*cartItems.sopes) + "</td></tr>";
               		tableText += "<tr><td>Tacos</td><td>" + cartItems.tacos + "</td><td>$" + (7.50*cartItems.tacos) + "</td></tr>";
               		document.getElementById("cart").innerHTML = tableText;
			   }
		   };

		   request.open("GET", "getCart.php", true);
		   request.send();	
			   
	   }
    
	</script>
</head>
    <body onload="loadPage()">
       <label for="cart">Shopping Cart</label>
       <table id="cart"></table>
    </body>
</html>