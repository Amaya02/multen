
function empty1() {
    var x,y;
    x = document.getElementById("email").value;
    y= document.getElementById("pass").value;
	
    if (x == "" || y =="") {
        alert("Please fill out all fields");
      	return false;
    };
	alert("Sign up completed");
    $('#demo-1').modal('hide');
}

function myFunction(){
	var x=document.getElementById("pass");
	if(x.type == "password"){
			x.type="text";
	}
	else{
		x.type="password";
	}
}