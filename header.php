<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<script defer src="<?php bloginfo( 'template_url' ); ?>/assets/svg-with-js/js/fontawesome-all.js"></script>
<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<style type="text/css">
    .gradient {
       filter: none;
    }
  </style>
<![endif]-->
<!-- lw2 -->

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div class="top-header">
	<div class="address-top"><?php the_field('address', 'option'); ?></div>
</div><!-- top header -->

<div id="page" class="hfeed site">
	<header id="masthead" class="site-header" role="banner">
    
		<?php if(is_home()) { ?>
            <h1 class="logo"><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></h1>
        <?php } else { ?>
            <div class="logo"><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></div>
        <?php } ?>
        
        
        <div class="header-right">
            <div class="phone-top">
                <div class="phone-top-icon"></div>
                <div class="phone"><?php the_field('phone_#', 'option'); ?></div>
            </div><!-- phone top -->
            
            <?php 
					$linkedin = get_field('linkedin_link', 'option');
					
					if($linkedin != '') :
			 ?>
            <div id="social">
                <ul>
                    <li class="linkedin">
                   	 <a href="<?php echo $linkedin;  ?>" target="_blank">LinkedIn</a>
                    </li>
                </ul>
            </div><!-- social -->
            <?php endif; ?>
        
        </div><!-- header right -->        
        
        
		<nav id="site-navigation" class="main-navigation" role="navigation">
			<h3 class="menu-toggle"><?php _e( 'Menu', 'twentytwelve' ); ?></h3>
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
		</nav><!-- #site-navigation -->

	</header><!-- #masthead -->

	<div id="main" class="wrapper">