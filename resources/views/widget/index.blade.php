<!-- <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://08abc8207af7.ngrok.io/css/widget.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://08abc8207af7.ngrok.io/js/widget.js"></script> -->


<div class="widget-block">
	<div class="widget-header">
		<h2 class="widget-title">
			Brands we love
			<!-- Button trigger modal -->
			<a href="javascript:void(0)" class="btn-send-email">
				<img src="https://08abc8207af7.ngrok.io/images/email-icon.svg">
				Send To Email
			</a>

			<!-- Modal -->
			<div class="send-email-modal">
			  	<div class="send-email-modal__inner">
			  		<div class="send-email-before-success">
				  		<h3>Please enter your email.<span class="btn-close">X</span></h3>
				  		<input type="text" placeholder="example@email.com" class="email-value">
				  		<label class="email-validation-error">Invalid email address.</label>
				  		<label class="email-empty-error">Please type your email.</label>
			  			<a href="javascript:void(0)" class="btn-submit-email">Submit</a>
			  		</div>
			  		<img class="ajax-loading" src="https://08abc8207af7.ngrok.io/images/loading.gif">
			  		<div class="send-email-after-success">
			  			<h3>Email sent successfully.<span class="btn-close">X</span></h3>
			  		</div>
			  	</div>
			</div>
		</h2>

		
		<p class="widget-text">We’ve hand picked these purpose driven brands just for you</p>	
	</div>

	<div class="widget-body">
		@foreach ($store->brands as $brand)
			
				<div class="brand-product">
					<div class="brand-infos">
						<div class="brand-logo-title-tag">
							<div class="brand-logo">
								<img src="https://08abc8207af7.ngrok.io/images/{{ $brand->brand_image }}">
							</div>
							<div class="brand-title-tag">
								<h3>{{ $brand->brand_title }}</h3>
								<ul>
									<?php if ( strpos($brand->brand_tag, ", ") !== false ) :
										$brand_items = explode(", ", $brand->brand_tag);

								     	foreach ($brand_items as $brand_item) : ?>
								     		<li style="background-color: <?php echo $brand->brand_tag_color ?>">{{ $brand_item }}</li>
								     	<?php
								     	endforeach;
									else : ?>
										<li>{{ $brand->brand_tag }}</li>
						     		<?php
									endif;
									?>
								</ul>
							</div>
						</div>
						<div class="brand-text">
							{{ $brand->brand_description }}
						</div>
					</div>
					<div class="product-infos">
						<div class="product-items">
							<?php 
							$count = 0;
							foreach($store->products as $product) {
								if ($product->brand_id == $brand->id) {
									$count++;
								}
							}

							$i = 0;
						 	foreach ($store->products as $product) :
						 		if ($product->brand_id == $brand->id) :
						 			$i++;
						 			?>
									<div class="product-item" style="background-color: {{hex2rgba($product->brand->brand_tag_color, 0.15)}}">
										<a href="{{ $product->product_link }}" target="_blank">
											<div class="product-img">
												<img src="https://08abc8207af7.ngrok.io/images/{{ $product->product_image }}">
											</div>
											<div class="product-text">
												<div class="product-title-desc">
													<h3>{{ $product->product_title }}</h3>
													<p>{{ $product->product_description }}</p>
												</div>
												<div class="product-price-arrow">
													<span>£{{ $product->product_price }}</span>
													<svg width="10" height="16" viewBox="0 0 10 16" fill="none" xmlns="http://www.w3.org/2000/svg">
														<path d="M-0.000127917 14.5697L1.43018 16L9.43018 8L1.43017 6.99382e-07L-0.000129066 1.4303L6.56957 8L-0.000127917 14.5697Z" fill="{{ $product->brand->brand_tag_color }}"/>
													</svg>
												</div>
											</div>
										</a>
									</div>
								<?php
									if ($count > 1 && $i == 1) :
								?>
									<div class="more-products">
										<a href="javascript: void(0)">{{ $count - 1 }} more products from {{$product->brand->brand_title}}<img src="https://08abc8207af7.ngrok.io/images/down-arrow.svg"></a>
									</div>
								<?php
									endif;
								endif;
							endforeach;
							?>
						</div>
						
					</div>
				</div>
			
		@endforeach
	</div>
	
	<div class="widget-footer">
		<div class="email-list">
			<a href = "mailto: abc@example.com"><img src="https://08abc8207af7.ngrok.io/images/email-icon.svg">Email me this list</a>
		</div>
		<div class="community-copyright">
			<div class="community">
				<label>Community Commerce</label>
				<span>Find out more</span>
			</div>
			<div class="copyright">
				<label>Powered by</label>
				<span>Ohana</span>
			</div>
		</div>
	</div>
</div>
