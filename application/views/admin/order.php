<div class="box">
	<div class="box-header">
    <input type="hidden" id="test_page" value="order" />
    	<!------CONTROL TABS START------->
		<ul class="nav nav-tabs nav-tabs-left">
			<li class="active">
            	<a href="#list" data-toggle="tab"><i class="icon-align-justify"></i> 
					<?php echo get_phrase('order_list');?>
                    	</a></li>			
		</ul>
    	<!------CONTROL TABS END------->
        
	</div>
	<div class="box-content padded">
		<div class="tab-content">
            <!----TABLE LISTING STARTS--->
            <div class="tab-pane  active" id="list">
            		<div class="action-nav-normal">
                        <div class=" action-nav-button" style="width:300px;">
                          <a href="#" title="Users">
                            <img src="<?php echo base_url();?>template/images/icons/order.png" />
                            <span>Total <?php echo count($order);?> <?php echo get_phrase('order');?></span>
                          </a>
                        </div>
                    </div>
                    <div class="box">
                        <div class="box-content">
                            <div id="dataTables">
                            <table cellpadding="0" cellspacing="0" border="0" class="dTable responsive">
                                <thead>
                                    <tr>
                                        <th><div>ID</div></th>                                        
										<th><div><?php echo get_phrase('client');?></div></th>										
										<th><div><?php echo get_phrase('total_price');?></div></th>
										<th><div><?php echo get_phrase('date');?></div></th>
										<th><div><?php echo get_phrase('status');?></div></th>                         
                                        <th><div><?php echo get_phrase('options');?></div></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $count = 1;foreach($order as $row):?>
                                    <tr>
                                        <td><?php echo $count++;?></td>
										<td><?php echo $this->crud_model->get_type_name_by_id('client',$row['client']);?></td>
										<td>$ <?php echo $row['total_price'];?></td>
										<td><?php echo $row['date'];?></td>
										<td><span class="btn btn-small btn-<?php if ($row['status'] == 'pending'){echo 'blue';} elseif ($row['status'] == 'cancelled'){echo 'red';} elseif ($row['status'] == 'approved'){echo 'green';}?>"><?php echo $row['status'];?></span></td>
                                        
                                        <td align="center">
                                            <a data-toggle="modal" href="#modal-form" onclick="modal('order_profile',<?php echo $row['order_id'];?>)"
                                                 class="btn btn-default btn-small">
                                                    <i class="icon-user"></i> <?php echo get_phrase('detail');?>
                                            </a>                                           
                                            <a data-toggle="modal" href="#modal-delete" onclick="modal_delete('<?php echo base_url();?>index.php?admin/order/delete/<?php echo $row['order_id'];?>')"
                                                 class="btn btn-red btn-small">
                                                    <i class="icon-trash"></i> <?php echo get_phrase('delete');?>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php endforeach;?>
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
			</div>
            <!----TABLE LISTING ENDS--->                        		
            
		</div>
	</div>
</div>
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#blah').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
    
    $("#imgInp").change(function(){
        readURL(this);
    });
	
</script>