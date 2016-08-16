<?php
/* Template Name: Schedule */
get_header(); ?>

<?php
if( have_posts() ) {
  while( have_posts() ) {
    the_post();
?>

    <div class="page_content">
      <h2 class="page_title"><?php the_title() ?></h1>
      <hr>
      <?php the_content() ?>

      <div id="tabs">
        <ul>
          <li><a href="#tabs-1">Monday</a></li>
          <li><a href="#tabs-2">Tuesday</a></li>
          <li><a href="#tabs-3">Wednesday</a></li>
        </ul>
        <div id="tabs-1">

          <?php
              //New WP_query for custom post types sorted by a particular day
              $args = array(
                'post_type' => 'show',
                'posts_per_page' => 10,
                'meta_key'   => 'schedule_day_key',
              	'meta_value' => 'Mondays',
                'orderby'			=> 'meta_value',
                'order'				=> 'DESC'
              );

              $loop = new WP_Query( $args );
              while ( $loop->have_posts() ) : $loop->the_post();

              //Save the featured image as var $feat
              $feat = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' );
              $feat = $feat[0];

          ?>

          <div class="show">
            <div class="featured_img" style="background-image:url(<?php echo $feat; ?>) "></div>
            <div>
              <h3><?php the_title(); ?></h3>
              <h5><?php echo $hour = get_post_meta( get_the_ID() , 'schedule_hour_key', true); ?></h5>
              <p><?php the_excerpt(); ?></p>
            </div>
          </div>

      <?php
              endwhile;
          ?>
        </div>
        <div id="tabs-2">
          <p></p>
        </div>
        <div id="tabs-3">
          <p></p>
        </div>
      </div>








    </div>
<?php
}
}
else {
  echo 'No posts!';
}
?>



</article>
<?php get_footer(); ?>
