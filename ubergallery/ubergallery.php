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

$uberGal = ABSPATH . 'wp-content/ubergallery/';
DEFINE('UBERGALLERY_RENDERER_PATH', ABSPATH . 'wp-content/plugins/ubergallery/index.php');
DEFINE('UBERGALLERY_GALLERY_PATH', $uberGal . 'galleries/');

function uberGallery($params)
{
    $galleryName = array_key_exists('name', $params) ? $params['name'] : '';

    // Include the UberGallery class
    include('resources/UberGallery.php');

    // Initialize the UberGallery object
    $gallery = new UberGallery();

    // Initialize the gallery array
    $galleryArray = $gallery->readImageDirectory(UBERGALLERY_GALLERY_PATH . $galleryName);

    // Initialize the theme
    if (file_exists(UBERGALLERY_RENDERER_PATH)) {
        include(UBERGALLERY_RENDERER_PATH);
    } else {
        die('ERROR: Failed to load renderer');
    }
}

add_shortcode( 'ubergallery', 'uberGallery' );
