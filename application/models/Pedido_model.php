<?php 
	/**
	* clase cliente model 
	*/
	class Pedido_model extends CI_model
	{
		/*
		*constructor de la clase
		*/
		function __construct()
		{
			parent::__construct();
		}

		/*
		*funcion para seleccionar los datos de la tabla pedidos 
		*
		*/
 		public function get($id = null){
            if(!is_null($id)){
                $query = $this->db->select('*')->from('pedido')->where('idpedido',$id)->get();
                
                if($query->num_rows()  === 1){
                    return $query->row_array();
                }
                return false;
            }

            $query = $this->db->select('*')->from('pedido')->get();
            if($query->num_rows() > 0){
                return $query->result_array();
            }

            return false;
        }

        public function save($pedido)
        {
            $this->db->set($this->_setPedido($pedido))->insert('pedido');
            if ($this->db->affected_rows() === 1) {
                return $this->db->insert_id();
            }
            return null;
        }


        public function update($pedido)
        {
            $id = $pedido['id'];
            $this->db->set($this->_setPedido($pedido))->where('idpedido', $id)->update('pedido');
            if ($this->db->affected_rows() === 1) {
                return true;
            }
            return null;
        }


        public function delete($id)
        {
            $this->db->where('idpedido', $id)->delete('pedido');
            if ($this->db->affected_rows() === 1) {
                return true;
            }
            return null;
        }

/*
*se crea el array para contener toda la informacion la cual sera insertada en la tabla empresa
*
*/

        private function _setPedido($pedido)
        {
            return array(
                'fecha_entrega_pedido' => $pedido['entrega'],
                'correo_contacto_pedido' => $pedido['correo'],
                'boleta_deposito_pedido' => $pedido['boleta'],
                'cliente_id_cliente' => $pedido['clienteid'],
                'idpasteles_pedido' => $pedido['idpasteles'],

            );
        }



	}


 ?>