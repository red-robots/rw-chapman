<?php
/**
 * Template Name: Sitemap
 */

get_header(); ?>

	<div id="primary" class="site-content">
		<div id="content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>
				
				<div class="entry-content">
                	<h1><?php the_title(); ?></h1>
                    <?php the_content(); ?>
                    <?php wp_nav_menu( array( 'theme_location' => 'sitemap' ) ); ?>
                </div><!-- entry content -->
                
			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>