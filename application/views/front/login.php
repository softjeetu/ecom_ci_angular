<!-- BEGIN #checkout-payment -->
<div class="section-container" id="checkout-payment">
	<!-- BEGIN container -->
	<div class="container">
		<!-- BEGIN checkout -->
		<div class="checkout">
			{{message}}
			<form method="POST" name="login" class="form-horizontal">				
				<!-- BEGIN checkout-body -->
				<div class="checkout-body">
					<h4 class="checkout-title">Login</h4>
					<div class="form-group">
						<label class="col-md-4 control-label">Email <span class="text-danger">*</span></label>
						<div class="col-md-4">
							<input type="email" required class="form-control required" name="email" placeholder="Email" ng-model="model.email"/>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label">Password <span class="text-danger">*</span></label>
						<div class="col-md-4">
							<input type="password" class="form-control required" name="password" placeholder="Password" ng-model="model.password"/>
						</div>
					</div>					
				</div>
				<!-- END login-body -->
				<!-- BEGIN login-footer -->
				<div class="login-footer ">
					<div class="col-md-4">&nbsp;</div>
					<div class="col-md-4">
						<button type="button" ng-click="userLogin(model)" class="btn btn-inverse btn-lg p-l-30 p-r-30 m-l-10">Login</button>
					</div>
					<div class="col-md-4">&nbsp;</div>
				</div>
				<!-- END login-footer -->
			</form>
		</div>
		<!-- END login -->		
	</div>
	<!-- END container -->
</div>