<!-- ================== BEGIN BASE JS ================== -->
	
	<!--[if lt IE 9]>
		<script src="assets/crossbrowserjs/html5shiv.js"></script>
		<script src="assets/crossbrowserjs/respond.min.js"></script>
		<script src="assets/crossbrowserjs/excanvas.min.js"></script>
	<![endif]-->
	<script src="<?php echo base_url('template/front/plugins/js-cookie/js.cookie.js');?>"></script>
	<script src="<?php echo base_url('template/front/js/apps.min.js');?>"></script>
	<script src="<?php echo base_url('template/front/js/angular-route.min.js');?>"></script>
	<!-- ================== END BASE JS ================== -->
	
	<script>
	
		// https://www.webslesson.info/2018/08/create-shopping-cart-application-using-angularjs-with-php.html
		var app = angular.module('tendingItems', ['ngRoute']);
				
		
		/*app.config(['$routeProvider', 
		  function($routeProvider, $routeParams){
			$routeProvider
			  .when('/login', {
				templateUrl: 'template/front/html/my_account.html'
			  })
			  .when('/cart', {
				templateUrl: 'template/front/html/cart.html'
			  })
			  .when('/checkout', {
				templateUrl: 'template/front/html/checkout.html'
			  })
			  .when('/category/:id', {				
				controller: 'tendingItemsController'
			  })
			  .otherwise({
				templateUrl: '',
				//redirectTo: '/'
			  })
		  }
		]);*/

		app.controller('tendingItemsController', function($scope, $http, $routeParams){
		 
			$scope.loadProduct = function(){		 			
				$http({
					method: 'get', 
					url: '<?php echo base_url(); ?>index.php?/front/trending_items'
				}).then(function (response) {					
					$scope.products = response.data;
				},function (error){
					console.log(error, 'can not get data.');
				});
			};
			
			$scope.carts = [];
			$scope.fetchCart = function(){				
				$http({
					method: 'get', 
					url: '<?php echo base_url(); ?>index.php?/front/fetch_cart'
				}).then(function (response) {
					//console.log(response, 'res');
					$scope.carts = response.data;					
				},function (error){
					console.log(error, 'can not get data.');
				});
			};
			 
			$scope.addtoCart = function(product){				
				product.<?php echo $this->security->get_csrf_token_name();?> = '<?php echo $this->security->get_csrf_hash();?>';				
				//console.log(product);
				$http({
						method:"POST",
						url:"<?php echo base_url(); ?>index.php?/front/add_to_cart",
						data:product
				}).then(function(data){
					$scope.fetchCart();
				});
			};
			
			$scope.removeItem = function(id){
				$http({
						method:"POST",
						url:"<?php echo base_url(); ?>index.php?/front/remove_cart",
						data:{'rowid' : id}
				}).then(function(data){
					$scope.fetchCart();
				},function (error){
					console.log(error, 'can not post data.');
				});
			};
			
			$scope.searchItems = function(){
				$http({
				   method:"POST",
				   url:"<?php echo base_url(); ?>index.php?/front/search_items",
				   data:{search_query:$scope.search_query}
				}).then(function(response){
				   $scope.products = response.data;
				},function (error){
					console.log(error, 'can not post data.');
				});
			};
			
			$scope.filterCategory = function(category_id){
				$http({
				   method:"POST",
				   url:"<?php echo base_url(); ?>index.php?/front/category_products",
				   data:{category:category_id}
				}).then(function(response){
				   $scope.products = response.data;
				},function (error){
					console.log(error, 'can not post data.');
				});
			};
			
			$scope.checkout = function(){
				$http({
				   method:"POST",
				   url:"<?php echo base_url(); ?>index.php?/front/checkout",
				   data:{'act':'checkout'}
				}).then(function(response){
					if(response.error == "not_logged_in"){
						alert("Work in Progress");
					}
					else{
						alert("Work in Progress");
					}
				},function (error){
					console.log(error, 'can not post data.');
				});
			};
			
			
		 
		});
		
		
		/*var cartModule = angular.module('cartItems', []);

		cartModule.controller('cartItemsController', function($scope, $http){		 			
			
			$scope.carts = [];
			$scope.fetchCart = function(){				
				$http({
					method: 'get', 
					url: '<?php echo base_url(); ?>index.php?/front/fetch_cart'
				}).then(function (response) {
					//console.log(response, 'res');
					$scope.carts = response.data;					
				},function (error){
					console.log(error, 'can not get data.');
				});
			};
			 
			$scope.addtoCart = function(product){				
				product.<?php echo $this->security->get_csrf_token_name();?> = '<?php echo $this->security->get_csrf_hash();?>';				
				//console.log(product);
				$http({
						method:"POST",
						url:"<?php echo base_url(); ?>index.php?/front/add_to_cart",
						data:product
				}).then(function(data){
					$scope.fetchCart();
				});
			};
			
			$scope.removeItem = function(id){
				$http({
						method:"POST",
						url:"<?php echo base_url(); ?>index.php?/front/remove_cart",
						data:id
				}).then(function(data){
					$scope.fetchCart();
				},function (error){
					console.log(error, 'can not post data.');
				});
			};
			
			
		 
		});*/
		</script>