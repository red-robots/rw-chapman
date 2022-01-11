<div id="statemap-container">

<div id="statemap">
	<div class="state-marker va">
    <a class="myLink" href="javascript:void(0);" divId="va">VA</a> 
    </div><!-- state marker -->
    
    <div class="state-marker dc">
    <a class="myLink" href="javascript:void(0);" divId="dc">DC</a> 
    </div><!-- state marker -->
    
    <div class="state-marker nc">
    <a class="myLink active" href="javascript:void(0);" divId="nc">NC</a> 
    </div><!-- state marker -->
    
    <div class="state-marker sc">
    <a class="myLink" href="javascript:void(0);" divId="sc">SC</a> 
    </div><!-- state marker -->
    
    <div class="state-marker de">
    <a class="myLink" href="javascript:void(0);" divId="de">DE</a> 
    </div><!-- state marker -->
    
    <div class="state-marker md">
    <a class="myLink" href="javascript:void(0);" divId="md">MD</a> 
    </div><!-- state marker -->
</div><!-- state map -->


<div id="team-divs">
<!-- ###############################

		First Info Div
        
    ###################################-->
<!--<div class="hidden-div" id="intro">
Click on the map to the left to see who services each area. 
</div> hidden div -->


<!-- ###############################

		North Carolina
        
    ###################################--> 

<?php
	$wp_query = new WP_Query();
	$wp_query->query(array(
	'post_type'=>'team_member',
	'posts_per_page' => -1,
	'orderby' => 'menu_order',
    'order' => 'ASC',
	'tax_query' => array(
		array(
			'taxonomy' => 'rep_area', // your custom taxonomy
			'field' => 'slug',
			'terms' => array( 'north-carolina' ) // the terms (categories) you created
		)
	)
));
if ($wp_query->have_posts()) :  ?>
<div class="hidden-div team-wrap-outer" id="nc">
  <div class="team-wrapper grid">
	<?php while ($wp_query->have_posts()) :  ?>
    <?php $wp_query->the_post(); ?>	  
     <?php get_template_part('inc/team-box'); ?>
     <?php endwhile; ?>
  </div>
 </div><!-- hidden div -->
<?php endif; wp_reset_postdata(); ?> 


<!-- ###############################

		South Carolina
        
    ###################################--> 

<?php
	$wp_query = new WP_Query();
	$wp_query->query(array(
	'post_type'=>'team_member',
	'posts_per_page' => -1,
	'orderby' => 'menu_order',
    'order' => 'ASC',
	'tax_query' => array(
		array(
			'taxonomy' => 'rep_area', // your custom taxonomy
			'field' => 'slug',
			'terms' => array( 'south-carolina' ) // the terms (categories) you created
		)
	)
));
if ($wp_query->have_posts()) :  ?>
<div class="hidden-div" id="sc">
    
	<?php while ($wp_query->have_posts()) :  ?>
    <?php $wp_query->the_post(); ?>	  
    
     <?php get_template_part('inc/team-box'); ?>
     
     <?php endwhile; ?>
 </div><!-- hidden div -->
<?php endif; wp_reset_postdata(); ?> 


<!-- ###############################

		Delaware
        
    ###################################--> 

<?php
	$wp_query = new WP_Query();
	$wp_query->query(array(
	'post_type'=>'team_member',
	'posts_per_page' => -1,
	'orderby' => 'menu_order',
    'order' => 'ASC',
	'tax_query' => array(
		array(
			'taxonomy' => 'rep_area', // your custom taxonomy
			'field' => 'slug',
			'terms' => array( 'delaware' ) // the terms (categories) you created
		)
	)
));
if ($wp_query->have_posts()) : ?>
<div class="hidden-div" id="de">
    
	<?php while ($wp_query->have_posts()) : ?>
    <?php $wp_query->the_post(); ?>	  
    
     <?php get_template_part('inc/team-box'); ?>
               
     <?php endwhile; ?>
 </div><!-- hidden div -->
<?php endif; wp_reset_postdata(); ?> 


<!-- ###############################

		Virginia
        
    ###################################--> 

<?php
	$wp_query = new WP_Query();
	$wp_query->query(array(
	'post_type'=>'team_member',
	'posts_per_page' => -1,
	'orderby' => 'menu_order',
    'order' => 'ASC',
	'tax_query' => array(
		array(
			'taxonomy' => 'rep_area', // your custom taxonomy
			'field' => 'slug',
			'terms' => array( 'virginia' ) // the terms (categories) you created
		)
	)
));
if ($wp_query->have_posts()) : ?>
<div class="hidden-div" id="va">
    
	<?php while ($wp_query->have_posts()) : ?>
    <?php $wp_query->the_post(); ?>	  
    
    <?php get_template_part('inc/team-box'); ?>
     
     <?php endwhile; ?>
 </div><!-- hidden div -->
<?php endif; wp_reset_postdata(); ?> 


<!-- ###############################

		Maryland
        
    ###################################--> 

<?php
	$wp_query = new WP_Query();
	$wp_query->query(array(
	'post_type'=>'team_member',
	'posts_per_page' => -1,
	'orderby' => 'menu_order',
    'order' => 'ASC',
	'tax_query' => array(
		array(
			'taxonomy' => 'rep_area', // your custom taxonomy
			'field' => 'slug',
			'terms' => array( 'maryland' ) // the terms (categories) you created
		)
	)
));
if ($wp_query->have_posts()) : ?>
<div class="hidden-div" id="md">
    
	<?php while ($wp_query->have_posts()) : ?>
    <?php $wp_query->the_post(); ?>	  
    
     <?php get_template_part('inc/team-box'); ?>
               
     <?php endwhile; ?>
 </div><!-- hidden div -->
<?php endif; wp_reset_postdata(); ?> 


<!-- ###############################

		District of Columbia
        
    ###################################--> 

<?php
	$wp_query = new WP_Query();
	$wp_query->query(array(
	'post_type'=>'team_member',
	'posts_per_page' => -1,
	'orderby' => 'menu_order',
    'order' => 'ASC',
	'tax_query' => array(
		array(
			'taxonomy' => 'rep_area', // your custom taxonomy
			'field' => 'slug',
			'terms' => array( 'district-of-columbia' ) // the terms (categories) you created
		)
	)
));
if ($wp_query->have_posts()) : ?>
<div class="hidden-div" id="dc">
    
	<?php while ($wp_query->have_posts()) : ?>
    <?php $wp_query->the_post(); ?>	  
    
     <?php get_template_part('inc/team-box'); ?>
               
     <?php endwhile; ?>
 </div><!-- hidden div -->
<?php endif; wp_reset_postdata(); ?> 

</div><!-- team divs -->

 </div><!-- state map  container -->