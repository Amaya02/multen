function myFunction(){
	var x=document.getElementById("pass");
	if(x.type == "password"){
			x.type="text";
	}
	else{
		x.type="password";
	}
}

var modal = document.getElementById('id01');
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
