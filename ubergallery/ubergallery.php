<?php

/**
* @package UberGallery
* @version 0.1
*/
/*
Plugin Name: UberGallery
Description: Hooray for variables in comments!
Author: foo
Version: 0.1
Author URI: wordpress.org
*/

require_once ABSPATH . 'wp-admin/includes/plugin.php';

DEFINE(UBERGALLERY_PLUGIN_PATH, dirname(__FILE__) . '/');
//this is hacky, dont care to fix right now
DEFINE(UBERGALLERY_PLUGIN_PATH_RELATIVE, '/wp-content/plugins/ubergallery/resources/');

DEFINE(UBERGALLERY_CONTENT_PATH, ABSPATH . 'wp-content/ubergallery/');
DEFINE(UBERGALLERY_CONTENT_PATH_RELATIVE, '/wp-content/ubergallery/');

DEFINE(UBERGALLERY_CONFIG_PATH, file_exists(UBERGALLERY_CONTENT_PATH . 'galleryConfig.ini')
    ? UBERGALLERY_CONTENT_PATH . 'galleryConfig.ini'
    : UBERGALLERY_PLUGIN_PATH . 'resources/galleryConfig.ini'
);

DEFINE(UBERGALLERY_RENDER_PATH, file_exists(UBERGALLERY_CONTENT_PATH . 'render.php')
    ? UBERGALLERY_CONTENT_PATH . 'render.php'
    : UBERGALLERY_PLUGIN_PATH . 'resources/render.php'
);

DEFINE(UBERGALLERY_STYLE_PATH_RELATIVE, file_exists(UBERGALLERY_CONTENT_PATH . 'style.css')
    ? UBERGALLERY_CONTENT_PATH_RELATIVE . 'style.css'
    : UBERGALLERY_PLUGIN_PATH_RELATIVE . 'style.css'
);

function uberGallery($params)
{
    $galleries = UBERGALLERY_CONTENT_PATH . 'galleries/';

    $galleryName = array_key_exists('name', $params) ? $params['name'] : '';

    // Include the UberGallery class
    include('resources/UberGallery.php');

    // Initialize the UberGallery object
    $gallery = new UberGallery();

    // Initialize the gallery array
    $galleryArray = $gallery->readImageDirectory($galleries . $galleryName);

    include(UBERGALLERY_RENDER_PATH);
}

add_shortcode( 'ubergallery', 'uberGallery' );
