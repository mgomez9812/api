<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	require_once APPPATH . '/libraries/REST_Controller.php';

	/**
	* clase para producto venta
	*/
	class Proventaget extends REST_Controller
	{

		function __construct()
		{
			header('Access-Control-Allow-Origin: *');
			header('Access-Control-Allow-Methods: *');
			parent::__construct();
    		$this->load->model('proventa_model');
		}


//funcion para buscar por id en la tabla categoria
	public function index_get($seleccionar){

    $variable =  $_GET['hola'];
    echo $variable;

    if(is_null($variable)){
      header('Content-Type: application/json; charset=UTF-8');
      header('Access-Control-Allow-Origin: *');
      $this->response(null, 404);
    }
				$data = $this->proventa_model->pro_nombre($_GET['hola']);

        if($data){
              header('Content-Type: application/json; charset=UTF-8');
              header('Access-Control-Allow-Origin: *');
              echo json_encode($data, JSON_PRETTY_PRINT);
              //  $this->response( array('proventa'=>$data), 200);
        }
        else{
          $this->response(null, 404);
        }

	}
}
 ?>
