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

function uberGallery($params)
{
    $galleries = 'wp-content/ubergallery/galleries/';
    $render = 'wp-content/plugins/ubergallery/render.php';

    $galleryName = array_key_exists('name', $params) ? $params['name'] : '';

    // Include the UberGallery class
    include('resources/UberGallery.php');

    // Initialize the UberGallery object
    $gallery = new UberGallery();

    // Initialize the gallery array
    $galleryArray = $gallery->readImageDirectory($galleries . $galleryName);

    // Initialize the theme
    if (file_exists($render)) {
        include($render);
    } else {
        die('ERROR: Failed to load renderer');
    }
}

add_shortcode( 'ubergallery', 'uberGallery' );
