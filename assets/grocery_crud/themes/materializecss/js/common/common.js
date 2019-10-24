/*global jQuery*/

var THEME_VERSION = '1.0.0';

jQuery(function ($) {
    var position;

});

function success_message(success_message)
{

	 Materialize.toast(success_message, 400000, 'green');

		if (dialog_forms) {
			$('.go-to-edit-form').unbind('click');
			$('.go-to-edit-form').click(function(event){
                event.preventDefault();
				fnOpenReadFormMDB($(this));

				return false;
			});
		}
}

function error_message(error_message)
{
	 Materialize.toast(error_message, 4000, 'red');
}

function form_success_message(success_message)
{
	Materialize.toast(success_message, 400000, 'green');
}

function form_error_message(error_message)
{
	Materialize.toast(error_message, 4000, 'red');
}

var fnOpenReadFormMDB = function (this_element) {

    var href_url = this_element.attr("href");

    //Close all
    $('.add-edit-modal').modal('close');
    $('#add-edit-content').html('');

    $.ajax({
        url: href_url,
        data: {
            is_ajax: 'true'
        },
        type: 'post',
        dataType: 'json',
        beforeSend: function () {},
        complete: function () {},
        success: function (data) {
            if (typeof CKEDITOR !== 'undefined' && typeof CKEDITOR.instances !== 'undefined') {
                $.each(CKEDITOR.instances, function (index) {
                    delete CKEDITOR.instances[index];
                });
            }

            $('#add-edit-content').html(data.output);

            $('.add-edit-modal').modal('open');
            $('.collapsible').collapsible();
            $('select').material_select();

        }
    });
};
