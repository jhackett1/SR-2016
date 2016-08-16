<?php get_header(); ?>

  <!-- The three featured stories -->
  <section id="featured">
    <?php
    //The loop
    $featured_query = new WP_Query(
      array(
        'cat' => '1',
        'posts_per_page' => '3'
      )
    );
    if ( $featured_query->have_posts() ){
      while ( $featured_query->have_posts() && $counter<3 ){
        $featured_query->the_post();
        if ( wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' ) ){
          $feat = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' );
          $feat = $feat[0];
        }else{
          $feat = get_template_directory_uri() . "/img/poster.jpg";
        }
        ?>
          <div class="featured wow animated fadeIn" data-wow-duration="0.3s" style="background-image:url(<?php echo $feat; ?>) ">
              <a class="cover" href="<?php the_permalink(); ?>"></a>
              <div class="grad"></div>
              <?php the_category(); ?>
              <h3><?php the_title(); ?></h3>
            </div>
          </div>
          <?php
          //End the loop
          };
        };
        ?>
  </section>

  <!-- Three-column flexbox container -->
  <section id="latest">

    <!-- Four latest articles -->
    <div id="latest">
      <h2>The latest</h2>
      <hr>
      <!-- Flexbox container for latest posts -->
      <div id="latest_box">
        <?php
        //The loop
        $featured_query = new WP_Query(
          array(
            'posts_per_page' => '6'
          )
        );
        if ( $featured_query->have_posts() ){
          while ( $featured_query->have_posts() && $counter<3 ){
            $featured_query->the_post();
            if ( wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' ) ){
              $feat = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' );
              $feat = $feat[0];
            }else{
              $feat = get_template_directory_uri() . "/img/poster.jpg";
            }
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
              //End the loop
              };
            };
            ?>
        <!-- End the flexbox container of latest posts -->
        </div>
    <!-- End the "latest" div -->

    <!-- The add banner -->
    <!-- <section id="promo">
      <img src="<?php echo get_template_directory_uri(); ?>/img/ad.jpg" />
    </section> -->

    </div>

    <!-- The responsive sidebar -->
    <div id="sidebar">
       <?php dynamic_sidebar( 'home' ); ?>
    </div>

  </section>



</article>

<?php get_footer(); ?>
