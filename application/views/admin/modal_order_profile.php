<?php
$order_info	=	$this->crud_model->get_order_info($current_order_id);
$order_slave_info	=	$this->crud_model->get_order_slave_info($current_order_id);

foreach($order_info as $row):?>
    <center>
    <div class="box">

        <table class="table table-normal">
        

			<?php if($row['client'] != ''):?>
			<tr>
				<td><?php echo get_phrase('client');?></td>
				<td><b><?php echo $this->crud_model->get_type_name_by_id('client',$row['client']);?></b></td>
			</tr>
			<?php endif;?>				

			<?php if($row['total_price'] != ''):?>
			<tr>
				<td><?php echo get_phrase('total_price');?></td>
				<td><b>$ <?php echo $row['total_price'];?></b></td>
			</tr>
			<?php endif;?>	


			<?php if($row['date'] != ''):?>
			<tr>
				<td><?php echo get_phrase('date');?></td>
				<td><b><?php echo $row['date'];?></b></td>
			</tr>
			<?php endif;?>	


			<?php if($row['status'] != ''):?>
			<tr>
				<td><?php echo get_phrase('status');?></td>
				<td><b><span class="btn btn-small btn-<?php if ($row['status'] == 'pending'){echo 'blue';} elseif ($row['status'] == 'cancelled'){echo 'red';} elseif ($row['status'] == 'approved'){echo 'green';}?>"><?php echo $row['status'];?></span></b></td>
			</tr>
			<?php endif;?>

			<tr>
				<td colspan="2">
					<table class="table table-normal">
						<thead>
							<tr>
								<td><b>Product</b></td>
								<td><b>Quantity</b></td>
								<td><b>Price</b></td>
								<td><b>Subtotal</b></td>								
							</tr>
						</thead>
						<tbody>
							<?php 
							$Subtotal = $total = 0;
							foreach($order_slave_info as $row):?>
							<tr>
								<td>
									<?php echo $this->crud_model->get_type_name_by_id('product',$row['product_id']);?>
								</td>
								<td><?php echo $row['quantity'];?></td>
								<td><?php echo $row['price'];?></td>
								<td><?php 
									$Subtotal += ($row['quantity'] * $row['price']);
									echo number_format(($row['quantity'] * $row['price']),2);
									?>
										
								</td>								
							</tr>
						<?php endforeach;?>
						</tbody>
						<tfoot>
							<tr>
								<td colspan="2">&nbsp;</td>								
								<td><b>Sub Total</b></td>
								<td>$<?php echo number_format($Subtotal,2); ?></td>								
							</tr>
							<tr>	
								<td colspan="2">&nbsp;</td>							
								<td><b>Total</b></td>
								<td>$<?php echo number_format($total + $Subtotal,2); ?></td>								
							</tr>
						</tfoot>
					</table>
				</td>
			</tr>	


        	
        </table>
	</div>
	</center>

<?php endforeach;?>