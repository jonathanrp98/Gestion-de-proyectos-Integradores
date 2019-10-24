jQuery(function ($) {
    Materialize.updateTextFields();
    $('select').material_select();
    var save_and_close = false;

    $('#save-and-go-back-button').click(function(){
        save_and_close = true;

        $('#crudForm').trigger('submit');
    });

    $('#crudForm').submit(function(){
        var my_crud_form = $(this);

        $(this).ajaxSubmit({
            url: validation_url,
            dataType: 'json',
            cache: 'false',
            beforeSend: function () {
                $("#FormLoading").show();
            },
            success: function(data){
                $("#FormLoading").hide();
                if(data.success)
                {
                    $('#crudForm').ajaxSubmit({
                        dataType: 'text',
                        cache: 'false',
                        beforeSend: function () {
                            $("#FormLoading").show();
                        },
						success: function(result){
							$("#FormLoading").fadeOut("slow");
							data = $.parseJSON( result );
							if(data.success)
							{
								var data_unique_hash = my_crud_form.closest(".crud-form").attr("data-unique-hash");

								//$('.crud-form[data-unique-hash='+data_unique_hash+']').find('.ajax_refresh_and_loading').trigger('click');

								if(save_and_close)
								{
									if ($('#save-and-go-back-button').closest('.modal').length === 0) {
										window.location = data.success_list_url;
									} else {
										$(".add-edit-modal").modal("close");
										success_message(data.success_message);

							            setTimeout(function () {
							                $('.gc-refresh').trigger('click');
							            }, 200);
									}

									return true;
								}

								form_success_message(data.success_message);
							}
							else
							{
								form_error_message(message_update_error);
							}
						},
						error: function(){
							form_error_message( message_update_error );
							$("#FormLoading").hide();
						}
					});
				}
				else
				{
					form_error_message(data.error_message);
					$.each(data.error_fields, function(index,value){
						$('input[name='+index+']').closest('.form-group').addClass('has-error');
					});

				}
			},
			error: function(){
				error_message (message_update_error);
				$("#FormLoading").hide();
			}
		});
		return false;
	});

	if( $('#cancel-button').closest('.modal').length === 0 ) {

		$('#cancel-button').click(function (){
			window.location = list_url;

			return false;
		});

	} else {

        $('#cancel-button').click(function (){
    		$('.add-edit-modal').modal('close');
        	$('#add-edit-content').html('');

            return false;
        });

    }
});
