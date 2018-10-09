
<h3>Team Members</h3>

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
    
    <ul>
    	<li class="team">
        <a href="#<?php echo $sanitized; ?>"><?php the_title(); ?></a> | 
        <a href="<?php echo $vcard; ?>">vcard</a>
        </li>
    </ul>
    
<?php endwhile; ?>
<?php endif; ?>
