<?php
/**
 * The template Manufactors
 */

get_header(); ?>

	<div id="primary" class="site-content">
		<div id="content" role="main">

<?php 
// get some info about the term queried
$queried_object = get_queried_object(); 
$taxonomy = $queried_object->taxonomy;
$term_id = $queried_object->term_id; 
$termName = get_queried_object()->name;
?>

<div class="entry-content">
<div class="man-left">
	<h1><?php echo $termName ?></h1>
    
    
    <?php
    // Get term link
	    $term_link = get_term_link( $queried_object );
		   
 		// Get acf field Name
        $image = get_field('logo', $queried_object ); 
        $url = $image['url'];
        $title = $image['title'];
        $alt = $image['alt'];
     	// which size?
        $size = 'thumbnail';
        $thumb = $image['sizes'][ $size ];
        ?>
        
        <img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" title="<?php echo $title; ?>" />
        
        <?php echo term_description( $term_id, $taxonomy ) ?> 
        
        <div class="man-website">
        <?php 
			$website = get_field('website', $queried_object);
			echo '<a href="' . $website . '">' . $website . '</a>'; ?>
        </div><!-- man website -->
        </div><!-- man left -->
        
        <div class="man-right">
        	<div class="man-right-comp"><?php echo 'Representing ' . '</br>' . $termName .  ' in'; ?></div><!-- man right  comp -->
        	<div class="state-areas">
            <?php 
				// get the states from the list
				$states = get_field('states_area_covered', $queried_object );
				// echo out the areas list in a list item
				echo '<ul><li>' . implode('</li><li>', $states) . '</li></ul>';
			  ?>
            </div><!-- state areas -->
        </div><!-- man right -->
        
        <h3>Associated Market Segments</h3>
        
        <div id="box-container-page">
        <?php 
		 // get the terms associated with each manufacturer
		 $markets = get_field('associated_markets', $queried_object);
		 
			
	// Start the loop through the terms associated with each manufacturer
	foreach ($markets as $term) { 
       
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
    
</div><!-- entry content -->

 

			

		</div><!-- #content -->
	</div><!-- #primary -->

<div class="widget-area">
	<?php get_template_part('inc/rw-search'); ?>
    <?php get_template_part('inc/side-news-feed'); ?>
</div><!-- widget area -->

<?php get_footer(); ?>