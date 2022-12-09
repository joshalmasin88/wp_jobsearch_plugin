<?php

namespace App\JobSearcher;
use App\JobSearcher\API;

class JobSearcher {
    
    /**
     * Method __construct
     *
     * @return void
     */
    public function __construct() {
        add_shortcode( 'jobsearcher', array( new API, 'renderHTML') );
        add_action( 'wp_ajax_nopriv_joobleSearch', array( new API, 'joobleSearch'));
        add_action( 'wp_ajax_joobleSearch', array( new API, 'joobleSearch'));

    }
}