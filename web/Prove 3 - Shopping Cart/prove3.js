/**
 * 
 */

function loadPage() {

   var request = new XMLHttpRequest();

   request.onreadystatechange = function() {
	   if (this.readyState == 4 && this.status == 200) {

		    var tableText = "<tr><th>Item</th><th>Quantity</th><th>Price</th></tr>";
	   		var cartItems = JSON.parse(this.responseText);
	
	   		tableText += "<tr><td>Elotes</td><td>" + cartItems.elotes + "</td><td>$" + (1.50*cartItems.elotes) + "</td>"
	   		              + "<td><input id='elote' type='number' value='" + cartItems.elotes + "'onchange='changeCart()'></input></tr>";
	   		
	   		tableText += "<tr><td>Sopes(3)</td><td>" + cartItems.sopes + "</td><td>$" + (4.99*cartItems.sopes) + "</td>"
	   					  + "<td><input id='sope' type='number' value='" + cartItems.sopes + "'onchange='changeCart()'></input></tr>";
	   		
	   		tableText += "<tr><td>Tacos(5)</td><td>" + cartItems.tacos + "</td><td>$" + (7.50*cartItems.tacos) + "</td>"
	   					  + "<td><input id='taco' type='number' value='" + cartItems.tacos + "'onchange='changeCart()'></input></tr>";
	   		
	   		document.getElementById("cart").innerHTML = tableText;
	   }
   };
   request.open("GET", "getCart.php", true);
   request.send();		   
}


function reset() {

 	var request = new XMLHttpRequest();

 	request.open("GET", "reset.php", true);
 	request.send();

 	document.getElementById("number").value = 0;
 	document.getElementById("elote").value = 0;
 	document.getElementById("sope").value = 0;
 	document.getElementById("taco").value = 0;
}
 

function addToCart() {

 	var elotes = document.getElementById("elote").value;
 	var sopes = document.getElementById("sope").value;
 	var tacos = document.getElementById("taco").value;
 	
 	var cartItems = "elote=" + elotes + "&sope=" + sopes + "&taco=" + tacos;
 	
 	var request = new XMLHttpRequest();
 	
 	request.onreadystatechange = function() {
 		if (this.readyState == 4 && this.status == 200) {
	 		
			var itemsInCart = JSON.parse(this.responseText);
            document.getElementById("number").value = itemsInCart.number;

            document.getElementById("elote").value = 0;
		 	document.getElementById("sope").value = 0;
		 	document.getElementById("taco").value = 0;
        }
 	};
 	request.open("GET", "addToCart.php?" + cartItems, true);
 	request.send();	
}

function changeCart() {

 	var elotes = document.getElementById("elote").value;
 	var sopes = document.getElementById("sope").value;
 	var tacos = document.getElementById("taco").value;
 	
 	var cartItems = "elote=" + elotes + "&sope=" + sopes + "&taco=" + tacos;
 	
 	var request = new XMLHttpRequest();
 	
 	request.onreadystatechange = function() {
 		if (this.readyState == 4 && this.status == 200) {
	 		
			var cart = JSON.parse(this.responseText);
     
            document.getElementById("elote").value = cart.elotes;
		 	document.getElementById("sope").value = cart.sopes;
		 	document.getElementById("taco").value = cart.tacos;
        }
 	};
 	request.open("GET", "changeCart.php?" + cartItems, true);
 	request.send();	
}


	