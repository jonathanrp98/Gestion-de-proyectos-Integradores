<?php
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

    $show_more_button  = $buttons_counter > 3 ? true : false;

    //The more lang string exists only in version 1.5.2 or higher
    $more_string =
        preg_match('/1\.(5\.[2-9]|[6-9]\.[0-9])/', Grocery_CRUD::VERSION)
            ? $this->l('list_more') : "More";

?>

<?php foreach($list as $num_row => $row){ ?>
    <tr>
       <td class="text-center" <?php if ($unset_delete) { ?> style="border-right: none;"<?php } ?>
            <?php if ($buttons_counter === 0) {?>class="invisible"<?php }?>>
            <?php if (!$unset_delete) { ?>
				<input type="checkbox" data-id="<?php echo $row->primary_key_value; ?>" id="<?php echo $row->primary_key_value; ?>" class="red select-row" />
				<label for="<?php echo $row->primary_key_value; ?>"></label>
            <?php } ?>
        </td>


        <td>

		          <div class="fixed-action-btn horizontal" style="position: relative; display: inline-block;">
		            <a class="btn-floating red">
		              <i class="material-icons">call_to_action</i>
		            </a>
		            <ul class="action-ul">

                       <?php if (!$unset_read) { ?>
                        	<li>
                                <a class="btn-floating tooltipped green read-button list_action_buttons"  data-id="<?php echo $row->primary_key_value; ?>" href="<?php echo $row->read_url?>" data-position="top" data-delay="50" data-tooltip="<?php echo $this->l('list_view')?>">
                                    <i class="material-icons">visibility</i>

                                </a>
                         	</li>
                       <?php } ?>

		                <?php if(!$unset_clone){?>
		                	<li>
			                    <a class="btn-floating tooltipped pink edit-button list_action_buttons" data-id="<?php echo $row->primary_key_value; ?>" href="<?php echo $row->clone_url?>"  data-position="top" data-delay="50" data-tooltip="<?php echo $this->l('list_clone')?>">
			                        <i class="material-icons">content_copy</i>
			                    </a>
		                	</li>
		                <?php }?>


						<?php if(!$unset_edit){?>
	                         <li>
	                            <a class="btn btn-floating tooltipped  blue darken-1 edit-button list_action_buttons" href="<?php echo $row->edit_url?>" data-position="top" data-delay="50" data-tooltip="<?php echo $this->l('list_edit')?>">
	                            	<i class="material-icons">edit</i>
	                            </a>
                         	</li>
                        <?php } ?>

                        <?php if (!$unset_delete) { ?>
                        	<li>
                                <a class="btn-floating tooltipped red delete-row list_action_buttons"  href="javascript:void(0)" data-target="<?php echo $row->delete_url?>"  data-position="top" data-delay="50" data-tooltip="<?php echo $this->l('list_delete')?>">
                                    <i class="material-icons">delete</i>

                                </a>
                         	</li>
                        <?php } ?>

                   <?php
                       if(!empty($row->action_urls)){
                           foreach($row->action_urls as $action_unique_id => $action_url){
                               $action = $actions[$action_unique_id];
                               ?>
							   		<li>
							           <a class="btn-floating tooltipped red list_action_buttons"  href="<?php echo $action_url; ?>" data-position="top" data-delay="50" data-tooltip="<?php echo $action->label?>">
							               <i class="material-icons"><?php echo $action->css_class; ?></i>

							           </a>
							    	</li>
                           <?php }
                       }
                       ?>

		            </ul>
		          </div>


        </td>

        <?php foreach($columns as $column){?>
            <td>
                <?php echo $row->{$column->field_name} != '' ? $row->{$column->field_name} : '&nbsp;' ; ?>
            </td>
        <?php }?>


    </tr>
<?php } ?>