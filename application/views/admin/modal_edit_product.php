<div class="tab-pane box active" id="edit" style="padding: 5px">
                <div class="box-content">
				<?php foreach($edit_data as $row):?>
                	<?php echo form_open('admin/product/do_update/'.$row['product_id'] , array('class' => 'form-horizontal validatable','target'=>'_top', 'enctype' => 'multipart/form-data'));?>
                        <div class="padded">


							<div class="control-group">
								<label class="control-label"><?php echo get_phrase('name');?></label>
								<div class="controls">
									<input type="text" class="" name="name" value="<?php echo $row['name'];?>"/>
								</div>
							</div>

							<div class="control-group">
								<label class="control-label"><?php echo get_phrase('category');?></label>
								<div class="controls">
									<select name="category" class="uniform" style="width:100%;" required>
                                    	<option value=""><?php echo get_phrase('select a category');?></option>
                                    	<?php 
										$category = $this->db->get('category')->result_array();
										foreach($category as $row1):
										?>
                                    		<option value="<?php echo $row1['category_id'];?>"
                                            <?php if($row['category'] == $row1['category_id'])echo 'selected';?>>
											<?php echo $row1['name'];?></option>
                                        <?php
										endforeach;
										?>
                                    </select>
								</div>
							</div>                            							

							<div class="control-group">
								<label class="control-label"><?php echo get_phrase('description');?></label>
								<div class="controls">
									<input type="text" class="" name="description" value="<?php echo $row['description'];?>"/>
								</div>
							</div>
                            
                            <div class="control-group">
								<label class="control-label"><?php echo get_phrase('quantity_unit');?></label>
								<div class="controls">
									<input type="text" class="" name="quantity_unit" value="<?php echo $row['quantity_unit'];?>"/>
								</div>
							</div>
                            
                            <div class="control-group">
								<label class="control-label"><?php echo get_phrase('price_per_unit');?></label>
								<div class="controls">
									$<input type="number" class="" name="price" value="<?php echo $row['price'];?>"/> / <?php echo $row['quantity_unit'];?>
								</div>
							</div>

							<div class="control-group">
								<label class="control-label"><?php echo get_phrase('creation_date');?></label>
								<div class="controls">
									<input type="date" class="" name="creation_date" value="<?php echo $row['creation_date'];?>"/>
								</div>
							</div>


                            
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-gray"><?php echo get_phrase('edit_product');?></button>
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