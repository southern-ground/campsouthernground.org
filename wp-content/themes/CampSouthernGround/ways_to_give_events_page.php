<?php
/*
  Template Name: Ways To Give - Event Sponsorships Page
*/
?>
<?php get_header(); ?>
<div class="page ways_to_give event_sponsorships">
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <div class="page_top_wrap">
      <div class="page_top container">
        <div class="row">

          <div class="col-xs-12 col-sm-4 col-sm-push-8">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/eventsponsor_top.png" />
          </div>

          <div class="col-xs-12 col-sm-8 col-sm-pull-4">
            <h1 class="upcase"><?php the_title(); ?></h1>
            <?php the_content(); ?>
          </div>
          
        </div><!-- .row -->
      </div>
    </div>
    <div class="container page_content">
      <div class="events_wrap">
        <?php
        $args = array( 'post_type' => 'csg_events', 'order' => 'ASC', 'orderby' => 'meta_value', 'meta_key' => 'event_date' );
        $spring = array( 'MAR', 'APR', 'MAY' );
        $summer = array( 'JUN', 'JUL', 'AUG' );
        $fall   = array( 'SEP', 'OCT', 'NOV' );
        $winter = array( 'DEC', 'JAN', 'FEB' );
        $myposts = get_posts( $args );
        
        foreach( $myposts as $post ) : setup_postdata( $post ); ?>
          <?php
            $month = strtoupper( date( "M", strtotime( get_post_meta( $post->ID, "event_date", true ) ) ) );
        
            if( in_array( $month, $spring ) ) $currSeason = $spring;
            else if( in_array( $month, $summer ) ) $currSeason = $summer;
            else if( in_array( $month, $fall ) ) $currSeason = $fall;
            else if( in_array( $month, $winter ) ) $currSeason = $winter;
            else $currSeason = $spring;
            
            if( $post != end( $myposts ) )
              $nextMonth = strtoupper( date( "M", strtotime( get_post_meta( $myposts[array_search( $post, $myposts ) + 1]->ID, "event_date", true ) ) ) );
            else
              $nextMonth = $month;
            
            if( in_array( $nextMonth, $spring ) ) $nextSeason = $spring;
            else if( in_array( $nextMonth, $summer ) ) $nextSeason = $summer;
            else if( in_array( $nextMonth, $fall ) ) $nextSeason = $fall;
            else if( in_array( $nextMonth, $winter ) ) $nextSeason = $winter;
            else $nextSeason = $spring;
          ?>
          <?php if( $post == $myposts[0] ) { ?>
            <div class="event_item_group">
            <div class="event_season_name">
              <?php
              switch( $currSeason ) {
                case $spring:
                  echo "SPRING";
                  break;
                case $summer:
                  echo "SUMMER";
                  break;
                case $fall:
                  echo "FALL";
                  break;
                case $winter:
                  echo "WINTER";
                  break;
                default:
                  echo "WINTER";
                  break;
              }
              ?>
            </div>
          <?php } ?>
          <div class="event_item <?php echo ( $currSeason == $nextSeason ? "" : "last" ); ?>">
            <div class="event_image">
              <?php echo wp_get_attachment_image( get_post_meta( $post->ID, 'event_thumbnail', true ) ); ?>
            </div>
            <div class="full_height event_season"></div>
            <div class="event_info">
              <h4 class="event_title"><?php the_title(); ?></h4>
              <p class="event_description"><?php echo get_post_meta( $post->ID, "event_description", true ); ?></p>
            </div>
          </div>
          <?php if( $currSeason != $nextSeason ) { ?>
            </div>
            <div class="event_item_group">
            <div class="event_season_name">
              <?php
              switch( $nextSeason ) {
                case $spring:
                  echo "SPRING";
                  break;
                case $summer:
                  echo "SUMMER";
                  break;
                case $fall:
                  echo "FALL";
                  break;
                case $winter:
                  echo "WINTER";
                  break;
                default:
                  echo "WINTER";
                  break;
              }
              ?>
            </div>
          <?php } ?>
          <?php if( $post == end( $myposts ) ) { ?>
            </div>
          <?php } ?>
        <?php endforeach; 
        wp_reset_postdata();?>
      </div>
    </div>
	<?php endwhile; else: ?>
		<p>Sorry, this page doesn't exist.</p>
	<?php endif; ?>
  <br/>
</div>
<?php get_footer(); ?>

