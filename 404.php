<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>

	<div id="primary" class="site-content">
		<div id="content" role="main">

			<article id="post-0" class="post error404 no-results not-found">
				<header class="entry-header">
					<h1 class="entry-title"><?php _e( '404 Page not found', 'twentytwelve' ); ?></h1>
                    
				</header>

				<div class="entry-content">
                <p>Welcome to our new site. We’re sorry. The page you are looking for cannot be found. Please use the links below to browse our site.</p>
					<?php wp_nav_menu( array( 'theme_location' => 'sitemap' ) ); ?>
				</div><!-- .entry-content -->
			</article><!-- #post-0 -->

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>