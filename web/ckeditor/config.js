/**
 * @license Copyright (c) 2003-2015, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	config.language = 'ru-RU';
    config.enterMode = CKEDITOR.ENTER_BR;
    config.shiftEnterMode = CKEDITOR.ENTER_P;

    config.extraPlugins = 'youtube';
    config.toolbar += [{ name: 'insert', items: ['Image', 'Youtube']}];
    config.youtube_width = '480';
    config.youtube_height = '320';
    config.youtube_related = true;
};