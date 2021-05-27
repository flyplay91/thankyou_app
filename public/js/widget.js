
$(document).ready(function() {
	$('body').on('click', '.more-products > a', function() {
		$(this).closest('.more-products').hide();
		$(this).closest('.product-items').find('.product-item:not(:first)').addClass('active');
		$(this).closest('.product-items').find('.product-item.active:last-child').after('<div class="less-products"><a href="javascript: void(0)">Show less<img src="https://widget-dashboard.ngrok.io/images/down-arrow.svg"></a></div>');
	});

	$('body').on('click', '.less-products > a', function() {
		$(this).closest('.product-items').find('.product-item.active').removeClass('active');
		$(this).closest('.product-items').find('.more-products').show();
		$(this).closest('.less-products').remove();
	})

	$('body').on('click', '.btn-send-email', function() {
		$(this).siblings('.send-email-modal').toggleClass('open');
	});

	$('body').on('click', '.btn-email-list', function() {
		$('.send-email-modal').removeClass('open');
		$('.send-friend-email-modal').addClass('open');
	});


	$('body').on('click', '.email-list', function() {
		$('.btn-send-email').trigger('click');
	});

	$('body').on('click', '.send-email-modal__inner .btn-close', function() {
		$('.send-email-modal').removeClass('open');
	});

	$('body').on('click', '.send-feedback-modal__inner .btn-close', function() {
		$('.send-feedback-modal').removeClass('open');
	});

	$('body').on('click', '.send-friend-email-modal__inner .btn-close', function() {
		$('.send-friend-email-modal').removeClass('open');
	});

	$('body').on('click', '.community > a', function() {
		$('.send-feedback-modal').addClass('open');
	});

	$('body').on('input', '.email-value', function() {
	    $('.btn-submit-email').css({'border-color': 'black', 'color': 'black'});
	    $('.btn-submit-email svg path').css('fill', 'black');
	});

	$('body').on('input', '.friend-email-value', function() {
	    $('.btn-submit-friend-email').css({'border-color': 'black', 'color': 'black'});
	    $('.btn-submit-friend-email svg path').css('fill', 'black');
	});

	$('body').on('click', '.feedback-rating li', function() {
		$(this).siblings().removeClass('active');
		$(this).addClass('active');
		$('.feedback-content').addClass('open');
	});
});

