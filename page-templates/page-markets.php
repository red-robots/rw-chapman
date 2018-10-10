<?php
/**
 * Template Name: Markets
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
            
            
            
      <div id="box-container-page">
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
      
        <div class="boxes">
        	<a href="<?php echo $term_link; ?>">
        		<div class="box-trigger"></div><!-- box overlay -->
                <div class="box-overlay"></div><!-- box overlay -->
                <div class="box-title"><?php echo $term->name; ?></div>
        		
            	<img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" title="<?php echo $title; ?>" />
            </a>
        </div><!-- boxes -->
            
<?php } // end foreach ?>
	</div><!-- box container page -->
            
            
            
            
            
            
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
	<?php get_template_part('inc/rw-search'); ?>
    <?php get_template_part('inc/side-news-feed'); ?>
</div><!-- widget area -->

<?php get_footer(); ?>