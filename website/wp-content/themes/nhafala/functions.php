<?php
// Register Menus
add_action( 'init', 'register_my_menus' );
add_theme_support( 'post-thumbnails' ); 
add_image_size( 'aktuell-gelb-thumb', 185, 130 ); // Permalink thumbnail size
add_image_size( 'aktuell-rot-thumb', 300, 150, false ); // Permalink thumbnail size
add_image_size( 'aktuell-gruen-thumb', 270, 170 ); // Permalink thumbnail size
add_image_size( 'aktuell-orange-thumb', 200, 200 ); // Permalink thumbnail size
add_image_size( 'aktuell-pink-thumb', 180, 80 ); // Permalink thumbnail size
add_image_size( 'konzert-titel-thumb', 445, 142, true ); // Permalink thumbnail size

add_image_size( 'downloads-gruen-oben-thumb', 300, 200 ); // Permalink thumbnail size
add_image_size( 'download-gelb-oben-thumb', 230, 250 ); // Permalink thumbnail size
add_image_size( 'download-blau-oben-thumb', 300, 210 ); // Permalink thumbnail size
add_image_size( 'download-rot-mitte-thumb', 340, 220 ); // Permalink thumbnail size
add_image_size( 'download-rot-unten-thumb', 330, 275 ); // Permalink thumbnail size
add_image_size( 'download-gruen-unten-thumb', 296, 230 ); // Permalink thumbnail size
add_image_size( 'download-gelb-unten-thumb', 294, 289 ); // Permalink thumbnail size
add_image_size( 'download-pink-unten-thumb', 220, 186 ); // Permalink thumbnail size
add_image_size( 'download-orange-thumb', 248, 235 ); // Permalink thumbnail size
add_image_size( 'download-blau-unten-thumb', 238, 226 ); // Permalink thumbnail size


 
function register_my_menus() {
	register_nav_menus(
		array(
			'main-nav-menu' => __( 'Main Navigation Menu' ),
		    'secondary-menu' => __( 'Secondary Menu' ),
			'tertiary-menu' => __( 'Tertiary Menu' )
		)
	);
}
?>
<?php
if ( function_exists('register_sidebar') ){
    register_sidebar(array(
        'name' => 'calendar',
        'before_widget' => '<div id="calendar">',
        'after_widget' => '</div>',
        'before_title' => '',
        'after_title' => '',
));
}
?>
<?php
if ( function_exists('register_sidebar') ){
    register_sidebar(array(
        'name' => 'facebook_title',
        'before_widget' => '<div id="facebook_title">',
        'after_widget' => '</div>',
        'before_title' => '',
        'after_title' => '',
));
}
?>
<?php
if ( function_exists('register_sidebar') ){
    register_sidebar(array(
        'name' => 'archive',
        'before_widget' => '<div id="archive">',
        'after_widget' => '</div>',
        'before_title' => '',
        'after_title' => '',
));
}
?>
<?php
add_action("login_head", "my_login_head");
function my_login_head() {
	echo "
	<style>
	body.login #login h1 a {
		background: url('".get_bloginfo('template_url')."/elements/Homepage/logofrente.png') no-repeat scroll center top transparent;
		height: 340px;
		width: 423px;
		padding-right: 50px;
	}
	</style>
	";
}
add_filter( 'login_headerurl', 'custom_loginlogo_url' );
function custom_loginlogo_url($url) {
    return 'http://www.nha-fala.ch';
}
?>
<?php
function custom_excerpt_length( $length ) {
	return 60;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 1);
?>
<?php
// Read More link
function new_excerpt_more($more) {
global $post;
return '... <a class="read-more" href="'. get_permalink($post->ID) . '">weiterlesen »</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');
?>
<?php
class JPB_User_Caps {

  // Add our filters
  function JPB_User_Caps(){
    add_filter( 'editable_roles', array(&$this, 'editable_roles'));
    add_filter( 'map_meta_cap', array(&$this, 'map_meta_cap'),10,4);
  }

  // Remove 'Administrator' from the list of roles if the current user is not an admin
  function editable_roles( $roles ){
    if( isset( $roles['administrator'] ) && !current_user_can('administrator') ){
      unset( $roles['administrator']);
    }
    return $roles;
  }

  // If someone is trying to edit or delete and admin and that user isn't an admin, don't allow it
  function map_meta_cap( $caps, $cap, $user_id, $args ){

    switch( $cap ){
        case 'edit_user':
        case 'remove_user':
        case 'promote_user':
            if( isset($args[0]) && $args[0] == $user_id )
                break;
            elseif( !isset($args[0]) )
                $caps[] = 'do_not_allow';
            $other = new WP_User( absint($args[0]) );
            if( $other->has_cap( 'administrator' ) ){
                if(!current_user_can('administrator')){
                    $caps[] = 'do_not_allow';
                }
            }
            break;
        case 'delete_user':
        case 'delete_users':
            if( !isset($args[0]) )
                break;
            $other = new WP_User( absint($args[0]) );
            if( $other->has_cap( 'administrator' ) ){
                if(!current_user_can('administrator')){
                    $caps[] = 'do_not_allow';
                }
            }
            break;
        default:
            break;
    }
    return $caps;
  }

}

$jpb_user_caps = new JPB_User_Caps();
?>