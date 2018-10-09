<!-- ###############################

		Anchored Down Team Members 
        
    ###################################-->    
            
<div class="entry-content">
<h3>Team Members</h3>
</div>

<?php
	$wp_query = new WP_Query();
	$wp_query->query(array(
	'post_type'=>'team_member',
	'posts_per_page' => -1,
	'orderby' => 'menu_order',
    'order' => 'ASC'
));
	if ($wp_query->have_posts()) : ?>
    <?php while ($wp_query->have_posts()) : ?>
    <?php $wp_query->the_post(); ?>	
    
    
<?php 
			// Get the title
			$title = get_the_title() ;
			// Put the title in dashed form
			$sanitized =  sanitize_title_with_dashes($title);
			// get the vcard 
			$vcard = get_field('v_card'); 
?>
    
    <a class="anchor-person" id="<?php echo $sanitized; ?>"></a>
    <div class="team-member">
    	<div class="team-photo">
		<?php 
        // Get field Name
        $image = get_field('picture'); 
        $url = $image['url'];
		 $size = 'large';
        $thumb = $image['sizes'][ $size ];
        ?>
        <?php if($image != '') : ?>
        	<img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" />
        <?php endif; ?>
        <div class="backtotop"><a href="#top">back to top</a></div>
        </div><!-- team photo -->
        
       <div class="team-content">
       <div class="entry-content">
       
        <h2><?php the_title(); ?></h2>
        <div class="vcard"><a href="<?php echo $vcard; ?>">vcard</a></div>
        <?php the_field('bio'); ?>
        
       
            <h4>Market Segments</h4>
            <div class="listregionarea"><?php //echo $listareas; ?></div>
         <?php if( have_rows('market_segment_order') ): ?>
         <ul>
				<?php while ( have_rows('market_segment_order') ) : ?>
				<?php the_row(); ?>
 				<?php 
                    // Get field Name
                    $market = get_sub_field('market'); 
					  
					  
					 /* echo '<pre>';
					  print_r($market);*/
					
                 ?>
                 
                 <li><?php echo $market[0]->name; ?></li>
        
       
        	<?php endwhile; ?>
            </ul>
		<?php endif; ?>
            
            
            <?php
					$mterms = get_the_terms( $post->ID, 'rep_area' );
					if ( $mterms && ! is_wp_error( $mterms ) ) : 
					$regions = array();

						foreach ( $mterms as $mterm ) {
							$regions[] = $mterm->name;
						}
										
					$listregions = join( ", ", $regions );
?>
            <h4>Market Regions</h4>
            <div class="listregionarea"><?php echo $listregions; ?></div>
            <?php endif; ?>
        
        
       </div><!-- entry content -->
       </div><!-- team content -->
        
    </div><!-- team member -->
    
<?php endwhile; ?>
<?php endif; wp_reset_query(); ?>