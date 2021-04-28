
$(document).ready(function() {
	$('body').on('click', '.more-products > a', function() {
		$(this).toggleClass('open');
		$(this).closest('.product-items').find('.product-item:not(:first)').toggleClass('active');
	});
});

