<?php
$product_info	=	$this->crud_model->get_product_info($current_product_id);
foreach($product_info as $row):?>
    <center>
    <div class="box">

        <table class="table table-normal ">	


			<?php if($row['name'] != ''):?>
			<tr>
				<td><?php echo get_phrase('name');?></td>
				<td><b><?php echo $row['name'];?></b></td>
			</tr>
			<?php endif;?>	


			<?php if($row['category'] != ''):?>
			<tr>
				<td><?php echo get_phrase('category');?></td>
				<td><b><?php echo $this->crud_model->get_type_name_by_id('category',$row['category']);?></b></td>
			</tr>
			<?php endif;?>					


			<?php if($row['description'] != ''):?>
			<tr>
				<td><?php echo get_phrase('description');?></td>
				<td><b><?php echo $row['description'];?></b></td>
			</tr>
			<?php endif;?>

            
            <?php if($row['price'] != ''):?>
			<tr>
				<td><?php echo get_phrase('price');?></td>
				<td><b>$<?php echo $row['price'];?> / <?php echo $row['quantity_unit'];?></b></td>
			</tr>
			<?php endif;?>

			<?php if($row['creation_date'] != ''):?>
			<tr>
				<td><?php echo get_phrase('creation_date');?></td>
				<td><b><?php echo $row['creation_date'];?></b></td>
			</tr>
			<?php endif;?>	
			
			<?php 
			if(isset($row['product_image']) && !empty($row['product_image'])){?>
			<tr>
				<td><?php echo get_phrase('product_image');?></td>
				<td><img class="img-responsive" src="<?php echo $row['product_image']; ?>" style="width:40px hieght:40px;"/></td>
			</tr>				
			<?php }?>


        	
        </table>
	</div>
	</center>

<?php endforeach;?>