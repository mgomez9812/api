<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . '/libraries/REST_Controller.php';

//para ver todos los pasteles venta
class ViewPasteles extends REST_Controller {

    //constructor
    public function __construct(){
        parent::__construct();
        $this->load->model('viewpasteles_model');
    }

    //para obtener todos los datos
    public function index_get($seleccionar){

        $viewpasteles = $this->viewpasteles_model->get();

        if(!is_null($viewpasteles)){
            header('Content-Type: application/json; charset=UTF-8');
            header('Access-Control-Allow-Origin: *');
            if ($seleccionar == 0) {
              echo json_encode($viewpasteles, JSON_PRETTY_PRINT);
            }
            else{
              $this->response( array('ViewPasteles'=>$viewpasteles), 200);
            }
//         echo json_encode($viewpasteles, JSON_PRETTY_PRINT);
        }
        else{
            $this->response(array('error' => 'no data'), 404);
        }
    }
//para obtener un pastel en especifico
    public function find_get($id, $seleccionar){
        //si el ID es nulo
        if(!$id){
            $this->response(null, 400);
        }
        //se llama la funcion get
            $viewpasteles =$this->viewpasteles_model->get($id);
//si el return de la funcion get es true se imprime el resultado
        if(($viewpasteles)){
            header('Content-Type: application/json; charset=UTF-8');
            header('Access-Control-Allow-Origin: *');
            if ($seleccionar == 0) {
              echo json_encode($viewpasteles, JSON_PRETTY_PRINT);
            }
            else{
              $this->response(array('response'=> $viewpasteles),200);
            }
        }
//si el resultado de la funcion get es false se imprime null
        else{
            $this->response(null, 404);
        }

    }

    //funcion para insertar
    public function index_post(){
        if(!$this->post()){
            $this->response(null,404);
        }

        $id = $this->viewpasteles_model->save($this->post());

        if(!is_null($id)){
            $this->response(array('response'=>$id), 200);
        }
        else{
            $this->response(array('error'=>'no save'), 400);
        }
    }

    //funcion para actualizar
    public function index_put($id){
        if(!$this->put() || !$id){
            $this->response(null, 400);
        }

        $update = $this->viepasteles_model->update($id, $this->put());

        if(!is_null($update)){
            $this->response(array('response'=>'correct update'));
        }
        else{
            $this->response(array('error'=>'no save'), 400);
        }
    }

    //para borrar un pastel
    public function index_delete($id){
        if(!$id){
            $this->response(null, 400);
        }

        $delete = $this->viewpasteles_model->delete($id);

        if(!is_null($delete)){
            $this->response(array('response'=>'correct delete'), 200);
        }
        else{
            $this->response(array('error'=>'no save'), 400);
        }
    }
}
