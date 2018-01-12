<?php 
	/**
	* clase cliente model 
	*/
	class Validarpedido_model extends CI_model
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
                $query = $this->db->select('*')->from('validar_pedido')->where('idvalidar_pedido',$id)->get();
                
                if($query->num_rows()  === 1){
                    return $query->row_array();
                }
                return false;
            }

            $query = $this->db->select('*')->from('validar_pedido')->get();
            if($query->num_rows() > 0){
                return $query->result_array();
            }

            return false;
        }

        public function save($validar_pedido)
        {
            $this->db->set($this->_setTipousuario($validar_pedido))->insert('validar_pedido');
            if ($this->db->affected_rows() === 1) {
                return $this->db->insert_id();
            }
            return null;
        }
        public function update($validar_pedido)
        {
            $id = $validar_pedido['id'];
            $this->db->set($this->_setDetallespedido($validar_pedido))->where('idvalidar_pedido', $id)->update('validar_pedido');
            if ($this->db->affected_rows() === 1) {
                return true;
            }
            return null;
        }
        public function delete($id)
        {
            $this->db->where('idvalidar_pedido', $id)->delete('validar_pedido');
            if ($this->db->affected_rows() === 1) {
                return true;
            }
            return null;
        }

/*
*se crea el array para contener toda la informacion la cual sera insertada en la tabla empresa
*
*/

        private function _setTipousuario($tipousuario)
        {
            return array(
                'estado_valider_pedido' => $tipousuario['estado'],
                'usuario_idusuario' => $tipousuario['usuarioid'],
                'pedido_idpedido' => $tipousuario['pedidoid'],
            );
        }



	}


 ?>