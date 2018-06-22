<?php
defined('BASEPATH') OR exit ('No Direct script access allowed');

require_once APPPATH .'/libraries/REST_Controller.php';
       
    class prod_to_venta extends REST_Controller{

        function __construct(){
            parent::__construct();
            $this->load->model('inner_model');
        }   

        public function index_get(){
            $data = $this->inner_model->prod_to_venta();

            if(!is_null($data)){
                header('Content-type: application/json: charset=UTF-8');
                header('Access-Control-Allow-Origin: *');
                $this->response(array('pedidos' => $data), 200);
            }
            else{
                $this->response(null, 201);
            }
        }
    }
?>