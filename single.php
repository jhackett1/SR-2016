<?php get_header(); ?>

<?php
if( have_posts() ) {
  while( have_posts() ) {
    the_post();

    if ( wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' ) ){
      $feat = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' );
      $feat = $feat[0];
    }else{
      $feat = get_template_directory_uri() . "/img/poster.jpg";
    }
    ?>


<div class="single_container">


          <div class='content'>

            <div class="single_meta">
              <img src="<?php echo $feat; ?>" class="featured_img wow animated fadeIn" data-wow-duration="0.4s"/>
              <h5>By <?php the_author(); ?> &middot; <i class="fa fa-calendar"></i> <?php the_date(); ?> &middot; In <?php the_category(); ?></h5>
              <h2><?php the_title(); ?></h2>
              <hr>
            </div>
            <?php the_content() ?>
            <?php comments_template( $file, $separate_comments ); ?>
          </div>
        <?php
      }
    }
    else {
      echo 'No posts!';
    }
  ?>

  <div id="sidebar">
     <?php dynamic_sidebar( 'home' ); ?>
  </div>
</div>

</article>

<?php get_footer(); ?>
