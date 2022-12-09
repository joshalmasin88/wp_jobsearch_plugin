<?php

namespace App\JobSearcher;

class API {

    public function storeAPIKey() {

    }

    public function retreiveAPIKey() {

    }
    
    
    /**
     * Method joobleSearch
     *
     * @return void
     */
    public function joobleSearch() {
        
        $keyword = $_POST['keywords'];
        $location = $_POST['location'];

        $url = "https://jooble.org/api/";
        $key = "SECERTKEY";
        
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

