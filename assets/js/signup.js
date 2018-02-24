function checkCheckBoxes(theForm) {
	var pay1= $("input:radio[name=creditcard]:checked").length;
    if(pay1<=0){
    	alert ('You didn\'t choose any subscription!');
      	return false;
    }
	else{
		var pay1= $("input:radio[name=template]:checked").length;
		if(pay1<=0){
			alert ('You didn\'t choose any template!');
			return false;
		}
	}
}

function goBack(){
	window.history.back();
}

function myFunction(){
	var x=document.getElementById("password");
	if(x.type == "password"){
			x.type="text";
	}
	else{
		x.type="password";
	}
}