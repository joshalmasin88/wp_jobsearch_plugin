<?php

namespace App\JobSearcher;

class API {
    
    /**
     * storeAPIKey
     *
     * @return void
     */
    public function storeAPIKey() {
        if(isset($_POST['apikey']) && !empty($_POST['apikey'])){
            $apiKey = sanitize_text_field( $_POST['apikey'] );
            update_option( 'joobleapikey', $apiKey );
            wp_safe_redirect( wp_get_referer() );
        } else {
            set_transient( 'error', 'Sorry you have not entered a valid api key', 10 );
            wp_safe_redirect( wp_get_referer() );
        }
    }

    /**
     * Method joobleSearch
     *
     * @return void
     */
    public function joobleSearch() {

        $apiKey = get_option('joobleapikey');
        
        $keyword = $_POST['keywords'];
        $location = $_POST['location'];

        $url = "https://jooble.org/api/";
        $key = $apiKey;
        
        //create request object
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url."".$key);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, '{ "keywords": "'. $keyword .'", "location": "'. $location .'"}');
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        
        // receive server response ...
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        
        $server_output = curl_exec ($ch);
        curl_close ($ch);
        
        //print response
        echo $server_output;
        wp_die();
    }
        
    /**
     * Method displayHTML
     *
     * @return void
     */
    public function displayHTML() {
        wp_enqueue_script( 'jquery', false );
        wp_enqueue_style('bs4-css', 'https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css');

        ob_start();
        require(JS_BASE_PATH . '/frontend/search-view.php');
        return ob_get_clean();

    }



}

