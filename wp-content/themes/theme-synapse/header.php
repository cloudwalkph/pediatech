<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        
        <title><?php wp_title( '|', true, 'right' ); ?></title>
    
        <meta name="description" content="<?php if ( is_single() ) {
            single_post_title('', true); 
            } else {
                bloginfo('name'); echo " - "; bloginfo('description');
            }
            ?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
		
		<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/synex-logo.ico" />

        <?php wp_head(); ?>

	<style>
		body {
    		background: transparent url("http://webdesignph.net/synex/wp-content/uploads/2015/07/Synex-Footer-Image.png") no-repeat fixed center bottom / 100% auto;
    		color: #585858;
    		font-family: "nunito-light","avenir-light","Arial","sans-serif ITC-regular;"
    		font-weight: normal;
    		font-size: 18px;
    		line-height: 30px;
    		min-width: 320px;
    		overflow-x: hidden;
		}

.home-banner .homeslide-title, .home-banner .homeslide-tagline, .home-banner .homeslide-caption p, .home-banner .homeslide-caption .btn {
    color: #636363;
}


.home-banner .homeslide-caption .btn {
    border: 5px solid #636363;
}

.menu-item{
	font-size: 15px !important;
}

.header {
    padding: 5px 0px;
}

.header .logo img {
	height: 125px;
}
.bg-img{
	height: 600px;
}
a{
	font-family: ITC-regular;
}

	</style>

</head>
    <body <?php body_class(); ?>>
    <!--[if lt IE 7]>
        <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
	
	<!-- SIDEPANEL -->
	<div class="sidepanel">
		<header class="header clearfix">Menu <span class="glyphicon glyphicon-chevron-right toggle-mobile-menu"></span></header>
		<button class="bck-to-menu">«&nbsp;Main Menu</button>
		<?php get_template_part('inc/nav'); ?>
		<div class="custom-submenu"></div>
	</div>
	<!-- //SIDEPANEL -->
	<!-- MAIN PANEL -->
	<div class="mainpanel">
		<!-- HEADER -->
		<header	id="header" class="header bg-accent-1">
				<div class="container">
					<div class="row">
						<!-- LOGO -->
						<div class="col-xs-12 col-sm-3 logo">
							<?php 
								if( get_field('logo', 'options') ) : 
								$logo = get_field('logo', 'options');
								$newLogo = wp_get_attachment_image_src($logo, 'logo', true);
								$logoAlt = get_post_meta($logo, '_wp_attachment_image_alt', true);
							?>
								<a href="/"><img class="img-responsive" src="<?php echo $newLogo[0]; ?>" rel="nofollow" alt="<?php echo $logoAlt; ?>" ></a>
							<?php endif; ?>
						</div>
						<!-- //LOGO -->

						<!-- MAIN MENU -->
						<div class="col-xs-12 col-sm-9 menu-wrapper">
							<div class="hidden-xs visible-sm visible-md visible-lg menu-container">
								<?php get_template_part('inc/nav'); ?>
							</div>
							
							<div class="visible-xs hidden-sm mobile-menu">
								<div class="mobile-menu-btn">
									<span></span>
									<span></span>
									<span></span>
								</div>
							</div>
						</div>
						<!-- //MAIN MENU -->
					</div>
				</div>
		</header>
		<!-- //HEADER -->

	<!-- HOME BANNER -->
	<?php if( is_front_page() ) : ?>
		<?php if( get_field('home_slider') ) : ?>
			<section class="home-banner">
				<div id="homepage-carousel" class="carousel slide" data-ride="carousel" data-interval="false">
					<div class="carousel-inner">
						<!-- SLIDES -->
						<?php $item = 0; foreach( get_field('home_slider') as $homeSlide ) : ?>
							<div class="item <?php echo ( $item == 0 ) ? 'active' : ''; ?>">
								<img src="<?php echo $homeSlide['home_slide_image']['url']; ?>" alt="<?php echo $homeSlide['home_slide_image']['alt']; ?>">
								<div class="homeslide-caption">
									<h3 class="homeslide-title text-uppercase"><?php echo $homeSlide['home_slide_title']; ?></h3>
									<p class="homeslide-tagline"><?php echo $homeSlide['home_slide_tagline']; ?></p>
									<?php echo $homeSlide['home_slide_content']; ?>
									<a class="btn" href="http://synextech.info/about-us-2/" rel="nofollow">Learn More</a>
								</div>
							</div>
						<?php $item++; endforeach; ?>
						<!-- //SLIDES -->
						
						<!-- LEFT & RIGHT CONTROLS -->
						<?php 
							$slideCount = count( get_field('home_slider') );
							if( $slideCount > 1 ) : 
						?>
						<a class="left carousel-control" href="#homepage-carousel" role="button" data-slide="prev">
							<span class="slide-prev" aria-hidden="true"></span>
							<span class="sr-only">Previous</span>
						</a>
						<a class="right carousel-control" href="#homepage-carousel" role="button" data-slide="next">
							<span class="slide-next" aria-hidden="true"></span>
							<span class="sr-only">Next</span>
						</a>
						<?php endif; ?>
						<!-- //LEFT & RIGHT CONTROLS -->
						
					</div>
				</div>
			</section>
		<?php endif; ?>
	<?php endif; ?>
	<!-- HOME BANNER -->
