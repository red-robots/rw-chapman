<?php
/**
 * The template for displaying Category pages
 *
 * Used to display archive-type pages for posts in a category.
 *
 */

get_header(); ?>

	<section id="primary" class="site-content">
		<div id="content" role="main">

		<?php if ( have_posts() ) : ?>
			<header class="archive-header">
				<h1 class="archive-title"><?php printf( __( 'Category Archives: %s', 'twentytwelve' ), '<span>' . single_cat_title( '', false ) . '</span>' ); ?></h1>

			<?php if ( category_description() ) : // Show an optional category description ?>
				<div class="archive-meta"><?php echo category_description(); ?></div>
			<?php endif; ?>
			</header><!-- .archive-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post(); ?>

		<div class="post">
        <div class="entry-content">
            <h2><?php the_title(); ?></h2>
               <div class="entry-summary">
					<?php the_excerpt(); ?>
				</div><!-- .entry-summary -->
             <div class="blue-arrow"><a href="<?php the_permalink(); ?>">Read more</a></div>
       </div><!-- .entry-content -->
       </div><!-- .post -->

			<?php endwhile; ?>
		<?php endif; ?>

		</div><!-- #content -->
	</section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>