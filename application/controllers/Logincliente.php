<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . '/libraries/REST_Controller.php';

//para la clase categorias
class Logincliente extends REST_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->model('logincliente_model');
	}

//funcion para ver si se realiza de manera correcta la ruta login
  public function index_get(){
			$this->response(array('datos'=>'data cliente'), 200);
  }

	//funcion para insertar
	public function index_post(){
		if(!$this->post()){
						header('Content-Type: application/json; charset=UTF-8');
            header('Access-Control-Allow-Origin: *');
						$this->response(null, 400);
		}

		$id = $this->logincliente_model->Login_get($this->post());

		if($id == true){
			$this->response(array('datos'=>true), 200);
		}
		else{
			$this->response(array('error'=>false),200);
		}
	}


}
?>
