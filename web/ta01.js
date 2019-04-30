function clickMe() {
   alert("Clicked!");
}

function changeColor() {
	
	var color = document.getElementById("colorInput").value;
	document.getElementById("div1").style.backgroundColor = color;
}