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
        $this->set_js_lib($this->default_theme_path.'/materializecss/build/js/global-libs.min.js');
    } else {
        $this->set_js_lib($this->default_javascript_path.'/'.grocery_CRUD::JQUERY);
        $this->set_js_lib($this->default_theme_path.'/materializecss/js/materialize/materialize.js');
        $this->set_js_lib($this->default_theme_path.'/materializecss/js/jquery-plugins/jquery.form.js');
        $this->set_js_lib($this->default_theme_path.'/materializecss/js/common/cache-library.js');
    }

    $this->set_js_lib($this->default_theme_path.'/materializecss/js/common/common.js');
    $this->set_js_lib($this->default_javascript_path.'/common/lazyload-min.js');
    $this->set_js($this->default_javascript_path.'/jquery_plugins/ui/jquery-ui-1.10.3.custom.min.js');

    //page js

    $this->set_js_lib($this->default_theme_path.'/materializecss/js/form/edit.js');

?>
<div class="crud-form" data-unique-hash="<?php echo $unique_hash; ?>">
    <div class="<?php echo $this->theme_config['crud_container_class'] ?> gc-container">

        <div class="row">
            <div class="col s12 m10 offset-m1 l8 offset-l2">

	 <ul class="collapsible" data-collapsible="accordion">
	    <li>
	      <div class="collapsible-header <?php echo $this->theme_config['grocery_crud_dialog_color'] ?> <?php echo $this->theme_config['grocery_crud_dialog_text_color'] ?>-text active"><i class="material-icons">edit</i><?php echo $this->l('form_edit'); ?> <?php echo $subject?></div>
	      <div class="collapsible-body white">

                <?php echo form_open( $update_url, 'method="post" id="crudForm"  enctype="multipart/form-data"'); ?>

                <?php foreach($fields as $field) { ?>

						<div class="input-field <?php echo $field->field_name; ?>_form_group">
					        <?php echo preg_replace("/chosen-select/","",$input_fields[$field->field_name]->input) ?>
					        <label for="field-<?php echo $field->field_name; ?>"><?php echo $input_fields[$field->field_name]->display_as; ?><?php echo ($input_fields[$field->field_name]->required) ? "<span class='required'>*</span> " : ""; ?></label>
					    </div>
                <?php }?>
                <!-- Start of hidden inputs -->
                <?php if(!empty($hidden_fields)){?>

                    <?php
                    foreach($hidden_fields as $hidden_field){
                        echo $hidden_field->input;
                    }
                    ?>
                    <!-- End of hidden inputs -->
                <?php } ?>
	                    <div class="small-loading" id="FormLoading">
	                        <?php echo $this->l('form_insert_loading'); ?>
	                    </div>

                        <div class="card-panel white center-align">
                            <button class="btn green waves-effect waves-light" type="submit" id="form-button-save">
                            <i class="material-icons left">check</i>
                            <?php echo $this->l('form_update_changes'); ?>
                        </button>
                            <?php   if(!$this->unset_back_to_list) { ?>
                            <button class="btn blue waves-effect waves-light" type="button" id="save-and-go-back-button">
                                <i class="material-icons left">rotate_left</i>
                                <?php echo $this->l('form_save_and_go_back'); ?>
                            </button>
                            <button class="btn orange darken-1 waves-effect waves-light" type="button" id="cancel-button">
                                <i class="material-icons left">warning</i>
                                <?php echo $this->l('form_cancel'); ?>
                            </button>
                            <?php } ?>

                        </div>

                <?php echo form_close(); ?>
                			</div> <!-- collapsible-body -->
                	</li>
                </ul>
            </div>   <!-- col -->
        </div>   <!-- row -->
    </div>    <!-- gc-container -->
</div>   <!-- crud-form -->
<?php
} else {
	?>
<script type="text/javascript" src="<?php echo base_url($this->default_theme_path.'/materializecss/js/form/edit.js');?>"></script>
	<div class="modal-content">
		 <ul class="collapsible" data-collapsible="accordion">
		    <li>
		      <div class="collapsible-header <?php echo $this->theme_config['grocery_crud_dialog_color'] ?> <?php echo $this->theme_config['grocery_crud_dialog_text_color'] ?>-text active">
		      		<i class="material-icons left">edit</i>
	                <?php echo $this->l('form_edit'); ?>
	                <?php echo $subject?></div>
		      <div class="collapsible-body white black-text">


                    <div class="row small-loading" id="FormLoading">
                    	<div class="col s12">
                        	<?php echo $this->l('form_insert_loading'); ?>
                        </div>
                    </div>

            <?php echo form_open( $update_url, 'method="post" id="crudForm"  enctype="multipart/form-data"'); ?>
            <?php foreach($fields as $field) { ?>

            		<div class="row">
						<div class="input-field col s12 <?php echo $field->field_name; ?>_form_group">
					        <?php echo $input_fields[$field->field_name]->input;?>
					        <label for="field-<?php echo $field->field_name; ?>"><?php echo $input_fields[$field->field_name]->display_as; ?><?php echo ($input_fields[$field->field_name]->required) ? "<span class='required'>*</span> " : ""; ?></label>
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
                <?php if ($is_ajax) { ?><input type="hidden" name="is_ajax" value="true" /><?php }?>
                <?php echo form_close(); ?>


			</div>
			</li>
		  </ul>
    </div>
    <div class="modal-footer">

                            <?php   if(!$this->unset_back_to_list) { ?>
                            <button class="btn waves-effect waves-light green" type="button" id="save-and-go-back-button">
                                <i class="material-icons left">check</i>
                                <?php echo $this->l('form_save'); ?>
                            </button>
                            <button class="btn red modal-action waves-effect waves-light cancel-button modal-close" type="button" id="cancel-button">
                                <i class="material-icons left">warning</i>
                                <?php echo $this->l('form_cancel'); ?>
                            </button>
                            <?php } ?>

    </div>

<?php
}
?>
<script>
	var validation_url = '<?php echo $validation_url?>';
	var list_url = '<?php echo $list_url?>';

	var message_alert_edit_form = "<?php echo $this->l('alert_edit_form')?>";
	var message_update_error = "<?php echo $this->l('update_error')?>";
</script>