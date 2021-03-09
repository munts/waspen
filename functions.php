<?php

namespace Flynt;

use Flynt\Utils\FileLoader;

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/lib/widgets.php';

if (!defined('WP_ENV')) {
    define('WP_ENV', function_exists('wp_get_environment_type') ? wp_get_environment_type() : 'production');
} elseif (!defined('WP_ENVIRONMENT_TYPE')) {
    define('WP_ENVIRONMENT_TYPE', WP_ENV);
}

// Check if the required plugins are installed and activated.
// If they aren't, this function redirects the template rendering to use
// plugin-inactive.php instead and shows a warning in the admin backend.
if (Init::checkRequiredPlugins()) {
    FileLoader::loadPhpFiles('inc');
    add_action('after_setup_theme', ['Flynt\Init', 'initTheme']);
    add_action('after_setup_theme', ['Flynt\Init', 'loadComponents'], 101);
}

// Remove the admin-bar inline-CSS as it isn't compatible with the sticky footer CSS.
// This prevents unintended scrolling on pages with few content, when logged in.
add_theme_support('admin-bar', array('callback' => '__return_false'));

add_action('after_setup_theme', function () {
    /**
     * Make theme available for translation.
     * Translations can be filed in the /languages/ directory.
     */
    load_theme_textdomain('flynt', get_template_directory() . '/languages');
});

function remove_default_widgets()
{
    unregister_widget('WP_Widget_Pages');
    unregister_widget('WP_Widget_Calendar');
    unregister_widget('WP_Widget_Archives');
    unregister_widget('WP_Widget_Links');
    unregister_widget('WP_Widget_Meta');
    unregister_widget('WP_Widget_Recent_Comments');
    unregister_widget('WP_Widget_RSS');
    unregister_widget('WP_Widget_Tag_Cloud');
}

do_action('widgets_init', 'remove_default_widgets', 15);
