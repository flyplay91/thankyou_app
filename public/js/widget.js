
$(document).ready(function() {
	$('body').on('click', '.more-products > a', function() {
		$(this).toggleClass('open');
		$(this).closest('.product-items').find('.product-item:not(:first)').toggleClass('active');
		$(this).closest('.more-products').hide();
	});

	$('body').on('click', '.btn-send-email', function() {
		$(this).siblings('.send-email-modal').toggleClass('open');
	});

	$('body').on('click', '.send-email-modal__inner .btn-close', function() {
		$('.send-email-modal').removeClass('open');
	});

	$('body').on('input', '.email-value', function() {
	    $('.btn-submit-email').css({'border-color': 'black', 'color': 'black'});
	    $('.btn-submit-email svg path').css('fill', 'black');
	});

	$('body').on('input', '.friend-email-value', function() {
	    $('.btn-submit-friend-email').css({'border-color': 'black', 'color': 'black'});
	    $('.btn-submit-friend-email svg path').css('fill', 'black');
	});
});

