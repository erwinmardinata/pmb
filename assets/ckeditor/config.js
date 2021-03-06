/**
 * @license Copyright (c) 2003-2015, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	config.filebrowserBrowseUrl = '/pmb/assets/kcfinder/browse.php?opener=ckeditor&type=files';
	config.filebrowserImageBrowseUrl = '/pmb/assets/kcfinder/browse.php?opener=ckeditor&type=images';
	config.filebrowserFlashBrowseUrl = '/pmb/assets/kcfinder/browse.php?opener=ckeditor&type=flash';
	config.filebrowserUploadUrl = '/pmb/assets/kcfinder/upload.php?opener=ckeditor&type=files';
	config.filebrowserImageUploadUrl = '/pmb/assets/kcfinder/upload.php?opener=ckeditor&type=images';
	config.filebrowserFlashUploadUrl = '/pmb/assets/kcfinder/upload.php?opener=ckeditor&type=flash';

	config.image2_alignClasses = [ 'align-left', 'align-center', 'align-right' ];
	config.language = 'en';
	config.extraPlugins = 'slideshow';
	//plugins youtube
	config.extraPlugins = 'youtube';
	config.youtube_width = '500';
	config.youtube_height = '360';
};
