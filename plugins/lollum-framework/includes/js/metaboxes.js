jQuery(document).ready(function($){
	"use strict";
	/* global tb_show, tb_remove, jQuery */
	var templateSelected = $('#page_template'),
		metaBuilder = $('#lolfmkbox-meta-box-elements'),
		metaPortfolio = $('#lolfmkbox-meta-box-portfolio-settings'),
		videoSettings = $('#lolfmkbox-meta-box-video'),
		videoCheck = $('#post-format-video'),
		audioSettings = $('#lolfmkbox-meta-box-audio'),
		audioCheck = $('#post-format-audio'),
		linkSettings = $('#lolfmkbox-meta-box-link'),
		linkCheck = $('#post-format-link'),
		gallerySettings = $('#lolfmkbox-meta-box-gallery'),
		galleryCheck = $('#post-format-gallery'),
		imageSettings = $('#lolfmkbox-meta-box-image'),
		imageCheck = $('#post-format-image'),
		quoteSettings = $('#lolfmkbox-meta-box-quote'),
		quoteCheck = $('#post-format-quote'),
		portfolioVideoSettings = $('#lolfmkbox-meta-box-portfolio-video'),
		portfolioGallerySettings = $('#lolfmkbox-meta-box-portfolio-gallery'),
		postFormatSelect = jQuery('#post-formats-select input'),
		portfolioFormatSelect = jQuery('select[name=lolfmkbox_portfolio_type]');

	/* hide page templates meta boxes */
	metaPortfolio.hide();
	/* hide post formats meta boxes */
	videoSettings.hide();
	audioSettings.hide();
	linkSettings.hide();
	quoteSettings.hide();
	gallerySettings.hide();
	imageSettings.hide();
	/* hide portfolio settings meta boxes */
	portfolioVideoSettings.hide();
	portfolioGallerySettings.hide();
	/* show meta boxes by post format selected */
	if(videoCheck.is(':checked')) {
		videoSettings.removeClass('closed').show();
	}
	if(audioCheck.is(':checked')) {
		audioSettings.removeClass('closed').show();
	}
	if(linkCheck.is(':checked')){
		linkSettings.removeClass('closed').show();
	}
	if(quoteCheck.is(':checked')){
		quoteSettings.removeClass('closed').show();
	}
	if(galleryCheck.is(':checked')){
		gallerySettings.removeClass('closed').show();
	}
	if(imageCheck.is(':checked')){
		imageSettings.removeClass('closed').show();
	}
	postFormatSelect.change(function(){
		if (jQuery(this).val() === 'video') {
			videoSettings.removeClass('closed').show();
			audioSettings.hide();
			linkSettings.hide();
			quoteSettings.hide();
			gallerySettings.hide();
			imageSettings.hide();
		} else if (jQuery(this).val() === 'audio') {
			audioSettings.removeClass('closed').show();
			videoSettings.hide();
			linkSettings.hide();
			quoteSettings.hide();
			gallerySettings.hide();
			imageSettings.hide();
		} else if (jQuery(this).val() === 'link') {
			linkSettings.removeClass('closed').show();
			videoSettings.hide();
			audioSettings.hide();
			quoteSettings.hide();
			gallerySettings.hide();
			imageSettings.hide();
		} else if (jQuery(this).val() === 'quote') {
			quoteSettings.removeClass('closed').show();
			videoSettings.hide();
			audioSettings.hide();
			linkSettings.hide();
			gallerySettings.hide();
			imageSettings.hide();
		} else if (jQuery(this).val() === 'gallery') {
			gallerySettings.removeClass('closed').show();
			videoSettings.hide();
			audioSettings.hide();
			linkSettings.hide();
			quoteSettings.hide();
		} else if (jQuery(this).val() === 'image') {
			imageSettings.removeClass('closed').show();
			videoSettings.hide();
			audioSettings.hide();
			linkSettings.hide();
			quoteSettings.hide();
			gallerySettings.hide();
		} else {
			videoSettings.hide();
			audioSettings.hide();
			linkSettings.hide();
			quoteSettings.hide();
			imageSettings.hide();
			gallerySettings.hide();
		}
	});
	/* show meta boxes by page template selected */
	if (templateSelected.val()) {
		if (templateSelected.val() === 'default') {
			metaPortfolio.hide();
		} else if (templateSelected.val() === 'template-page-sidebar-left.php' || templateSelected.val() === 'template-page-sidebar-right.php') {
			metaPortfolio.hide();
			metaBuilder.hide();
		} else {
			metaPortfolio.removeClass('closed').show();
		}
	}
	templateSelected.change(function(){
		if (jQuery(this).val() === 'default') {
			metaBuilder.removeClass('closed').show();
			metaPortfolio.hide();
		} else if (jQuery(this).val() === 'template-page-sidebar-left.php' || jQuery(this).val() === 'template-page-sidebar-right.php') {
			metaPortfolio.hide();
			metaBuilder.hide();
		} else {
			metaBuilder.removeClass('closed').show();
			metaPortfolio.removeClass('closed').show();
		}
	});
	/* show meta boxes by slider type selected */
	if (portfolioFormatSelect.val()) {
		if (portfolioFormatSelect.val() === 'video') {
			portfolioVideoSettings.removeClass('closed').show();
		} else if (portfolioFormatSelect.val() === 'slider') {
			portfolioGallerySettings.removeClass('closed').show();
		}
	}
	portfolioFormatSelect.change(function(){
		if (jQuery(this).val() === 'video') {
			portfolioVideoSettings.removeClass('closed').show();
			portfolioGallerySettings.hide();
		} else if (jQuery(this).val() === 'slider') {
			portfolioGallerySettings.removeClass('closed').show();
			portfolioVideoSettings.hide();
		} else {
			portfolioGallerySettings.hide();
			portfolioVideoSettings.hide();
		}
	});
	/* init minicolors */
	jQuery('.lol-color').minicolors();

	/* upload manager image */
	$(document).on('click', 'input.upload-button', function( e ) { 
		var upField = $(this).prev().prev();
		var file_frame;

		e.preventDefault();
 
		// If the media frame already exists, reopen it.
		if ( file_frame ) {
			file_frame.open();
			return;
		}
 
		// Create the media frame.
		file_frame = wp.media.frames.file_frame = wp.media({
			title: 'Choose an image',
			button: {
				text: 'Select this image',
			},
			multiple: false
		});
 
		// When an image is selected, run a callback.
		file_frame.on( 'select', function() {

			var file_path = '';
			var selection = file_frame.state().get('selection');

			selection.map( function( attachment ) {

				attachment = attachment.toJSON();

				if ( attachment.url )
					file_path = attachment.url

				upField.val( file_path );

			} );

		});
 
		// Finally, open the modal
		file_frame.open();

	});

	/* upload manager video */
	$(document).on('click', 'input.upload-button-video', function( e ) { 
		var upField = $(this).prev().prev();
		var file_frame;

		e.preventDefault();
 
		// If the media frame already exists, reopen it.
		if ( file_frame ) {
			file_frame.open();
			return;
		}
 
		// Create the media frame.
		file_frame = wp.media.frames.file_frame = wp.media({
			title: 'Choose a video',
			library: {
				type: 'video'
			},
			button: {
				text: 'Select this video',
			},
			multiple: false
		});
 
		// When an image is selected, run a callback.
		file_frame.on( 'select', function() {

			var file_path = '';
			var selection = file_frame.state().get('selection');

			selection.map( function( attachment ) {

				attachment = attachment.toJSON();

				if ( attachment.url )
					file_path = attachment.url

				upField.val( file_path );

			} );

		});
 
		// Finally, open the modal
		file_frame.open();

	});

	/* upload manager audio */
	$(document).on('click', 'input.upload-button-audio', function( e ) { 
		var upField = $(this).prev().prev();
		var file_frame;

		e.preventDefault();
 
		// If the media frame already exists, reopen it.
		if ( file_frame ) {
			file_frame.open();
			return;
		}
 
		// Create the media frame.
		file_frame = wp.media.frames.file_frame = wp.media({
			title: 'Choose an audio file',
			library: {
				type: 'audio'
			},
			button: {
				text: 'Select this file',
			},
			multiple: false
		});
 
		// When an image is selected, run a callback.
		file_frame.on( 'select', function() {

			var file_path = '';
			var selection = file_frame.state().get('selection');

			selection.map( function( attachment ) {

				attachment = attachment.toJSON();

				if ( attachment.url )
					file_path = attachment.url

				upField.val( file_path );

			} );

		});
 
		// Finally, open the modal
		file_frame.open();

	});

	/* upload manager post format image */
	$(document).on('click', 'input.upload-button-image', function( e ) { 
		var upField = $(this).prev().prev(),
			altField = $('#lolfmkbox_p_image_alt'),
			wField = $('#lolfmkbox_p_image_w'),
			hField = $('#lolfmkbox_p_image_h');
		var file_frame;

		e.preventDefault();
 
		// If the media frame already exists, reopen it.
		if ( file_frame ) {
			file_frame.open();
			return;
		}
 
		// Create the media frame.
		file_frame = wp.media.frames.file_frame = wp.media({
			title: 'Choose an image',
			button: {
				text: 'Select this image',
			},
			multiple: false
		});
 
		// When an image is selected, run a callback.
		file_frame.on( 'select', function() {

			var file_path = '';
			var file_alt = '';
			var file_w = '';
			var file_h = '';
			var selection = file_frame.state().get('selection');

			selection.map( function( attachment ) {

				attachment = attachment.toJSON();

				if ( attachment.url )
					file_path = attachment.url

				if ( attachment.alt )
					file_alt = attachment.alt

				if ( attachment.width )
					file_w = attachment.width

				if ( attachment.height )
					file_h = attachment.height

				upField.val( file_path );
				altField.val( file_alt );
				wField.val( file_w );
				hField.val( file_h );

			} );

		});
 
		// Finally, open the modal
		file_frame.open();

	});

	/* upload manager image */
	$(document).on('click', 'input.upload-button-gallery', function( e ) { 
		var image_gallery_ids = $(this).prev().prev();
		var file_frame;
		var attachment_ids = '';

		e.preventDefault();
 
		// If the media frame already exists, reopen it.
		if ( file_frame ) {
			file_frame.open();
			return;
		}
 
		// Create the media frame.
		file_frame = wp.media.frames.file_frame = wp.media({
			title: 'Create a gallery',
			button: {
				text: 'Create a gallery',
			},
			states : [
				new wp.media.controller.Library({
					title: 'title',
					filterable :	'all',
					multiple: true,
				})
			]
		});
 
		// When an image is selected, run a callback.
		file_frame.on( 'select', function() {

			var file_path = '';
			var selection = file_frame.state().get('selection');

			selection.map( function( attachment ) {

				attachment = attachment.toJSON();

				if ( attachment.id ) {
					attachment_ids = attachment_ids ? attachment_ids + "," + attachment.id : attachment.id;
				}


				image_gallery_ids.val( '[gallery ids="' + attachment_ids + '"]');

			});

		});
 
		// Finally, open the modal
		file_frame.open();

	});
});