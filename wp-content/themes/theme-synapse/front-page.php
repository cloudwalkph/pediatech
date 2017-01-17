<?php get_header(); ?>

<div id="main" class="main">
	
	<?php if( have_posts() ) : ?>
		<section class="content">
			<div class="container">
				<div class="row">
					<div class="col-xs-12">
						<?php 
							while( have_posts() ) : the_post(); 
							the_content();
							endwhile; 
						?>
					</div>
				</div>
			</div>
		</section>
	<?php endif; ?>
	
	<!-- ROUND ABOUT SLIDER -->
	<?php if( get_field('round_about_slider') ) : ?>
		<section class="round-about">
			<div class="container">
				<div class="roundabout-wrapper">
					<div class="row">
						<div class="col-xs-12 text-center">
							<hr>
								<p class="roundabout-tagline">How do we deliver this promise?</p>
							
							<ul class="roundabout-list list-unstyled">
								<?php foreach( get_field('round_about_slider') as $raSlider ) : ?>
									<li>
										<?php
											$raImg = $raSlider['round_about_image'];
											$newRAImg = wp_get_attachment_image_src( $raImg, array(410, 360), true );
											$raImgAlt = get_post_meta($raImg, '_wp_attachment_image_alt', true);
										?>
										<img class="img-responsive" src="<?php echo $newRAImg[0]; ?>" alt="<?php echo $raImgAlt; ?>" >
										<div class="roundabout-content">
											<h4 class="roundabout-title"><?php echo $raSlider['round_about_title'] ?></h4>
											<p class="roundabout-desc"><?php echo $raSlider['round_about_description']; ?></p>
										</div>
										<div class="slide-indicator"></div>
									</li>
								<?php endforeach; ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<img class="roundabout-loader" src="<?php bloginfo('template_directory'); ?>/images/loader.gif" alt="loading">
		</section>
	<?php endif; ?>
	<!-- //ROUND ABOUT SLIDER -->
	
</div>

<?php get_footer(); ?>