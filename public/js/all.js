var myCenter = new google.maps.LatLng(28.542381, 77.203569);
function initialize() {
  var mapCanvas = document.getElementById('map-canvas');
  var mapOptions = {
    center:myCenter,
    zoom: 17,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  }
  var map = new google.maps.Map(mapCanvas, mapOptions);
  var marker=new google.maps.Marker({
    position:myCenter,
  });
  marker.setMap(map);
}
google.maps.event.addDomListener(window, 'load', initialize);

$(document).on('submit','#contact form', function(event) {
  console.log(JSON.stringify($(this).serializeObject()));
  event.preventDefault();
  $.ajax({
    type: "POST", 
    url: $(this).attr('action'),
    data: {
        _token    : $(this).find('input[name=_token]').val(),
        name : $(this).find('input[name=name]').val(),
        email   : $(this).find('input[name=email]').val(),
        phone   : $(this).find('input[name=phone]').val(),
        message   : $(this).find('input[name=message]').val()
    },
    success: function(response){ 
      console.log(response);
      helper.flash(response.message);
    }
  })
});
var helper = {
	dateRegex : new RegExp("^(?:(?:31(-)(?:0?[13578]|1[02]|(?:Jan|Mar|May|Jul|Aug|Oct|Dec)))\1|(?:(?:29|30)(-)(?:0?[1,3-9]|1[0-2]|(?:Jan|Mar|Apr|May|Jun|Jul|Aug|Sep|Oct|Nov|Dec))\2))(?:(?:1[6-9]|[2-9]\d)?\d{2})$|^(?:29(-)(?:0?2|(?:Feb))\3(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00))))$|^(?:0?[1-9]|1\d|2[0-8])(-)(?:(?:0?[1-9]|(?:Jan|Feb|Mar|Apr|May|Jun|Jul|Aug|Sep))|(?:1[0-2]|(?:Oct|Nov|Dec)))\4(?:(?:1[6-9]|[2-9]\d)?\d{2})$"),
	monthNames : ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
	setStorage : function(key,value){
		localStorage.setItem(key,JSON.stringify(value));
	},
	getStorage : function(key){
		return JSON.parse(localStorage.getItem(key));
	},
	isElementInViewport : function(elem){
		var $elem = $(elem);

		// Get the scroll position of the page.
		var scrollElem = ((navigator.userAgent.toLowerCase().indexOf('webkit') != -1) ? 'body' : 'html');
		var viewportTop = $(scrollElem).scrollTop();
		var viewportBottom = viewportTop + $(window).height();

		// Get the position of the element on the page.
		var elemTop = Math.round( $elem.offset().top );
		var elemBottom = elemTop + $elem.height();

		return ((elemTop < viewportBottom) && (elemBottom > viewportTop));
	},
	toType : function(obj){
		return ({}).toString.call(obj).match(/\s([a-zA-Z]+)/)[1].toLowerCase();
	},
	baseUrl : function(window){
		return window.location.protocol + "//" + window.location.host + "/" + window.location.pathname.split('/')[1];
	},
	inputsValueArray : function(parent,inputType) {
		return $(parent).find(inputType).map(function() {
			return this.value;
		}).get();
	},
	inputsNameValObject : function(parent,inputTypeArray) {
		temp = {};
		for(input in inputTypeArray){
			$(parent).find(inputTypeArray[input]).map(function() {
				temp[this.name] = $(this).val();
			}).get();
		}
		return temp;
	},
	specifyOther : function(obj){
		if ($(obj).val() == 'other') {
			$(obj).next('.display_other').slideToggle(500);
		} else{
			$(obj).next('.display_other').slideUp(500);
		};
	},
	calculateAge : function(birthday){
		var ageDifMs = Date.now() - birthday.getTime();
		var ageDate = new Date(ageDifMs); // miliseconds from epoch
		return Math.abs(ageDate.getUTCFullYear() - 1970);
	},
	tareekh : function(timestamp){
		var tareek = new Date(timestamp);
		return tareek.getDate() + "-" + helper.monthNames[tareek.getMonth()] + "-" + tareek.getFullYear();
	},
	flash : function(message, icon){
		var div = $('#flashMessage');
		div.html(message);
		div.show('fast');
		setTimeout(
			function(){
				$('#flashMessage').hide('fast');
			},
		5000);
	}
}

/*
*
*	Extend Jquery
*
*/

$.fn.serializeObject = function()
{
    var o = {};
    var a = this.serializeArray();
    $.each(a, function() {
        if (o[this.name] !== undefined) {
            if (!o[this.name].push) {
                o[this.name] = [o[this.name]];
            }
            o[this.name].push(this.value || '');
        } else {
            o[this.name] = this.value || '';
        }
    });
    return o;
};
var numberScroll = {
	animationDone : false,
	checkAnimation : function(){
		var $elem = $('.numbers');
		if ($elem.length !== 0) {
			if (helper.isElementInViewport($elem.find('ul'))) {
				// Start the animation
				$elem.find('.count').each(function () {
					$(this).prop('Counter',0).animate({
						Counter: $(this).data('count')
					}, {
						duration: 2000,
						easing: 'swing',
						step: function (now) {
							var numbers = Math.ceil(now).toString().split('');
							var html = '';
							for (var i = 0; i < numbers.length; i++) {
								html += '<li>'+numbers[i]+'</li>';
							}
							$(this).html(html);
						},
						done: function (){
							numberScroll.animationDone = true;
						}
					});
				});
			}
		}
	}
}


$(function() {
	$(window).scroll(function(){
		if (!numberScroll.animationDone)
			numberScroll.checkAnimation();
	});

	$('#index-reviews').carousel();
	$('#index-reviews').on('slide.bs.carousel', function () {
		//
	})
});
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
			success: function(response){
				helper.flash(response.message);
			},
			error: function(response){
				helper.flash(response.message);
			},
			complete: function(response){
				console.log(response);
				helper.flash(response.message);
				form.find('small').html('Starred fields are compulsory');
			}
		});
		return false;
	});	
});
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

	$(document).on('click','#signupsubjects .subject label', function(event) {
		if (!($('input[name=price]:checked').length)) {
			$('#signupsubjects').find('div.alert-red').show('normal', function(){
				var thisAlert = $(this);
				function hideAlert(){
					thisAlert.hide('slow');
				}
				window.setTimeout(hideAlert, 3000);
			});
		}
	})

	var insertData = "<div id='hidden' style='display:none;'><div class='row added'><div class='col-xs-5'><hr class='purple'></div><div class='clearfix'></div><div class='col-xs-2'><h5>Graduate College</h5></div><div class='col-xs-offset-1 col-xs-2'><fieldset class='form-group'><input type='text' class='form-control'></fieldset></div><div class='clearfix'></div><div class='col-xs-2'><h5>Degree</h5></div><div class='col-xs-offset-1 col-xs-2'><fieldset class='form-group'><input type='text' class='form-control'></fieldset></div><div class='clearfix'></div><div class='col-xs-2'><h5>Branch</h5></div><div class='col-xs-offset-1 col-xs-2'><fieldset class='form-group'><input type='text' class='form-control'></fieldset></div><div class='clearfix'></div><div class='col-xs-2'><h5>College Verification</h5></div><div class='col-xs-3'><fieldset class='form-group'><input type='file' id='file' class='form-control'></fieldset></div></div></div>";
	$(document).on('click','.addanothercollege a.add', function(event) {
		$(insertData).insertBefore('.addanothercollege');
		$('#hidden').slideDown(600, 'swing', function() {
			$(this).find('.row').unwrap();
		})
		$('.addanothercollege a.remove').show();
	});
	$(document).on('click','.addanothercollege a.remove', function(event) {
		var target = $('.addanothercollege').prev('div.added');
		target.slideUp('slow', function(){
			target.remove();
			if (!($('div.added').length)) {
				$('.addanothercollege a.remove').hide();
			};
		});
	})
})
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
	/*------------------------------------*/
	$(window).on('load',function() {
		var enquiryOpened = false;
		//console.log('interval set');
		intervalID = window.setInterval(function(){
			//console.log('showEnquiry called; enquiryOpened = '+enquiryOpened);
			if (!$('#messageModal').is(":visible") && !enquiryOpened && !helper.getStorage('enquiryModal')) {
				$('#enquiryModal').modal('show');
				enquiryOpened = true;
				clearInterval(intervalID);
			};
		}, 5000);
	});

	$(document).on('click','#enquiryModalDismiss', function(event) {
		helper.setStorage('enquiryModal', true);
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
				'class'		: form.find('#class').val(),
				subject		: form.find('#subject').val(),
				topic		: form.find('#topic').val(),
				enquiry		: form.find('#enquiry').val(),
				email		: form.find('#email').val(),
				phone		: form.find('#phone').val()
			},
			beforeSend: function(){
				modal.find('small').html('processing ...').fadeIn('slow');
			},
			success: function(response){
				helper.flash(response.message);
			},
			error: function(response){
				helper.flash(response.message);
			},
			complete: function(response){
				modal.modal('hide');
				helper.flash(response.message);
				helper.setStorage('enquiryModal', true);
			}
		});
		return false;
	});

});
//# sourceMappingURL=all.js.map