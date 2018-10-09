<?php
/**
 * The Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */

get_header(); ?>

	<div id="primary" class="site-content">
		<div id="content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<div class="entry-content">
                	<h1><?php the_title(); ?></h1>
                		<?php the_content(); ?>
                        <footer class="entry-meta">
			<?php  
$args = array( 'hide_empty=0' );

$terms = get_terms( 'post_tag', $args );
if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
    $count = count( $terms );
    $i = 0;
    $term_list = '<p class="my_term-archive">Tagged: ';
    foreach ( $terms as $term ) {
        $i++;
    	$term_list .= '<a href="' . get_term_link( $term ) . '" title="' . sprintf( __( 'View all post filed under %s', 'my_localization_domain' ), $term->name ) . '">' . $term->name . '</a>';
    	if ( $count != $i ) {
            $term_list .= ' &middot; ';
        }
        else {
            $term_list .= '</p>';
        }
    }
    echo $term_list;
}?>
            </footer>
                </div><!-- entry content -->

			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>