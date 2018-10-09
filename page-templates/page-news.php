<?php
/**
 * Template Name: News
 */

get_header(); ?>

	<div id="primary" class="site-content">
		<div id="content" role="main">
        <div class="entry-content">
        	<h1><?php the_title(); ?></h1>
        </div><!-- entry content -->
      
            
            
   <?php
	$wp_query = new WP_Query();
	$wp_query->query(array(
	'post_type'=>'post',
	'posts_per_page' => 10,
	'paged' => $paged,
));
if ($wp_query->have_posts()) : ?>

    <div class="entry-content">
<?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>

	<div class="post">
    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    	<?php the_excerpt(); ?>
        <div class="blue-arrow"><a href="<?php the_permalink(); ?>">Read more</a></div>
    </div><!-- post -->

<?php endwhile; ?> 
	<div class="clear"></div>
    <?php pagi_posts_nav(); ?>
</div><!-- .content content -->
<?php endif; ?>


		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>