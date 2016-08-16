<?php

//Initial addition of responsive styling and jQuery
	wp_enqueue_style( 'Styles', get_stylesheet_uri() );
	wp_enqueue_style( 'FontAwesome', get_stylesheet_directory_uri() . '/font-awesome/css/font-awesome.min.css' );
	wp_enqueue_script( 'jquery', get_template_directory_uri() . '/js/jquery-1.12.4.min.js');
 	wp_enqueue_script( 'jqueryui', get_template_directory_uri() . 'https://code.jquery.com/ui/1.12.0/jquery-ui.min.js');
	wp_enqueue_script( 'masthead', get_template_directory_uri() . '/js/masthead.js');
	wp_enqueue_script( 'wow', get_template_directory_uri() . '/js/wow.js');
	wp_enqueue_script( 'masonry', 'https://cdnjs.cloudflare.com/ajax/libs/masonry/3.3.2/masonry.pkgd.min.js');

//Adds in Google Web fonts
	function load_fonts() {
		wp_register_style('googleFonts', 'https://fonts.googleapis.com/css?family=Oswald:400,700,300|Lato:400,300,400italic,700');
		wp_enqueue_style( 'googleFonts');
		}
		add_action('wp_print_styles', 'load_fonts');

//Hide visual editor for everyone
add_filter('user_can_richedit' , create_function('' , 'return false;') , 50);

//Menu registration
	 register_nav_menus(array(
	   'top' => __('Smoke Media Menu'),
		 'primary' => __('Sections Menu'),
		 'social' => __('Social Menu'),
	   'footer' => __('Footer Menu'),
	 ));

//Allows featured images
	 add_theme_support( 'post-thumbnails' );

//Reduce excerpt length
			 function custom_excerpt_length( $length ) {
			return 15;
		}
		add_filter( 'excerpt_length', 'custom_excerpt_length', 15 );

//Custom read more
	function new_excerpt_more( $more ) {
		return '...';
	}
	add_filter('excerpt_more', 'new_excerpt_more');

//Set up two sidebar and other widgetised areas
function sidebar() {

	register_sidebar( array(
		'name'          => 'Posts sidebar',
		'id'            => 'posts',
		'before_widget' => '<div class="widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => 'Homepage sidebar',
		'id'            => 'home',
		'before_widget' => '<div class="widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>',
	) );

}
add_action( 'widgets_init', 'sidebar' );

//Hide the "featured" category and others on the front-end
			add_filter('get_the_terms', 'hide_categories_terms', 10, 3);
			function hide_categories_terms($terms, $post_id, $taxonomy){
			    $exclude = array('featured', 'uncategorized', 'sport-news', 'screen-review', 'screen-news', 'sport-feature', 'lifestyle-news', 'lifestyle-feature', 'uni-news', 'lifestyle-review', 'arts-review', 'arts-feature', 'arts-news', 'arts-short-fuse', 'music-review', 'music-feature', 'music-short-fuse', 'music-news', 'games-review', 'games-feature', 'games-news', 'games-short-fuse', 'local-news');
			    if (!is_admin()) {
			        foreach($terms as $key => $term){
			            if($term->taxonomy == "category"){
			                if(in_array($term->slug, $exclude)) unset($terms[$key]);
			            }
			        }
			    }
			    return $terms;
			};

//Allow image logo
function themeslug_theme_customizer( $wp_customize ) {
	$wp_customize->add_section( 'themeslug_logo_section' , array(
		'title'       => __( 'Logo', 'themeslug' ),
		'priority'    => 30,
		'description' => 'Upload a logo to replace the default site name and description in the header',
	) );

	$wp_customize->add_setting( 'themeslug_logo' );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'themeslug_logo', array(
	    'label'    => __( 'Logo', 'themeslug' ),
	    'section'  => 'themeslug_logo_section',
	    'settings' => 'themeslug_logo',
	) ) );
}
add_action( 'customize_register', 'themeslug_theme_customizer' );


//Register custom Twitter widget
class smoke_twitter_feed extends WP_Widget {
	function __construct(){
		parent::__construct(false, $name =  __('Smoke Twitter Feed'));
	}
	function form(){

	}
	function update(){

	}
	function widget($args, $instance){
		echo '<div class="widget mobilehide">' ;
		echo '<h4>Tweets</h4><hr>' ;
		?>
			<a class="twitter-timeline" data-chrome="transparent noheader nofooter" data-height="500" href="https://twitter.com/dinosaurlord/lists/smoke">A Twitter List by dinosaurlord</a> <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
		<?php
		echo '</div>' ;
	}
}
add_action('widgets_init', function(){
register_widget('smoke_twitter_feed');
});

//Register the subscribe widget


class smoke_subscribe extends WP_Widget {
	function __construct(){
		parent::__construct(false, $name =  __('Smoke Subscribe'));
	}
	function form(){
	}
	function update(){
	}
	function widget($args, $instance){
		echo '<div class="widget red mobilehide">' ;
		echo '<h4>Get involved</h4><hr>' ;
		?>
		<p>All current University of Westminster students can join Smoke Radio. Get on our mailing list:</p>
		<!-- Begin MailChimp Signup Form -->
		<link href="//cdn-images.mailchimp.com/embedcode/slim-10_7.css" rel="stylesheet" type="text/css">
		<div id="mc_embed_signup">
		<form action="//media.us13.list-manage.com/subscribe/post?u=bae3fdf7dc6f735f144847240&amp;id=ffaab9e48d" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
		    <div id="mc_embed_signup_scroll">

			<input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'" required>
		    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
		    <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_bae3fdf7dc6f735f144847240_ffaab9e48d" tabindex="-1" value=""></div>
		    <div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
		    </div>
		</form>
		</div>

		<!--End mc_embed_signup-->
		<?php
		echo '</div>' ;
	}
}
add_action('widgets_init', function(){
register_widget('smoke_subscribe');
});




//Register custom post types for shows
function register_shows() {
  $labels = array(
		'name'               => _x( 'Shows', 'Shows' ),
    'singular_name'      => _x( 'Show', 'Show' ),
    'add_new'            => _x( 'Add New', 'Show' ),
    'add_new_item'       => __( 'Add a Show' ),
    'edit_item'          => __( 'Edit Show' ),
    'new_item'           => __( 'Add a Show' ),
    'all_items'          => __( 'All Shows' ),
    'view_item'          => __( 'View Show' ),
    'search_items'       => __( 'Search Shows' ),
    'not_found'          => __( 'No Shows' ),
    'not_found_in_trash' => __( 'No old shows found' ),
    'parent_item_colon'  => '',
    'menu_name'          => 'Shows'
	);
	$args = array(
		'labels'        => $labels,
		'description'   => 'All scheduled Smoke Radio shows',
		'public'        => true,
		'menu_position' => 5,
		'menu_icon'     => 'dashicons-format-audio',
		'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt'  ),
		'has_archive'   => true,
	);
  register_post_type( 'show', $args );
}

add_action( 'init', 'register_shows' );

// Update messages in admin UI for show post type
function updated_show_messages( $messages ) {
  global $post, $post_ID;
  $messages['show'] = array(
    0 => '',
    1 => sprintf( __('Show info updated. <a href="%s">View show</a>'), esc_url( get_permalink($post_ID) ) ),
    2 => __('Custom field updated.'),
    3 => __('Custom field deleted.'),
    4 => __('Show info has been updated.'),
    5 => isset($_GET['revision']) ? sprintf( __('Show restored to revision from %s'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
    6 => sprintf( __('The show has been added to the schedule. <a href="%s">View show info</a>'), esc_url( get_permalink($post_ID) ) ),
    7 => __('Show saved.'),
    8 => sprintf( __('Show submitted to the schedule. <a target="_blank" href="%s">Preview product</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
    9 => sprintf( __('Show scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview show</a>'), date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
    10 => sprintf( __('Show draft updated. <a target="_blank" href="%s">Preview show</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
  );
  return $messages;
}
add_filter( 'post_updated_messages', 'updated_show_messages' );





// Register a custom meta box for schedule deets
add_action( 'add_meta_boxes', 'show_schedule_details' );

function show_schedule_details() {
    add_meta_box(
        'show_schedule_details', //Unique meta box ID
        __( 'Scheduling', 'myplugin_textdomain' ), //User-readable title for meta box
        'schedule_details_content', //The callback function to add content
        'show', //Custom post type association
        'side', //Appear on the side of the editor
        'high' //And at the top
    );
}

// Fill the custom meta box with content

function schedule_details_content( $post ) {

	//Nonce for security
  wp_nonce_field( plugin_basename( __FILE__ ), 'schedule_details_nonce' );

	// Set hour
	?>
  <label for="schedule_hour">What hour does this show air (24h)?</label>
	<?php $value = get_post_meta( $post->ID, 'schedule_hour_key', true ); ?>
  <input type="time" id="schedule_hour" name="schedule_hour" value="<?php echo $value; ?>" />
	<?php

	// Set day
	?>
	<br><label for="schedule_day">What day does this show air?</label>
	<?php $value = get_post_meta( $post->ID, 'schedule_day_key', true ); ?>
	<select type="text" id="schedule_day" name="schedule_day">
		<option value="Mondays" <?php if ( 'Mondays' == $value ) echo 'selected'; ?> >Monday</option>
	  <option value="Tuesdays" <?php if ( 'Tuesdays' == $value ) echo 'selected'; ?> >Tuesday</option>
	  <option value="Wednesdays" <?php if ( 'Wednesdays' == $value ) echo 'selected'; ?> >Wednesday</option>
		<option value="Thursdays" <?php if ( 'Thursdays' == $value ) echo 'selected'; ?> >Thursday</option>
		<option value="Fridays" <?php if ( 'Fridays' == $value ) echo 'selected'; ?> >Friday</option>
		<option value="Saturdays" <?php if ( 'Saturdays' == $value ) echo 'selected'; ?> >Saturday</option>
		<option value="Sundays" <?php if ( 'Sundays' == $value ) echo 'selected'; ?> >Sunday</option>
	</select>
		<?php

}

//Save meta box input to a pair of custom fields
add_action( 'save_post', 'save_schedule' );

function save_schedule( $post_id ) {
    if ( array_key_exists('schedule_hour', $_POST ) ) {
        update_post_meta( $post_id,
           'schedule_hour_key',
            $_POST['schedule_hour']
        );
    }
		if ( array_key_exists('schedule_day', $_POST ) ) {
        update_post_meta( $post_id,
           'schedule_day_key',
            $_POST['schedule_day']
        );
    }
}

// Add new table headings for scheduling info in admin view
add_filter('manage_show_posts_columns', 'add_show_column_headings');

function add_show_column_headings( $defaults ) {
    $defaults['hour']  = 'Hour';
    $defaults['day']    = 'Day';
    return $defaults;
}

// And populate those new column headings with meta fields
add_action( 'manage_show_posts_custom_column', 'display_quick_data', 10, 2 );

function display_quick_data( $column_name, $post_id ) {
    if ($column_name == 'hour') {
    echo get_post_meta( $post_id, 'schedule_hour_key', true );
    }
    if ($column_name == 'day') {
    echo get_post_meta( $post_id, 'schedule_day_key', true );
    }
}
