<div class="tab-pane box active" id="edit" style="padding: 5px">
                <div class="box-content">
				<?php foreach($edit_data as $row):?>
                	<?php echo form_open('admin/client/do_update/'.$row['client_id'] , array('class' => 'form-horizontal validatable','target'=>'_top', 'enctype' => 'multipart/form-data'));?>
                        <div class="padded">
                            

							<div class="control-group">
								<label class="control-label"><?php echo get_phrase('email');?></label>
								<div class="controls">
									<input type="text" class="" name="email" value="<?php echo $row['email'];?>"/>
								</div>
							</div>


							<div class="control-group">
								<label class="control-label"><?php echo get_phrase('password');?></label>
								<div class="controls">
									<input type="text" class="" name="password" value="<?php echo $row['password'];?>"/>
								</div>
							</div>


							<div class="control-group">
								<label class="control-label"><?php echo get_phrase('name');?></label>
								<div class="controls">
									<input type="text" class="" name="name" value="<?php echo $row['name'];?>"/>
								</div>
							</div>


							<div class="control-group">
								<label class="control-label"><?php echo get_phrase('creation_date');?></label>
								<div class="controls">
									<input type="date" class="" name="creation_date" value="<?php echo $row['creation_date'];?>"/>
								</div>
							</div>



						


							<div class="control-group">
								<label class="control-label"><?php echo get_phrase('phone');?></label>
								<div class="controls">
									<input type="text" class="" name="phone" value="<?php echo $row['phone'];?>"/>
								</div>
							</div>


                            
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-gray"><?php echo get_phrase('edit_client');?></button>
                        </div>
                    </form>
                    <?php endforeach;?>
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