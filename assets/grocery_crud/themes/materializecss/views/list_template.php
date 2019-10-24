<?php

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

    //section libs
    $this->set_js_lib($this->default_theme_path.'/materializecss/js/jquery-plugins/jquery.print-this.js');

    $this->set_js_lib($this->default_theme_path.'/materializecss/js/common/common.js');
    $this->set_js_lib($this->default_javascript_path.'/common/lazyload-min.js');
    $this->set_js($this->default_javascript_path.'/jquery_plugins/ui/jquery-ui-1.10.3.custom.min.js');

    //page js
    $this->set_js_lib($this->default_theme_path.'/materializecss/js/datagrid/gcrud.datagrid.js');
    $this->set_js_lib($this->default_theme_path.'/materializecss/js/datagrid/list.js');

    $colspans = (count($columns) + 2);

    //Start counting the buttons that we have:
    $buttons_counter = 0;

    if (!$unset_edit) {
        $buttons_counter++;
    }

    if (!$unset_read) {
        $buttons_counter++;
    }

    if (!$unset_delete) {
        $buttons_counter++;
    }

    if (!empty($list[0]) && !empty($list[0]->action_urls)) {
        $buttons_counter = $buttons_counter +  count($list[0]->action_urls);
    }

    $list_displaying = str_replace(
        array(
            '{start}',
            '{end}',
            '{results}'
        ),
        array(
            '<span class="paging-starts">1</span>',
            '<span class="paging-ends">10</span>',
            '<span class="current-total-results">'. $this->get_total_results() . '</span>'
        ),
        $this->l('list_displaying'));

	if(config_item('grocery_crud_dialog_color'))
		$this->theme_config['grocery_crud_dialog_color'] = config_item('grocery_crud_dialog_color');

	if(config_item('grocery_crud_dialog_text_color'))
		$this->theme_config['grocery_crud_dialog_text_color'] = config_item('grocery_crud_dialog_text_color');

	if(config_item('table_responsive'))
		$this->theme_config['table_responsive'] = config_item('table_responsive');
?>
<script type='text/javascript'>
    var base_url = '<?php echo base_url();?>';

    var subject = '<?php echo $subject?>';
    var ajax_list_info_url = '<?php echo $ajax_list_info_url; ?>';
    var ajax_list_url = '<?php echo $ajax_list_url;?>';
    var unique_hash = '<?php echo $unique_hash; ?>';

    var message_alert_delete = "<?php echo $this->l('alert_delete'); ?>";

</script>
<div class="success-message" style="display:none"><?php
if($success_message !== null){?>
   <?php echo $success_message; ?> &nbsp; &nbsp;
<?php }
?></div>

<div class="gc-container <?php echo $this->theme_config['crud_container_class'] ?>">
	 <ul class="collapsible" data-collapsible="accordion">
	    <li>
	      <div class="collapsible-header <?php echo $this->theme_config['grocery_crud_dialog_color'] ?> <?php echo $this->theme_config['grocery_crud_dialog_text_color'] ?>-text active"><i class="material-icons">grid_on</i><?php echo $subject_plural; ?></div>
	      <div class="collapsible-body white">

			       <div class="row">
			            <div class="col s12 m6 l4 center">
			                <?php if(!$unset_add){?>
			                        	<a href="<?php echo $add_url?>" data-position="top" data-delay="50" data-tooltip="<?php echo $this->l('list_add');?> <?php echo $subject_plural; ?>" class="add-button btn-floating tooltipped waves-effect waves-light red"><i class="material-icons">add</i></a>
			                <?php } ?>
			                            <a href="javascript:void(0)" data-position="top" data-delay="50" data-tooltip="<?php echo $this->l('list_clear_filtering');?>" class="clear-filtering btn-floating tooltipped waves-effect waves-light blue"><i class="material-icons">clear_all</i></a>

			                            <a href="javascript:void(0)" class="btn-floating waves-effect waves-light green gc-refresh"><i class="material-icons">refresh</i></a>
			            </div>
			            <div class="col s12 m6 l4 center">

							      <div class="row">
							        <div class="input-field col s6">
							          <i class="material-icons prefix">search</i>
							          <input id="search-input" name="search" type="text" class="validate search-input">
							          <label for="search-input"><?php echo $this->l('list_search_all');?></label>
							        </div>
							        <div class="input-field col s6">
							          <a class="btn indigo search-button"><?php echo $this->l('list_search');?></a>
							        </div>
							      </div>

			            </div>
			            <div class="col s12 l4 center">
			                <?php if(!$unset_export) { ?>
			                	<a data-url="<?php echo $export_url; ?>" data-position="top" data-delay="50" data-tooltip="<?php echo $this->l('list_export');?>" href="javascript:void(0)" class="btn-floating tooltipped waves-effect waves-light pink gc-export"><i class="material-icons">file_download</i></a>
			                <?php } ?>
			                <?php if(!$unset_print) { ?>
			                    <a data-url="<?php echo $print_url; ?>" data-position="top" data-delay="50" data-tooltip="<?php echo $this->l('list_print');?>" href="javascript:void(0)" class="btn-floating tooltipped waves-effect waves-light purple gc-print"><i class="material-icons">print</i></a>
			                <?php }?>

			            </div>
			        </div>


  <div class="card">
    <div class="card-content">


        <div class="table-container" >
        <?php if($this->theme_config['crud_paging'] == false){ echo '<div class="table-scroller-wrapper">';} ?>

        <?php echo form_open("", 'method="post" autocomplete="off" id="gcrud-search-form"'); ?>

            <table class="<?php if($this->theme_config['table_responsive'] == 'true') echo 'responsive-table' ?> highlight bordered grocery-crud-table" width="100%">
                <thead>
                    <tr>
                        <th colspan="2" <?php if ($buttons_counter === 0) {?>class="invisible text-center"<?php }?>>
                            <?php echo $this->l('list_actions'); ?>
                        </th>

                        <?php foreach($columns as $column){?>
                            <th class="column-with-ordering" data-order-by="<?php echo $column->field_name; ?>"><?php echo $column->display_as; ?></th>
                        <?php }?>
                    </tr>

                    <tr class="filter-row gc-search-row">
                        <th colspan="2" class="no-border-right <?php if ($buttons_counter === 0) {?>invisible<?php }?>">
                            <?php if (!$unset_delete) { ?>
                            <div>
                                     	<input type="checkbox" id="select-all-none" class="red select-all-none" />
      									<label for="select-all-none"><?php echo $this->l('list_delete')?></label>
      						</div>
                             <?php } ?>
                             	<a href="javascript:void(0)" data-position="top" data-delay="50" data-tooltip="<?php echo $this->l('list_delete');?>" class="btn-floating tooltipped waves-effect waves-light red delete-selected-button" style="display:none"><i class="material-icons">delete</i></a>

                         </th>
                        <?php foreach($columns as $column){?>
                            <th class="hide-on-med-and-down">
                                <div class="input-field">
          							<input type="text" class="form-control searchable-input" name="<?php echo $column->field_name; ?>" />
          							<label>Search <?php echo $column->display_as; ?></label>
        						</div>
                            </th>
                        <?php }?>


                    </tr>

                </thead>
                <tbody>
                    <?php include(__DIR__."/list_tbody.php"); ?>
                </tbody>
            </table>

        <?php echo form_close(); ?>
        </div>
        <?php if($this->theme_config['crud_paging'] == false){ echo '</div>';} ?>
    </div>

    <div class="card-action text-muted white">
        <div class="row">
            <div class="col s12 l4" <?php if($this->theme_config['crud_paging'] == false) echo 'style="display:none"' ?>>
                        <div class="valign-wrapper"><?php list($show_lang_string, $entries_lang_string) = explode('{paging}', $this->l('list_show_entries')); ?><?php echo $show_lang_string; ?>
                        <select name="per_page" class="per_page">
                            <?php foreach($paging_options as $option){?>
                                <option class="red-text" value="<?php echo $option; ?>" <?php if($option == $default_per_page){?>selected="selected"<?php }?>><?php echo $option; ?></option>
                            <?php }?>
                        </select>
                        <?php echo $entries_lang_string; ?>
                        </div>
            </div>

            <div class="col s12 <?php if($this->theme_config['crud_container_class'] == 'had-container') echo 'l4'; else  echo 'l8'; ?> center" <?php if($this->theme_config['crud_paging'] == false) echo 'style="display:none"' ?>>

				<!--Pagination -->
				    <ul class="pagination">

				        <!--First-->
				        <li class="disabled paging-first waves-effect"><a class="red-text"><i class="material-icons left">first_page</i><span class="hide-on-med-and-down"><?php echo $this->l('list_paging_first'); ?></span></a></li>

				        <!--Arrow left-->
				        <li class="page-item prev paging-previous"><a class="red-text"><i class="material-icons left">chevron_left</i><span class="hide-on-med-and-down"><?php echo $this->l('list_paging_previous'); ?></span></a></li>

                        <span class="page-number-input-container"><input type="number" value="1" class="page-number-input" /></span>

				        <!--Arrow right-->
				        <li class="page-item next paging-next"><a class="red-text"><i class="material-icons left">chevron_right</i><span class="hide-on-med-and-down"><?php echo $this->l('list_paging_next'); ?></span></a></li>

				        <!--last-->
				        <li class="page-item paging-last waves-effect"><a class="red-text"><i class="material-icons left">last_page</i><span class="hide-on-med-and-down"><?php echo $this->l('list_paging_last'); ?></span></a></li>

				    </ul>
				    <input type="hidden" name="page_number" class="page-number-hidden" value="1" />
				<!--/Pagination -->

            </div>
            <div class="col s12 <?php
            		if($this->theme_config['crud_container_class'] == 'had-container') {
            			if($this->theme_config['crud_paging'] == true) {
            				echo 'l4';
            			}
            		} else {
            			echo 'l12';
            		}; ?> center" style="padding-top: 10px;">
                <?php echo $list_displaying; ?>
                <span class="full-total-container invisible">
                    <?php echo str_replace(
                                "{total_results}",
                                "<span class='full-total'>" . $this->get_total_results() . "</span>",
                                $this->l('list_filtered_from'));
                    ?>
                </span>
            </div>

        </div>
    </div>
</div>



	      </div>
	    </li>
	  </ul>


<!-- Delete confirmation dialog -->
<div id="delete-confirmation" class="modal delete-confirmation">
    <div class="modal-content">
      <h4><?php echo $this->l('list_delete'); ?> <?php echo $subject?></h4>
      <p><?php echo $this->l('alert_delete'); ?></p>
    </div>
    <div class="modal-footer">
                <button type="button" class="btn green modal-action modal-close">
                    <?php echo $this->l('form_cancel'); ?>
                </button>
                <button type="button" class="btn waves-effect waves-red red delete-confirmation-button" data-target="<?php echo $delete_multiple_url; ?>">
                    <?php echo $this->l('list_delete'); ?>
                </button>
    </div>
  </div>
<!-- Delete confirmation dialog -->

<!-- Delete Multiple confirmation dialog -->
<div id="delete-multiple-confirmation" class="modal delete-multiple-confirmation">
    <div class="modal-content">
      <h4><?php echo $this->l('list_delete'); ?> <?php echo $subject?></h4>
      <p><?php echo $this->l('alert_delete'); ?></p>
    </div>
    <div class="modal-footer">
                <button type="button" class="btn green modal-action modal-close">
                    <?php echo $this->l('form_cancel'); ?>
                </button>
                <button type="button" class="btn waves-effect waves-red red delete-multiple-confirmation-button" data-target="<?php echo $delete_multiple_url; ?>">
                    <?php echo $this->l('list_delete'); ?>
                </button>
    </div>
  </div>
<!-- End of Delete Multiple confirmation dialog -->

<!-- Modal Structure -->
  <div id="add-edit-modal" class="modal modal-fixed-footer add-edit-modal">
      <div id="add-edit-content"></div
  </div>