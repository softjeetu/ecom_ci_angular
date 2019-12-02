<div class="navbar navbar-top navbar-inverse">
	<div class="navbar-inner">
		<div class="container-fluid">
			<a class="brand" href="<?php echo base_url();?>"><?php echo $system_name;?>
			</a>
			<!-- the new toggle buttons -->
			<ul class="nav pull-right">
				<li class="toggle-primary-sidebar hidden-desktop" data-toggle="collapse" data-target=".nav-collapse-primary"><button type="button" class="btn btn-navbar"><i class="icon-th-list"></i></button></li>
				<li class="hidden-desktop" data-toggle="collapse" data-target=".nav-collapse-top"><button type="button" class="btn btn-navbar"><i class="icon-align-justify"></i></button></li>
			</ul>
			<div class="nav-collapse nav-collapse-top collapse">
            	<ul class="nav pull-right">
					<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo get_phrase('account');?> <b class="caret"></b></a>
					<!-- Account Selector -->
                    <ul class="dropdown-menu">
                    	<li class="with-image">
                            <div class="avatar">
                                <!--<img src="<?php echo base_url();?>template/images/icons_big/<?php echo $this->session->userdata('login_type');?>.png" class="avatar-medium"/>-->                                
                                <?php
								if($this->session->userdata('login_type') == 'admin'):?>
                                	<img src="<?php echo base_url();?>template/images/icons_big/<?php echo $this->session->userdata('login_type');?>.png" class="avatar-medium"/>
                                <?php endif;?>
                            </div>
                            <span><?php echo $this->session->userdata('name');?></span>
                        </li>
                    	<li class="divider"></li>
                        
                        <?php
							$account_type	=	($this->session->userdata('login_type')) ? $this->session->userdata('login_type') : 'admin';
						?>
						<li><a href="<?php echo base_url();?>index.php?<?php echo $account_type;?>/manage_profile">
                        		<i class="icon-user"></i><span><?php echo get_phrase('profile');?></span></a></li>
                        <li><a href="<?php echo base_url();?>index.php?<?php echo $account_type;?>/manage_profile">
                        		<i class="icon-lock"></i><span><?php echo get_phrase('change_password');?></span></a></li>
						<li><a href="<?php echo base_url();?>index.php?login/logout">
                        		<i class="icon-off"></i><span><?php echo get_phrase('logout');?></span></a></li>
					</ul>
                	<!-- Account Selector -->
					</li>
				</ul>
				
			</div>
		</div>
	</div>
</div>