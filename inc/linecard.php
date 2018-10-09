<?php 
	// Taxonomy
	$termname = get_queried_object()->name; 
	$termid = get_queried_object(); 
	
	 if( have_rows('line_cards', $termid) ):  while ( have_rows('line_cards', $termid) ) :  the_row(); 
	
	$linecard = get_sub_field('line_card_r', $termid);
	$name = get_sub_field('name', $termid);
	
	?>

<div id="search-box">
<h3>Download Line Card</h3>



<div class="download-term">
	<a href="<?php echo $linecard; ?>"><?php echo $name; ?></a>
</div><!-- download term -->
    <div class="download">
    	<a href="<?php echo $linecard ?>">Download</a>
    </div><!-- download -->
</div><!-- search box -->

<?php endwhile; endif; ?>


