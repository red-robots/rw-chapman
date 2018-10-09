<?php get_header(); ?>

	<div id="primary">
    
	<?php
	$wp_query = new WP_Query();
	$wp_query->query(array(
	'post_type'=>'page',
	'page_id' => 33, // homepage id
));
	if ($wp_query->have_posts()) : ?>
    <?php while ($wp_query->have_posts()) : ?>
        
    <?php $wp_query->the_post(); ?><div id="banner">
    
     <?php // Get acf field Name
        $banner = get_field('banner' ); 
        $url = $banner['url'];
        $title = $banner['title'];
        $alt = $banner['alt'];
     	// which size?
        $size = 'large';
        $bannerimage = $banner['sizes'][ $size ];
        ?>
        	<div id="banner-inside" style="background-image: url(<?php echo $bannerimage; ?>);">
        	<h2>Nobody Sells Like We Do.</h2>
      		<p>Results-Driven, Manufacturer Sales Representation serving the Mid-Atlantic Region since 1959.</p>
			
       
            
            </div><!-- #banner inside -->
		</div><!-- #banner -->
        
<?php endwhile; endif; wp_reset_postdata();  ?>
        
<div id="box-container">	
    <?php 
		// loop through terms of the Markets Taxonomy
		$getArgs = array(
		'parent'       => 0,
		'order' => 'DESC',
		'orderby' => 'count',
   		'hide_empty'    => false,
        'exclude' => array(5, 6)
		);
		// get the taxonomy we are going to loop through. 
		$taxonomy = get_terms('markets', $getArgs);
        // echo '<pre>';
        // print_r($taxonomy);
        // echo '</pre>';
			
	// Start the loop through the terms
	foreach ($taxonomy as $term) { 
          
 		// Get term link
	    $term_link = get_term_link( $term );
		
		// Get acf field Name
        $image = get_field('market_image', $term ); 
        $url = $image['url'];
        $title = $image['title'];
        $alt = $image['alt'];
     	// which size?
        $size = 'large';
        $thumb = $image['sizes'][ $size ];
        ?>
      
        <div class="boxes-home">
        	<a href="<?php echo $term_link; ?>">
        		<div class="box-trigger"></div><!-- box overlay -->
                <div class="box-overlay"></div><!-- box overlay -->
                <div class="box-title"><?php echo $term->name; ?></div>
        		
            	<img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" title="<?php echo $title; ?>" />
            </a>
        </div><!-- boxes -->
            
<?php } // end foreach ?>
            
</div><!-- box container -->



<div id="content-area">

    <div class="site-content">
    	<?php
		$wp_query = new WP_Query();
		$wp_query->query(array(
		'post_type'=>'page',
		'page_id' => 33, // homepage 
			));
		if ($wp_query->have_posts()) : ?>
		<?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>

        <div class="entry-content">
            <h2><?php the_field('title'); ?></h2>
            <?php the_content(); ?>
            
            <div class="blue-arrow"><a href="<?php bloginfo('url'); ?>/company-overview">Read more</a></div>
            
        </div><!-- entry content -->
        
        <?php endwhile; endif; wp_reset_postdata(); ?>
    </div><!-- site - conent -->
    
</div><!-- content area -->
        
	</div><!-- #primary -->

<div class="widget-area-home">
	<?php get_template_part('inc/rw-search'); ?>
    <div id="homepush"></div>
    <?php get_template_part('inc/side-news-feed'); ?>
</div><!-- widget area --> 

<?php get_footer(); ?>