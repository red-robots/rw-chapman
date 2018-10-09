<?php 
// if is home, add a home class 
if(is_front_page()) {
	$ifhome = "home";
} else {
	$ifhome = "";	
}
?>

<div id="search-box" class="<?php echo $ifhome; ?>">


<?php if(!is_page('17')) : ?>
<h3>Find it Fast</h3>
<div class="search-field">
<form method="get" id="searchform" action="<?php bloginfo('home'); ?>/">
<input type="text" value="" name="s" placeholder="<?php echo esc_attr_x( 'Search Products', 'placeholder' ) ?>" id="s" />
<input type="hidden" name="search-type" value="products" />
<input type="hidden" name="post_type" value="product_descriptor" />
<input name="submit" type="submit" value="" id="go" />
</form>
</div><!-- search field -->

<div class="search-field">
<form method="get" id="searchform" action="<?php bloginfo('home'); ?>/" >
<input type="text" value="" name="s" placeholder="<?php echo esc_attr_x( 'Search Manufacturers', 'placeholder' ) ?>" id="s" />
<input type="hidden" name="search-type" value="manufacturer" />
<input type="hidden" name="post_type" value="manufacturer" />
<input name="submit" type="submit" value="" id="go" />
</form>
</div><!-- search field -->

<div class="search-field">
<form method="get" id="searchform" action="<?php bloginfo('home'); ?>/">
<input type="text" value="" name="s" placeholder="<?php echo esc_attr_x( 'Search Markets', 'placeholder' ) ?>" id="s" />
<input type="hidden" name="search-type" value="markets" />
<input type="hidden" name="post_type" value="markets" />
<input name="submit" type="submit" value="" id="go" />
</form>
</div><!-- search field -->
<?php endif; // if is not Contact Page ID = "17" ?>


<?php if(is_page('17')) : ?>
	<h3>Find Us</h3>
	<?php the_field('google_map'); ?>
<br><br>
	<?php get_template_part('inc/team-member-list'); ?>

<?php endif; ?>





</div><!-- search box -->
