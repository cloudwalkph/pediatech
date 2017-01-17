<?php get_header(); ?>

<div class="main">

	<!-- MAIN CONTENT -->
	<?php $postVar = get_queried_object(); 
		if( $postVar->post_content != "" ) :
	?>
	<section class="main content">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<?php while( have_posts() ) : the_post(); ?>
					<?php the_content(); ?>
				<?php endwhile; ?>
				</div>
			</div>
		</div>
	</section>
	<?php endif; ?>
	<!-- //MAIN CONTENT -->
	
	<!-- CONTENT AREAS -->
	<?php 
		if( get_field('content_area') ) : $cont = 1;
			foreach( get_field('content_area') as $ca ) :
			$bg = "";
			if( $ca['ca_background'] == "color" ) {
				$bg = 'style="background:'.$ca['ca_background_color'].'"';
			}
			elseif ( $ca['ca_background'] == "image" ) {
				$bg = 'style="background-image:url('.$ca['ca_background_image'].')"';
			}
	?>
		<section class="content-area-<?php echo $cont; ?> bg-img <?php echo ( $ca['ca_background'] == "default" ) ? 'ca-default' : ''; ?>" <?php echo $bg; ?>>
			<div class="container">
				<div class="row">
					<div class="col-xs-12">
						<?php echo $ca['ca_content']; ?>
					</div>
				</div>
			</div>
		</section>
	<?php 
				$cont++;
			endforeach;
		endif; 	
	?>
	<!-- //CONTENT AREAS -->

</div>

<?php get_footer(); ?>