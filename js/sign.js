function empty() {
    var x,y;
    x = document.getElementById("email").value;
    y= document.getElementById("pass").value;
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
    e = document.getElementById("password").value;
    if( d=="" || e==""){
    	alert("Please fill out all fields");
      	return false;
    };

   	alert("Sign up completed");
   	$('#demo-2').modal('hide');
}







































function empty1() {
    var y;
    y= document.getElementById("pass").value;
    if (y== "") {
        alert("Enter a valid password");
        return false;

    };
    $('#demo-1').modal('hide');
    $('#demo-2').modal('show');
}

function empty2() {
    var z;
    z = document.getElementById("company").value;
    if (z == "") {
        alert("Enter your company");
        return false;
    };
    $('#demo-1').modal('hide');
    $('#demo-2').modal('show');
}

function empty3() {
    var a;
    a = document.getElementById("address").value;
    if (a == "") {
        alert("Invalid address");
        return false;
    };
    $('#demo-1').modal('hide');
    $('#demo-2').modal('show');
}

function empty4() {
    var b;
    b = document.getElementById("zipcode").value;
    if (b == "") {
        alert("Invalid zipcode");
        return false;
    };
    $('#demo-1').modal('hide');
    $('#demo-2').modal('show');
}

function empty5() {
    var c;
    c = document.getElementById("contact").value;
    if (c == "") {
        alert("Invalid contact#");
        return false;
    };
    $('#demo-1').modal('hide');
    $('#demo-2').modal('show');
}