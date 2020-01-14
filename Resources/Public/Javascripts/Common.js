jQuery(document).ready(function() {
	jQuery('.navigation-button').each(function() {
		jQuery(this).click(function() {
		var href = jQuery(this).attr('data-rel');
		document.location.href = '/' + href;
		});
	});
});