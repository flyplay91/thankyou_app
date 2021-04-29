<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://b8d064528f87.ngrok.io/css/widget.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script src="https://b8d064528f87.ngrok.io/js/widget.js"></script>


<div class="widget-block">
	<div class="widget-header">
		<h2 class="widget-title">Brands we love</h2>
		<p class="widget-text">We’ve hand picked these purpose driven brands just for you</p>	
	</div>

	<div class="widget-body">
		@foreach ($brands as $brand)
		<div class="brand-product">
			<div class="brand-infos">
				<div class="brand-logo-title-tag">
					<div class="brand-logo">
						<img src="https://b8d064528f87.ngrok.io/images/{{ $brand->brand_image }}">
					</div>
					<div class="brand-title-tag">
						<h3>{{ $brand->brand_title }}</h3>
						<ul>
							<?php if ( strpos($brand->brand_tag, ", ") !== false ) :
								$brand_items = explode(", ", $brand->brand_tag);

						     	foreach ($brand_items as $brand_item) : ?>
						     		<li>{{ $brand_item }}</li>
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
					<?php  $i = 0; 
				 	foreach ($products as $product) :
				 		if ($product->brand_id == $brand->id) :
				 			$i++;
				 			?>
							<div class="product-item">
								<a href="{{ $product->product_link }}" target="_blank">
									<div class="product-img">
										<img src="https://b8d064528f87.ngrok.io/images/{{ $product->product_image }}">
									</div>
									<div class="product-text">
										<div class="product-title-desc">
											<h3>{{ $product->product_title }}</h3>
											<p>{{ $product->product_description }}</p>
										</div>
										<div class="product-price-arrow">
											<span>£{{ $product->product_price }}</span>
											<img src="https://b8d064528f87.ngrok.io/images/right-arrow.svg">
										</div>
									</div>
								</a>
							</div>
						<?php
						endif;
						if (($product->brand->id == $brand->id) && $i > 1) : ?>
							<div class="more-products">
								<a href="javascript: void(0)">{{ $i }} more products from Yuicy<img src="https://b8d064528f87.ngrok.io/images/down-arrow.svg"></a>
							</div>
						<?php
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
			<a href = "mailto: abc@example.com"><img src="https://b8d064528f87.ngrok.io/images/email-icon.svg">Email me this list</a>
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
