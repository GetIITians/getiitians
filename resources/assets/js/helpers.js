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