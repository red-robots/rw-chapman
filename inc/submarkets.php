<div class="entry-content">
	<h2>Sub-markets</h2>
</div><!-- entry content -->

<div class="submarkets">
	<?php
    // get some info about the term queried
    $queried_object = get_queried_object(); 
    $taxonomy = $queried_object->taxonomy;
    $term_id = $queried_object->term_id;
    $termchildren = get_term_children( $term_id, $taxonomy );
    
    if($termchildren) : 
	
	echo '<ul>';
    foreach ( $termchildren as $child ) {
        $term = get_term_by( 'id', $child, $taxonomy );
        echo '<li>' . $term->name . '</li>';
    }
    echo '</ul>';
	
	else: 
	
	echo 'Sorry, there are no available submarkets for this market area.';
	
	endif;
    ?> 
</div><!-- submarkets -->