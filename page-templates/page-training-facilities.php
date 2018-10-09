<?php
/**
 * Template Name: Training Facilities
 */

get_header(); ?>

	<div id="primary" class="site-content">
		<div id="content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>
				
				<div class="entry-content">
                	<h1><?php the_title(); ?></h1>
                    <?php the_content(); ?>
                    
                 
                    
                    
                </div><!-- entry content -->
                
			<?php endwhile; // end of the loop. ?>
            <?php wp_reset_postdata(); ?>
            
            <div class="clear"></div>
            
            <div class="entry-content">
            <h2>Training Opportunities</h2>
            </div><!-- entry content -->
            
<?php
	$wp_query = new WP_Query();
	$wp_query->query(array(
	'post_type'=>'post',
	'posts_per_page' => 10,
	'paged' => $paged,
	'tax_query' => array(
		array(
			'taxonomy' => 'post_tag', // your custom taxonomy
			'field' => 'slug',
			'terms' => array( 'training' ) // the terms (categories) you created
		)
	)
));
	if ($wp_query->have_posts()) : ?>
    <div class="entry-content">
    <ul>
    <?php while ($wp_query->have_posts()) : ?>
        
    <?php $wp_query->the_post(); ?>
    
    <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>	
    
    <?php endwhile; ?>
    </ul>
    </div><!-- entry content -->
    
    <?php endif; ?>
    

		</div><!-- #content -->
	</div><!-- #primary -->
    
 <div class="widget-area">
	<?php get_template_part('inc/rw-search'); ?>
</div><!-- widget area -->

<?php //get_sidebar(); ?>
<?php get_footer(); ?>