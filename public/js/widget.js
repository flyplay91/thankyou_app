
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
});

