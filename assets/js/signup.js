function checkCheckBoxes(theForm) {
	var pay1= $("input[type=radio]:checked").length;
    if(pay1<=0){
    	alert ('You didn\'t choose any subscription!');
      	return false;
    }
	else{
		var pay1= $("input[type=radio]:checked").length;
		if(pay1<=0){
			alert ('You didn\'t choose any template!');
			return false;
		}
	}
}

function goBack(){
	window.history.back();
}