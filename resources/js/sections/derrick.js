/**
*
* Adding shake detection
* @author Derrick Roccka
**/

window.addEventListener('shake', function(){ aboutMe({"data":[{mobile: true}]}, true);}, false);

/**
*
* Derrick Roccka Section
* First section
*
**/

/* By default, contact options and about me section are hidden */
$("#derrick-caption-contact").hide();
$("#about-me").hide();

/* Detecting if user is on a mobile device*/
if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
	/* Displaying contact options on hovering "Derrick Roccka" */
	$("#derrick-logo, #derrick-alerts").on('click', {mobile: true}, aboutMe);
}
else{
	$("#derrick-caption-init").on('mouseenter', {status: true}, contactOps);
	$("#derrick-caption-contact").on('mouseleave', {status: false}, contactOps);
	/* Displaying about me */
	$("#derrick-logo").on('click', {mobile: false}, aboutMe);
}

/**
*
* Shows the contact options
* @author Derrick Roccka
**/

function contactOps(event){
	if(true===event.data.status){
		$("#derrick-caption-init").hide();
		$("#derrick-caption-contact").show();
	}
	else{
		$("#derrick-caption-contact").hide();
		$("#derrick-caption-init").show();
	}
}

/**
*
* Shows the "about me" section
* @author Derrick Roccka
**/

function aboutMe(event){
	// width of the logo
	var size = $("#derrick-logo").width();
	// height of the logo / 2
	var half = $("#derrick-logo").height()/2;
	// derrick-caption-init height
	var dci_h = $("#derrick-caption-init").height();
	if($("#about-me").is(":visible")){
		$("#derrick-logo-center").css('height', $("#derrick-logo-center").height()+(half*2)-dci_h);
		$("#derrick-logo").css('width', size*2).css('height', size*2);
		$("#about-me").fadeOut(500);
		//detecting if the click is done from a mobile device
		if(typeof event.data.mobile!='undefined' || arguments[1]===true){
			if(true===event.data.mobile || arguments[1]===true){
				$('#derrick-alerts').html('<strong>Shake your device, click here or click the big R</strong>');
				$("#derrick-caption-init").show();
				$("#derrick-caption-contact").hide();
				$('html, body').stop().animate({
					scrollTop: $("#derrick-logo").offset().top
				}, 2000);
			}
		}
	}
	else{
		$("#derrick-logo-center").css('height', $("#derrick-logo-center").height()-half+dci_h);
		$("#derrick-logo").css('width', size/2).css('height', size/2);
		//detecting if the click is done from a mobile device
		if(typeof event.data.mobile!='undefined' || arguments[1]===true){
			if(true===event.data.mobile || arguments[1]===true){
				$('#derrick-alerts').html('<strong>Close</strong>');
				$("#derrick-caption-init").hide();
				$("#derrick-caption-contact").show();
			}
		}
		$("#about-me").fadeIn(1500);
	}

}