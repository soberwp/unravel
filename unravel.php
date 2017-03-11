<?php
/*
Plugin Name:        Unravel
Plugin URI:         http://github.com/soberwp/unravel
Description:        WordPress plugin to separate concerns for plugins Models and Advanced Custom Fields
Version:            1.0.0
Author:             Sober
Author URI:         http://github.com/soberwp/
License:            MIT License
License URI:        http://opensource.org/licenses/MIT
GitHub Plugin URI:  soberwp/unravel
GitHub Branch:      master
*/
namespace Sober\Unravel;

use Sober\Unravel\Unravel;
use Sober\Unravel\Migrate\Models;
use Sober\Unravel\Migrate\AdvancedCustomFields;

/**
 * Plugin
 */
if (!defined('ABSPATH')) {
    die;
};

require(file_exists($composer = __DIR__ . '/vendor/autoload.php') ? $composer : __DIR__ . '/dist/autoload.php');

/**
 * Hook into after_setup_theme and initalise Unravel
 */
add_action('after_setup_theme', function () {
    new Unravel();
});

/**
 * Hook into register_deactivation_hook and migrate files back to their defaults
 */
register_deactivation_hook(__FILE__, function () {
    (new AdvancedCustomFields())->setup()->deregister();
    (new Models())->setup()->deregister();
});
