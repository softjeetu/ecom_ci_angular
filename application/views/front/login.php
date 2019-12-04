<!-- BEGIN #checkout-payment -->
<div class="section-container" id="checkout-payment">
	<!-- BEGIN container -->
	<div class="container">
		<!-- BEGIN checkout -->
		<div class="checkout">
			
			<form method="POST" name="login" class="form-horizontal">				
				<!-- BEGIN checkout-body -->
				<div class="checkout-body">
					<h4 class="checkout-title">Login</h4>
					<div class="col-md-12" ng-show="message"><div class="alert alert-danger" role="alert"><a href="javascript:;" class="close" data-dismiss="alert" aria-label="close">&times;</a>{{message}}</div></div>
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
						<a href="<?php echo base_url().'index.php?front/register' ?>" class="btn btn-link">Register</a>
						<button type="button" ng-click="userLogin(model)" class="btn btn-inverse pull-right">Login</button>
						
					</div>
					<div class="col-md-4"></div>
				</div>
				<!-- END login-footer -->
			</form>
		</div>
		<!-- END login -->		
	</div>
	<!-- END container -->
</div>