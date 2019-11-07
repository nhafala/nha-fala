<?php

function nhafala_setup()
{
  load_theme_textdomain('nhafala');

  add_theme_support('automatic-feed-links');

  add_theme_support('title-tag');

  add_theme_support('post-thumbnails');

  add_image_size('avatar', 150, 150, true);
  add_image_size('thumbnail', 150, 150, true);
  add_image_size('nhafala-project-thumbnail', 640, 480, true);
  add_image_size('nhafala-post-banner', 640, 9999, false);
  add_image_size('nhafala-gallery-full', 1440, 960, false);

	register_nav_menus(
		array(
      'top'    => __( 'Top Menu', 'nhafala' ),
      'footer' => __( 'Footer Menu', 'nhafala'),
			'social' => __( 'Social Links Menu', 'nhafala' ),
		)
  );

	add_theme_support(
		'html5', array(
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		)
  );

  add_theme_support(
		'custom-logo', array(
			'flex-width' => true,
		)
  );
  load_theme_textdomain('nhafala', get_template_directory() . '/languages');
}

add_action('after_setup_theme', 'nhafala_setup');

function nhafala_widgets_init() {
	register_sidebar(
		array(
			'name'          => __( 'Blog Sidebar', 'nhafala' ),
			'id'            => 'sidebar-1',
			'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'nhafala' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Footer 1', 'nhafala' ),
			'id'            => 'sidebar-2',
			'description'   => __( 'Add widgets here to appear in your footer.', 'nhafala' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Footer 2', 'nhafala' ),
			'id'            => 'sidebar-3',
			'description'   => __( 'Add widgets here to appear in your footer.', 'nhafala' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
}
add_action( 'widgets_init', 'nhafala_widgets_init' );

function nhafala_scripts()
{
    wp_enqueue_style(
        'nhafala2018',
        get_bloginfo('template_url') . "/assets/css/style.css"
    );
    wp_enqueue_script(
        'nhafala2018',
        get_bloginfo('template_url') . "/assets/js/script.js",
        array('jquery'),
        $version = null,
        $in_footer = true
    );
    wp_localize_script('nhafala2018', 'ajax_var', array('url' => admin_url('admin-ajax.php')));
    // wp_deregister_style('tm-builder-modules-style');
    // wp_deregister_style('tm-builder-modules-grid');
    // wp_deregister_style('tm-builder-swiper');
    wp_deregister_style('pie_front_css');
    wp_dequeue_style('cherry-projects-styles');
    wp_deregister_style('cherry-projects-styles');
    wp_deregister_style('cherry-services-theme');
    wp_deregister_style('cherry-services-grid');
    wp_deregister_style('cherry-services');
}
add_action('wp_enqueue_scripts', 'nhafala_scripts', 99999);

function nhafala_deregister_scripts() {
  // wp_deregister_style('tm-builder-modules-style');
  // wp_deregister_style('tm-builder-modules-grid');
  // wp_deregister_style('tm-builder-swiper');
  // wp_deregister_style('pie_front_css');
  // wp_dequeue_style('cherry-projects-styles');
  // wp_deregister_style('cherry-projects-styles');
  // wp_deregister_style('cherry-services-theme');
  // wp_deregister_style('nggallery');
  wp_deregister_style('fontawesome');
  // wp_deregister_style('nextgen_basic_thumbnails_style');
  // wp_dequeue_style('nextgen_basic_thumbnails_style');
  wp_deregister_style('nextgen_pagination_style');
  wp_dequeue_style('nextgen_pagination_style');
  wp_dequeue_style('ngg_trigger_buttons');
  // wp_dequeue_style('eo_front');
  //wp_deregister_style('eo_front');
  //wp_deregister_style('eo_calendar-style');
}
add_action('wp_print_styles', 'nhafala_deregister_scripts', 99999);

function disable_wp_emojicons()
{
    remove_action('admin_print_styles', 'print_emoji_styles');
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
    remove_filter('the_content_feed', 'wp_staticize_emoji');
    remove_filter('comment_text_rss', 'wp_staticize_emoji');
    add_filter('tiny_mce_plugins', 'disable_emojicons_tinymce');
}
function disable_emojicons_tinymce($plugins)
{
    if (is_array($plugins)) {
        return array_diff($plugins, array('wpemoji'));
    } else {
        return array();
    }
}
add_action('init', 'disable_wp_emojicons');


function nhafala_favicons()
{
?>

<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
<link rel="apple-touch-icon" href="/apple-touch-icon.png" />
<link rel="apple-touch-icon" sizes="57x57" href="/apple-touch-icon-57x57.png" />
<link rel="apple-touch-icon" sizes="72x72" href="/apple-touch-icon-72x72.png" />
<link rel="apple-touch-icon" sizes="76x76" href="/apple-touch-icon-76x76.png" />
<link rel="apple-touch-icon" sizes="114x114" href="/apple-touch-icon-114x114.png" />
<link rel="apple-touch-icon" sizes="120x120" href="/apple-touch-icon-120x120.png" />
<link rel="apple-touch-icon" sizes="144x144" href="/apple-touch-icon-144x144.png" />
<link rel="apple-touch-icon" sizes="152x152" href="/apple-touch-icon-152x152.png" />
<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon-180x180.png" />

<?php
}
add_action('wp_head', 'nhafala_favicons', 10, 3);

function get_theme_option($option_name)
{
	$response = null;
	$options = get_option('theme_mods_nhafala2018', array());
	if (isset($options[$option_name]) && $options[$option_name]) {
		$response = $options[$option_name];
	}
	return $response;
}

function cc_mime_types($mimes) {
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
  }
add_filter('upload_mimes', 'cc_mime_types');

function get_nhafala_logo() {
  $html = "";
  if ($image_id = get_theme_option('custom_logo')) {
    $mime = get_post_mime_type($image_id);
    if ("image/svg+xml" == $mime) {
      $image = wp_get_attachment_image_src($image_id, 'large');
      $path = path_from_url($image[0]);
      $html = file_get_contents($path);
    } else {
      $html = "<img src='{$image[0]}' alt='". get_bloginfo('name') . "' width='{$image[1]}' height='{$image[2]}'>";
    }
  }
  return $html;
}

function path_from_url($url) {
  $path = ABSPATH;
  $url = $path . substr($url, strpos($url, 'wp-content'));
  return $url;
  // print_r($url);
}

//add_filter('get_the_excerpt', 'nhafala_excerpt');
//
//function nhafala_excerpt($excerpt)
//{
//  $content = get_the_content();
//  $pattern= '/\[.*\]/';
//  $excerpt = preg_replace($pattern, '', $content);
//  $excerpt = apply_filters('the_excerpt', $excerpt);
//  $excerpt = wp_trim_words($excerpt, 55, null);
//  return $excerpt;
//}

function nhafala_excerpt_more( $link ) {
  return;
}
add_filter( 'excerpt_more', 'nhafala_excerpt_more' );

function nhafala_time_link() {

  $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';

  $time_string = sprintf(
    $time_string,
    get_the_date( DATE_W3C ),
    get_the_date(),
    get_the_modified_date( DATE_W3C ),
    get_the_modified_date()
  );

  // Wrap the time string in a link, and preface it with 'Posted on'.
  return sprintf(
    /* translators: %s: post date */
    __( '%s', 'nhafala' ),
    '<p class="entry-date"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a></p>'
  );
}

add_shortcode('group_calendars', 'post_link');

function post_link()
{
    if (is_user_logged_in()) {
        ob_start();
        ?>
        <h3>Kalender der verschiedenen<br> Gruppen zum abonnieren</h3>
<!--        <ul>-->
<!--            <li>-->
<!--                <a href="https://calendar.google.com/calendar/ical/8733709plbmcsqluaq0fuq62ls%40group.calendar.google.com/public/basic.ics"-->
<!--                   target="_blank">Gruppe «hurrlibus»</a></li>-->
<!--            <li>-->
<!--                <a href="https://calendar.google.com/calendar/ical/ntlq0beg6fage4ddd0444ndc28%40group.calendar.google.com/public/basic.ics"-->
<!--                   target="_blank">Gruppe «trottinett»</a></li>-->
<!--            <li>-->
<!--                <a href="https://calendar.google.com/calendar/ical/tttq7u0fad0gcgjvajet5n511s%40group.calendar.google.com/public/basic.ics"-->
<!--                   target="_blank">Gruppe «rock the feet»</a></li>-->
<!--            <li>-->
<!--                <a href="https://calendar.google.com/calendar/ical/c5bi43jkab95ut958usl133js4%40group.calendar.google.com/public/basic.ics"-->
<!--                   target="_blank">Gruppe «il pedone»</a></li>-->
<!--        </ul>-->
        <ul>
            <li>
                <?php
                echo do_shortcode('[eo_subscribe title="Probe hurrlibus events" type="webcal" class="sf-calendar-subscribe" category="probe-hurrlibus"] Probe hurrlibus events [/eo_subscribe]');
                ?>
            </li>
            <li>
                <?php
                echo do_shortcode('[eo_subscribe title="Probe geradewaegs" type="webcal" class="sf-calendar-subscribe" category="probe-geradewaegs"] Probe geradewaegs events [/eo_subscribe]');
                ?>
            </li>
            <li>
                <?php
                echo do_shortcode('[eo_subscribe title="Probe rockets events" type="webcal" class="sf-calendar-subscribe" category="probe-rockets"] Probe rockets events [/eo_subscribe]');
                ?>
            </li>
            <li>
                <?php
                echo do_shortcode('[eo_subscribe title="Probe trottinett events" type="webcal" class="sf-calendar-subscribe" category="probe-trottinett"] Probe trottinett events [/eo_subscribe]');
                ?>
            </li>
        </ul>
        <?php
        wp_reset_postdata(); ?>
        <?php $myvariable = ob_get_clean();
        return $myvariable;
    }
}

/** Show message upon login */
add_action('wp_login', function($login, $user) {
  set_transient("_nhafala_login_{$user->ID}", 1, 10 * MINUTE_IN_SECONDS);
  return $user;
}, 10, 2);

//function tn_custom_excerpt_length( $length ) {
//    return 100;
//}
//add_filter( 'excerpt_length', 'tn_custom_excerpt_length', 999 );

include_once TEMPLATEPATH . "/includes/calendar.functions.php";
include_once TEMPLATEPATH . "/includes/icon.functions.php";
include_once TEMPLATEPATH . "/includes/template.functions.php";
include_once TEMPLATEPATH . "/includes/gallery.functions.php";
include_once TEMPLATEPATH . "/includes/social.functions.php";









