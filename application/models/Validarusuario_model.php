<?php
	/**
	* clase cliente model
	*/
	class Validarusuario_model extends CI_model
	{
		/*
		*constructor de la clase
		*/
		function __construct()
		{
			parent::__construct();
		}
		/*
		*funcion para seleccionar los datos de la tabla Clientes
		*
		*/
 		public function validaruser_get($validar){
          $query = $this->db->select('*')->from('cliente')->where('nickname_cli',$validar['user'])->get();
					//si se encuentera el usuario se realiza el if y retorna todos los datos de los usuarios
						if($query->num_rows()  === 1){
                return true;
						}
            return false;
        }

    public function validar_correo($validar){

      $var_correo;
      $correo;
              $query = $this->db->select('correo_cli')->from('cliente')->where('nickname_cli',$validar['user'])->get();
    					//si se encuentera el usuario se realiza el if y retorna todos los datos de los usuarios
    						if($query->num_rows()  === 1){
                    $var_correo =$query->row_array();
                    $correo = $var_correo['correo_cli'];
                    return $correo;
    						}

                return false;
    }

    public function enviaCorreo($correo){
      $config = array(
       'protocol' => 'smtp',
       'smtp_host' => 'smtp.googlemail.com',
       'smtp_user' => 'chatos842@gmail.com', //Su Correo de Gmail Aqui
       'smtp_pass' => 'herramientas', // Su Password de Gmail aqui
       'smtp_port' => '587',
       'smtp_crypto' => 'tls',
       'mailtype' => 'html',
       'wordwrap' => TRUE,
       'charset' => 'utf-8'
       );
       $this->load->library('email', $config);
       $this->email->set_newline("\r\n");
       $this->email->from('smtp_user');
       $this->email->subject('Asunto del correo');
       $this->email->message('Aqui va el mensaje');
       $this->email->to($correo);
       $this->email->send(FALSE);
    }
	}


 ?>
