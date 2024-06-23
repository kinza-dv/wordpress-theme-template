<?php
add_theme_support('menus');
add_theme_support('post-thumbnails');
add_theme_support('title-tag');

add_filter('show_admin_bar', '__return_false'); //Hide adminbar

require_once(__DIR__ . '/inc/carbon-fields.php');
require_once(__DIR__ . '/inc/generated-blocks.php');
require_once(__DIR__ . '/inc/ajax.php');
require_once(__DIR__ . '/inc/post-types.php');
require_once(__DIR__ . '/inc/libs.php');
require_once(__DIR__ . '/inc/duplicate.php');

add_action('after_setup_theme', 'init_autoload');
function init_autoload()
{
    require_once(__DIR__ . '/vendor/autoload.php');
    \Carbon_Fields\Carbon_Fields::boot();
}


function init_enqueue_scripts()
{
    wp_enqueue_style('kinza-style', get_template_directory_uri() . '/styles/style.css');
    wp_enqueue_script('kinza-scripts', get_template_directory_uri() . '/js/scripts.js', array(), '1.0.0', true);

    wp_localize_script('kinza-scripts', 'wp_variables', array(
        'ajax' => admin_url('admin-ajax.php'),
        'site_url' => site_url(),
        'site_assets' => get_template_directory_uri(),
        'is_mobile' => wp_is_mobile(),
        'contacts' => [
            'whatsapp' => get_theme_option('contacts_whatsapp') ?? '#',
            'telegram' => get_theme_option('contacts_telegram') ?? '#',
            'vkontakte' => get_theme_option('contacts_vk') ?? '#',
            'instagram' => get_theme_option('contacts_instagram') ?? '#',
            'phone' => get_theme_option('contacts_phone') ?? '#',
        ],
    ));
}

add_action('wp_enqueue_scripts', 'init_enqueue_scripts');

register_nav_menu('header-menu', __('Шапка'));
register_nav_menu('footer-menu', __('Подвал'));

add_action('admin_menu', function() {
    remove_menu_page('edit.php');
});