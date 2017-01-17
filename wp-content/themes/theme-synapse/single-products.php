<?php get_header(); ?>

<div class="main content">
	
	<!-- PRODUCTS MAIN SLIDER -->
	<section class="home-banner">
		<div id="product-carousel" class="carousel slide" data-ride="carousel" data-interval="false">
			<div class="carousel-inner">
				<?php $productsArgs = array(
							'post_type' => 'products',
							'posts_per_page' => -1,
							'orderby' => 'menu'
						); 
						
						$productsBanner = get_posts( $productsArgs );
						$currentProduct = get_queried_object(); 
				?>
			
				<!-- SLIDES -->
				<?php foreach( $productsBanner as $productSlider ) :
						$slideImage = get_field('product_slide_image', $productSlider->ID);
					?>
					<div class="item <?php echo ( $productSlider->ID == $currentProduct->ID ) ? 'active' : ''; ?>">
						<a href="<?php echo  get_the_permalink( $productSlider->ID ); ?>">
							<img src="<?php echo $slideImage['url']; ?>" alt="<?php echo $slideImage['alt']; ?>">
							<div class="homeslide-caption">
								<h3 class="homeslide-title text-uppercase"><?php echo get_field('product_slide_title', $productSlider->ID) ?></h3>
								<p class="homeslide-tagline text-uppercase"><?php echo get_field('product_slide_tagline', $productSlider->ID); ?></p>
								<?php echo get_field('product_slide_description', $productSlider->ID); ?>
							</div>
						</a>
					</div>
				<?php endforeach; ?>
				<!-- //SLIDES -->
				
				<!-- SLIDE INDICATOR -->
				<?php 
					$slideCount = count( $productsBanner );
					if( $slideCount > 1 ) :
						$si = 0;
				?>
				<div class="indicator-holder">
					<ol class="carousel-indicators">
						<?php foreach( $productsBanner as $productSlide ) : ?>
							<li data-target="#product-carousel" data-slide-to="<?php echo $si; ?>" <?php echo ( $productSlide->ID == $currentProduct->ID ) ? 'class="active"' : ''; ?> data-url="<?php echo get_the_permalink( $productSlide->ID ); ?>" ></li>
						<?php $si++; endforeach; ?>
					</ol>
				</div>
				<?php endif; ?>
				<!-- //SLIDE INDICATOR -->
				
			</div>
		</div>
	</section>
	<!-- //PRODUCTS MAIN SLIDER -->
	
	<!-- PRODUCT DETAILS -->
	<?php if( get_field('product_details') ) : ?>
		<section class="product-details">
			<?php foreach(get_field('product_details') as $productDetail ) : ?>
				<div class="product-detail">
					<div class="container">
						<div class="row">
							<div class="col-xs-12">
								<div class="icon-container text-center">
									<img src="<?php echo $productDetail['product_detail_icon']['url']; ?>" alt="<?php echo $productDetail['product_detail_icon']['alt']; ?>">
								</div>
								<h3 class="title text-uppercase text-center" style="color: <?php echo $productDetail['product_detail_title_color']; ?>;">
									<?php echo $productDetail['product_detail_title']; ?> 
									<span class="title-border" style="border: 2px solid <?php echo $productDetail['product_detail_title_color']; ?>;"></span>
								</h3>
								<?php echo $productDetail['product_detail_content']; ?>
							</div>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</section>
	<?php endif; ?>
	<!-- //PRODUCT DETAILS -->
	
	<!-- SLIDE PRODUCTS-->
	<section class="slide-products-list" <?php echo ( get_field('product_details') ) ? 'style="margin-top: -16px;"' : ''; ?> >
		<div>
			<ul class="slide-products inline-block clearfix">
				<?php
					$products = get_posts( $productsArgs ); 
					
					foreach( $products as $product ) : 
				?>
					<li class="item item-<?php echo $product->ID; ?> <?php echo ( $currentProduct->ID == $product->ID ) ? 'active' : ''; ?> col-xs-12 col-sm-4 text-center" >
						<div class="item-triangle"></div>
						<a rel="nofollow" href="<?php echo get_the_permalink($product->ID); ?>">
							<div class="item-container">
								<h3 class="text-uppercase item-title text-uppercase"><?php echo $product->post_title; ?></h3>
								<p class="item-tagline itc-bold"><?php the_field('product_slide_tagline', $product->ID); ?></p>
							</div>
						</a>
						<div class="item-color">
						</div>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
	</section>
	<!-- //SLIDE PRODUCTS -->

</div>

<?php get_footer(); ?>