$(function () {
	$('[data-toggle="popover"]').popover({
		trigger: 'focus',
		animation: true,
		html: true
	})

	if (typeof $.fn.datepicker != 'undefined') {
		$.fn.datepicker.defaults.format = "dd/mm/yyyy";
		$.fn.datepicker.defaults.clearBtn = true;
		$.fn.datepicker.defaults.orientation = "bottom auto";
	};

	if ($('.signuppersonal').length) {
		$('.signuppersonal .dob input').datepicker();
	};
	if ($('.signupqualification').length) {
		$('.passout input').datepicker();
	}


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
	if (typeof qualifications !== 'undefined'){
		var insertData = "<div id='hidden' style='display:none;'><div class='row added'><div class='col-xs-12'><div class='col-xs-12'><div class='row'><div class='col-xs-offset-11 col-xs-1'><button type='button' class='close' aria-label='close'><span aria-hidden='true'>&times;</span></button></div></div><div class='row'><div class='col-xs-4'><h5>College</h5></div><div class='col-xs-6'><fieldset class='form-group'><select class='form-control c-select' name='qualification["+qualifications+"][college]'><option selected>College</option><option value='IIT Delhi'>IIT Delhi</option><option value='IIT Roorkee'>IIT Roorkee</option><option value='IIT Madras'>IIT Madras</option></select></fieldset></div></div><div class='row'><div class='col-xs-4'><h5>Degree</h5></div><div class='col-xs-6'><fieldset class='form-group'><select class='form-control c-select' name='qualification["+qualifications+"][degree]'><option selected>Degree</option><option value='B.Tech.'>B.Tech.</option><option value='M.Tech.'>M.Tech.</option><option value='Dual Degree'>Dual Degree</option></select></fieldset></div></div><div class='row'><div class='col-xs-4'><h5>Branch</h5></div><div class='col-xs-6'><fieldset class='form-group'><input type='text' class='form-control' name='qualification["+qualifications+"][branch]'></fieldset></div></div><div class='row'><div class='col-xs-4'><h5>Year of Passout</h5></div><div class='col-xs-6'><fieldset class='form-group'><input type='text' class='form-control' name='qualification["+qualifications+"][passout]'></fieldset></div></div><div class='row'><div class='col-xs-4'><h5>College Verification</h5></div><div class='col-xs-6'><fieldset class='form-group'><input type='file' id='file' class='form-control' name='qualification["+qualifications+"][verification]'></fieldset></div></div><hr></div></div></div>";
	}

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

	$(document).on('submit','.loggedOutMessage', function(event) {
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
/*---------------------------------
		CLASS BOOKING STARTS BELOW
*/
	if($('.class').length){book.initClassList(topics);}
	$('#class').change(function() {
		var classVal = $(this).find('option:selected').val() ;
		if ( classVal !== 'CLASS') {
			book.loadSubjects(topics[classVal].subjects);
		} else {
			$("#subject").empty().append($("<option />").val('SUBJECT').text('SUBJECT'));
			$("#topic").empty().append($("<option />").val('TOPIC').text('TOPIC'));
		}
	});
	$('#subject').change(function() {
		var selectVal = $(this).find('option:selected').val() ;
		var classVal  = $('#class').find('option:selected').val() ;
		if ( selectVal !== 'SUBJECT') {
			book.loadTopics(topics[classVal].subjects[selectVal].topics);
		} else {
			$("#topic").empty().append($("<option />").val('TOPIC').text('TOPIC'));
		}
	});

})


var book = {
	initClassList : function(topics){
		var classSelect = $("#class");
		$.each(topics, function() {
		  classSelect.append($("<option />").val(this.id).text(this.name));
		});
	},
	loadSubjects : function(subjects){
		var subjectSelect = $("#subject");
		subjectSelect.empty().append($("<option />").val('SUBJECT').text('SUBJECT'));
		$.each(subjects, function() {
		  subjectSelect.append($("<option />").val(this.id).text(this.name));
		});
	},
	loadTopics : function(topics){
		var topicSelect = $("#topic");
		topicSelect.empty().append($("<option />").val('TOPIC').text('TOPIC'));
		$.each(topics, function() {
		  topicSelect.append($("<option />").val(this.id).text(this.name).attr('fees',this.fees));
		});
	},
	daysInMonth : function(monthNumber){
		return 28 + (monthNumber + Math.floor(monthNumber/8)) % 2 + 2 % x + 2 * Math.floor(1/monthNumber);
	}
}

$(function () {
	// these are labels for the days of the week
	cal_days_labels = ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'];
	// these are human-readable month name labels, in order
	cal_months_labels = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
	// these are the days of the week for each month, in order
	cal_days_in_month = [31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31];
	cal_current_date = new Date();
	function Calendar (month, year){
		this.month = (isNaN(month) || month == null) ? cal_current_date.getMonth() : month;
  	this.year  = (isNaN(year) || year == null) ? cal_current_date.getFullYear() : year;
  	this.html = '';
	}

	function twoDigits(d) {
    if(0 <= d && d < 10) return "0" + d.toString();
    if(-10 < d && d < 0) return "-0" + (-1*d).toString();
    return d.toString();
	}

	Calendar.prototype.generateHTML = function () {
		// get first day of month
		var firstDay = new Date(this.year, this.month, 1);
		var startingDay = firstDay.getDay();	//	5 - Friday

		// find number of days in month
  	var monthLength = cal_days_in_month[this.month];

		// compensate for leap year
	  if (this.month == 1) { // February only!
	    if((this.year % 4 == 0 && this.year % 100 != 0) || this.year % 400 == 0){
	      monthLength = 29;
	    }
	  }

		var monthName = cal_months_labels[this.month];
		var html ='';
		for(var i = 0; i <= 6; i++ ){
    	html += '<label class="cell heading">';
    	html += cal_days_labels[i];
    	html += '</label>';
  	}

		// fill in the days
	  var day = 1;
		for (var i = 0; i < 42; i++) {
			if (day <= monthLength && i >= startingDay) {
				html += '<input hidden name="date[]" value="'+this.year+'-'+(this.month+1)+'-'+day+'" type="checkbox" id="'+day+this.month+this.year+'" data-month="'+twoDigits(1 + this.month)+'" data-year="'+twoDigits(this.year)+'" data-day="'+day+'">';
				html += '<label for="'+day+this.month+this.year+'" class="cell">'+day+'</label>';
				day++;
			} else {
				html += '<label class="cell blocked">&nbsp;</label>';
			}
		}
	  this.html = html;
	}

	Calendar.prototype.getHTML = function () {
		return this.html;
	}

	Calendar.prototype.getMonthYear = function (month,year) {
		if (month) {
			if (year) {
				return cal_months_labels[this.month]+' '+this.year;
			}
			return this.month;
		} else if(year) {
			return this.year;
		}
	};

	$(document).on('click','.class .next', function(event) {
		event.preventDefault();
		var month = $('.monthYear').data('month');
		var year = $('.monthYear').data('year');
		if (month == 11) {
			year += 1;
			month = 0;
		} else {
			month += 1;
		}

		populateCalendar(month,year);
	});

	$(document).on('click','.class .previous', function(event) {
		event.preventDefault();
		var month = $('.monthYear').data('month');
		var year = $('.monthYear').data('year');
		if (month == 0) {
			year -= 1;
			month = 11;
		} else {
			month -= 1;
		}

		populateCalendar(month,year);
	});

	function populateCalendar(month = null, year = null){
		var cal = new Calendar(month,year);
	  cal.generateHTML();
		$('.monthYear').html(cal.getMonthYear(true,true));
		$('.monthYear').data('month',cal.getMonthYear(true,false));
		$('.monthYear').data('year',cal.getMonthYear(false,true));
		$('#calendar').html(cal.getHTML());
		$( "#"+cal_current_date.getDate()+''+cal_current_date.getMonth()+''+cal_current_date.getFullYear() ).prop( "checked", true );
		getTimeSlots();
	}

	if($('.class').length){populateCalendar();}

	$(document).on('change','#calendar input', function(event) { getTimeSlots(); });

	function getTimeSlots (){
		var days = [];
		$( "#calendar input:checked" ).each(function() {
			days.push(($(this).data('year'))+'-'+($(this).data('month'))+'-'+($(this).data('day')));
		});
		$.ajax({
			url		: routeURL+'/slots',
			method	: 'GET',
			data 	: {
				dates		: JSON.stringify(days),
			},
			complete: function(response){
				console.log(JSON.parse(response.responseText));
				populateTimeslots(JSON.parse(response.responseText));
			}
		});
	}

	var timeslots = {
		'0:0' 	: '12:00 - 12:30 AM',
		'0:30'	: '12:30 - 1:00 AM',
		'1:0' 	: '1:00 - 1:30 AM',
		'1:30'	: '1:30 - 2:00 AM',
		'2:0' 	: '2:00 - 2:30 AM',
		'2:30'	: '2:30 - 3:00 AM',
		'3:0' 	: '3:00 - 3:30 AM',
		'3:30'	: '3:30 - 4:00 AM',
		'4:0' 	: '4:00 - 4:30 AM',
		'4:30'	: '4:30 - 5:00 AM',
		'5:0' 	: '5:00 - 5:30 AM',
		'5:30'	: '5:30 - 6:00 AM',
		'6:0' 	: '6:00 - 6:30 AM',
		'6:30'	: '6:30 - 7:00 AM',
		'7:0' 	: '7:00 - 7:30 AM',
		'7:30'	: '7:30 - 8:00 AM',
		'8:0' 	: '8:00 - 8:30 AM',
		'8:30'	: '8:30 - 9:00 AM',
		'9:0' 	: '9:00 - 9:30 AM',
		'9:30'	: '9:30 - 10:00 AM',
		'10:0' 	: '10:00 - 10:30 AM',
		'10:30'	: '10:30 - 11:00 AM',
		'11:0' 	: '11:00 - 11:30 AM',
		'11:30'	: '11:30 - 12:00 AM',
		'12:0' 	: '12:00 - 12:30 PM',
		'12:30'	: '12:30 - 1:00 PM',
		'13:0' 	: '1:00 - 1:30 PM',
		'13:30'	: '1:30 - 2:00 PM',
		'14:0' 	: '2:00 - 2:30 PM',
		'14:30'	: '2:30 - 3:00 PM',
		'15:0' 	: '3:00 - 3:30 PM',
		'15:30'	: '3:30 - 4:00 PM',
		'16:0' 	: '4:00 - 4:30 PM',
		'16:30'	: '4:30 - 5:00 PM',
		'17:0' 	: '5:00 - 5:30 PM',
		'17:30'	: '5:30 - 6:00 PM',
		'18:0' 	: '6:00 - 6:30 PM',
		'18:30'	: '6:30 - 7:00 PM',
		'19:0' 	: '7:00 - 7:30 PM',
		'19:30'	: '7:30 - 8:00 PM',
		'20:0' 	: '8:00 - 8:30 PM',
		'20:30'	: '8:30 - 9:00 PM',
		'21:0' 	: '9:00 - 9:30 PM',
		'21:30'	: '9:30 - 10:00 PM',
		'22:0' 	: '10:00 - 10:30 PM',
		'22:30'	: '10:30 - 11:00 PM',
		'23:0' 	: '11:00 - 11:30 PM',
		'23:30'	: '11:30 - 12:00 PM',
	};
	function populateTimeslots (available){
		var html = '<div class="col-xs-4">Available</div><div class="col-xs-4">Booked</div><div class="col-xs-4">Unavailable</div>';
		for (var time in timeslots) {
  		if (timeslots.hasOwnProperty(time)) {
				var classes = '';
				var disabled = '';
				if ($.inArray(time,available) === -1) {
					classes += 'time';
					disabled += 'disabled="disabled"';
				} else {
					classes += 'time available';
				}
				html += '<input hidden name="time[]" type="checkbox" id="'+time+'" value="'+time+'" data-value="'+timeslots[time]+'" '+disabled+'><label class="'+classes+'" for="'+time+'">'+timeslots[time]+'</label>';
	  	}
		}
		$('.timeslot').html(html);
	}

	$(document).on('change','.timeslot input', function(event) { bookClass(); });
	$(document).on('change','#calendar input', function(event) { bookClass(); });

	function bookClass (){
		var days = [];
		var slots = [];
		if($("#calendar input:checked").length && ($('#topic').find('option:selected').val() != 'TOPIC')){
			$( "#calendar input:checked" ).each(function() {
				days.push(($(this).data('day'))+' '+(  cal_months_labels[$(this).data('month').replace(/^0+/, '')-1]  ));
			});
			$( ".timeslot input:checked" ).each(function() {
				slots.push($(this).data('value'));
			});
			var topic = $('#topic').find('option:selected').text()+', '+$('#subject').find('option:selected').text()+', '+$('#class').find('option:selected').text();
			var fees = $('#topic').find('option:selected').attr('fees');
			$('#bookSubject').html(topic);
			$('#bookDate').html(days.join(", "));
			$('#bookTime').html(slots.join(", "));
			$('#bookFees').html(fees);
		}
	}

	$(document).on('submit','.send-message', function(event) {
		event.preventDefault();
		var form = $(this);
		if(form.find('#message').val() == ''){
			helper.flash('The message to be sent can\'t be empty');
			form.find('#message').focus();
			return false;
		}
		$.ajax({
			url		: form.prop('action'),
			method	: 'POST',
			data 	: {
				_token		: form.find('input[name=_token]').val(),
				teacher_id: form.find('#teacher_id').val(),
				student_id: form.find('#student_id').val(),
				message		: form.find('#message').val()
			},
			success: function(response){
				console.log(response);
				var html = '<div class="col-xs-7 single-message self col-xs-offset-5">'+form.find('#message').val()+'<small>--&nbsp;Sent just now</small></div>';
				form.parent().find('.chat-data').prepend(html);
			},
			error: function(response){
				console.log(response);
			}
		});
		return false;
	});


})
