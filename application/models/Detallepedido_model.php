<?php
	/**
	* clase cliente model
	*/
	class Detallepedido_model extends CI_model
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
                $query = $this->db->select('*')->from('detalles_pedido')->where('id_dett_pedido',$id)->get();

                if($query->num_rows()  === 1){
                    return $query->row_array();
                }
                return false;
            }

            $query = $this->db->select('*')->from('detalles_pedido')->get();
            if($query->num_rows() > 0){
                return $query->result_array();
            }

            return false;
        }

        public function save($detalles)
        {
            $this->db->set($this->_setDetallespedido($detalles))->insert('detalles_pedido');
            if ($this->db->affected_rows() === 1) {
                return $this->db->insert_id();
            }
            return null;
        }
        public function update($id, $detalles)
        {
            $this->db->set($this->_setDetallespedido($detalles))->where('id_dett_pedido', $id)->update('detalles_pedido');
            if ($this->db->affected_rows() === 1) {
                return true;
            }
            return null;
        }
        public function delete($id)
        {
            $this->db->where('id_dett_pedido', $id)->delete('detalles_pedido');
            if ($this->db->affected_rows() === 1) {
                return true;
            }
            return null;
        }

/*
*se crea el array para contener toda la informacion la cual sera insertada en la tabla detalles pedido
*
*/

        private function _setDetallespedido($detalles)
        {
            return array(
                'cantidad_pasteles_pedido' => $detalles['cantidad'],
                'rebanadas_pasteles_pedido' => $detalles['rebanadas'],
                'detalles_prod_pedido' => $detalles['detalles'],
                'foto_decoracion' => $detalles['foto_decoracion'],
                'descripcion_pastel' => $detalles['descripcion'],
                'pasteles_venta_id' => $detalles['pasteles_id'],
								'oferta_idoferta' => $detalles['oferta_id'],

            );
        }



	}


 ?>
