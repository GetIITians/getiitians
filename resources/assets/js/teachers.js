$(function () {
	/*------------------------------------*/
	var range = $('#feeInput'),
    value = $('.feeValue');
	value.html(range.attr('value'));
	range.on('input', function(){
		value.html(this.value);
	});
	/*------------------------------------*/
	$('section ul i').on('click',function(){
		console.log($(this).prev().html());
		$(this).fadeOut('fast');
		$(this).prev().fadeOut('fast');
	});
	/*------------------------------------*/
	$(document).on('show.bs.modal','#messageModal', function(event) {
		var modal = $(this);
		modal.find('small').hide();
		var button = $(event.relatedTarget); // Button that triggered the modal
		var recipient = button.data('name'); // Extract info from data-* attributes
		//modal.find('.modal-title').text('Send a Message to ' + recipient);
		modal.find('.modal-body #recipient').val(recipient);
	});
	/*------------------------------------*/
	$(document).on('click','#messageModalSubmit', function() {
		var modal = $('#messageModal');
		var form = modal.find('form');
		if(form.find('#message').val() == ''){
			modal.find('small').fadeIn('slow');
			form.find('#message').focus();
			return false;
		}
		$.ajax({
			url		: form.prop('action'),
			method	: 'POST',
			data 	: {
				_token		: form.find('input[name=_token]').val(),
				recipient	: form.find('#recipient').val(),
				message		: form.find('#message').val()
			},
			beforeSend: function(){
				modal.find('small').html('processing ...').fadeIn('slow');
			},
			success: function(response){
				modal.modal('hide');
				helper.flash(response.message);
			},
			error: function(response){
				helper.flash(response.message);
			},
			complete: function(response){
				modal.modal('hide');
				helper.flash(response.message);
			}
		});
		return false;
	});

	$(document).on('submit','#callModalSubmit form', function() {
		event.preventDefault();
		var form = $(this);
		var modal = $('#enquiryModal');
		if(form.find('#email').val() == ''){
			form.find('small').html('Email field can\'t be empty.').fadeIn('slow');
			form.find('#email').focus();
			return false;
		}
		if(form.find('#phone').val() == ''){
			form.find('small').html('Phone field can\'t be empty.').fadeIn('slow');
			form.find('#Phone').focus();
			return false;
		}
		$.ajax({
			url		: form.prop('action'),
			method	: 'POST',
			data 	: {
				_token		: form.find('input[name=_token]').val(),
				email		: form.find('#email').val(),
				phone		: form.find('#phone').val()
			},
			beforeSend: function(){
				modal.find('small').html('processing ...').fadeIn('slow');
			},
			complete: function(response){
				modal.modal('hide');
				helper.flash(response.message);
			}
		});
		return false;
	});
});