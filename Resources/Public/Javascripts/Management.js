jQuery(document).ready(function() {
	jQuery('.reset-search').click(function() {
		jQuery('#application-search-field').val('');
		jQuery('#application-search').submit();

	});
});