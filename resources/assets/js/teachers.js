$(function () {
	var range = $('#feeInput'),
    value = $('.feeValue');
    
	value.html(range.attr('value'));

	range.on('input', function(){
		value.html(this.value);
	});

	$('section ul i').on('click',function(){
		console.log($(this).prev().html());
		$(this).fadeOut('fast');
		$(this).prev().fadeOut('fast');
	});
});