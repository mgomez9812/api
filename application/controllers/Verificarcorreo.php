 <?php
 defined('BASEPATH') OR exit('No direct script access allowed');

 require_once APPPATH . '/libraries/REST_Controller.php';

 //para la clase categorias
 class verificarcorreo extends REST_Controller{

 	public function __construct(){
 		parent::__construct();
 		$this->load->model('validarusuario_model');
 	}

 	//funcion para insertar
 	public function index_post(){
 		if(!$this->post()){
 						header('Content-Type: application/json; charset=UTF-8');
             header('Access-Control-Allow-Origin: *');
 						$this->response(null, 400);
 		}

 		$validar = $this->validarusuario_model->validar_correo($this->post());

 		if($validar == true){
 				echo json_encode($validar);
        $v = $this->validarusuario_model->enviaCorreo($validar);
 		}
    else{
 				echo json_encode($validar);
    }
 	}


 }
 ?>
