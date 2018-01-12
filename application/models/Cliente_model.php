<?php 
	/**
	* clase cliente model 
	*/
	class Cliente_model extends CI_model
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
                $query = $this->db->select('*')->from('cliente')->where('idcliente',$id)->get();
                
                if($query->num_rows()  === 1){
                    return $query->row_array();
                }
                return false;
            }

            $query = $this->db->select('*')->from('cliente')->get();
            if($query->num_rows() > 0){
                return $query->result_array();
            }

            return false;
        }

        public function save($cliente)
        {
            $this->db->set($this->_setViewpasteles($cliente))->insert('cliente');
            if ($this->db->affected_rows() === 1) {
                return $this->db->insert_id();
            }
            return null;
        }
        public function update($cliente)
        {
            $id = $cliente['id'];
            $this->db->set($this->_setCliente($clientes))->where('idcliente', $id)->update('cliente');
            if ($this->db->affected_rows() === 1) {
                return true;
            }
            return null;
        }
        public function delete($id)
        {
            $this->db->where('idcliente', $id)->delete('cliente');
            if ($this->db->affected_rows() === 1) {
                return true;
            }
            return null;
        }

/*
*se crea el array para contener toda la informacion la cual sera insertada en la tabla clientes 
*
*/

        private function _setCliente($clientes)
        {
            return array(
                'nombre_cli' => $clientes['nombre'],
                'apellido_cli' => $clientes['apellido'],
                'direccion_cli' => $clientes['direccion'],
                'telefono_cli' => $clientes['telefono'],
                'nickname_cli' => $clientes['nickname'],
                'password_cli' => $clientes['password'],
                'correo_cli' => $clientes['correo'],
                'nit_cli' => $clientes['nit'],
            );
        }



	}


 ?>