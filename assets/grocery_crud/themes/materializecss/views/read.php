<?php

	if(config_item('grocery_crud_dialog_color'))
		$this->theme_config['grocery_crud_dialog_color'] = config_item('grocery_crud_dialog_color');

	if(config_item('grocery_crud_dialog_text_color'))
		$this->theme_config['grocery_crud_dialog_text_color'] = config_item('grocery_crud_dialog_text_color');


		if (!$is_ajax) {

				$this->set_css($this->default_theme_path.'/materializecss/css/font-awesome/css/font-awesome.min.css');
			    $this->set_css($this->default_theme_path.'/materializecss/css/materialize/materialize.min.css');
			    $this->set_css($this->default_theme_path.'/materializecss/css/materialize/style.css');

			if ($this->config->environment == 'production') {
			    $this->set_js_lib($this->default_javascript_path.'/'.grocery_CRUD::JQUERY);
			    $this->set_js_lib($this->default_theme_path.'/materializecss/js/materialize/materialize.min.js');
			    $this->set_js_lib($this->default_theme_path.'/bootstrap/build/js/global-libs.min.js');
			} else {
			    $this->set_js_lib($this->default_javascript_path.'/'.grocery_CRUD::JQUERY);
			    $this->set_js_lib($this->default_theme_path.'/materializecss/js/materialize/materialize.js');
			    $this->set_js_lib($this->default_theme_path.'/bootstrap/js/jquery-plugins/jquery.form.js');
			    $this->set_js_lib($this->default_theme_path.'/bootstrap/js/common/cache-library.js');
			    $this->set_js_lib($this->default_theme_path.'/bootstrap/js/common/common.js');
			}




?>
    <div class="<?php echo $this->theme_config['crud_container_class'] ?> gc-container">

        <div class="row">
            <div class="col s12 m10 offset-m1 l6 offset-l3">

	 <ul class="collapsible" data-collapsible="accordion">
	    <li>
	      <div class="collapsible-header <?php echo $this->theme_config['grocery_crud_dialog_color'] ?> <?php echo $this->theme_config['grocery_crud_dialog_text_color'] ?>-text active"><i class="material-icons">edit</i><?php echo $this->l('list_view'); ?> <?php echo $subject?></div>
	      <div class="collapsible-body white">

                        <?php foreach($fields as $field) { ?>

                        <div class="hide-on-med-and-up">
                        <div class="row section">
                            <div class="col s12 m6 left-align">
                                <b><?php echo $input_fields[$field->field_name]->display_as?>:</b>
                            </div>
                            <div class="col s12 m6">
                                <?php echo $input_fields[$field->field_name]->input; ?>
                            </div>
                        </div>
                        </div>

                        <div class="hide-on-small-only">
                        <div class="row section">
                          <div class="col s12 m6 right-align ">
                                <b><?php echo $input_fields[$field->field_name]->display_as?>:</b>
                            </div>
                            <div class="col s12 m6">
                                <?php echo $input_fields[$field->field_name]->input; ?>
                            </div>
                        </div>
                        </div>
                        <?php }?>



                        <?php 	if(!$this->unset_back_to_list) { ?>
                        <div class="card-panel white center-align">
                        <button class="btn blue waves-effect waves-light cancel-button" type="button" onclick="window.location = '<?php echo $list_url; ?>'">
                                    <i class="material-icons left">arrow_back</i>
                                    <?php echo $this->l('form_back_to_list'); ?>
                                </button>
                        </div>
                        <?php } ?>

                			</div> <!-- collapsible-body -->
                	</li>
                </ul>
            </div>   <!-- col -->
        </div>   <!-- row -->
    </div>    <!-- gc-container -->
    <?php
	// ajax modal dialog
  } else {

?>

	<div class="modal-content">
		 <ul class="collapsible" data-collapsible="accordion">
		    <li>
		      <div class="collapsible-header <?php echo $this->theme_config['grocery_crud_dialog_color'] ?> <?php echo $this->theme_config['grocery_crud_dialog_text_color'] ?>-text active">
		      		<i class="material-icons left">remove_red_eye</i>
	                <?php echo $this->l('list_view'); ?>
	                <?php echo $subject?></div>
		      <div class="collapsible-body white black-text">


		<?php echo form_open( $update_url, 'method="post" id="crudForm"  enctype="multipart/form-data"'); ?>
            <?php foreach($fields as $field) { ?>

            <div class="row section">
                <div class="col s6 right-align">
                    <?php echo $input_fields[$field->field_name]->display_as?>:
                </div>
                <div class="col s6">
                    <?php echo $input_fields[$field->field_name]->input; ?>
                </div>
            </div>
            <?php }?>

            <?php if(!empty($hidden_fields)){?>
            <!-- Start of hidden inputs -->
            <?php
                foreach($hidden_fields as $hidden_field){
                    echo $hidden_field->input;
                }
            ?>
                <!-- End of hidden inputs -->
                <?php } ?>
                <?php if ($is_ajax) { ?><input type="hidden" name="is_ajax" value="true" />
                <?php }?>

            <?php echo form_close(); ?>

			</div>
			</li>
		  </ul>
    </div>
    <div class="modal-footer">
            <a type="button" class="modal-action modal-close waves-effect waves-light btn green" data-dismiss="modal">
                      	<i class="material-icons left">keyboard_arrow_left</i>
                      	<?php echo $this->l('form_back_to_list'); ?>
                      </a>
    </div>

        <?php

 }
?>
