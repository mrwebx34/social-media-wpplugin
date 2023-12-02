<?php
/*
Plugin Name: Social Media Links
Description: A simple plugin for managing social media links.
Version: 1.0
Author:  Ranjan
*/

// Activation hook
register_activation_hook(__FILE__, 'social_media_links_activate');

// Deactivation hook
register_deactivation_hook(__FILE__, 'social_media_links_deactivate');

// Uninstall hook
register_uninstall_hook(__FILE__, 'social_media_links_uninstall');

// Activation function
function social_media_links_activate()
{
   
}

// Deactivation function
function social_media_links_deactivate()
{
    
}

// Uninstall function
function social_media_links_uninstall()
{
    
}
function social_media_links_enqueue_styles()
{
    // Bootstrap stylesheet
    wp_enqueue_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css');

    // Font Awesome stylesheet
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css');
    wp_enqueue_script('bootstrap-bundle', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js', array('jquery'), null, true);
}


add_action('wp_enqueue_scripts', 'social_media_links_enqueue_styles');

function enqueue_admin_styles()
{
    wp_enqueue_style('admin-style', plugins_url('admin-style.css', __FILE__));
}
function enqueue_frontend_styles()
{
    wp_enqueue_style('frontend-style', plugins_url('frontend-style.css', __FILE__));
}
add_action('wp_enqueue_scripts', 'enqueue_frontend_styles');

add_action('admin_enqueue_scripts', 'enqueue_admin_styles');

include_once(plugin_dir_path(__FILE__) . 'admin/admin.php');
include_once(plugin_dir_path(__FILE__) . 'public/frontend.php');
