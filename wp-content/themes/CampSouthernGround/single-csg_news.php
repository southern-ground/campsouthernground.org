<?php get_header(); ?>
  <div class="page_top_wrap centered">
    <h2>NEWS</h2>
  </div><!-- .page_top_wrap -->
  <div class="container">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    	<h1><?php the_title(); ?></h1>
      <p><?php the_content(); ?></p>

  	<?php endwhile; else: ?>
  		<p>Sorry, this page doesn't exist.</p>
  	<?php endif; ?>
  </div>
<?php get_footer(); ?>
