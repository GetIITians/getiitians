var showSignupShown = false;

$(function () {
	$(document).on('submit','.doubt form', function(event) {
		event.preventDefault();
		var form = $(this);
		//var modal = $('#enquiryModal');
		if(form.find('#enquiry').val() == ''){
			form.find('small').html('Enquiry field can\'t be empty.');
			form.find('#enquiry').focus();
			return false;
		}
		if(form.find('#email').val() == ''){
			form.find('small').html('Email field can\'t be empty.');
			form.find('#email').focus();
			return false;
		}
		$.ajax({
			url		: form.prop('action'),
			method	: 'POST',
			data 	: {
				_token		: form.find('input[name=_token]').val(),
				'class'		: form.find('#class').val(),
				subject		: form.find('#subject').val(),
				topic		: form.find('#topic').val(),
				enquiry		: form.find('#enquiry').val(),
				email		: form.find('#email').val(),
				phone		: form.find('#phone').val()
			},
			beforeSend: function(){
				form.find('small').html('processing ...');
			},
			error: function(response){
				helper.flash(response.message);
			},
			complete: function(response){
				//console.log(response);
				console.log(response.responseText);
				helper.flash(JSON.parse(response.responseText).message);
				form.find('small').html('Starred fields are compulsory');
			}
		});
		return false;
	});

	/*------------------------------------*/
	$(window).on('load',function() {
		var enquiryOpened = false;
		//console.log('interval set');
		intervalID = window.setInterval(function(){
			//console.log('showEnquiry called; enquiryOpened = '+enquiryOpened);
			if (!$('#messageModal').is(":visible") && !$('#callModal').is(":visible") && !enquiryOpened && !helper.getStorage('enquiry')) {
				$('#enquiryModal').modal('show');
				enquiryOpened = true;
				clearInterval(intervalID);
			};
		}, 5000);
		general.showSignup();
	});

	$(document).on('click','#enquiryModalDismiss', function(event) {
		helper.setStorage('enquiry', true);
	});

	$(document).on('submit','#enquiryModal form', function(event) {
		event.preventDefault();
		var form = $(this);
		var modal = $('#enquiryModal');
		if(form.find('#enquiry').val() == ''){
			form.find('small').html('Enquiry field can\'t be empty.').fadeIn('slow');
			form.find('#enquiry').focus();
			return false;
		}
		if(form.find('#email').val() == ''){
			form.find('small').html('Email field can\'t be empty.').fadeIn('slow');
			form.find('#email').focus();
			return false;
		}
		$.ajax({
			url		: form.prop('action'),
			method	: 'POST',
			data 	: {
				_token		: form.find('input[name=_token]').val(),
				enquiry		: form.find('#enquiry').val(),
				email		: form.find('#email').val(),
				phone		: form.find('#phone').val()
			},
			beforeSend: function(){
				modal.find('small').html('processing ...').fadeIn('slow');
			},
			complete: function(response){
				modal.modal('hide');
				helper.flash(response.message);
				helper.setStorage('enquiry', true);
			}
		});
		return false;
	});

});

var general = {
	showSignup : function() {
		var signupLink = $('#signup');
		if (signupLink.is(":visible")) {
			var signupTooltip = $('#signup-tooltip');
			var signupLeft = (helper.getPosition(signupLink, 'left')+helper.getPosition(signupLink, 'width')-150);
			var signupTop = (helper.getPosition(signupLink, 'top') + helper.getPosition(signupLink, 'height')+10);
			signupTooltip.css({top: signupTop, left: signupLeft});
			signupTooltip.fadeIn('slow');
			showSignupShown = true;
		};
	}
}

$(document).on({
	mouseenter: function() {
		$(this).stop().fadeOut('fast');
	},
	mouseleave: function() {
		$(this).stop().fadeIn('slow');
	}
},'#signup-tooltip');

$(function () {
	if ($('#flashMessage').length) {
		var flashMessage = $('#flashMessage');
		var content = flashMessage.html();
		flashMessage.hide();
//		console.log(content.constructor);
//		console.log(content.replace(/\s/g, '').length);
		if(content.replace(/\s/g, '').length > 0)
			helper.flash(content);
	}
})
