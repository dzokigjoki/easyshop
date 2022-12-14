@extends('clients.shop.layouts.default')
@section('content')
<div class="page-content">
		<!-- Breadcrumb Section -->
		<section class="breadcrumb-contact-us breadcrumb-section section-box" style="background-image: url( {{url_assets('/shop/images/shop-bc.jpg')}});">
			<div class="container">
				<div class="breadcrumb-inner">
					<h1>Shop</h1>
					<ul class="breadcrumbs">
						<li><a class="breadcrumbs-1" href="index.html">Home</a></li>
						<li><p class="breadcrumbs-2">Shop Single</p></li>
					</ul>
				</div>	
			</div>
		</section>
		<!-- End Breadcrumb Section -->
		
		<!-- Shop Section -->
		<section class="shop-single-v1-section section-box featured-hp-1 featured-hp-4">
			<div class="woocommerce">
				<div class="container">
					<div class="content-area">
						<div class="row">
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
								<div class="woocommerce-product-gallery">
									<div class="pimg">
                                        <a class="product-image">
                                            <figure>
                                                <img id="zoom_01" src="{{$product->image}}" data-zoom-image="{{$product->image}}"/>
                                            </figure>
                                        </a>
                                        <!-- <div class="new-top-right">NEW</div>
                                        <div class="sale-top-right">SALE</div> -->
                                    </div> <!-- /.pimg -->
                                      <div class="more-views">
                                                        <div class="slider-items-products">
                                                            <div class="more-views-items">
                                                                <ul>
                                                                    <li style="display: inline;">
                                                                        <a class="zoomGalleryActive" href="{{$product->image}}"
                                                                           data-image="{{$product->image}}" data-zoom-image="{{$product->image}}">
                                                                            <img style="width:80px;" src="{{$product->image}}"
                                                                                 alt=""/>
                                                                        </a>
                                                                    </li>
                                                                    @foreach($product->images as $img)
                                                                        <li style="display: inline;">
                                                                            <a class="zoomGalleryActive"
                                                                               href="{{\ImagesHelper::getProductImage($img->filename, $product->id, 'lg_')}}"
                                                                               data-image="{{$product->image}}"
                                                                               data-zoom-image="{{$product->image}}">
                                                                                <img style="width:80px;"
                                                                                     src="{{\ImagesHelper::getProductImage($img->filename, $product->id, 'md_')}}"/>
                                                                            </a>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
									{{-- <div class="owl-carousel">
										<div class="item">
									        <img src="images/shop-single-v1-1.jpg" alt="product">
									    </div>
									    <div class="item">
									        <img src="images/shop-single-v1-2.jpg" alt="product">
									    </div>
									    <div class="item">
									        <img src="images/shop-single-v1-3.jpg" alt="product">
									    </div>
									</div> --}}
								</div>
							</div>
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
								<div class="summary entry-summary">
									<h1 class="product_title entry-title">{{ $product->title }}</h1>
									<div class="woocommerce-product-rating">
										<div class="star-rating">
											<i class="zmdi zmdi-star"></i>
											<i class="zmdi zmdi-star"></i>
											<i class="zmdi zmdi-star"></i>
											<i class="zmdi zmdi-star"></i>
											<i class="zmdi zmdi-star-outline"></i>
										</div>
										<a href="#" class="woocommerce-review-link">(2 customer review)</a>
									</div>
									<p class="price">
										<del>
											<span class="woocommerce-Price-amount amount">
												<span class="woocommerce-Price-currencySymbol">$</span>
												147
											</span>
										</del>
										<ins>
											<span class="woocommerce-Price-amount amount">
												<span class="woocommerce-Price-currencySymbol">$</span>
												135
											</span>
										</ins>
									</p>
									<div class="woocommerce-product-details__short-description">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
									</div>
									<form class="cart" method="post">
										<div class="quantity">
                                            <input type="number" name="quantity" id="quantity" value="1" min="1" class="nput-text qty text">
                                            <span class="modify-qty plus" onclick="Increase()">+</span>
                                            <span class="modify-qty minus" onclick="Decrease()">-</span>
                                        </div>
                                        <button type="submit" name="add-to-cart" class="single_add_to_cart_button button alt au-btn btn-small">Add to cart<i class="zmdi zmdi-arrow-right"></i></button>
									</form>
									<div class="product_meta">
										<span class="sku_wrapper">
											Sku:
											<span class="sku">MQ000137417_33</span>
										</span>
										<span class="posted_in">
											Category:
											<a href="#">Furniture</a>
										</span>
										<span class="tagged_as">
											Tag:
											<a href="#">Home Decor, Lightting</a>
										</span>
									</div>
									<div class="product-share">
										<span>Share:</span>
										<a href="#"><i class="zmdi zmdi-facebook"></i></a>
										<a href="#"><i class="zmdi zmdi-twitter"></i></a>
										<a href="#"><i class="zmdi zmdi-tumblr"></i></a>
										<a href="#"><i class="zmdi zmdi-instagram"></i></a>
									</div>
								</div>
								<div class="woocommerce-tabs">
									<ul class="nav nav-tabs wc-tabs" id="myTab" role="tablist">
										<li class="nav-item description_tab" id="tab-title-description" role="tab" aria-controls="tab-description" aria-selected="true">
											<a class="nav-link active" href="#tab-description" data-toggle="tab">Description</a>
										</li>
										<li class="nav-item additional_information_tab" id="tab-title-additional_information" role="tab" aria-controls="tab-additional_information" aria-selected="false">
									    	<a class="nav-link" href="#tab-additional_information" data-toggle="tab">Additional information</a>
									  	</li>
										<li class="nav-item reviews_tab" id="tab-title-reviews" role="tab" aria-controls="tab-reviews" aria-selected="false">
									    	<a class="nav-link" href="#tab-reviews" data-toggle="tab">Reviews(2)</a>
									  	</li>
									</ul>
									<div class="tab-content" id="myTabContent">
										<div class="woocommerce-Tabs-panel tab-pane fade show active" id="tab-description" role="tabpanel" aria-labelledby="tab-title-description">
											<p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire.</p>
										</div>
										<div class="woocommerce-Tabs-panel tab-pane" id="tab-additional_information" role="tabpanel" aria-labelledby="tab-title-additional_information">
											<table class="shop_attributes">
												<tbody>
													<tr>
														<th>Weight</th>
														<td class="product_weight">5.8 kg</td>
													</tr>
													<tr>
														<th>Dimensions</th>
														<td class="product_dimensions">H: 76 cm W: 56 cm D: 52 cm</td>
													</tr>
												</tbody>
											</table>
										</div>
										<div class="woocommerce-Tabs-panel tab-pane" id="tab-reviews" role="tabpanel" aria-labelledby="tab-title-reviews">
											<div class="woocommerce-Reviews" id="reviews">
												<h2>2 review for Reframe Your Viewpoints</h2>
												<div id="comments">
													<div class="comment-list">
														<div class="comment-item">
															<div class="comment-content">
																<img src="images/shop-single-v1-4.jpg" alt="customer">
																<div class="comment-body">
																	<div class="comment-author">
																		<span class="author">Emily Valdez</span>
																		<div class="star-rating">
																			<i class="zmdi zmdi-star"></i>
																			<i class="zmdi zmdi-star"></i>
																			<i class="zmdi zmdi-star"></i>
																			<i class="zmdi zmdi-star"></i>
																			<i class="zmdi zmdi-star-outline"></i>
																		</div>
																	</div>
																	<span class="comment-time">March 28, 2020</span>
																	<p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was.</p>
																</div>
															</div>
														</div>
														<div class="comment-item">
															<div class="comment-content">
																<img src="images/shop-single-v1-5.jpg" alt="customer">
																<div class="comment-body">
																	<div class="comment-author">
																		<span class="author">Emma Hayes</span>
																		<div class="star-rating">
																			<i class="zmdi zmdi-star"></i>
																			<i class="zmdi zmdi-star"></i>
																			<i class="zmdi zmdi-star"></i>
																			<i class="zmdi zmdi-star"></i>
																			<i class="zmdi zmdi-star"></i>
																		</div>
																	</div>
																	<span class="comment-time">March 28, 2020</span>
																	<p>Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain.</p>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div id="review_form_wrapper">
													<div id="review_form">
														<div id="respond" class="comment-respond">
															<form id="commentform" class="comment-form common-form js-contact-form" action="includes/contact-form.php" method="POST">
																<p class="comment-notes">
																	<span>Add a review</span>
																	<span id="email-notes">
																		Your email address will not be published. Required fields are marked
																		<span class="required">*</span>
																	</span>
																</p>
																<div class="comment-form-rating">
																	<label>Your rating</label>
																	<p class="stars">
																		<a href="#" class="star-1"><i class="zmdi zmdi-star-outline"></i></a>
																		<a href="#" class="star-2"><i class="zmdi zmdi-star-outline"></i></a>
																		<a href="#" class="star-3"><i class="zmdi zmdi-star-outline"></i></a>
																		<a href="#" class="star-4"><i class="zmdi zmdi-star-outline"></i></a>
																		<a href="#" class="star-5"><i class="zmdi zmdi-star-outline"></i></a>
																	</p>
																</div>
																<p class="comment-form-author">
																	<input id="author" name="author" type="text" required="" placeholder="Your Name">
																</p>
																<p class="comment-form-email">
																	<input type="email" required="" pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}" name="email" id="email" placeholder="Your Email">
																</p>
																<p class="comment-form-comment">
																	<textarea id="comment" name="comment" required="" placeholder="Write Your Review..."></textarea>
																</p>
																<p class="form-submit">
																	<input name="submit" type="submit" id="submit" class="submit au-btn btn-small" value="Submit">
																	<span><i class="zmdi zmdi-arrow-right"></i></span>
																</p>
															</form>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="related">
							<h2 class="special-heading">Related Products</h2>
							<div class="owl-carousel owl-theme" id="related-products">
								<div class="item">
									<div class="product type-product">
										<div class="woocommerce-LoopProduct-link">
											<div class="product-image">
												<a href="#" class="wp-post-image">
													<img src="images/hp-1-featured-6.jpg" alt="product">
												</a>
												<div class="yith-wcwl-add-button show">
			 										<a href="#" class="add_to_wishlist">
			 											<i class="zmdi zmdi-favorite-outline"></i>
			 										</a>
			 									</div>
			 									<div class="button add_to_cart_button">
			 										<a href="#">
			 											<img src="images/icons/shopping-cart-black-icon.png" alt="cart">
			 										</a>
			 									</div>
												<h5 class="woocommerce-loop-product__title"><a href="#">Laundry Bag</a></h5>
												<span class="price">
													<ins>
														<span class="woocommerce-Price-amount amount">
															<span class="woocommerce-Price-currencySymbol">$</span>
															37
														</span>
													</ins>
												</span>
											</div>
										</div>
									</div>
								</div>
								<div class="item">
									<div class="product type-product">
										<div class="woocommerce-LoopProduct-link">
											<div class="product-image">
												<a href="#" class="wp-post-image">
													<img class="image-cover" src="images/hp-1-featured-7.jpg" alt="product">
													<img class="image-secondary" src="images/hp-1-featured-77.jpg" alt="product">
												</a>
												<a href="#" class="onnew">NEW</a>
												<div class="yith-wcwl-add-button show">
			 										<a href="#" class="add_to_wishlist">
			 											<i class="zmdi zmdi-favorite-outline"></i>
			 										</a>
			 									</div>
			 									<div class="button add_to_cart_button">
			 										<a href="#">
			 											<img src="images/icons/shopping-cart-black-icon.png" alt="cart">
			 										</a>
			 									</div>
												<h5 class="woocommerce-loop-product__title"><a href="#">Hocko Blanket</a></h5>
												<span class="price">
													<ins>
														<span class="woocommerce-Price-amount amount">
															<span class="woocommerce-Price-currencySymbol">$</span>
															42
														</span>
													</ins>
												</span>
											</div>
										</div>
									</div>
								</div>
								<div class="item">
									<div class="product type-product">
										<div class="woocommerce-LoopProduct-link">
											<div class="product-image">
												<a href="#" class="wp-post-image">
													<img class="image-cover" src="images/hp-1-featured-8.jpg" alt="product">
													<img class="image-secondary" src="images/hp-1-featured-88.jpg" alt="product">
												</a>
												<div class="yith-wcwl-add-button show">
			 										<a href="#" class="add_to_wishlist">
			 											<i class="zmdi zmdi-favorite-outline"></i>
			 										</a>
			 									</div>
			 									<div class="button add_to_cart_button">
			 										<a href="#">
			 											<img src="images/icons/shopping-cart-black-icon.png" alt="cart">
			 										</a>
			 									</div>
												<h5 class="woocommerce-loop-product__title"><a href="#">Tweed Armchair</a></h5>
												<span class="price">
													<ins>
														<span class="woocommerce-Price-amount amount">
															<span class="woocommerce-Price-currencySymbol">$</span>
															31
														</span>
													</ins>
												</span>
											</div>
										</div>
									</div>
								</div>
								<div class="item">
									<div class="product type-product">
										<div class="woocommerce-LoopProduct-link">
											<div class="product-image">
												<a href="#" class="wp-post-image">
													<img class="image-cover" src="images/hp-1-featured-9.jpg" alt="product">
													<img class="image-secondary" src="images/hp-1-featured-99.jpg" alt="product">
												</a>
												<a href="#" class="onsale">SALE</a>
												<div class="yith-wcwl-add-button show">
			 										<a href="#" class="add_to_wishlist">
			 											<i class="zmdi zmdi-favorite-outline"></i>
			 										</a>
			 									</div>
			 									<div class="button add_to_cart_button">
			 										<a href="#">
			 											<img src="images/icons/shopping-cart-black-icon.png" alt="cart">
			 										</a>
			 									</div>
												<h5 class="woocommerce-loop-product__title"><a href="#">Low Table/Stool</a></h5>
												<span class="price">
													<del>
														<span class="woocommerce-Price-amount amount">
															<span class="woocommerce-Price-currencySymbol">$</span>
															49
														</span>
													</del>
													<ins>
														<span class="woocommerce-Price-amount amount">
															<span class="woocommerce-Price-currencySymbol">$</span>
															29
														</span>
													</ins>
												</span>
											</div>
										</div>
									</div>
								</div>
								<div class="item">
									<div class="product type-product">
										<div class="woocommerce-LoopProduct-link">
											<div class="product-image">
												<a href="#" class="wp-post-image">
													<img class="image-cover" src="images/hp-1-featured-1.jpg" alt="product">
													<img class="image-secondary" src="images/hp-1-featured-11.jpg" alt="product">
												</a>
												<a href="#" class="onsale">SALE</a>
												<div class="yith-wcwl-add-button show">
			 										<a href="#" class="add_to_wishlist">
			 											<i class="zmdi zmdi-favorite-outline"></i>
			 										</a>
			 									</div>
			 									<div class="button add_to_cart_button">
			 										<a href="#">
			 											<img src="images/icons/shopping-cart-black-icon.png" alt="cart">
			 										</a>
			 									</div>
												<h5 class="woocommerce-loop-product__title"><a href="#">Ta-bl Side Table</a></h5>
												<span class="price">
													<del>
														<span class="woocommerce-Price-amount amount">
															<span class="woocommerce-Price-currencySymbol">$</span>
															35
														</span>
													</del>
													<ins>
														<span class="woocommerce-Price-amount amount">
															<span class="woocommerce-Price-currencySymbol">$</span>
															22
														</span>
													</ins>
												</span>
											</div>
										</div>
									</div>
								</div>
								<div class="item">
									<div class="product type-product">
										<div class="woocommerce-LoopProduct-link">
											<div class="product-image">
												<a href="#" class="wp-post-image">
													<img class="image-cover" src="images/hp-1-featured-5.jpg" alt="product">
													<img class="image-secondary" src="images/hp-1-featured-55.jpg" alt="product">
												</a>
												<div class="yith-wcwl-add-button show">
			 										<a href="#" class="add_to_wishlist">
			 											<i class="zmdi zmdi-favorite-outline"></i>
			 										</a>
			 									</div>
			 									<div class="button add_to_cart_button">
			 										<a href="#">
			 											<img src="images/icons/shopping-cart-black-icon.png" alt="cart">
			 										</a>
			 									</div>
												<h5 class="woocommerce-loop-product__title"><a href="#">Planting Light</a></h5>
												<span class="price">
													<ins>
														<span class="woocommerce-Price-amount amount">
															<span class="woocommerce-Price-currencySymbol">$</span>
															41
														</span>
													</ins>
												</span>
											</div>
										</div>
									</div>
								</div>
								<div class="item">
									<div class="product type-product">
										<div class="woocommerce-LoopProduct-link">
											<div class="product-image">
												<a href="#" class="wp-post-image">
													<img class="image-cover" src="images/hp-1-featured-4.jpg" alt="product">
													<img class="image-secondary" src="images/hp-1-featured-44.jpg" alt="product">
												</a>
												<div class="yith-wcwl-add-button show">
			 										<a href="#" class="add_to_wishlist">
			 											<i class="zmdi zmdi-favorite-outline"></i>
			 										</a>
			 									</div>
			 									<div class="button add_to_cart_button">
			 										<a href="#">
			 											<img src="images/icons/shopping-cart-black-icon.png" alt="cart">
			 										</a>
			 									</div>
												<h5 class="woocommerce-loop-product__title"><a href="#">Elephant Chair</a></h5>
												<span class="price">
													<ins>
														<span class="woocommerce-Price-amount amount">
															<span class="woocommerce-Price-currencySymbol">$</span>
															56
														</span>
													</ins>
												</span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="bestseller">
							<h2 class="special-heading">Bestseller</h2>
							<div class="owl-carousel owl-theme" id="best-seller">
								<div class="item">
									<div class="product type-product">
										<div class="woocommerce-LoopProduct-link">
											<div class="product-image">
												<a href="#" class="wp-post-image">
													<img src="images/hp-1-featured-2.jpg" alt="product">
												</a>
												<div class="yith-wcwl-add-button show">
			 										<a href="#" class="add_to_wishlist">
			 											<i class="zmdi zmdi-favorite-outline"></i>
			 										</a>
			 									</div>
			 									<div class="button add_to_cart_button">
			 										<a href="#">
			 											<img src="images/icons/shopping-cart-black-icon.png" alt="cart">
			 										</a>
			 									</div>
												<h5 class="woocommerce-loop-product__title"><a href="#">Pendant Lamp</a></h5>
												<span class="price">
													<ins>
														<span class="woocommerce-Price-amount amount">
															<span class="woocommerce-Price-currencySymbol">$</span>
															45
														</span>
													</ins>
												</span>
											</div>
										</div>
									</div>
								</div>
								<div class="item">
									<div class="product type-product">
										<div class="woocommerce-LoopProduct-link">
											<div class="product-image">
												<a href="#" class="wp-post-image">
													<img class="image-cover" src="images/hp-1-featured-3.jpg" alt="product">
													<img class="image-secondary" src="images/hp-1-featured-33.jpg" alt="product">
												</a>
												<a href="#" class="onnew">NEW</a>
												<div class="yith-wcwl-add-button show">
			 										<a href="#" class="add_to_wishlist">
			 											<i class="zmdi zmdi-favorite-outline"></i>
			 										</a>
			 									</div>
			 									<div class="button add_to_cart_button">
			 										<a href="#">
			 											<img src="images/icons/shopping-cart-black-icon.png" alt="cart">
			 										</a>
			 									</div>
												<h5 class="woocommerce-loop-product__title"><a href="#">Magnolia Dream</a></h5>
												<span class="price">
													<ins>
														<span class="woocommerce-Price-amount amount">
															<span class="woocommerce-Price-currencySymbol">$</span>
															18
														</span>
													</ins>
												</span>
											</div>
										</div>
									</div>
								</div>
								<div class="item">
									<div class="product type-product">
										<div class="woocommerce-LoopProduct-link">
											<div class="product-image">
												<a href="#" class="wp-post-image">
													<img class="image-cover" src="images/hp-1-featured-4.jpg" alt="product">
													<img class="image-secondary" src="images/hp-1-featured-44.jpg" alt="product">
												</a>
												<div class="yith-wcwl-add-button show">
			 										<a href="#" class="add_to_wishlist">
			 											<i class="zmdi zmdi-favorite-outline"></i>
			 										</a>
			 									</div>
			 									<div class="button add_to_cart_button">
			 										<a href="#">
			 											<img src="images/icons/shopping-cart-black-icon.png" alt="cart">
			 										</a>
			 									</div>
												<h5 class="woocommerce-loop-product__title"><a href="#">Elephant Chair</a></h5>
												<span class="price">
													<ins>
														<span class="woocommerce-Price-amount amount">
															<span class="woocommerce-Price-currencySymbol">$</span>
															56
														</span>
													</ins>
												</span>
											</div>
										</div>
									</div>
								</div>
								<div class="item">
									<div class="product type-product">
										<div class="woocommerce-LoopProduct-link">
											<div class="product-image">
												<a href="#" class="wp-post-image">
													<img class="image-cover" src="images/hp-1-featured-5.jpg" alt="product">
													<img class="image-secondary" src="images/hp-1-featured-55.jpg" alt="product">
												</a>
												<div class="yith-wcwl-add-button show">
			 										<a href="#" class="add_to_wishlist">
			 											<i class="zmdi zmdi-favorite-outline"></i>
			 										</a>
			 									</div>
			 									<div class="button add_to_cart_button">
			 										<a href="#">
			 											<img src="images/icons/shopping-cart-black-icon.png" alt="cart">
			 										</a>
			 									</div>
												<h5 class="woocommerce-loop-product__title"><a href="#">Planting Light</a></h5>
												<span class="price">
													<ins>
														<span class="woocommerce-Price-amount amount">
															<span class="woocommerce-Price-currencySymbol">$</span>
															41
														</span>
													</ins>
												</span>
											</div>
										</div>
									</div>
								</div>
								<div class="item">
									<div class="product type-product">
										<div class="woocommerce-LoopProduct-link">
											<div class="product-image">
												<a href="#" class="wp-post-image">
													<img src="images/hp-1-featured-10.jpg" alt="product">
												</a>
												<a href="#" class="onnew">NEW</a>
												<div class="yith-wcwl-add-button show">
			 										<a href="#" class="add_to_wishlist">
			 											<i class="zmdi zmdi-favorite-outline"></i>
			 										</a>
			 									</div>
			 									<div class="button add_to_cart_button">
			 										<a href="#">
			 											<img src="images/icons/shopping-cart-black-icon.png" alt="cart">
			 										</a>
			 									</div>
												<h5 class="woocommerce-loop-product__title"><a href="#">Cushion Cover</a></h5>
												<span class="price">
													<ins>
														<span class="woocommerce-Price-amount amount">
															<span class="woocommerce-Price-currencySymbol">$</span>
															12
														</span>
													</ins>
												</span>
											</div>
										</div>
									</div>
								</div>
								<div class="item">
									<div class="product type-product">
										<div class="woocommerce-LoopProduct-link">
											<div class="product-image">
												<a href="#" class="wp-post-image">
													<img src="images/hp-1-featured-6.jpg" alt="product">
												</a>
												<div class="yith-wcwl-add-button show">
			 										<a href="#" class="add_to_wishlist">
			 											<i class="zmdi zmdi-favorite-outline"></i>
			 										</a>
			 									</div>
			 									<div class="button add_to_cart_button">
			 										<a href="#">
			 											<img src="images/icons/shopping-cart-black-icon.png" alt="cart">
			 										</a>
			 									</div>
												<h5 class="woocommerce-loop-product__title"><a href="#">Laundry Bag</a></h5>
												<span class="price">
													<ins>
														<span class="woocommerce-Price-amount amount">
															<span class="woocommerce-Price-currencySymbol">$</span>
															37
														</span>
													</ins>
												</span>
											</div>
										</div>
									</div>
								</div>
								<div class="item">
									<div class="product type-product">
										<div class="woocommerce-LoopProduct-link">
											<div class="product-image">
												<a href="#" class="wp-post-image">
													<img class="image-cover" src="images/hp-1-featured-7.jpg" alt="product">
													<img class="image-secondary" src="images/hp-1-featured-77.jpg" alt="product">
												</a>
												<a href="#" class="onnew">NEW</a>
												<div class="yith-wcwl-add-button show">
			 										<a href="#" class="add_to_wishlist">
			 											<i class="zmdi zmdi-favorite-outline"></i>
			 										</a>
			 									</div>
			 									<div class="button add_to_cart_button">
			 										<a href="#">
			 											<img src="images/icons/shopping-cart-black-icon.png" alt="cart">
			 										</a>
			 									</div>
												<h5 class="woocommerce-loop-product__title"><a href="#">Hocko Blanket</a></h5>
												<span class="price">
													<ins>
														<span class="woocommerce-Price-amount amount">
															<span class="woocommerce-Price-currencySymbol">$</span>
															42
														</span>
													</ins>
												</span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End Shop Section -->
	</div>
	
@endsection