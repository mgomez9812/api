<?php
	/**
	* clase cliente model
	*/
	class Usuario_model extends CI_model
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
 		public function get($id = null){
            if(!is_null($id)){
                $query = $this->db->select('*')->from('usuario')->where('idusuario',$id)->get();

                if($query->num_rows()  === 1){
                    return $query->row_array();
                }
                return false;
            }

            $query = $this->db->select('*')->from('usuario')->get();
            if($query->num_rows() > 0){
                return $query->result_array();
            }

            return false;
        }

        public function save($usuario)
        {
            $this->db->set($this->_setUsuario($usuario))->insert('usuario');
            if ($this->db->affected_rows() === 1) {
                return $this->db->insert_id();
            }
            return null;
        }
        public function update($usuario)
        {
            $id = $usuario['id'];
            $this->db->set($this->_setDetallespedido($usuario))->where('idusuario', $id)->update('usuario');
            if ($this->db->affected_rows() === 1) {
                return true;
            }
            return null;
        }
        public function delete($id)
        {
            $this->db->where('idusuario', $id)->delete('usuario');
            if ($this->db->affected_rows() === 1) {
                return true;
            }
            return null;
        }

/*
*se crea el array para contener toda la informacion la cual sera insertada en la tabla usuario
*
*/

        private function _setUsuario($usuario)
        {
            return array(
                'nombre_user' => $usuario['nombre'],
                'apellido_user' => $usuario['apellido'],
                'direccion_user' => $usuario['direccion'],
                'telefono_user' => $usuario['telefono'],
                'nickname_user' => $usuario['nickname'],
                'password_user' => $usuario['password'],
                'tipo_usuarioid' => $usuario['tipo'],

            );
        }



	}


 ?>
