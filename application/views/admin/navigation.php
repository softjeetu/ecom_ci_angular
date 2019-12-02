<div class="sidebar-background">
	<div class="primary-sidebar-background">
	</div>
</div>
<div class="primary-sidebar">
	<!-- Main nav -->
    <br />
    <div style="text-align:center;">

        <a href="<?php echo base_url();?>">
        	<img src="<?php echo base_url();?>uploads/logo.png"  style="max-height:100px; max-width:100px;"/>
        </a>

    </div>
   	<br />
	<ul class="nav nav-collapse collapse nav-collapse-primary">
    
        
        <!------dashboard----->
		<li class="<?php if($page_name == 'dashboard')echo 'dark-nav active';?>">
			<span class="glow"></span>
				<a href="<?php echo base_url();?>index.php?admin/dashboard" rel="tooltip" data-placement="right" 
                	data-original-title="<?php echo get_phrase('dashboard_help');?>">
					<!--<i class="icon-desktop icon-1x"></i>-->
                    <img src="<?php echo base_url();?>template/images/icons/dashboard.png" />
					<span><?php echo get_phrase('dashboard');?></span>
				</a>
		</li>
        

		<li class="dark-nav <?php if(	$page_name == 'group' 		|| 
										$page_name == 'client'  		)echo 'active';?>">
			<span class="glow"></span>
            <a class="accordion-toggle  " data-toggle="collapse" href="#clients_submenu" rel="tooltip" data-placement="right">
                <!--<i class="icon-wrench icon-1x"></i>-->
                <img src="<?php echo base_url();?>template/images/icons/client.png" />
                <span><?php echo get_phrase('clients');?><i class="icon-caret-down"></i></span>
            </a>
            
            <ul id="clients_submenu" class="collapse <?php if($page_name == 'client')echo 'in';?>">                
                <li class="<?php if($page_name == 'client')echo 'dark-nav active';?>">
                        <a href="<?php echo base_url();?>index.php?admin/client" rel="tooltip" data-placement="right" 
                            data-original-title="<?php echo get_phrase('client_details');?>">
                            <!--<i class="icon-user icon-1x"></i>-->
                            <img src="<?php echo base_url();?>template/images/icons/client.png" />
                            <span><?php echo get_phrase('all_clients');?></span>
                        </a>
                </li>
            </ul>
		</li>

		<li class="dark-nav <?php if($page_name == 'category' 	||
										$page_name == 'product' 			)echo 'active';?>">
			<span class="glow"></span>
            <a class="accordion-toggle  " data-toggle="collapse" href="#products_submenu" rel="tooltip" data-placement="right">
                <!--<i class="icon-wrench icon-1x"></i>-->
                <img src="<?php echo base_url();?>template/images/icons/product.png" />
                <span><?php echo get_phrase('products');?><i class="icon-caret-down"></i></span>
            </a>
            
            <ul id="products_submenu" class="collapse <?php if($page_name == 'category' ||
																$page_name == 'product')echo 'in';?>">
                <li class="<?php if($page_name == 'category')echo 'dark-nav active';?>">
                        <a href="<?php echo base_url();?>index.php?admin/category" rel="tooltip" data-placement="right" 
                            data-original-title="<?php echo get_phrase('category_details');?>">
                            <!--<i class="icon-user icon-1x"></i>-->
                            <img src="<?php echo base_url();?>template/images/icons/category.png" />
                            <span><?php echo get_phrase('category');?></span>
                        </a>
                </li>
                
                <li class="<?php if($page_name == 'product')echo 'dark-nav active';?>">
                        <a href="<?php echo base_url();?>index.php?admin/product" rel="tooltip" data-placement="right" 
                            data-original-title="<?php echo get_phrase('product_details');?>">
                            <!--<i class="icon-user icon-1x"></i>-->
                            <img src="<?php echo base_url();?>template/images/icons/product.png" />
                            <span><?php echo get_phrase('product');?></span>
                        </a>
                </li>
            </ul>
		</li>
        
		<li class="dark-nav <?php if(	$page_name == 'order')echo 'active';?>">
			<span class="glow"></span>
            <a class="accordion-toggle  " data-toggle="collapse" href="#orders_submenu" rel="tooltip" data-placement="right" 
                data-original-title="<?php echo get_phrase('order');?>">
                <!--<i class="icon-wrench icon-1x"></i>-->
                <img src="<?php echo base_url();?>template/images/icons/order.png" />
                <span><?php echo get_phrase('orders');?><i class="icon-caret-down"></i></span>
            </a>
            
            <ul id="orders_submenu" class="collapse <?php if(	$page_name == 'order')echo 'in';?>">
                <li class="<?php if($page_name == 'order')echo 'dark-nav active';?>">
                        <a href="<?php echo base_url();?>index.php?admin/order" rel="tooltip" data-placement="right" 
                            data-original-title="<?php echo get_phrase('order_details');?>">
                            <!--<i class="icon-user icon-1x"></i>-->
                            <img src="<?php echo base_url();?>template/images/icons/invoice.png" />
                            <span><?php echo get_phrase('all_orders');?></span>
                        </a>
                </li>
            </ul>
		</li>

		

        
        <!------system settings------>
        <li class="<?php if($page_name == 'system_settings')echo 'dark-nav active';?>">
			<span class="glow"></span>
				<a href="<?php echo base_url();?>index.php?admin/system_settings" rel="tooltip" data-placement="right" 
                	data-original-title="<?php echo get_phrase('system_settings');?>">
					<!--<i class="icon-user icon-1x"></i>-->
                    <img src="<?php echo base_url();?>template/images/icons/settings.png" />
					<span><?php echo get_phrase('system_settings');?></span>
				</a>
		</li>

		<!------manage own profile--->
		<li class="<?php if($page_name == 'manage_profile')echo 'dark-nav active';?>">
			<span class="glow"></span>
				<a href="<?php echo base_url();?>index.php?admin/manage_profile" rel="tooltip" data-placement="right" 
                	data-original-title="<?php echo get_phrase('profile_help');?>">
					<!--<i class="icon-lock icon-1x"></i>-->
                    <img src="<?php echo base_url();?>template/images/icons/profile.png" />
					<span><?php echo get_phrase('profile');?></span>
				</a>
		</li>
		
	</ul>
	
</div>