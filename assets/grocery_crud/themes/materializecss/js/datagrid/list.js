/*global jQuery*/
jQuery(function ($) {

    "use strict";

    //As simple as that! :)
    $('.gc-container').datagrid();
    $(".button-collapse").sideNav();
    $('.add-edit-modal, .delete-multiple-confirmation, .delete-confirmation').modal();
    $('select').material_select();

});
	var load_css_file = function(css_file) {
		if ($('head').find('link[href="'+css_file+'"]').length == 0) {
			$('head').append($('<link/>').attr("type","text/css")
					.attr("rel","stylesheet").attr("href",css_file));
		}
	};

