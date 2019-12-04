<!-- BEGIN #top-nav -->
        <div id="top-nav" class="top-nav">
            <!-- BEGIN container -->
            <div class="container">
                <div class="collapse navbar-collapse">                    
                    <ul class="nav navbar-nav navbar-right">                        
                        <li><a target="_blank" href="https://www.facebook.com/Aaryajeet"><i class="fa fa-facebook f-s-14"></i></a></li>
                        <li><a target="_blank" href="https://twitter.com/softjeetu"><i class="fa fa-twitter f-s-14"></i></a></li>
                        <li><a target="_blank" href="https://www.instagram.com/jaykaypal/"><i class="fa fa-instagram f-s-14"></i></a></li>
                        <li><a target="_blank" href="https://www.linkedin.com/in/jaykaypee"><i class="fa fa-linkedin f-s-14"></i></a></li>
                        
                    </ul>
                </div>
            </div>
            <!-- END container -->
        </div>
        <!-- END #top-nav -->
    
        <!-- BEGIN #header -->
        <div id="header" class="header">
            <!-- BEGIN container -->
            <div class="container">
                <!-- BEGIN header-container -->
                <div class="header-container">
                    <!-- BEGIN navbar-header -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <div class="header-logo">
                            <a href="<?php echo base_url();?>">
                                <span class="brand"></span>
                                <span>Ecom</span>Angular
                                <small>Codeigniter + Angular</small>
                            </a>
                        </div>
                    </div>
                    <!-- END navbar-header -->
                    <!-- BEGIN header-nav -->
                    <div class="header-nav">
                        <div class=" collapse navbar-collapse" id="navbar-collapse">
                            <ul class="nav">
                                <li class="active"><a href="#!">Home</a></li>
                                <?php
								$categories = $this->db->get('category')->result_array();
								if(sizeof($categories) > 0):
									foreach($categories as $category):?>
                                <li><a href="javascript:;" ng-click="filterCategory(<?php echo $category['category_id']; ?>)"><?php echo $category['name']; ?></a></li>
                                <?php endforeach; 
								endif;?>
								<li>
                                    <a href="#" data-toggle="dropdown">
                                        <i class="fa fa-search search-btn"></i>
                                        <span class="arrow top"></span>
                                    </a>
                                    <div class="dropdown-menu p-15">
                                        <form method="POST" name="search_form">
                                            <div class="input-group">
                                                <input type="text" placeholder="Search" class="form-control bg-silver-lighter" ng-model="search_query" name="search_query" ng-keyup="searchItems()"/>
                                                <span class="input-group-btn">
                                                    <button class="btn btn-inverse" ng-click="searchItems()" type="button"><i class="fa fa-search"></i></button>
                                                </span>
                                            </div>
                                        </form>
                                    </div> 
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- END header-nav -->
                    <!-- BEGIN header-nav -->
                    <div class="header-nav">
                        <ul class="nav pull-right">
                            <li class="dropdown dropdown-hover">
                                <a href="#" class="header-cart" data-toggle="dropdown">
                                    <i class="fa fa-shopping-bag"></i>
                                    <span class="total">{{carts.length}}</span>
                                    <span class="arrow top"></span>
                                </a>
                    
                                <div class="dropdown-menu dropdown-menu-cart p-0">
                                    <div class="cart-header">
                                        <h4 class="cart-title">Shopping Bag ({{carts.length}}) </h4>
                                    </div>
                                    <div class="cart-body">
                                        <ul class="cart-item">
										
                                            <li ng-repeat="cart in carts">
                                                <div class="cart-item-image"><img src="{{cart.image}}" alt="{{cart.name}}" /></div>
                                                <div class="cart-item-info">
                                                    <h4>{{cart.name}} ({{cart.qty}})</h4>
                                                    <p class="price">${{cart.price}}</p>
                                                </div>
                                                <div class="cart-item-close">
                                                    <a href="javascript:;" data-toggle="tooltip" data-title="Remove" name="remove_product" ng-click="removeItem(cart.rowid)">&times;</a>													
                                                </div>
                                            </li>  
											<li ng-hide="carts.length">No iterms in cart.</li>											
                                        </ul>
                                    </div>
                                    <div class="cart-footer" ng-hide="!carts.length">
                                        <div class="row row-space-10">
                                            
                                            <div class="col-xs-12">
                                                <a href="javascript:;" ng-click="checkout()" class="btn btn-inverse btn-block">Checkout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <a href="#!login">
                                    <img src="<?php echo base_url('template/front/img/user/user-1.jpg');?>" class="user-img" alt="" />
                                    <span class="hidden-md hidden-sm hidden-xs">Login / Register</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- END header-nav -->
                </div>
                <!-- END header-container -->
            </div>
            <!-- END container -->
        </div>
        <!-- END #header -->
		
		<!-- Confirmation Dialog -->
		<button class="btn btn-primary btn-lg loginMMM" ng-click="showModal = !showModal" style="display:none;"></button>
		<div class="modal" ng-init="showModal=false" id="login_modal" modal="showModal" ng-show="showModal">
		  <div class="modal-dialog">
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title">Login</h4>
			  </div>
			  <div class="modal-body">
				<!-- Login Form -->
				<form>
				  <input type="text" id="login" class="form-control" name="email" placeholder="email">
				  <input type="password" id="password" class="form-control" name="password" placeholder="password">
				  <input type="submit" class="btn btn-success" value="Log In">
				</form>
			  </div>
			  <div class="modal-footer">				
				<button type="button" class="btn btn-primary" ng-click="showModal=false">Close</button>
			  </div>
			</div>
		  </div>
		</div>
		<!-- End of Confirmation Dialog -->