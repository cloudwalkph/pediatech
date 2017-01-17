<?php get_header(); ?>
<div id="main">
	<div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-9 content">
				<?php
                if (have_posts()) : while (have_posts()) : the_post();
                        the_content(); 
                    endwhile;
                endif;
                ?>
            </div>
            <aside class="col-xs-12 col-sm-3 sidebar">
                 <?php dynamic_sidebar('sidebar-default'); ?>
            </aside>
        </div>
    </div>
</div>
<?php get_footer(); ?>