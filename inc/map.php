<div id="statemap-container">
<?php  
  $states = array(
    'va'=> array('VA','virginia'),
    'dc'=> array('DC','district-of-columbia'),
    'nc'=> array('NC','north-carolina'),
    'sc'=> array('SC','south-carolina'),
    'de'=> array('DE','delaware'),
    'md'=> array('MD','maryland')
  );
?>

<div id="statemap">
  <?php foreach ($states as $k=>$v) { 
    $is_active = ($k=='nc') ? ' active':''; ?>
    <div class="state-marker <?php echo $k ?>">
      <a class="myLink<?php echo $is_active ?>" href="javascript:void(0);" divId="<?php echo $k ?>"><?php echo $v[0] ?></a> 
    </div>
  <?php } ?>
</div><!-- state map -->


<div id="team-divs">
  <?php foreach ($states as $k=>$v) { 
    $active = ($k=='nc') ? ' active':'';
    $slug = $v[1];
    $args = array(
      'post_type'=>'team_member',
      'posts_per_page' => -1,
      'orderby' => 'menu_order',
      'order' => 'ASC',
      'tax_query' => array(
        array(
          'taxonomy' => 'rep_area', // your custom taxonomy
          'field' => 'slug',
          'terms' => array($slug) // the terms (categories) you created
        )
      )
    );
    $teams = new WP_Query($args);
    if ( $teams->have_posts() ) { ?>
    <div class="hidden-div team-by-state team-wrap-outer<?php echo $active ?>" id="<?php echo $k ?>">
      <div class="team-wrapper grid">
        <?php while ( $teams->have_posts() ) : $teams->the_post(); ?>
          <?php get_template_part('inc/team-box'); ?>
        <?php endwhile;  ?>
      </div>
    </div>
    <?php } ?>
  <?php } ?>
</div><!-- team divs -->

 </div><!-- state map  container -->