<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . '/libraries/REST_Controller.php';


class Cities extends REST_Controller {
    
    public function index_get(){
        echo 'todas las ciudades';
    }

    public function find_get(){
        echo 'todas las ciudades';
    }

    public function index_post(){
        echo 'todas las ciudades';
    }

    public function index_put(){
        echo 'todas las ciudades';
    }

    public function index_delete(){
        echo 'todas las ciudades';
    }
}
