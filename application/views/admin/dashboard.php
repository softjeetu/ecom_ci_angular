	<div class="container-fluid padded">
		<div class="row-fluid">
			<div class="span30">
				<!-- find me in partials/action_nav_normal -->
				<!--big normal buttons-->
				<div class="action-nav-normal">
					<div class="row-fluid">
                    

						<div class="span2 action-nav-button">
							<a href="<?php echo base_url();?>index.php?admin/category">
							<img src="<?php echo base_url();?>template/images/icons/category.png" />
							<span><?php echo get_phrase('manage_category');?></span>
							<span class="label label-blue"><?php echo $this->db->count_all_results('category');?></span>
							</a>
						</div>

						<div class="span2 action-nav-button">
							<a href="<?php echo base_url();?>index.php?admin/client">
							<img src="<?php echo base_url();?>template/images/icons/client.png" />
							<span><?php echo get_phrase('manage_client');?></span>
							<span class="label label-blue"><?php echo $this->db->count_all_results('client');?></span>
							</a>
						</div>

						

						<div class="span2 action-nav-button">
							<a href="<?php echo base_url();?>index.php?admin/order">
							<img src="<?php echo base_url();?>template/images/icons/order.png" />
							<span><?php echo get_phrase('manage_order');?></span>
							<span class="label label-blue"><?php echo $this->db->count_all_results('order');?></span>
							</a>
						</div>

						<div class="span2 action-nav-button">
							<a href="<?php echo base_url();?>index.php?admin/product">
							<img src="<?php echo base_url();?>template/images/icons/product.png" />
							<span><?php echo get_phrase('manage_product');?></span>
							<span class="label label-blue"><?php echo $this->db->count_all_results('product');?></span>
							</a>
						</div>

						<div class="span2 action-nav-button">
							<a href="<?php echo base_url();?>index.php?admin/system_settings">
							<img src="<?php echo base_url();?>template/images/icons/settings.png" />
							<span><?php echo get_phrase('settings');?></span>
							</a>
						</div>
						
						
					</div>
				</div>
			</div>
            <!---DASHBOARD MENU BAR ENDS HERE-->
       </div>
       
       </div>
   </div>
   
  
  