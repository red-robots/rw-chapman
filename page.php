<?php
/**
 * Default template
 */

get_header(); ?>

	<div id="primary" class="site-content">
		<div id="content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>
				
				<div class="entry-content">
                	<h1><?php the_title(); ?></h1>
                    <?php the_content(); ?>
                    
                    <?php if(is_page('13')) : ?>
                    	<div id="call-to-action">
                   <!-- <div class="order-info">INTERESTED IN REPRESENTATION?</div>-->
                    <div class="contact-cta">Contact Us</div>
                    <div class="blue-arrow"><a href="<?php bloginfo("url"); ?>/contact-us/">Contact Us/a></div>
                </div><!-- call to action -->
                    
                    <?php endif; ?>
                    
                    
                </div><!-- entry content -->
                
			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->
    
 <div class="widget-area">
	<?php get_template_part('inc/rw-search'); ?>
</div><!-- widget area -->

<?php //get_sidebar(); ?>
<?php get_footer(); ?>