jQuery(document).ready(function($){
	$(document).on('click', '.media-upload-button', function(e){
		e.preventDefault();
		var $button = $(this);

		var file_frame = wp.media.frames.file_frame = wp.media({
			title: 'Select Or Upload image',
			library: {
				type: 'image',
			},
			button: {
				text: 'Select Image',
			},
			multiple: false,
		});

		file_frame.on('select', function(){
			var attachment = file_frame.state().get('selection').first().toJSON();
			$button.siblings('.media-upload').val(attachment.url);
			$button.siblings('.media-upload').change();
		});

		file_frame.open();
	});
});
