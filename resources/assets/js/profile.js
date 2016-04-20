$(function () {
	$('[data-toggle="popover"]').popover({
		trigger: 'focus',
		animation: true,
		html: true
	})

	if (typeof $.fn.datepicker != 'undefined') {
		$.fn.datepicker.defaults.format = "dd-M-yyyy";
		$.fn.datepicker.defaults.clearBtn = true;
		$.fn.datepicker.defaults.orientation = "bottom auto";
	};

	if ($('.signuppersonal').length) {
		$('.signuppersonal .dob input').datepicker();
	};


	if ($('.signupcalendar').length) {
		var diff = null;
		$('#start-date').datepicker({ startDate: '0' }).on('changeDate', function(e) {
			diff = Math.floor(( Date.parse(e.date) - Date.parse(new Date()) ) / 86400000)+1;
			$('#end-date').datepicker('remove');
			$('#end-date').datepicker({
				startDate: '+'+diff+'d'
			});
		});
	};

	var classList = {
		500 : "five",
		800 : "eight",
		1000 : "ten",
		1200 : "twelve",
		1500 : "fifteen",
		2000 : "twenty"
	}

	$('input[name=subject]').change(function() {
		if ($('input[name=price]:checked').length) {
			var price = $('input[name=price]:checked', '#signupsubjects').val();
			var id = $(this).attr("id");
			var label = $('label[for="'+id+'"]');
			if (label.attr('class') == classList[price]) {
				label.removeClass();
			} else{
				label.removeClass().addClass(classList[price]);
			};
		} else {
			$('#signupsubjects').find('alert').show('normal');
		}
	});

/*
	$(document).on('click','#signupsubjects .subject label', function(event) {
		//console.log($(this).closest('.grade').find('select option').is(':selected'));
		console.log($(this).closest('.grade').find('select').find(':selected').val());
		if (!($('input[name=price*]:checked').length)) {
			$('#signupsubjects').find('div.alert-red').show('normal', function(){
				var thisAlert = $(this);
				function hideAlert(){
					thisAlert.hide('slow');
				}
				window.setTimeout(hideAlert, 3000);
			});
		}
	})
*/
	var insertData = "<div id='hidden' style='display:none;'><div class='row added'><div class='col-xs-12'><div class='col-xs-12'><div class='row'><div class='col-xs-offset-11 col-xs-1'><button type='button' class='close' aria-label='close'><span aria-hidden='true'>&times;</span></button></div></div><div class='row'><div class='col-xs-4'><h5>College</h5></div><div class='col-xs-6'><fieldset class='form-group'><select class='form-control c-select'><option selected>College</option><option value='1'>IIT Delhi</option><option value='2'>IIT Roorkee</option><option value='3'>IIT Madras</option></select></fieldset></div></div><div class='row'><div class='col-xs-4'><h5>Degree</h5></div><div class='col-xs-6'><fieldset class='form-group'><select class='form-control c-select'><option selected>Degree</option><option value='1'>B.Tech.</option><option value='2'>M.Tech.</option><option value='3'>Dual Degree</option></select></fieldset></div></div><div class='row'><div class='col-xs-4'><h5>Branch</h5></div><div class='col-xs-6'><fieldset class='form-group'><input type='text' class='form-control'></fieldset></div></div><div class='row'><div class='col-xs-4'><h5>Year of Passout</h5></div><div class='col-xs-6'><fieldset class='form-group'><input type='text' class='form-control'></fieldset></div></div><div class='row'><div class='col-xs-4'><h5>College Verification</h5></div><div class='col-xs-6'><fieldset class='form-group'><input type='file' id='file' class='form-control'></fieldset></div></div><hr></div></div></div>";

	$(document).on('click','.addanothercollege a.add', function(event) {
		$(insertData).insertBefore('.addanothercollege');
		$('#hidden').slideDown(600, 'swing', function() {
			$(this).find('.row').unwrap();
		})
	});

	$(document).on('click','button.close', function(event){
		var target = $(this).closest('div.added');
		target.slideUp('slow', function(){
			target.remove();
		})
	});

	$(document).on('submit','#messageTeacher', function(event) {
		event.preventDefault();
		var form = $(this);
		if(form.find('#message').val() == ''){
			form.find('small').html('The message to be sent can\'t be empty');
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
				form.find('small').html('processing ...').fadeIn('slow');
			},
			complete: function(response){
				form.modal('hide');
				helper.flash(response.message);
			}
		});
		return false;
	});

})
