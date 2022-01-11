<?php
 // Enqueueing all the java script in a no conflict mode
 function ineedmyjava() {
	if (!is_admin()) {
 
		wp_deregister_script('jquery');
		wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js', false, '1.10.2', true);
		wp_enqueue_script('jquery');
		
		// Custom Theme scripts...
		wp_register_script(
			'custom',
			get_bloginfo('template_directory') . '/js/custom.js',
			array('jquery') );
		wp_enqueue_script('custom');
		
		
		// Homepage slider 'flexslider' scripts...
		wp_register_script(
			'flexslider',
			get_bloginfo('template_directory') . '/js/flexslider.js',
			array('jquery') );
		wp_enqueue_script('flexslider');
		
		// Add more
		
		
		// between here
		
	}
}
 
add_action('wp_enqueue_scripts', 'ineedmyjava');


add_image_size( 'team-thumb', 70, 105, true ); // (cropped)


/*
	Add V card support
_______________________________________________
*/ 
add_filter('upload_mimes', 'custom_upload_mimes');
function custom_upload_mimes ( $existing_mimes=array() ) {
// add your extension to the array
$existing_mimes['vcf'] = 'text/x-vcard';
	return $existing_mimes;
}


/* ##############################################

 Custom Post Types */

add_action('init', 'js_custom_init');
function js_custom_init() 
{
	
	// Register the Products
  
     $labels = array(
	'name' => _x('Product', 'post type general name'),
    'singular_name' => _x('Product', 'post type singular name'),
    'add_new' => _x('Add New', 'Product'),
    'add_new_item' => __('Add New Product'),
    'edit_item' => __('Edit Product'),
    'new_item' => __('New Product'),
    'view_item' => __('View Product'),
    'search_items' => __('Search Product'),
    'not_found' =>  __('No Product found'),
    'not_found_in_trash' => __('No Product found in Trash'), 
    'parent_item_colon' => '',
    'menu_name' => 'Product'
  );
  $args = array(
	'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'has_archive' => false, 
    'hierarchical' => false, // 'false' acts like posts 'true' acts like pages
    'menu_position' => 20,
    'supports' => array('title','editor','custom-fields','thumbnail'),
	
  ); 
  register_post_type('product_descriptor',$args); // name used in query
  
 	// Register the Homepage Slides
  
     $labels = array(
	'name' => _x('Team Members', 'post type general name'),
    'singular_name' => _x('Team', 'post type singular name'),
    'add_new' => _x('Add New', 'Team Member'),
    'add_new_item' => __('Add New Team'),
    'edit_item' => __('Edit Team'),
    'new_item' => __('New Team'),
    'view_item' => __('View Team'),
    'search_items' => __('Search Team'),
    'not_found' =>  __('No Team found'),
    'not_found_in_trash' => __('No Team found in Trash'), 
    'parent_item_colon' => '',
    'menu_name' => 'Team'
  );
  $args = array(
	'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'has_archive' => false, 
    'hierarchical' => false, // 'false' acts like posts 'true' acts like pages
    'menu_position' => 20,
    'supports' => array('title','editor','custom-fields','thumbnail'),
	
  ); 
  register_post_type('team_member',$args); // name used in query
  
  } // close custom post type
  
  
  /*
##############################################
	Custom Taxonomies
*/
add_action( 'init', 'build_taxonomies', 0 );
 
function build_taxonomies() {
	
	// Market Taxonomy
    register_taxonomy( 'markets', 'product_descriptor',
	 array( 
	'hierarchical' => true, 
	'label' => 'Markets', 
	'query_var' => true, 
	'rewrite' => true ,
	'show_admin_column' => true,
	'public' => true,
	'rewrite' => array( 'slug' => 'markets' ),
	'_builtin' => true
	) );
	
	// Market Taxonomy
    register_taxonomy( 'manufacturer', 'product_descriptor',
	 array( 
	'hierarchical' => true, 
	'label' => 'Manufacturer', 
	'query_var' => true, 
	'rewrite' => true ,
	'show_admin_column' => true,
	'public' => true,
	'rewrite' => array( 'slug' => 'manufacturer' ),
	'_builtin' => true
	) );
	
	// Market Taxonomy
    register_taxonomy( 'rep_area', 'team_member',
	 array( 
	'hierarchical' => true, 
	'label' => 'Rep Area', 
	'query_var' => true, 
	'rewrite' => true ,
	'show_admin_column' => true,
	'public' => true,
	'rewrite' => array( 'slug' => 'rep-area' ),
	'_builtin' => true
	) );
	
	// Market Taxonomy
    register_taxonomy( 'market_segment', 'team_member',
	 array( 
	'hierarchical' => true, 
	'label' => 'Market Segment', 
	'query_var' => true, 
	'rewrite' => true ,
	'show_admin_column' => true,
	'public' => true,
	'rewrite' => array( 'slug' => 'market-segment' ),
	'_builtin' => true
	) );
	
} // End build taxonomies 


/*
		Search Redirects
------------------------------------------------------*/ 
/*add_action('template_redirect', 'one_match_redirect');
function one_match_redirect() {
// redirect manufactors
if (is_search()) :
// if search type is set and it's manufcturers
if(isset($_GET['search-type'])) {
    $type = $_GET['search-type'];
}
if ($type == 'manufacturer') : 

	

// Manufacutor Search Results 
// get what we're searching for
$searchRequest = $_REQUEST['s'];

$args = array(
    'search' => $searchRequest,
	'hide_empty' => 0, // false, show empties
); 
$taxonomy = 'manufacturer';
$termsResult = get_terms($taxonomy, $args);

foreach ( $termsResult as $term ) { 
    global $wp_query;
        if ($wp_query->post_count == 1 or $wp_query->post_count == 0)  {
			wp_redirect( get_term_link( $term ) );
        } // end if is post count 1
    } // end foreach
     
 endif; // end if is manufacturer type 
 endif; // end if is search
} // one_match_redirect*/

/*-------------------------------------
	Custom client login, link and title.
---------------------------------------*/
function my_login_logo() { ?>
<style type="text/css">
  body.login div#login h1 a {
  	background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/logo.png);
  	background-size: 300px 77px;
  	width: 300px;
	height: 77px;
  }
</style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );

// Change Link
function loginpage_custom_link() {
	//return the_permalink();
  return get_site_url();
}
add_filter('login_headerurl','loginpage_custom_link');

// add a favicon from your theme folder
function mytheme_favicon() { 
 echo '<link rel="shortcut icon" href="' . get_bloginfo('stylesheet_directory') . '/images/favicon.ico" >'; 
} 
add_action('wp_head', 'mytheme_favicon');

// Limit the excerpt without truncating the last word.
// Excerpt Function
function get_excerpt($count){
  $permalink = get_permalink();
  $excerpt = get_the_content();
  $excerpt = strip_tags($excerpt);
  $excerpt = substr($excerpt, 0, $count);
  $excerpt = $excerpt.'...';
  return $excerpt;
}

// Pagination

function pagi_posts_nav() {

	if( is_singular() )
		return;

	global $wp_query;

	/** Stop execution if there's only 1 page */
	if( $wp_query->max_num_pages <= 1 )
		return;

	$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
	$max   = intval( $wp_query->max_num_pages );

	/**	Add current page to the array */
	if ( $paged >= 1 )
		$links[] = $paged;

	/**	Add the pages around the current page to the array */
	if ( $paged >= 3 ) {
		$links[] = $paged - 1;
		$links[] = $paged - 2;
	}

	if ( ( $paged + 2 ) <= $max ) {
		$links[] = $paged + 2;
		$links[] = $paged + 1;
	}

	echo '<div class="navigation"><ul>' . "\n";

	/**	Previous Post Link */
	if ( get_previous_posts_link() )
		printf( '<li>%s</li>' . "\n", get_previous_posts_link() );

	/**	Link to first page, plus ellipses if necessary */
	if ( ! in_array( 1, $links ) ) {
		$class = 1 == $paged ? ' class="active"' : '';

		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

		if ( ! in_array( 2, $links ) )
			echo '<li>…</li>';
	}

	/**	Link to current page, plus 2 pages in either direction if necessary */
	sort( $links );
	foreach ( (array) $links as $link ) {
		$class = $paged == $link ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
	}

	/**	Link to last page, plus ellipses if necessary */
	if ( ! in_array( $max, $links ) ) {
		if ( ! in_array( $max - 1, $links ) )
			echo '<li>…</li>' . "\n";

		$class = $paged == $max ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
	}

	/**	Next Post Link */
	if ( get_next_posts_link() )
		printf( '<li>%s</li>' . "\n", get_next_posts_link() );

	echo '</ul></div>' . "\n";

}
// add ampersand to search results
/*add_filter('relevanssi_remove_punctuation', 'saveampersands_1', 9);
function saveampersands_1($a) {
    $a = str_replace('&amp;', 'AMPERSAND', $a);
    $a = str_replace('&', 'AMPERSAND', $a);
    return $a;
}
 
add_filter('relevanssi_remove_punctuation', 'saveampersands_2', 11);
function saveampersands_2($a) {
    $a = str_replace('AMPERSAND', '&', $a);
    return $a;
}*/

add_filter('relevanssi_remove_punctuation', 'saveampersands_1', 9);
function saveampersands_1($a) {
    $a = str_replace('&amp;', 'AMPERSAND', $a);
	$a = str_replace('&', 'AMPERSAND', $a);
    return $a;
}

add_filter('relevanssi_remove_punctuation', 'saveampersands_2', 11);
function saveampersands_2($a) {
    $a = str_replace('AMPERSAND', '&', $a);
    return $a;
}