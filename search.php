<?php get_header(); ?>

<div class="page_content">
  <h2 class="page_title">Results: <?php echo $s; ?></h2>
  <hr>
  <div class="grid">
    <?php

    $s=get_search_query();
    $args = array(
    's' =>$s
    );

    $search_query = new WP_Query( $args );
    if ( $search_query->have_posts() ) {
    	while ( $search_query->have_posts() ) {
    		$search_query->the_post();
        $feat = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' );
        $feat = $feat[0];
        ?>
        <!-- Add spacing between posts with this div element -->
        <div class="spacer">
          <!-- A single latest post tile -->
          <div class="latest_post wow animated fadeIn" data-wow-duration="0.3s">
            <div class="bg" style="background-image:url(<?php echo $feat; ?>) "></div>
            <?php the_category(); ?>
            <h3><?php the_title(); ?></h3>
            <?php the_excerpt(); ?>
            <a class="cover" href="<?php the_permalink(); ?>"></a>
          </div>
        </div>
      <?php
      }
      }
      else {
        echo 'There were no posts matching that search. Try again?';
      }
      ?>

    </div>

    <div class="pagination">
      <?php previous_posts_link( '<i class="fa fa-caret-left"></i> Newer articles' ); ?>
      <?php next_posts_link( 'Older articles <i class="fa fa-caret-right"></i>' ); ?>
    </div>

  </div>
</article>
<?php get_footer(); ?>
