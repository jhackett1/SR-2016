<?php get_header(); ?>

<div class="page_content">
  <h2 class="page_title"><?php
    if (is_category()) {
      single_cat_title();
      ?></h2><?php
    }
    else if (is_tag()){
      echo 'Topic: ';
      single_tag_title();
      ?></h2><?php
    }
    else if (is_year()){
      echo get_the_date();
      ?></h2><?php
    }
    else if (is_month()){
      echo get_the_date('F Y');
      ?></h2><?php
    }
    else if (is_year()){
      echo get_the_date('Y');
      ?></h2><?php
    }
    else {
      echo 'Archives';
      ?></h2><?php
    }
  ?></h2>
  <hr>
  <div class="grid">
    <?php
    if( have_posts() ) {
      while( have_posts() ) {
        the_post();
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
        echo 'No posts!';
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
