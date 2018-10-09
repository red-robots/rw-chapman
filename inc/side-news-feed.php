<?php wp_reset_postdata(); ?>
 
 <div class="side-border">
    <?php
		$wp_query = new WP_Query();
		$wp_query->query(array(
		'post_type'=>'post',
		'posts_per_page' => 2, // homepage 
			));
		if ($wp_query->have_posts()) : ?>
        
        <div class="entry-content">
        	<h2>News</h2>
        </div><!-- entry content -->
        
		<?php while ($wp_query->have_posts()) : ?>
		<?php $wp_query->the_post(); ?>
        
        <div class="home-post">
            
        	<div class="home-post-date"><?php echo get_the_date('m.d.y'); ?></div>
            <div class="entry-content">
            <?php echo get_excerpt(100); ?>
            <div class="homereadmore"><a href="<?php the_permalink(); ?>">Read more</a></div>
            </div><!-- entry content -->
        </div><!-- home post -->
        
        <?php endwhile; ?> 
        <div class="blue-arrow"><a href="<?php bloginfo('url'); ?>/news">Read more</a></div>
		<?php endif; ?>
    </div><!-- content-right -->
    
<?php wp_reset_postdata(); ?>