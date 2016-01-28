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
});