define(function(require){
	var $ = require('jquery');
	
	$('input[type="password"][data-custom-error]').on('input', function(event) {
		this.setCustomValidity('');
		
		var error = $(this).data('customError');
		if (!error.length) {
			return true;
		}
		
		if (this.validity.patternMismatch) {
			this.setCustomValidity(error);
		}
	});
});
