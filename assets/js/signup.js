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

var modal = document.getElementById('myModal1');

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById('myImg1');
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
    modal.style.display = "block";
    modalImg.src = this.src;
    captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close2")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
  modal.style.display = "none";
}

window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

var modal2 = document.getElementById('myModal2');

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById('myImg2');
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
    modal.style.display = "block";
    modalImg.src = this.src;
    captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close2")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
  modal.style.display = "none";
}

window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

