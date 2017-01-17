<nav class="main-menu" role="navigation">
    <?php 
			$menuArgs = array(
						'theme_location'  => 'primary',
						'menu'            => '',
						'container'       => 'div',
						'container_class' => '',
						'container_id'    => '',
						'menu_class'      => 'menu',
						'menu_id'         => '',
						'depth'           => 2,
						'walker'          => false
					); 
					
			wp_nav_menu( $menuArgs );
		
		?>
</nav>