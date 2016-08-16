<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php wp_title('|','true','right'); ?><?php bloginfo('name'); ?> | <?php bloginfo('description'); ?></title>
  <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.png" />
  <?php wp_head(); ?>

  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:site" content="@WminSmokeTV">
  <meta name="twitter:creator" content="@WminSmokeTV">
  <meta name="twitter:title" content="Smoke TV">
  <meta name="twitter:description" content="Student television at the University of Westminster">
  <meta name="twitter:image" content="http://uwsu.com/tv/wp-content/uploads/sites/5/2016/08/13669634_1169001193166863_7980080959781773292_n.jpg">

  <meta property="fb:app_id" content="1134129026651501" />
  <meta property="og:url" content="<?php the_permalink() ?>"/>
  <meta property="og:title" content="Smoke TV" />
  <meta property="og:description" content="Student television at the University of Westminster" />
  <meta property="og:type" content="website" />
  <meta property="og:image" content="http://uwsu.com/tv/wp-content/uploads/sites/5/2016/08/13669634_1169001193166863_7980080959781773292_n.jpg">

</head>
<body>

<section id="overlay"></section>
<?php get_template_part( "search-modal" ); ?>
<?php get_template_part( "menu-panel" ); ?>

<header id="normal" class="mobilehide">
  <div class="container">
    <nav>
      <?php wp_nav_menu( array( 'theme_location' => 'top' ) ); ?>
    </nav>
    <nav>
        <?php wp_nav_menu( array( 'theme_location' => 'social' ) ); ?>
    </nav>
  </div>
</header>

<?php get_template_part( "search-modal" ); ?>

<script>
  new WOW().init();
</script>

<!-- A background image -->
<section id="hero" style="background-image: url( <?php echo get_template_directory_uri(); ?>/img/cover.jpg )">
  <div class="grad"></div>
</section>

<!-- Fetch the logo image if one is set. Else, fetch the site title as a H1 element -->
<a id="logo" href="<?php bloginfo("url"); ?>">
  <?php if ( get_theme_mod( 'themeslug_logo' ) ) :
    if( is_home() || is_front_page() ) : ?>
          <img class="wow animated fadeInUp" src='<?php echo esc_url( get_theme_mod( 'themeslug_logo' ) ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'>
    <?php else : ?>
        <img src='<?php echo esc_url( get_theme_mod( 'themeslug_logo' ) ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'>
    <?php endif;
  else : ?>
      <h1 id="site-title"><?php bloginfo('title'); ?></h1>
  <?php endif; ?>
</a>


<!-- The central page article -->
<article id="homepage">

  <!-- The logo and main menu -->
  <section id="menu">
    <!-- The main menu -->
    <nav>
      <?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
    </nav>
    <span id="burger" class="menu-on"><i class="fa fa-bars"></i> Menu</span>
  </section>

  <!-- The player icon -->
  <a href="http://uwsu.com/player/index.html"
    onclick="return !window.open(this.href, 'Listen Live', 'resizable=no,width=300,height=615')"
    target="_blank">
    <section id="player" class="wow animated fadeInDown" data-wow-delay="0.6s" data-wow-duration="0.4s">
      <div id="info">
        <i class="fa fa-play"></i>
        <h5>Smoke Radio</h5>
        <h4>Jukebox</h4>
      </div>
      <div id="desc">
        <p><i class="fa fa-music"></i> Listen live!</p>
        <div id="shine"></div>
      </div>
    </section>
  </a>
