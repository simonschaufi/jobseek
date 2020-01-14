jQuery(document).ready(function() {
	jQuery('#applicant-candidacy-passed').change(function() {
		if (jQuery(this).is(':checked')) {
			jQuery('.depends-on-applicant-candidacy-passed').fadeIn();
		} else {
			jQuery('.depends-on-applicant-candidacy-passed').fadeOut();
		};
	});
	jQuery('#applicant-pedagogic-exam-passed').change(function() {
		if (jQuery(this).is(':checked')) {
			jQuery('.depends-on-applicant-pedagogic-exam-passed').fadeIn();
		} else {
			jQuery('.depends-on-applicant-pedagogic-exam-passed').fadeOut();
		};
	});
	jQuery('#applicant-candidacy-passed').change();
	jQuery('#applicant-pedagogic-exam-passed').change();
});