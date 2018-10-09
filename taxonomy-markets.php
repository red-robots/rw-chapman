<?php
/**
 * Template for displaying the Markets
 */

get_header(); ?>

	<div id="primary" class="site-content">
		<div id="content" role="main">

<?php 
// get some info about the term queried
$queried_object = get_queried_object(); 
$taxonomy = $queried_object->taxonomy;
$term_id = $queried_object->term_id; 
?>

<div class="entry-content">
	<h1><?php echo get_queried_object()->name; ?></h1>
    <?php echo term_description( $term_id, $taxonomy ) ?> 
</div><!-- entry content -->

 
<?php
$current_query = $wp_query->query_vars;

	$wp_query = new WP_Query();
	$wp_query->query(array(
	'post_type'=>'product_descriptor',
	'posts_per_page' => -1,
	'paged' => $paged,
	$current_query['taxonomy'] => $current_query['term'],
	'orderby' => 'title',
	'order' => 'asc'
));
if ($wp_query->have_posts()) : ?>

    <div class="entry-content">
    <h3 class="associated">Associated Products</h3>
    
		<ul class="product-list">
			<?php while ($wp_query->have_posts()) :  $wp_query->the_post(); 

                    $hide = get_field('hide');
                    if( $hide ) {
                        $hide = $hide[0];
                    }

            ?>	
            
            		<?php if( $hide != 'hide') : ?>
                        <li>
                            <a class="blocks" href="<?php the_permalink(); ?>">
                                <?php the_title(); ?>
                            </a>
                        </li>
                    <?php endif; ?>
            
            <?php endwhile; ?>
       </ul>
    </div><!-- entry content -->
            <?php endif; // end of the loop. ?>

		
 <div id="call-to-action">
    <div class="entry-content">
    	<?php the_field("market_call_to_action", "option"); ?>
    </div><!-- entry content -->
    <div class="order-info">INTERESTED IN REPRESENTATION?</div>
    <div class="contact-cta">LET US WORK FOR YOU</div>
    <div class="blue-arrow"><a href="<?php the_field("market_call_to_action_link", "option"); ?>">Read more</a></div>
</div><!-- call to action -->  
        
        
        </div><!-- #content -->
	</div><!-- #primary -->
    
<div class="widget-area">
	<?php get_template_part('inc/linecard'); ?>
    <?php get_template_part('inc/submarkets'); ?>
</div><!-- widget area -->

<?php get_footer(); ?>