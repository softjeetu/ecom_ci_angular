<?php
$client_info	=	$this->crud_model->get_client_info($current_client_id);
foreach($client_info as $row):?>
    <center>
    <div class="box">

        <table class="table table-normal ">


			<?php if($row['name'] != ''):?>
			<tr>
				<td><?php echo get_phrase('name');?></td>
				<td><b><?php echo $row['name'];?></b></td>
			</tr>
			<?php endif;?>	
        

			<?php if($row['email'] != ''):?>
			<tr>
				<td><?php echo get_phrase('email');?></td>
				<td><b><?php echo $row['email'];?></b></td>
			</tr>
			<?php endif;?>	


			<?php if($row['password'] != ''):?>
			<tr>
				<td><?php echo get_phrase('password');?></td>
				<td><b><?php echo $row['password'];?></b></td>
			</tr>
			<?php endif;?>	

			<?php if($row['creation_date'] != ''):?>
			<tr>
				<td><?php echo get_phrase('creation_date');?></td>
				<td><b><?php echo $row['creation_date'];?></b></td>
			</tr>
			<?php endif;?>	

			<?php if($row['phone'] != ''):?>
			<tr>
				<td><?php echo get_phrase('phone');?></td>
				<td><b><?php echo $row['phone'];?></b></td>
			</tr>
			<?php endif;?>	

			


        	
        </table>
	</div>
	</center>

<?php endforeach;?>