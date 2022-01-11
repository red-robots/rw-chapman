<div class="team-box grid-item">
     <?php 
        $size = 'team-thumb';
        $image = get_field('picture'); 
        $url = ( isset($image['url']) ) ? $image['url'] : '';
        $thumb = ( isset($image['sizes']) ) ? $image['sizes'][ $size ] : '';
        $alt = ( isset($image['title']) ) ? $image['title'] : '';
        
        $title = get_the_title() ;
        $sanitized =  sanitize_title_with_dashes($title);
        $job_title = get_field("job_title");
        $phone = get_field("phone");
        $email = get_field("email");
        $placeholder = get_bloginfo('template_url') . "/images/nophoto-1.jpg";
        ?>
        <div class="imgbox" style="float:left;">
          <?php if ($image) { ?>
            <img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" class="teamleft" style="margin:0 0"/>
          <?php } else { ?>
            <img src="<?php echo $placeholder; ?>" alt="" class="nopic teamleft" style="margin:0 0"/>
          <?php } ?>

          <?php if ($phone || $email) { ?>
          <div class="teamPhone">
            <?php if ($phone) { ?>
              <div class="phone"><a href="tel:<?php echo format_phone_number($phone); ?>" arial-label="<?php echo $phone ?>"><i class="fas fa-phone"></i></a></div>
            <?php } ?>
            <?php if ($email) { ?>
              <div class="email"><a href="mailto:<?php echo antispambot($email,1); ?>" arial-label="<?php echo antispambot($email); ?>"><i class="fas fa-envelope"></i></a></div>
            <?php } ?>
          </div> 
          <?php } ?>
        </div>
        
        <div class="team-box-right">
            <h3><?php the_title(); ?></h3>
            <?php if ($job_title) { ?>
            <div class="jobtitle"><?php echo $job_title ?></div>
            <?php } ?>

            <?php if( have_rows('market_segment_order') ):
      				
					// Create an empty
					$listarray = array();
					
				 while ( have_rows('market_segment_order') ) : ?>
				<?php the_row(); ?>
 				<?php 
                   // Get field Name
                    $market = get_sub_field('market'); 
					 // put name into an empty array
					  $listarray[] = $market[0]->name;
					  
					// end the if while loop
					 endwhile; endif;
					  
					  // test
					  // echo '<pre>';
					  //  print_r($listarray);
					
						// join the array into a comma separated list
					  $listarea = join( ", ", $listarray );
			
					  
					
                 ?>
            <?php
					/*$terms = get_the_terms( $post->ID, 'market_segment' );
					if ( $terms && ! is_wp_error( $terms ) ) : 
					$areas = array();

						foreach ( $terms as $term ) {
							$areas[] = $term->name;
						}
										
					$listareas = join( ", ", $areas );*/
?>
            <?php //echo get_the_term_list( $post->ID, 'market_segment', '<li>', ',</li><li>', '</li>' ); ?>
            <span class="listareas"><?php echo $listarea; ?></span>
            
            <?php //endif; ?>
            
        </div><!-- team-box-right -->
        <div class="team-contact">
            <a href="#<?php echo $sanitized; ?>">contact</a>
        </div><!-- team contact -->
        <?php //the_field('bio'); ?>
</div><!-- team box -->