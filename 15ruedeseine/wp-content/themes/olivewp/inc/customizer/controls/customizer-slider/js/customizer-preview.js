jQuery( document ).ready(function($) {

	// Change the width of logo
	wp.customize('olivewp_logo_length', function(control) {

		control.bind(function( controlValue ) {
			$('.custom-logo').css('max-width', '500px');
			$('.custom-logo').css('width', controlValue + 'px');
			$('.custom-logo').css('height', 'auto');
		});

	});

	// Change after menu button border radius
	wp.customize('after_menu_btn_border', function(control) {

		control.bind(function( borderRadius ) {
			$('.btn-style-one').css('border-radius', borderRadius + 'px');	
		});

	});

	// Change container width
	wp.customize('container_width', function(control) {
		
		control.bind(function( containerWidth ) {
			$('.page-section-space .spice-container, .section-space .spice-container').css('width', containerWidth + 'px');
		});

	});

});