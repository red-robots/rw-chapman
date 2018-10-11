<?php
/**
 * Markets Search
 */

get_header(); ?>

<?php 
// get what we're searching for
$searchRequest = $_REQUEST['s'];
$new_text = str_replace('&', '&amp;', $searchRequest);


$args = array(
    'search' => $new_text,
	'hide_empty' => 0, // false, show empties
); 
$taxonomy = 'markets';
$termsResult = get_terms($taxonomy, $args);
?>

	<section id="primary" class="site-content">
		<div id="content" role="main">


			<header class="page-header">
				<h1 class="page-title">
                <?php 
				
			/*	echo '<pre>';
					print_r($termsResult); 
				echo '</pre>'; */
				
				?>
				<?php printf( __( 'Search Results for: %s', 'twentytwelve' ), '<span>' . get_search_query() . '</span>' ); ?>
                </h1>
			</header>

<?php //if ( !$wp_query->post_count == 1 or !$wp_query->post_count == 0 && ! is_wp_error( $termsResult ) ) : ?>
<?php if ( !empty($termsResult)) : ?>
	<?php  foreach ( $termsResult as $term ) { 

		$hide = get_field('hide', $term);
		if( $hide ) {
			$hide = $hide[0];
		}

		?>
    
	<?php if( $hide != 'hide') : ?> 
	  	<div class="post">
	       	  <div class="entry-content">
	            <h2><?php echo $term->name ?></h2>
	            <?php echo term_description( $term->term_id, $taxonomy ) ?>
	            <div class="blue-arrow"><a href="<?php echo get_term_link( $term ); ?>">Read more</a></div>
	         </div><!-- entry-content -->   
	     </div><!-- post -->
    <?php endif; ?>

     
<?php }  // end foreach  ?>

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