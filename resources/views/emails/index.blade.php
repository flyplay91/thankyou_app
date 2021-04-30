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
		        <div class="brand-product">
		            <div class="brand-infos">
		                <div class="brand-logo-title-tag">
		                    <div class="brand-logo">
		                        <img src="https://08abc8207af7.ngrok.io/images/Yuicy-logo.png">
		                    </div>
		                    <div class="brand-title-tag">
		                        <h3>Yuicy</h3>
		                        <ul>
		                            <li>Cruelty free</li>
		                            <li>Vegan</li>
		                        </ul>
		                    </div>
		                </div>
		                <div class="brand-text">
		                    Honest, tasty and high quality vitamin gummies that combat hairloss, sleep problems and acne.
		                </div>
		            </div>
		            <div class="product-infos">
		                <div class="product-items">
		                    <div class="product-item">
		                        <a href="https://react-cart-test.myshopify.com/" target="_blank">
		                            <div class="product-img">
		                                <img src="https://08abc8207af7.ngrok.io/images/Yuicy-product-1.png">
		                            </div>
		                            <div class="product-text">
		                                <div class="product-title-desc">
		                                    <h3>Skin Vitamin Gummies</h3>
		                                    <p>Delicious vitamin gummies for glowing and healthy skin.</p>
		                                </div>
		                                <div class="product-price-arrow">
		                                    <span>£30</span>
		                                    <img src="https://08abc8207af7.ngrok.io/images/right-arrow.svg">
		                                </div>
		                            </div>
		                        </a>
		                    </div>
		                    <div class="product-item">
		                        <a href="https://react-cart-test.myshopify.com/" target="_blank">
		                            <div class="product-img">
		                                <img src="https://08abc8207af7.ngrok.io/images/Yuicy-product-1.png">
		                            </div>
		                            <div class="product-text">
		                                <div class="product-title-desc">
		                                    <h3>Skin Vitamin Gummies</h3>
		                                    <p>Delicious vitamin gummies for glowing and healthy skin.</p>
		                                </div>
		                                <div class="product-price-arrow">
		                                    <span>£30</span>
		                                    <img src="https://08abc8207af7.ngrok.io/images/right-arrow.svg">
		                                </div>
		                            </div>
		                        </a>
		                    </div>
		                    <div class="more-products">
		                        <a href="javascript: void(0)">2 more products from Yuicy<img src="https://08abc8207af7.ngrok.io/images/down-arrow.svg"></a>
		                    </div>
		                </div>
		            </div>
		        </div>
		        <div class="brand-product">
		            <div class="brand-infos">
		                <div class="brand-logo-title-tag">
		                    <div class="brand-logo">
		                        <img src="https://08abc8207af7.ngrok.io/images/delight-logo.png">
		                    </div>
		                    <div class="brand-title-tag">
		                        <h3>De Light</h3>
		                        <ul>
		                            <li>Female Founded</li>
		                            <li>Gives Back</li>
		                        </ul>
		                    </div>
		                </div>
		                <div class="brand-text">
		                    A menstrual wellness brand providing natural, research-backed relief. On a mission to support happy, healthy periods.
		                </div>
		            </div>
		            <div class="product-infos">
		                <div class="product-items">
		                    <div class="product-item">
		                        <a href="https://example.com" target="_blank">
		                            <div class="product-img">
		                                <img src="https://08abc8207af7.ngrok.io/images/de-light-product-1.png">
		                            </div>
		                            <div class="product-text">
		                                <div class="product-title-desc">
		                                    <h3>Steady Mood</h3>
		                                    <p>Targeted herbal and nutritional relief for PMS symptoms.</p>
		                                </div>
		                                <div class="product-price-arrow">
		                                    <span>£26</span>
		                                    <img src="https://08abc8207af7.ngrok.io/images/right-arrow.svg">
		                                </div>
		                            </div>
		                        </a>
		                    </div>
		                </div>
		            </div>
		        </div>
		        <div class="brand-product">
		            <div class="brand-infos">
		                <div class="brand-logo-title-tag">
		                    <div class="brand-logo">
		                        <img src="https://08abc8207af7.ngrok.io/images/stem-logo.png">
		                    </div>
		                    <div class="brand-title-tag">
		                        <h3>Stem</h3>
		                        <ul>
		                            <li>Sustainably Sourced</li>
		                            <li>Vegan</li>
		                        </ul>
		                    </div>
		                </div>
		                <div class="brand-text">
		                    New type of vitamin, with real food. Sustainably sourced, delicious to eat, easy to digest.
		                </div>
		            </div>
		            <div class="product-infos">
		                <div class="product-items">
		                    <div class="product-item">
		                        <a href="https://example.com" target="_blank">
		                            <div class="product-img">
		                                <img src="https://08abc8207af7.ngrok.io/images/stem-product-1.png">
		                            </div>
		                            <div class="product-text">
		                                <div class="product-title-desc">
		                                    <h3>Immunity Essentials</h3>
		                                    <p>One chewable bite to help keep sick days at bay and digestion moving smoothly.</p>
		                                </div>
		                                <div class="product-price-arrow">
		                                    <span>£45</span>
		                                    <img src="https://08abc8207af7.ngrok.io/images/right-arrow.svg">
		                                </div>
		                            </div>
		                        </a>
		                    </div>
		                </div>
		            </div>
		        </div>
		        <div class="brand-product">
		            <div class="brand-infos">
		                <div class="brand-logo-title-tag">
		                    <div class="brand-logo">
		                        <img src="https://08abc8207af7.ngrok.io/images/im-logo.png">
		                    </div>
		                    <div class="brand-title-tag">
		                        <h3>Immunitee</h3>
		                        <ul>
		                            <li>Gluten free</li>
		                            <li>Vegan</li>
		                        </ul>
		                    </div>
		                </div>
		                <div class="brand-text">
		                    Vitamins with science-backed ingredients to supplement your diet. Natural flavour, gluten-free and vegan.
		                </div>
		            </div>
		            <div class="product-infos">
		                <div class="product-items">
		                    <div class="product-item">
		                        <a href="https://example.com" target="_blank">
		                            <div class="product-img">
		                                <img src="https://08abc8207af7.ngrok.io/images/immunitee-product-1.png">
		                            </div>
		                            <div class="product-text">
		                                <div class="product-title-desc">
		                                    <h3>Vitamin B Dose</h3>
		                                    <p>A high-strength liquid that supports your immune system and helps maintain healthy bones.</p>
		                                </div>
		                                <div class="product-price-arrow">
		                                    <span>£15</span>
		                                    <img src="https://08abc8207af7.ngrok.io/images/right-arrow.svg">
		                                </div>
		                            </div>
		                        </a>
		                    </div>
		                </div>
		            </div>
		        </div>
		        <div class="brand-product">
		            <div class="brand-infos">
		                <div class="brand-logo-title-tag">
		                    <div class="brand-logo">
		                        <img src="https://08abc8207af7.ngrok.io/images/luxur-logo.png">
		                    </div>
		                    <div class="brand-title-tag">
		                        <h3>Luxur</h3>
		                        <ul>
		                            <li>Cruelty free</li>
		                            <li>Vegan</li>
		                            <li>Zero Plastic</li>
		                        </ul>
		                    </div>
		                </div>
		                <div class="brand-text">
		                    Luxur is on an mission to make personal care sustainable, fighting for a more clean and ethical beauty industry
		                </div>
		            </div>
		            <div class="product-infos">
		                <div class="product-items">
		                    <div class="product-item">
		                        <a href="https://example.com" target="_blank">
		                            <div class="product-img">
		                                <img src="https://08abc8207af7.ngrok.io/images/luxur-product-1.png">
		                            </div>
		                            <div class="product-text">
		                                <div class="product-title-desc">
		                                    <h3>Hand wash kit</h3>
		                                    <p>Hand wash developed using natural  ingredients: it’s non-GMO, gluten free, vegan and cruelty-free.</p>
		                                </div>
		                                <div class="product-price-arrow">
		                                    <span>£17</span>
		                                    <img src="https://08abc8207af7.ngrok.io/images/right-arrow.svg">
		                                </div>
		                            </div>
		                        </a>
		                    </div>
		                </div>
		            </div>
		        </div>
		        <div class="brand-product">
		            <div class="brand-infos">
		                <div class="brand-logo-title-tag">
		                    <div class="brand-logo">
		                        <img src="https://08abc8207af7.ngrok.io/images/squeeze-logo.png">
		                    </div>
		                    <div class="brand-title-tag">
		                        <h3>Squeeze</h3>
		                        <ul>
		                            <li>Sustainably Sourced</li>
		                            <li>Gives Back</li>
		                        </ul>
		                    </div>
		                </div>
		                <div class="brand-text">
		                    A skincare brand using essential oils in their nutrient-rich formulas that help relieve mental and physical tension
		                </div>
		            </div>
		            <div class="product-infos">
		                <div class="product-items">
		                    <div class="product-item">
		                        <a href="https://example.com" target="_blank">
		                            <div class="product-img">
		                                <img src="https://08abc8207af7.ngrok.io/images/squeeze-product-1.png">
		                            </div>
		                            <div class="product-text">
		                                <div class="product-title-desc">
		                                    <h3>Day cream</h3>
		                                    <p>Thirst-quenching day cream with hyaluronic acid and citrics to help repare skin damage.</p>
		                                </div>
		                                <div class="product-price-arrow">
		                                    <span>£30</span>
		                                    <img src="https://08abc8207af7.ngrok.io/images/right-arrow.svg">
		                                </div>
		                            </div>
		                        </a>
		                    </div>
		                </div>
		            </div>
		        </div>
		        <div class="brand-product">
		            <div class="brand-infos">
		                <div class="brand-logo-title-tag">
		                    <div class="brand-logo">
		                        <img src="https://08abc8207af7.ngrok.io/images/sense-logo.png">
		                    </div>
		                    <div class="brand-title-tag">
		                        <h3>Sense</h3>
		                        <ul>
		                            <li>Sustainably Sourced</li>
		                            <li>Locally Made</li>
		                        </ul>
		                    </div>
		                </div>
		                <div class="brand-text">
		                    Small batch candles designed and made by hand in the UK using high quality, sustainably sourced soy wax
		                </div>
		            </div>
		            <div class="product-infos">
		                <div class="product-items">
		                    <div class="product-item">
		                        <a href="https://example.com" target="_blank">
		                            <div class="product-img">
		                                <img src="https://08abc8207af7.ngrok.io/images/sense-product-1.png">
		                            </div>
		                            <div class="product-text">
		                                <div class="product-title-desc">
		                                    <h3>Autumn feels candle</h3>
		                                    <p>Aromas combining sweet orange, cedarwood and a hint of spice, will make you daydream of sun-kissed, smouldering scenery.</p>
		                                </div>
		                                <div class="product-price-arrow">
		                                    <span>£22</span>
		                                    <img src="https://08abc8207af7.ngrok.io/images/right-arrow.svg">
		                                </div>
		                            </div>
		                        </a>
		                    </div>
		                </div>
		            </div>
		        </div>
		        <div class="brand-product">
		            <div class="brand-infos">
		                <div class="brand-logo-title-tag">
		                    <div class="brand-logo">
		                        <img src="https://08abc8207af7.ngrok.io/images/natur-logo.png">
		                    </div>
		                    <div class="brand-title-tag">
		                        <h3>Natur</h3>
		                        <ul>
		                            <li>1% for the planet</li>
		                            <li>Cruelty Free</li>
		                        </ul>
		                    </div>
		                </div>
		                <div class="brand-text">
		                    SPF that is comfortable to wear, feels like skincare and takes care of the planet.
		                </div>
		            </div>
		            <div class="product-infos">
		                <div class="product-items">
		                    <div class="product-item">
		                        <a href="https://example.com" target="_blank">
		                            <div class="product-img">
		                                <img src="https://08abc8207af7.ngrok.io/images/natur-product-1.png">
		                            </div>
		                            <div class="product-text">
		                                <div class="product-title-desc">
		                                    <h3>Sunshine pack</h3>
		                                    <p>this sunshine pack is all you need for a great time in the sun</p>
		                                </div>
		                                <div class="product-price-arrow">
		                                    <span>£50</span>
		                                    <img src="https://08abc8207af7.ngrok.io/images/right-arrow.svg">
		                                </div>
		                            </div>
		                        </a>
		                    </div>
		                </div>
		            </div>
		        </div>
		        <div class="brand-product">
		            <div class="brand-infos">
		                <div class="brand-logo-title-tag">
		                    <div class="brand-logo">
		                        <img src="https://08abc8207af7.ngrok.io/images/cheryl-logo.png">
		                    </div>
		                    <div class="brand-title-tag">
		                        <h3>Cheryl</h3>
		                        <ul>
		                            <li>Cruelty free</li>
		                            <li>Vegan</li>
		                        </ul>
		                    </div>
		                </div>
		                <div class="brand-text">
		                    Beauty brand on a mission to strive to select effective and 100% vegan formulas
		                </div>
		            </div>
		            <div class="product-infos">
		                <div class="product-items">
		                    <div class="product-item">
		                        <a href="https://example.com" target="_blank">
		                            <div class="product-img">
		                                <img src="https://08abc8207af7.ngrok.io/images/cheryl-product-1.png">
		                            </div>
		                            <div class="product-text">
		                                <div class="product-title-desc">
		                                    <h3>Perfect Blush</h3>
		                                    <p>A two-in-one creme for lips and cheeks that blends in seamlessly for an instant flushed effect, with zero effort.</p>
		                                </div>
		                                <div class="product-price-arrow">
		                                    <span>£29.99</span>
		                                    <img src="https://08abc8207af7.ngrok.io/images/right-arrow.svg">
		                                </div>
		                            </div>
		                        </a>
		                    </div>
		                </div>
		            </div>
		        </div>
		    </div>
		    <div class="widget-footer">
		        <div class="email-list">
		            <a href="mailto: abc@example.com"><img src="https://08abc8207af7.ngrok.io/images/email-icon.svg">Email me this list</a>
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