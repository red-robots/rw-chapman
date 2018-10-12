<?php
/**
* Template Name: Products
*/

get_header(); ?>

	<div id="primary" class="site-content">
		<div id="content" role="main">
			<div class="entry-content">
				<h1><?php the_title(); ?></h1>
			</div><!-- entry content -->
			<?php while ( have_posts() ) : the_post(); ?>
				<div class="entry-content">
					<?php the_content(); ?>
				</div><!-- entry content -->	
			<?php endwhile; wp_reset_postdata(); // end of the loop.  ?>
		</div><!-- #content -->
	</div><!-- #primary -->

	<div class="widget-area">
		<?php get_template_part('inc/rw-search'); ?>
	</div><!-- widget area -->

<div class="clear"></div>
<?php
$wp_query = new WP_Query();
$wp_query->query(array(
	'post_type'=>'product_descriptor',
	'posts_per_page' => -1,
	'paged' => $paged,
	'orderby' => 'title',
	'order' => 'asc'
));
if ($wp_query->have_posts()) : ?>
	<div class="entry-content">
		<h3 class="associated">Products We Sell</h3>
		<ul class="product-list-full">
			<?php while ($wp_query->have_posts()) : $wp_query->the_post(); 
					
					$hide = get_field('hide');
					if( $hide ) {
						$hide = $hide[0];
					}
			?>
				<?php if( $hide != 'hide') : ?> 
					<li><a class="blocks" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
				<?php endif; ?>
			<?php endwhile; ?> 
		</ul>
	</div><!-- .content content -->
<?php endif;

 get_footer();