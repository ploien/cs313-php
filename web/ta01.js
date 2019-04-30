function clickMe() {
   alert("Clicked!");
}

function changeColor() {
	
	var color = $("#colorInput").css("background-color");
	$("#div1").css("background-color", color);
}