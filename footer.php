<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>
	</div><!-- #main .wrapper -->
	
</div><!-- #page -->

<footer id="colophon" role="contentinfo">
		<div class="footer-inside">
        	
            <div class="footer-address">
				<?php the_field('address', 'option'); ?>
            </div><!-- footer address -->
            
            <div class="footer-credits">
				<a href="<?php bloginfo('url'); ?>/sitemap">site map</a> |
                site by <a href="http://bellaworksweb.com" target="_blank"><span class="bella">Bellaworks</span></a>
            </div><!-- footer address -->
            
		</div><!-- .site-info -->
	</footer><!-- #colophon -->

<?php wp_footer(); ?>
<?php the_field('analytics', 'option'); ?>
</body>
</html>