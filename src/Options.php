<?php

namespace App\JobSearcher;


class Options {

    public function admin_options() {
        add_menu_page( 
            'Jobsearcher Options',
            'Jobsearcher Options',
            'manage_options',
            'jobsearcher',
            array($this, 'customPage') );
    }

    public function customPage() {
            require(JS_BASE_PATH . 'frontend/admin/options.php');
    }
}