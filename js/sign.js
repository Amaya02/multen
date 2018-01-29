function empty() {
    var x,y,z,a,b,c;
    x = document.getElementById("email").value;
    y = document.getElementById("pass").value;
    z = document.getElementById("company").value;
    a = document.getElementById("address").value;
    b = document.getElementById("zipcode").value;
    c = document.getElementById("contact").value;
   
    if (x == "" || y =="" || z=="" || a=="" || b=="" || c=="") {
        alert("Please fill out all fields");
      	return false;
    };

    $('#demo-1').modal('hide');
    $('#demo-2').modal('show');
}

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

function emptyPayment(){
	var d,e;
	d = document.getElementById("paypalemail").value;
    e = document.getElementById("password").value;
    if( d=="" || e==""){
    	alert("Please fill out all fields");
      	return false;
    };

   	alert("Sign up completed");
   	$('#demo-2').modal('hide');
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
