<?php 

/*
	Template Name: Technologies
*/

get_header(); 
?>

<div class="main content">
	
	
	<!-- TECHNOLOGIES -->
	<div class="tech-wrapper">
	<?php $techCount = 0; foreach( get_field('technologies') as $tech ) : ?>
		<?php
			$techSlug = sanitize_title( $tech['tech_section_slug_name'] );
		?>
		<section class="tech" id="<?php echo $techSlug; ?>">
			<div class="container">
				<div class="row">
					<div class="col-xs-12">
						<div class="tech-heading">
							<?php if( $tech['featured_image_position'] == "right" ) : ?>
								
								<?php if( $techCount == 0 ) : ?>
									<h1 class="text-center avenir-heavy"><?php echo $tech['tech_title']; ?></h1>
								<?php else : ?>
									<h2 class="text-center avenir-heavy"><?php echo $tech['tech_title']; ?></h2>
								<?php endif;?>
								<img class="tech-feat right img-responsive" src="<?php echo $tech['tech_featured_image']['url']; ?>" alt="<?php echo $tech['tech_featured_image']['alt']; ?>" />
								
							<?php else : ?>
							
								<img class="tech-feat left img-responsive" src="<?php echo $tech['tech_featured_image']['url']; ?>" alt="<?php echo $tech['tech_featured_image']['alt']; ?>" />
								<?php if( $techCount == 0 ) : ?>
									<h1 class="text-center avenir-heavy"><?php echo $tech['tech_title']; ?></h1>
								<?php else : ?>
									<h2 class="text-center avenir-heavy"><?php echo $tech['tech_title']; ?></h2>
								<?php endif;?>
							
							<?php endif; ?>
						</div>

						<?php echo $tech['tech_content']; ?>
					</div>
				</div>
			</div>
		</section>
	<?php $techCount++; endforeach; ?>
	</div>
	<!-- //TECHNOLOGIES -->

</div>

<?php get_footer(); ?>