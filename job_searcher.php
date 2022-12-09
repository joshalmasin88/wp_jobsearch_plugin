<?php

if ( ! defined ('ABSPATH') ) exit;

/*
Plugin Name: Job Searcher
Plugin URI: https://CreativePatriot.com
Description: Add a job search on your website
Author: Joshua Almasin
Version: 1.0.0
License: GPLv2 or later
*/



define( 'JS_VERSION' , '1.0.0' );
define ('JS_BASE_PATH', plugin_dir_path( __FILE__ ));


if ( file_exists( JS_BASE_PATH . '/vendor/autoload.php')) {
    require( JS_BASE_PATH . '/vendor/autoload.php');
}

new App\JobSearcher\JobSearcher();