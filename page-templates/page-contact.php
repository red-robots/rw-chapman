<?php
/**
 * Template Name: Contact
 */

get_header(); ?>

	<div id="primary" class="site-content">
		<div id="content" role="main">

			<?php while ( have_posts() ) : the_post(); ?>
				
				<div class="entry-content">
               <!-- <a class="anchor" id="top">&nbsp;</a>-->
                	<h1 class="anchor" id="top"><?php the_title(); ?></h1>
                    
                   <div class="contact-left">
                    <?php if(get_field('phone_numbers')!="") : ?>
                    <div class="contact-bloc">
                    <h3>Phone Numbers</h3>
                    	<?php the_field('phone_numbers'); ?>
                    </div><!-- contact bloc -->
                    <?php endif; ?>
                    
                    <?php if(get_field('fax_number')!="") : ?>
                    <div class="contact-bloc">
                    <h3>Fax Number</h3>
                    	<?php the_field('fax_number'); ?>
                    </div><!-- contact bloc -->
                    <?php endif; ?>
                    
                    <?php if(get_field('email')!="") : ?>
                    <div class="contact-bloc">
                    <h3>Email</h3>
                    	<?php $email = get_field('email'); ?>
                        <a href="mailto:<?php echo antispambot($email); ?>">
                          <?php echo antispambot($email); ?>
                        </a>
                    </div><!-- contact bloc -->
                    <?php endif; ?>
                    
                    
                    </div><!-- contact left -->
                    
                    
                  <div class="contact-right">  
					<?php if(get_field('mailing_address')!="") : ?>
                    <div class="contact-bloc">
                    <h3>Mailing Address</h3>
                    	<?php the_field('mailing_address'); ?>
                    </div><!-- contact bloc -->
                    <?php endif; ?>
                    
                    <?php if(get_field('street_address')!="") : ?>
                    <div class="contact-bloc">
                    <h3>Street Address</h3>
                    	<?php the_field('street_address'); ?>
                    </div><!-- contact bloc -->
                    <?php endif; ?>
                    </div><!-- contact right -->
                    
                </div><!-- entry content -->
                
			<?php endwhile; // end of the loop. ?>
            
            
<?php get_template_part('inc/map'); ?>

<?php get_template_part('inc/team-member-full'); ?>            

		</div><!-- #content -->
	</div><!-- #primary -->
    
 <div class="widget-area">
	<?php get_template_part('inc/rw-search'); ?>
</div><!-- widget area -->

<?php //get_sidebar(); ?>
<script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
<script>
$('.grid').masonry({
  // options
  itemSelector: '.grid-item',
  columnWidth: 200
});
</script>
<?php get_footer(); ?>