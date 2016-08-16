<?php get_header(); ?>


<?php
if( have_posts() ) {
  while( have_posts() ) {
    the_post();
    ?>
          <h1><?php the_title() ?></h1>
          <div class='content'>
            <?php the_content() ?>


<h1><?php echo get_post_meta( $post->ID, 'schedule_hour_key', true ); ?></h1>
<h1><?php echo get_post_meta( $post->ID, 'schedule_day_key', true ); ?></h1>


          </div>
        <?php
      }
    }
    else {
      echo 'No posts!';
    }
  ?>


<?php get_footer(); ?>
