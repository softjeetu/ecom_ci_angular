<!-- BEGIN #checkout-payment -->
<div class="section-container" id="checkout-payment">
	<!-- BEGIN container -->
	<div class="container">
		<!-- BEGIN checkout -->
		<div class="checkout">
		<!-- BEGIN checkout-body -->
		<div class="checkout-body">
			<div class="table-responsive">
				<table class="table table-cart">
					<thead>
						<tr>
							<th>Product Name</th>
							<th class="text-center">Price</th>
							<th class="text-center">Quantity</th>
							<th class="text-center">Total</th>
						</tr>
					</thead>
					<tbody>
					
						<tr ng-repeat="cart in carts">
							<td class="cart-product">
								<div class="product-img">
									<img src="{{cart.image}}" alt="{{cart.name}}" />
								</div>
								<div class="product-info">
									<div class="title">{{cart.name}}</div>									
								</div>
							</td>
							<td class="cart-price text-center">${{cart.price}}</td>
							<td class="cart-qty text-center">
								<div class="cart-qty-input">
									
									<div class="qty-desc">{{cart.qty}}</div>
									
								</div>
								
							</td>
							<td class="cart-total text-center">
								${{cart.subtotal}}
							</td>
						</tr>
						
						<tr>
							<td class="cart-summary" colspan="4">
								<div class="summary-container">
									<div class="summary-row">
										<div class="field">Cart Subtotal</div>
										<div class="value">${{ setTotals() }}</div>
									</div>
									
									<div class="summary-row total">
										<div class="field">Total</div>
										<div class="value">${{ setTotals() }}</div>
									</div>
								</div>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<!-- END checkout-body -->
		<!-- BEGIN checkout-footer -->
		<div class="checkout-footer">
			<a href="<?php echo base_url(); ?>" class="btn btn-white btn-lg pull-left">Continue Shopping</a>
			<button type="submit" class="btn btn-inverse btn-lg p-l-30 p-r-30 m-l-10" ng-click="saveOrder(carts)">Checkout</button>
		</div>
		</div>
	</div>
</div>