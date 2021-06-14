<!-- <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="{{ getenv('APP_URL') }}/css/widget.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="{{ getenv('APP_URL') }}/js/widget.js"></script> -->


<div class="widget-block">
	<div class="widget-header">
		<h2 class="widget-title">
			Brands we love
			<!-- Button trigger modal -->
			<a href="javascript:void(0)" class="btn-send-email">
				<img src="{{ getenv('APP_URL') }}/images/email-icon.svg">
				Send To Email
			</a>

			<!-- Modal -->
			<div class="send-email-modal">
			  	<div class="send-email-modal__inner">
			  		<div class="send-email-before-success">
				  		<h3>Send straight to my inbox<img class="btn-close" src="{{ getenv('APP_URL') }}/images/btn-cancle.svg"></h3>
				  		<p>Put your feet up, we’ll hand deliver these recommendations from the brands we think you’ll love straight to your inbox.</p>
				  		<input type="text" placeholder="Your email" class="email-value">
				  		<label class="email-validation-error">Invalid email address.</label>
				  		<label class="email-empty-error">Please type your email.</label>
			  			<a href="javascript:void(0)" class="btn-submit-email">
			  				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="20" viewBox="0 0 24 20" fill="none">
								<path d="M21.6 0H2.4C1.08 0 0.012 1.10408 0.012 2.45352L0 17.1747C0 18.5241 1.08 19.6282 2.4 19.6282H21.6C22.92 19.6282 24 18.5241 24 17.1747V2.45352C24 1.10408 22.92 0 21.6 0ZM21.6 4.90704L12 11.0408L2.4 4.90704V2.45352L12 8.58733L21.6 2.45352V4.90704Z" fill="black"/>
							</svg>
			  				Send it to me!
			  			</a>
			  		</div>
			  		<img class="ajax-loading" src="{{ getenv('APP_URL') }}/images/loading.gif">
			  		<div class="send-email-after-success">
			  			<h3>Send straight to my inbox<img class="btn-close" src="{{ getenv('APP_URL') }}/images/btn-cancle.svg"></h3>
				  		<p>Put your feet up, we’ll hand deliver these recommendations from the brands we think you’ll love straight to your inbox.</p>
				  		<input type="text" class="success-email-value">
				  		<div class="horizontal-line"></div>
			  			<a href="javascript:void(0)" class="btn-close">
		  					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="20" viewBox="0 0 24 20" fill="none">
								<path d="M21.6 0H2.4C1.08 0 0.012 1.10408 0.012 2.45352L0 17.1747C0 18.5241 1.08 19.6282 2.4 19.6282H21.6C22.92 19.6282 24 18.5241 24 17.1747V2.45352C24 1.10408 22.92 0 21.6 0ZM21.6 4.90704L12 11.0408L2.4 4.90704V2.45352L12 8.58733L21.6 2.45352V4.90704Z" fill="black"/>
							</svg>
			  				Done! Close this window
			  			</a>
			  			<a href="javascript:void(0)" class="btn-email-list">
			  				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="20" viewBox="0 0 24 20" fill="none">
								<path d="M21.6 0H2.4C1.08 0 0.012 1.10408 0.012 2.45352L0 17.1747C0 18.5241 1.08 19.6282 2.4 19.6282H21.6C22.92 19.6282 24 18.5241 24 17.1747V2.45352C24 1.10408 22.92 0 21.6 0ZM21.6 4.90704L12 11.0408L2.4 4.90704V2.45352L12 8.58733L21.6 2.45352V4.90704Z" fill="black"/>
							</svg>
			  				Email a friend who might enjoy this list
			  			</a>
			  		</div>
			  	</div>
			</div>

			<!-- Friend Modal -->			
			<div class="send-friend-email-modal">
			  	<div class="send-friend-email-modal__inner">
			  		<div class="send-friend-email-before-success">
				  		<h3>Spread the love<img class="btn-close" src="{{ getenv('APP_URL') }}/images/btn-cancle.svg"></h3>
				  		<p>Send this lovely list to a friend you think will love the brands and products in it. Aren’t you an awesome friend!</p>
				  		<input type="text" placeholder="Your friend's email" class="friend-email-value">
				  		<textarea placeholder="Send your friend a message"></textarea>
				  		<label class="friend-email-validation-error">Invalid email address.</label>
				  		<label class="friend-email-empty-error">Please type your email.</label>
			  			<a href="javascript:void(0)" class="btn-submit-friend-email">
			  				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="20" viewBox="0 0 24 20" fill="none">
								<path d="M21.6 0H2.4C1.08 0 0.012 1.10408 0.012 2.45352L0 17.1747C0 18.5241 1.08 19.6282 2.4 19.6282H21.6C22.92 19.6282 24 18.5241 24 17.1747V2.45352C24 1.10408 22.92 0 21.6 0ZM21.6 4.90704L12 11.0408L2.4 4.90704V2.45352L12 8.58733L21.6 2.45352V4.90704Z" fill="black"/>
							</svg>
			  				Send it to my friend!
			  			</a>
			  		</div>
			  		<img class="ajax-loading" src="{{ getenv('APP_URL') }}/images/loading.gif">
			  		<div class="send-friend-email-after-success">
			  			<h3>Spread the love<img class="btn-close" src="{{ getenv('APP_URL') }}/images/btn-cancle.svg"></h3>
				  		<p>Email sent successfully!</p>
				  		<div class="horizontal-line"></div>
			  			<a href="javascript:void(0)" class="btn-close">
		  					Done! Close this window
			  			</a>
			  		</div>
			  	</div>
			</div>
		</h2>

		<p class="widget-text">We’ve hand picked these purpose driven brands just for you</p>	
	</div>

	<div class="widget-body">
	    <?php var_dump($store);?>
	    @if (!empty($store))
		    @foreach ($store->brands as $brand)
			
				<div class="brand-product">
					<div class="brand-infos">
						<div class="brand-logo-title-tag">
							<div class="brand-logo">
								<img src="{{ getenv('APP_URL') }}/images/{{ $brand->brand_image }}">
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
									<div class="product-item product-item--<?php echo $i ?>" style="background-color: {{hex2rgba($product->brand->brand_tag_color, 0.15)}}">
										<a href="{{ $product->product_link }}" target="_blank">
											<div class="product-img">
												<img src="{{ getenv('APP_URL') }}/images/{{ $product->product_image }}">
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
										<a href="javascript: void(0)">{{ $count - 1 }} more products from {{$product->brand->brand_title}}<img src="{{ getenv('APP_URL') }}/images/down-arrow.svg"></a>
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
	    @endif
	</div>
	
	<div class="widget-footer">
		<div class="email-list">
			<a href="javascript:void(0)">
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="20" viewBox="0 0 24 20" fill="none">
					<path d="M21.6 0H2.4C1.08 0 0.012 1.10408 0.012 2.45352L0 17.1747C0 18.5241 1.08 19.6282 2.4 19.6282H21.6C22.92 19.6282 24 18.5241 24 17.1747V2.45352C24 1.10408 22.92 0 21.6 0ZM21.6 4.90704L12 11.0408L2.4 4.90704V2.45352L12 8.58733L21.6 2.45352V4.90704Z" fill="black"/>
				</svg>
				Email me this list
			</a>
		</div>
		<div class="community-copyright">
			<div class="community">
				<a href="javascript:void(0)">
					<img src="{{ getenv('APP_URL') }}/images/feedback-icon.svg">
					<span>Give feedback</span>
				</a>

				<!-- Feedback Modal -->
				<div class="send-feedback-modal">
				  	<div class="send-feedback-modal__inner">
				  		<div class="send-feedback-before-success">
					  		<h3>Give feedback<img class="btn-close" src="{{ getenv('APP_URL') }}/images/btn-cancle.svg"></h3>
					  		<p>How satisfied are you with theses recommendations?</p>
					  		<ul class="feedback-rating">
					  			<li data-value="rating-1">
					  				<svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 60 60" fill="none">
										<path d="M30 33.75C24.175 33.75 19.225 37.4 17.225 42.5H42.775C40.775 37.4 35.825 33.75 30 33.75ZM19.55 30L22.2 27.35L24.85 30L27.5 27.35L24.85 24.7L27.5 22.05L24.85 19.4L22.2 22.05L19.55 19.4L16.9 22.05L19.55 24.7L16.9 27.35L19.55 30ZM29.975 5C16.175 5 5 16.175 5 30C5 43.825 16.175 55 29.975 55C43.775 55 55 43.825 55 30C55 16.175 43.8 5 29.975 5ZM30 50C18.95 50 10 41.05 10 30C10 18.95 18.95 10 30 10C41.05 10 50 18.95 50 30C50 41.05 41.05 50 30 50ZM40.45 19.4L37.8 22.05L35.15 19.4L32.5 22.05L35.15 24.7L32.5 27.35L35.15 30L37.8 27.35L40.45 30L43.1 27.35L40.45 24.7L43.1 22.05L40.45 19.4Z" fill="#666666"/>
									</svg>
					  			</li>
					  			<li data-value="rating-2">
					  				<svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 60 60" fill="none">
										<path d="M38.75 27.5C40.8211 27.5 42.5 25.8211 42.5 23.75C42.5 21.6789 40.8211 20 38.75 20C36.6789 20 35 21.6789 35 23.75C35 25.8211 36.6789 27.5 38.75 27.5Z" fill="#666666"/>
										<path d="M21.25 27.5C23.3211 27.5 25 25.8211 25 23.75C25 21.6789 23.3211 20 21.25 20C19.1789 20 17.5 21.6789 17.5 23.75C17.5 25.8211 19.1789 27.5 21.25 27.5Z" fill="#666666"/>
										<path d="M30 35C24.175 35 19.2 38.625 17.2 43.75H21.375C23.1 40.775 26.3 38.75 30 38.75C33.7 38.75 36.875 40.775 38.625 43.75H42.8C40.8 38.625 35.825 35 30 35V35ZM29.975 5C16.175 5 5 16.2 5 30C5 43.8 16.175 55 29.975 55C43.8 55 55 43.8 55 30C55 16.2 43.8 5 29.975 5ZM30 50C18.95 50 10 41.05 10 30C10 18.95 18.95 10 30 10C41.05 10 50 18.95 50 30C50 41.05 41.05 50 30 50Z" fill="#666666"/>
									</svg>
					  			</li>
					  			<li data-value="rating-3">
					  				<svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 60 60" fill="none">
										<path d="M22.5 35H37.5V38.75H22.5V35Z" fill="#666666"/>
										<path d="M38.75 27.5C40.8211 27.5 42.5 25.8211 42.5 23.75C42.5 21.6789 40.8211 20 38.75 20C36.6789 20 35 21.6789 35 23.75C35 25.8211 36.6789 27.5 38.75 27.5Z" fill="#666666"/>
										<path d="M21.25 27.5C23.3211 27.5 25 25.8211 25 23.75C25 21.6789 23.3211 20 21.25 20C19.1789 20 17.5 21.6789 17.5 23.75C17.5 25.8211 19.1789 27.5 21.25 27.5Z" fill="#666666"/>
										<path d="M29.975 5C16.175 5 5 16.2 5 30C5 43.8 16.175 55 29.975 55C43.8 55 55 43.8 55 30C55 16.2 43.8 5 29.975 5ZM30 50C18.95 50 10 41.05 10 30C10 18.95 18.95 10 30 10C41.05 10 50 18.95 50 30C50 41.05 41.05 50 30 50Z" fill="#666666"/>
									</svg>
					  			</li>
					  			<li data-value="rating-4">
					  				<svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 60 60" fill="none">
										<path d="M38.75 27.5C40.8211 27.5 42.5 25.8211 42.5 23.75C42.5 21.6789 40.8211 20 38.75 20C36.6789 20 35 21.6789 35 23.75C35 25.8211 36.6789 27.5 38.75 27.5Z" fill="#666666"/>
										<path d="M21.25 27.5C23.3211 27.5 25 25.8211 25 23.75C25 21.6789 23.3211 20 21.25 20C19.1789 20 17.5 21.6789 17.5 23.75C17.5 25.8211 19.1789 27.5 21.25 27.5Z" fill="#666666"/>
										<path d="M30 40C26.3 40 23.125 37.975 21.375 35H17.2C19.2 40.125 24.175 43.75 30 43.75C35.825 43.75 40.8 40.125 42.8 35H38.625C36.875 37.975 33.7 40 30 40ZM29.975 5C16.175 5 5 16.2 5 30C5 43.8 16.175 55 29.975 55C43.8 55 55 43.8 55 30C55 16.2 43.8 5 29.975 5ZM30 50C18.95 50 10 41.05 10 30C10 18.95 18.95 10 30 10C41.05 10 50 18.95 50 30C50 41.05 41.05 50 30 50Z" fill="#666666"/>
									</svg>
					  			</li>
					  			<li data-value="rating-5">
					  				<svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 60 60" fill="none">
										<path d="M29.975 5C16.175 5 5 16.175 5 30C5 43.825 16.175 55 29.975 55C43.775 55 55 43.825 55 30C55 16.175 43.8 5 29.975 5ZM30 50C18.95 50 10 41.05 10 30C10 18.95 18.95 10 30 10C41.05 10 50 18.95 50 30C50 41.05 41.05 50 30 50ZM32.5 24.85L35.15 27.5L37.8 24.85L40.45 27.5L43.1 24.85L37.8 19.55L32.5 24.85ZM22.2 24.85L24.85 27.5L27.5 24.85L22.2 19.55L16.9 24.85L19.55 27.5L22.2 24.85ZM30 43.75C35.825 43.75 40.775 40.1 42.775 35H17.225C19.225 40.1 24.175 43.75 30 43.75Z" fill="#666666"/>
									</svg>
					  			</li>
					  		</ul>
					  		<div class="feedback-content">
					  			<textarea placeholder="What did you like the most?"></textarea>

					  			<a href="javascript:void(0)" class="btn-submit-feedback">
					  				Send feedback
					  			</a>
					  		</div>
				  		</div>
				  		<img class="ajax-loading" src="{{ getenv('APP_URL') }}/images/loading.gif">
				  		<div class="send-feedback-after-success">
				  			<h3>Give feedback<img class="btn-close" src="{{ getenv('APP_URL') }}/images/btn-cancle.svg"></h3>
					  		<p>How satisfied are you with theses recommendations?</p>
				  			<a href="javascript:void(0)" class="btn-close">
			  					Done! Close this window
				  			</a>
				  		</div>
				  	</div>
				</div>
			</div>
			<div class="copyright">
				<label>Powered by</label>
				<img src="{{ getenv('APP_URL') }}/images/ohana-icon.svg">
			</div>
		</div>
	</div>
</div>
