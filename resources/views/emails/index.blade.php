<!DOCTYPE html>
<html lang="en-US">
  	<head>
    	<meta charset="utf-8" />
    	<style type="text/css">
    		h1,h2,h3,h4,h5,h6,p,label,span,ul,li {
				margin: 0;
				padding: 0;
			}

			li {
				list-style-type: none;
			}

			body {
				font-family: 'Source Sans Pro', sans-serif;
				color: #000000;
			}

			.widget-block {
				max-width: 512px;
				padding: 24px 16px;
				border-radius: 4px;
				border: 1px solid #DDDDDD;
			}

			.widget-header {
				border-bottom: 1px solid #666666;
				padding-bottom: 16px;
			}

			.widget-title {
				font-size: 20px;
				font-weight: bold;
				margin-bottom: 5px;
				padding-left: 16px;
				display: flex;
			  justify-content: space-between;
			  align-items: center;
			}

			.send-email-modal {
				position: fixed;
			  top: 0;
			  bottom: 0;
			  left: 0;
			  right: 0;
			  background-color: rgba(0,0,0,0.5);
			  display: none;
			  align-items: center;
			  justify-content: center;
			  z-index: 111;
			}

			.send-email-modal.open {
				display: flex;
			}

			.send-email-modal__inner {
				background-color: white;
			  border-radius: 5px;
			  padding: 20px;
			  position: relative;
			}

			.send-email-modal__inner h3 {
			  font-size: 16px;
			  text-transform: uppercase;
			  margin-bottom: 5px;
			  text-align: center;
			}

			.send-email-modal__inner h3 span {
				position: absolute;
			  top: 0;
			  right: 5px;
			  cursor: pointer;
			}

			.send-email-modal__inner input {
				border: solid 2px black;
				padding: 5px;
				border-radius: 5px;
				font-size: 16px;
			}

			.send-email-modal__inner .email-validation-error,
			.send-email-modal__inner .email-empty-error {
				display: none;
			  font-size: 12px;
			  text-align: center;
			  line-height: 1;
			  margin-top: 3px;
			}

			.send-email-modal__inner .email-validation-error.active,
			.send-email-modal__inner .email-empty-error.active {
				display: block;
			}

			.btn-submit-email {
				display: block;
			  text-align: center;
			  padding: 2px 10px;
			  font-size: 12px;
			  text-transform: uppercase;
			  margin: 10px auto 0;
			  background-color: #F5937B;
			  border-radius: 5px;
			  color: black;
			}

			.btn-submit-email:hover {
				color: black;
			}

			.btn-send-email {
				color: black;
			  font-size: 12px;
			  letter-spacing: 0.75px;
			  text-transform: uppercase;
			  display: flex;
			  align-items: center;
			  background: rgba(255, 228, 175, 0.8);
			  padding: 3px 7px;
			  border-radius: 4px;
				border: none;
				font-weight: 600;
			}

			.btn-send-email:hover {
				color: black;
			}

			.btn-send-email img {
				width: 16px;
			  margin-right: 5px;
			}

			.widget-text {
				font-size: 14px;
				padding-left: 16px;
			}

			.brand-product {
			  padding: 30px 0;
			  border-bottom: 1px solid #666666;
			}

			.brand-infos {
				padding: 0 24px 16px;
				border-bottom: 1px solid #F0F0F2;
			}

			.brand-logo-title-tag {
				display: flex;
				align-items: center;
			}

			.brand-logo {
				margin-right: 10px;
				width: 65px;
				height: 65px;
			}

			.brand-logo img {
				width: 65px;
				height: 65px;
				object-fit: cover;
			}

			.brand-title-tag h3 {
				font-size: 26px;
			  font-weight: 700;
			}

			.brand-title-tag ul {
				display: flex;
				margin-top: 5px;
			}

			.brand-title-tag ul li {
				margin-right: 5px;
				font-size: 12px;
				text-transform: uppercase;
				padding: 4px 8px;
				border-radius: 16px;
				font-weight: bold;
			}

			.brand-product:first-child .brand-title-tag ul li {
				background: #F5937B;
				color: #FFFFFF;
				letter-spacing: 1;	
			}

			.brand-product:first-child .product-item {
				background-color: rgba(246, 145, 122, 0.15);
			}

			.brand-product:nth-child(2) .brand-title-tag ul li {
				background: #FFE455;
				color: #000000;
				letter-spacing: 1;	
			}

			.brand-product:nth-child(2) .product-item {
				background-color: #FFF7E4;
			}

			.brand-product:nth-child(3) .brand-title-tag ul li {
				background: #005D68;
				color: #FFFFFF;
				letter-spacing: 1;	
			}

			.brand-product:nth-child(4) .brand-title-tag ul li {
				background: #C75F0C;
				color: #FFFFFF;
				letter-spacing: 1;	
			}

			.brand-product:nth-child(5) .brand-title-tag ul li {
				background: #FAA03D;
				color: #FFFFFF;
				letter-spacing: 1;	
			}

			.brand-product:nth-child(6) .brand-title-tag ul li {
				background: #E5EBF5;
				color: #000000;
				letter-spacing: 1;	
			}

			.brand-product:nth-child(7) .brand-title-tag ul li {
				background: #7E4823;
				color: #FFFFFF;
				letter-spacing: 1;	
			}

			.brand-product:nth-child(8) .brand-title-tag ul li {
				background: #EDE8CF;
				color: #000000;
				letter-spacing: 1;	
			}

			.brand-product:nth-child(9) .brand-title-tag ul li {
				background: #EFA9B4;
				color: #FFFFFF;
				letter-spacing: 1;	
			}

			.brand-product:nth-child(3) .product-item {
				background-color: rgba(0, 77, 91, 0.15);;
			}

			.brand-product:nth-child(4) .product-item {
				background: rgba(199, 95, 12, 0.15);
			}

			.brand-product:nth-child(5) .product-item {
				background: rgba(250, 160, 61, 0.15);
			}

			.brand-product:nth-child(6) .product-item {
				background: rgba(229, 235, 245, 0.15);
			}

			.brand-product:nth-child(7) .product-item {
				background: rgba(126, 72, 35, 0.15);
			}

			.brand-product:nth-child(8) .product-item {
				background: rgba(237, 232, 207, 0.15);
			}

			.brand-product:nth-child(9) .product-item {
				background: rgba(239, 169, 180, 0.15);
			}

			.brand-text {
				margin-top: 12px;
				font-size: 16px;
			}

			.product-item {
			  margin: 16px 12px;
			  display: none;
			}

			.product-item > a:hover .product-img img {
			  transform: scale(1.2);
			  transition: all 0.15s linear;
			}

			.product-item.active {
				display: block;
			}

			.product-items .product-item:first-child {
				display: block;
			}

			.product-item > a {
				display: grid;
			  grid-template-columns: 1fr 1.65fr;
			  grid-gap: 12px;
			  color: black;
			  text-decoration: none;
			  border-radius: 10px;
			}

			.product-img {
				padding: 8px;
				overflow: hidden;
			}

			.product-img img {
				width: 100%;
				overflow: hidden;
			}

			.product-text {
				padding: 8px 8px 8px 0;
			  display: flex;
			  flex-direction: column;
			  justify-content: space-between;
			}

			.product-title-desc h3 {
				font-size: 20px;
				margin-bottom: 5px;
			}

			.product-title-desc p {
				font-size: 16px;
				line-height: 1.4;
			}

			.product-price-arrow {
				display: flex;
			  align-items: center;
			  justify-content: space-between;
			}

			.product-price-arrow span {
				font-size: 18px;
			  font-weight: bold;
			}

			.product-price-arrow img {
				width: 10px;
			}

			.more-products {
				text-align: center;
				padding-top: 16px;
				border-top: 1px solid #F0F0F2;
			}

			.more-products a {
				color: black;
			  font-size: 16px;
			  text-decoration: none;
			  font-weight: bold;
			}

			.more-products a img {
				width: 14px;
			  margin-left: 8px;
			}

			.more-products a.open img {
				transform: rotate(180deg);
			}

			.email-list {
				padding: 25px 16px;
				border-bottom: 1px solid #DDDDDD;
			}

			.email-list a {
				text-decoration: none;
				color: black;
				display: flex;
				align-items: center;
				font-size: 16px;
				font-weight: bold;
			}

			.email-list a img {
				margin-right: 8px;
			}

			.community-copyright {
				padding: 20px 16px 0;
			  display: flex;
			  align-items: center;
			  justify-content: space-between;
			}

			.community label {
				display: block;
				font-size: 16px;
				color: #666666;
			}

			.community span {
				display: block;
				font-size: 14px;
				color: #666666;
			}

			.copyright label {
				display: block;
				color: #666666;
				font-size: 12px;
			}

			.copyright span {
				display: block;
				color: #666666;
				font-size: 32px;
			}
    	</style>
  	</head>
  	<body>
    	<div class="widget-block">
		    <div class="widget-header">
		        <h2 class="widget-title">
		            Brands we love
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
  	</body>
</html>