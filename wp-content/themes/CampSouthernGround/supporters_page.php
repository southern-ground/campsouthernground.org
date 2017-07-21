<?php
/*
  Template Name: Supporters Page
*/
?>
<?php get_header(); ?>
<div class="page supporters">
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <div class="page_top_wrap">
      <div class="page_top container">
        <?php if( get_post_meta( $post->ID, "capitalize_title", true ) ) { ?>
          <h1 class="upcase centered">
        <?php } else { ?>
          <h1 class="centered">
        <?php } ?>
        <?php if( get_post_meta( $post->ID, "custom_title", true ) ) {
            echo get_post_meta( $post->ID, "custom_title", true );
          } else {
            the_title();
          } ?>
        </h1>
      </div>
    </div>
    <div class="container">
      <div class="supporters_wrap">
        <?php if( have_rows('sponsors') ): while ( have_rows('sponsors') ) : the_row(); ?>
          <a target="_blank" href="<?php the_sub_field('sponsor_link') ?>"><img src="<?php the_sub_field('sponsor_logo'); ?>" /></a>
        <?php endwhile; endif; ?>
      </div>
    </div>
	<?php endwhile; else: ?>
		<p>Sorry, this page doesn't exist.</p>
	<?php endif; ?>

  <?php if( get_post_meta( $post->ID, "supporters_list", true ) ) { ?>
    <div class="page_bottom_wrap">
      <div class="container supporter_container">
        <?php $arr = explode( ",", get_post_meta( $post->ID, "supporters_list", true ) ); ?>
        <?php for( $i = 0; $i < count( $arr ); $i++  ) { ?>
          <?php if( $i % 2 == 0 ) { ?>
            <div class="row">
          <?php } ?>

          <div class="col-xs-6">
            <div class="supporter_name"><?php echo trim( $arr[$i] ); ?></div>
          </div>

          <?php if( ( $i % 2 != 0 ) || ( $i % 2 == 0 && $i == count( $arr ) - 1 ) ) { ?>
          </div>
          <?php } ?>
        <?php } ?>
      </div>
    </div>
  <?php } ?>
</div>
<?php get_footer(); ?>

