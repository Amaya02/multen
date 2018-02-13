function empty1() {
    var x,y;
    x = document.getElementById("email").value;
    y= document.getElementById("pass").value;
	
    if (x == "" || y =="") {
        alert("Please fill out all fields");
      	return false;
    };
	alert("Sign in completed");
    $('#demo-1').modal('hide');
}

function empty() {
    var x,y,z,a,b,c;
    x = document.getElementById("email1").value;
    y= document.getElementById("pass1").value;
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

function emptyPayment(){
	var d,e;
	d = document.getElementById("paypalemail").value;
    e = document.getElementById("paypalpass").value;
    var pay1= $("input[type=radio]:checked").length;
    if( d=="" || e=="" || pay1<=0){
    	alert("Please fill out all fields");
      	return false;
    }
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
