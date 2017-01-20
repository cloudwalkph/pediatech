				<footer id="footer" class="footer">
					<div class="footer-top">
						<div class="container">
							<div class="row">
								<div class="col-xs-12 col-sm-4 text-center copyright-text">
									<?php if( get_field('copyright', 'options') ) : ?>
										<?php the_field('copyright', 'options'); ?>
									<?php endif; ?>
								</div>
                                <div class="col-xs-12 col-sm-4 text-center">
                                    <?php
                                    if( get_field('footer_logo', 'options') ) :
                                        $footerLogo = get_field('footer_logo', 'options');
                                        $newFooterLogo = wp_get_attachment_image_src($footerLogo, 'footer-logo-thumb', true);
                                        $footerLogoAlt = get_post_meta($footerLogo, '_wp_attachment_image_alt', true );
                                        ?>
                                        <a href="<?php bloginfo('url'); ?>" rel="nofollow"><img src="/wp-content/uploads/2017/01/logo-pedia1.png" alt="<?php echo $footerLogoAlt; ?>"></a>
                                    <?php endif; ?>
                                </div>
								<div class="col-xs-12 col-sm-4 right-content">
									<div class="footer-right-content">
										<?php if( get_field('right_content', 'options') ) : ?>
											<?php the_field('right_content', 'options'); ?>
										<?php endif; ?>
										
										<?php if( get_field('social_accounts', 'options') ) : ?>
											<ul class="social-media list-inline text-center">
												<?php foreach( get_field('social_accounts', 'options') as $socialMedia ) : ?>
													<li>
														<a target="_blank" href="<?php echo $socialMedia['link']; ?>" rel="nofollow">
															<img src="<?php echo $socialMedia['icon']['url']?>" alt="<?php //echo $socialMedia['icon']['alt']; ?>" >
														</a>
													</li>
												<?php endforeach; ?>
											</ul>
										<?php endif; ?>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					<!--<div class="footer-bottom">
						<div class="container">
							<div class="row">
								<div class="col-xs-12 text-center copyright-text">
									<?php /*if( get_field('copyright', 'options') ) : */?>
										<?php /*the_field('copyright', 'options'); */?>
									<?php /*endif; */?>
								</div>
							</div>
						</div>
					</div>-->
				</footer>
			<?php wp_footer();?>
		</div>
		<div class="bck-to-top"></div>
	

</body></html>

