function setBodyOpacity ( to ) {

	$("body").css('opacity', to );
}

function getOrientation() {

		var orientation = window.innerWidth > window.innerHeight ? "L" : "P";

		return orientation;

	}



function zoomToInfo(infoSize, nameProperty) {

		if (getOrientation() == 'L') {

			$('#Information').css('font-size', infoSize);

			$('#Name').css('opacity', nameProperty);

		}

	}

function hideHeader() {

		if (getOrientation() == 'L') {

			if (window.pageYOffset > window.innerHeight * 0.15) {

				document.getElementById('header').style.height = '7vh';
				document.getElementById('siteName').style.fontSize = '6vh';
				document.getElementById('headerInformationBox').style.opacity = 0;

				$('.menuHideMenuButton').css({'top':'7.5vh','left':'5.1vw'});
				if ($(document).width() > 990) {
					//normal
					$('.content').css({'left':'7vw', 'width':'88vw'});
					$('nav').css('width', '7vw').css('top', '7vh').css('height', '93vh');
					$('nav form button').css({'font-size':'0px'});


				} else {
					// tablet
					$('nav').children().hide();
					$('nav').css({'top':'7vh', 'height':'1vh'});
				}

			} else {

				document.getElementById('header').style.height = '14vh';
				document.getElementById('siteName').style.fontSize = '12.1vh';
				document.getElementById('headerInformationBox').style.opacity = 1;

				$('.menuHideMenuButton').css({'top':'14.5vh','left':'7.1vw'});
				if ($(document).width() > 990) {
					//normal
					$('.content').css({'left':'9vw', 'width':'86vw'});
					$('nav').css('width', '9vw').css('top', '14vh').css('height', '86vh');
					$('nav form button').css({'font-size':'1.3vw'});

				} else {
					// tablet
					$('nav').children().show();
					$('nav').css({'top':'14vh', 'height':'10vh'});
				}

			}

		}

	}

function showInfoBox() {

		if (parseInt($('nav').css('left')) >= 0) {
			showMenu();
		}

		if (parseInt($('.headerBox').css('right')) < 0) {

			$('.headerBox').css('right','0');

			$('#rightButton').css('opacity', '1');

			$('#rightButton').css('transform', 'rotate(180deg)');

			// $('.content').css({'opacity':'0.5'});

		} else {

			$('.headerBox').css('right','-90%');
			
			$('#rightButton').css('opacity', '0.8');

			$('#rightButton').css('transform', 'rotate(0deg)');

			// $('.content').css({'opacity':'1'});

		} 
	}

function showButton( id ) {

		$(id).css('opacity', '1');
		$(id + ' h3').css('opacity', '1');

		if (getOrientation() == 'L') {

			if (window.pageYOffset > window.innerHeight * 0.25) {

				$(id + ' h3').css('font-size', '1.3vw');

			}

		}

	}

function hideButton( id ) {

		$(id).css('opacity', '0.7');
		$(id + ' h3').css('opacity', '0.7');

		if (getOrientation() == 'L') {

			if (window.pageYOffset > window.innerHeight * 0.25) {

				$(id + ' h3').css('font-size', '0vh');

			}

		}

	}

function showMenu() {

	if (parseInt($('.headerBox').css('right')) >= 0) {
		 showInfoBox();
	}

	if (parseInt($('nav').css('left')) < 0) {

			$('nav').css({'left':'0px'});
			$('#leftButton').css('transform', 'rotate(-180deg)');
			$('#leftButton').css('opacity', '0.8');
			// $('.content').css({'opacity':'0.5'});

		} else {

			$('nav').css({'left':'-50%'});
			$('#leftButton').css('transform', 'rotate(0deg)');
			$('#leftButton').css('opacity', '1');
			// $('.content').css({'opacity':'1'});

		}

	}
