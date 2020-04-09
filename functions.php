<?php
// Require Materialize Custom Nav Walker Class
require get_template_directory() . '/class-materialize-navwalker.php';

add_action('wp_footer', 'materialize_nav_walker_dropdown_init');

if (! function_exists('materialize_nav_walker_dropdown_init')) {

    function materialize_nav_walker_dropdown_init()
    {
        ?>
<script>
          jQuery(document).ready(function($) {
              jQuery(".nav-item-dropdown-button").dropdown({constrainWidth: true});
              jQuery(".side-menu-nav-item-dropdown-button").dropdown({constrainWidth: false});
              jQuery(".button-collapse").sideNav();
          });
</script>


<?php
    }
}

// nav walker class completed

$args_background = array(
'default-color' => '000000',
'default-image' => '%1$s/assets/images/background.jpg',
);

$args_header = [
    'flex-width' => true,
    'width' => 980,
    'flex-height' => true,
    'height' => 200,
    'default-image' => get_template_directory_uri() . '/assets/images/header.jpg',
    'uploads' => true
];

// Add theme support
add_theme_support('title-tag');
add_theme_support('post-thumbnails');
add_theme_support('post-formats', 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat');
add_theme_support('automatic-feed-links');
add_theme_support('custom-header', $args_header);
add_theme_support('custom-background',$args_background);
add_theme_support('custom-logo');
add_theme_support('customize-selective-refresh-widgets');
add_theme_support('starter-content');

// Load in our CSS
function embeddedSaugat_enqueue_styles()
{
    // include stylesheets
    wp_enqueue_style('materialize-css', get_stylesheet_directory_uri() . '/assets/styles/materialize.min.css', [], time(), 'all');
    wp_enqueue_style('main-css', get_stylesheet_directory_uri() . '/style.css', [], time(), 'all');
    wp_enqueue_style('gfonts-css', 'https://fonts.googleapis.com/icon?family=Material+Icons', [], time(), 'all');
    
    // include javascripts
    wp_enqueue_script('jquery-script', get_template_directory_uri() . '/assets/scripts/jquery.js', [], time(), false);
    wp_enqueue_script('materialize-script', get_template_directory_uri() . '/assets/scripts/materialize.min.js', [], time(), false);
    wp_enqueue_script('custom-script', get_template_directory_uri() . '/assets/scripts/script.js', [], time(), false);
}
add_action('wp_enqueue_scripts', 'embeddedSaugat_enqueue_styles');

// Register Menu Locations
register_nav_menus([
    'main-menu' => esc_html__('embeddedSaugat Menu', 'embeddedSaugat')
]);


//move comment box to the bottom
function wpb_move_comment_field_to_bottom( $fields ) {
    $comment_field = $fields['comment'];
    unset( $fields['comment'] );
    $fields['comment'] = $comment_field;
    return $fields;
}

add_filter( 'comment_form_fields', 'wpb_move_comment_field_to_bottom' );

