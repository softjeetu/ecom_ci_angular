<!-- BEGIN #slider -->
        <div id="slider" class="section-container p-0 bg-black-darker">
            <!-- BEGIN carousel -->
            <div id="main-carousel" class="carousel slide" data-ride="carousel">
                <!-- BEGIN carousel-inner -->
                <div class="carousel-inner"> 
                    <!-- BEGIN item -->
                    <div class="item active">
                        <img src="<?php echo base_url('template/front/img/slider/slider-1-cover.jpg');?>" class="bg-cover-img" alt="" />
                        <div class="container">
                            <img src="<?php echo base_url('template/front/img/slider/slider-1-product.png');?>" class="product-img right bottom fadeInRight animated" alt="" />
                        </div>
                        <div class="carousel-caption carousel-caption-left">
                            <div class="container">
                                <h3 class="title m-b-5 fadeInLeftBig animated">Ecom</h3> 
                                <p class="m-b-15 fadeInLeftBig animated">codeigniter with angular</p>                                
                            </div>
                        </div>
                    </div>
                    <!-- END item -->
                    <!-- BEGIN item -->
                    <div class="item">
                        <img src="<?php echo base_url('template/front/img/slider/slider-2-cover.jpg');?>" class="bg-cover-img" alt="" />
                        <div class="container">
                            <img src="<?php echo base_url('template/front/img/slider/slider-2-product.png');?>" class="product-img left bottom fadeInLeft animated" alt="" />
                        </div>
                        <div class="carousel-caption carousel-caption-right">
                            <div class="container">
                                <h3 class="title m-b-5 fadeInLeftBig animated">Ecom</h3> 
                                <p class="m-b-15 fadeInLeftBig animated">codeigniter with angular</p>                                
                            </div>
                        </div>
                    </div>
                    <!-- END item -->
                    <!-- BEGIN item -->
                    <div class="item">
                        <img src="<?php echo base_url('template/front/img/slider/slider-3-cover.jpg');?>" class="bg-cover-img" alt="" />
                        <div class="carousel-caption">
                            <div class="container">
                                <h3 class="title m-b-5 fadeInLeftBig animated">Ecom</h3> 
                                <p class="m-b-15 fadeInLeftBig animated">codeigniter with angular</p>                                
                            </div>
                        </div>
                    </div>
                    <!-- END item -->
                </div>
                <!-- END carousel-inner -->
                <a class="left carousel-control" href="#main-carousel" data-slide="prev"> 
                    <i class="fa fa-angle-left"></i> 
                </a>
                <a class="right carousel-control" href="#main-carousel" data-slide="next"> 
                    <i class="fa fa-angle-right"></i> 
                </a>
            </div>
            <!-- END carousel -->
        </div>
        <!-- END #slider -->
    
        
    
        <!-- BEGIN #trending-items -->
        <div id="trending-items" class="section-container bg-silver">
            <!-- BEGIN container -->
            <div class="container">
                <!-- BEGIN section-title -->
                <h4 class="section-title clearfix">                    
                    Trending Items
                    <small>Shop and get your favourite items at amazing prices!</small>
                </h4>
                <!-- END section-title -->
            
                <!-- BEGIN row -->
				<form method="post">
					<div class="row row-space-10" ng-app="tendingItems" ng-controller="tendingItemsController" ng-init="loadProduct()">
						<!-- BEGIN col-2 -->
						<div class="col-md-3 col-sm-6" ng-repeat = "product in products">
							<!-- BEGIN item -->
							<div class="item item-thumbnail">
								<a href="product_detail.html" class="item-image">
									<img src="{{product.product_image}}" alt="{{product.name}}" />                                
								</a>
								<div class="item-info">
									<h4 class="item-title">
										<a href="javascript:;">{{product.name}}</a>
									</h4>
									<p class="item-desc">{{product.description}}</p>
									<div class="item-price">${{product.price}}</div>   
									<button type="button" name="add_to_cart" class="btn btn-success" ng-click="addtoCart(product)" />Add to Cart</button>									
								</div>
								
							</div>
							<!-- END item -->
						</div>
						<!-- END col-2 -->                    
					</div>
				</form>
                <!-- END row -->
            </div>
            <!-- END container -->
        </div>
        <!-- END #trending-items -->
    
       
    
        <!-- BEGIN #policy -->
        <div id="policy" class="section-container p-t-30 p-b-30">
            <!-- BEGIN container -->
            <div class="container">
                <!-- BEGIN row -->
                <div class="row">
                    <!-- BEGIN col-4 -->
                    <div class="col-md-4 col-sm-4">
                        <!-- BEGIN policy -->
                        <div class="policy">
                            <div class="policy-icon"><i class="fa fa-truck"></i></div>
                            <div class="policy-info">
                                <h4>Free Delivery Over $100</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            </div>
                        </div>
                        <!-- END policy -->
                    </div>
                    <!-- END col-4 -->
                    <!-- BEGIN col-4 -->
                    <div class="col-md-4 col-sm-4">
                        <!-- BEGIN policy -->
                        <div class="policy">
                            <div class="policy-icon"><i class="fa fa-shield"></i></div>
                            <div class="policy-info">
                                <h4>1 Year Warranty For Phones</h4>
                                <p>Cras laoreet urna id dui malesuada gravida. <br />Duis a lobortis dui.</p>
                            </div>
                        </div>
                        <!-- END policy -->
                    </div>
                    <!-- END col-4 -->
                    <!-- BEGIN col-4 -->
                    <div class="col-md-4 col-sm-4">
                        <!-- BEGIN policy -->
                        <div class="policy">
                            <div class="policy-icon"><i class="fa fa-user-md"></i></div>
                            <div class="policy-info">
                                <h4>6 Month Warranty For Accessories</h4>
                                <p>Fusce ut euismod orci. Morbi auctor, sapien non eleifend iaculis.</p>
                            </div>
                        </div>
                        <!-- END policy -->
                    </div>
                    <!-- END col-4 -->
                </div>
                <!-- END row -->
            </div>
            <!-- END container -->
        </div>
        <!-- END #policy -->
    
        <!-- BEGIN #subscribe -->
        <div id="subscribe" class="section-container bg-silver p-t-30 p-b-30">
            <!-- BEGIN container -->
            <div class="container">
                <!-- BEGIN row -->
                <div class="row">
                   
                    <!-- BEGIN col-12 -->
                    <div class="col-md-12 col-sm-12">
                        <!-- BEGIN social -->
                        <div class="social">
                            <div class="social-intro">
                                <h4>FOLLOW US</h4>
                                <p>We want to hear from you!</p>
                            </div>
                            <div class="social-list">
                                <a href="https://www.facebook.com/Aaryajeet"><i class="fa fa-facebook"></i></a>
                                <a href="https://twitter.com/softjeetu"><i class="fa fa-twitter"></i></a>
                                <a href="https://www.instagram.com/jaykaypal/"><i class="fa fa-instagram"></i></a>
                                <a href="https://www.linkedin.com/in/jaykaypee"><i class="fa fa-linkedin"></i></a>                                
                            </div>
                        </div>
                        <!-- END social -->
                    </div>
                    <!-- END col-12 -->
                </div>
                <!-- END row -->
            </div>
            <!-- END container -->
        </div>
        <!-- END #subscribe -->
		
		<script>
		// https://www.webslesson.info/2018/08/create-shopping-cart-application-using-angularjs-with-php.html
		var app = angular.module('tendingItems', []);

		app.controller('tendingItemsController', function($scope, $http){
		 
		$scope.loadProduct = function(){		 			
			$http({
				method: 'get', 
				url: '<?php echo base_url(); ?>index.php?/front/trending_items'
			}).then(function (response) {
				console.log(response, 'res');
				$scope.products = response.data;
			},function (error){
				console.log(error, 'can not get data.');
			});
		 };
		 
		$scope.addtoCart = function(product){
		$http({
					method:"POST",
					url:"<?php echo base_url(); ?>index.php?/front/add_to_cart",
					data:product
				}).success(function(data){
					$scope.fetchCart();
				});
		 };
		 
		});
		</script>