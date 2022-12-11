<?php

namespace App\JobSearcher;
use App\JobSearcher\API;
use App\JobSearcher\Options;

class JobSearcher {
    
    /**
     * Method __construct
     *
     * @return void
     */
    public function __construct() {
        add_shortcode( 'jobsearcher', array( new API, 'displayHTML') );
        // AJAX / POST CALLS
        add_action( 'wp_ajax_nopriv_joobleSearch', array( new API, 'joobleSearch'));
        add_action( 'wp_ajax_joobleSearch', array( new API, 'joobleSearch'));
        add_action( 'admin_post_storeAPIKey', array( new API, 'storeAPIKey'));
        add_action( 'admin_post_nopriv_jssaveapi', array( new API, 'storeAPIKey'));

        add_action( 'admin_menu', array( new Options, 'admin_options') );
    }
}