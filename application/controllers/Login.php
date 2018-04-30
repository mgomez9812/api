<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . '/libraries/REST_Controller.php';

//para la clase categorias
class Login extends REST_Controller{

	public function __construct(){
		header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Methods: *');
		parent::__construct();
		$this->load->model('login_model');
	}

//funcion para ver si se realiza de manera correcta la ruta login
  public function index_get(){
			$this->response(array('datos'=>'data'), 200);
  }

	//funcion para insertar
	public function index_post(){
		if(!$this->post()){
						$this->response(null, 400);
		}

		$id = $this->login_model->Login_get($this->post());

		if($id == true){
			$this->response(array('datos'=>true), 200);
		}
		else{
			$this->response(array('error'=>false),200);
		}
	}


}
?>
