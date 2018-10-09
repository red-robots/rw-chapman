<?php
/**
 * Product Search
 */

get_header(); ?>


	<section id="primary" class="site-content">
		<div id="content" role="main">
<?php
if (have_posts()) : ?>

			<header class="page-header">
				<h1 class="page-title">
				<?php printf( __( 'Search Results for: %s', 'twentytwelve' ), '<span>' . get_search_query() . '</span>' ); ?>
                </h1>
			</header>

<?php while (have_posts()) :  the_post(); 

	$hide = get_field('hide');
    if( $hide ) {
        $hide = $hide[0];
    }

                    ?>	
        <?php if( $hide != 'hide') : ?>    
			<div class="post">
		        <div class="entry-content">
		            <h2><?php the_title(); ?></h2>
		               <div class="entry-summary">
							<?php the_excerpt(); ?>
						</div><!-- .entry-summary -->
		             <div class="blue-arrow"><a href="<?php the_permalink(); ?>">Read more</a></div>
		       </div><!-- .entry-content -->
	       </div><!-- .post -->
	   <?php endif; ?>
                
			<?php endwhile; ?>
<div class="clear"></div>
    <?php pagi_posts_nav(); ?>
		<?php else : ?>

			<article id="post-0" class="post no-results not-found">
				<header class="entry-header">
					<h1 class="entry-title"><?php _e( 'Nothing Found', 'twentytwelve' ); ?></h1>
				</header>

				<div class="entry-content">
					<p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'twentytwelve' ); ?></p>
					
					<?php get_template_part('inc/rw-search'); ?>
                    
				</div><!-- .entry-content -->
			</article><!-- #post-0 -->

		<?php endif; ?>

		</div><!-- #content -->
	</section><!-- #primary -->

<div class="widget-area">
	<?php get_template_part('inc/rw-search'); ?>
    <?php get_template_part('inc/side-news-feed'); ?>
</div><!-- widget area -->

<?php get_footer(); ?>