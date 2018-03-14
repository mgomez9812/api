<?php
	/**
	* clase cliente model
	*/
	class Ventaoferta_model extends CI_model
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
                $query = $this->db->select('*')->from('pro_venta_a_pro_oferta')->where('pro_venta_idpro_venta',$id)->get();

                if($query->num_rows()  === 1){
                    return $query->row_array();
                }
                return false;
            }

            $query = $this->db->select('*')->from('pro_venta_a_pro_oferta')->get();
            if($query->num_rows() > 0){
                return $query->result_array();
            }

            return false;
        }

        public function save($venta_oferta)
        {
            $this->db->set($this->_setVenta($venta_oferta))->insert('pro_venta_a_pro_oferta');
            if ($this->db->affected_rows() === 1) {
                return $this->db->insert_id();
            }
            return null;
        }

        public function update($id, $venta_oferta)
        {
            $this->db->set($this->_setVenta($venta_oferta))->where('pro_venta_idpro_venta', $id)->update('pro_venta_a_pro_oferta');
            if ($this->db->affected_rows() === 1) {
                return true;
            }
            return null;
        }
        public function delete($id)
        {
            $this->db->where('pro_venta_idpro_venta', $id)->delete('pro_venta_a_pro_oferta');
            if ($this->db->affected_rows() === 1) {
                return true;
            }
            return null;
        }

/*
*se crea el array para contener toda la informacion la cual sera insertada en la tabla clientes
*
*/

        private function _setVenta($clientes)
        {
            return array(
	                'pro_venta_idpro_venta' => $clientes['pro_ventaid'],
	                'oferta_idoferta' => $clientes['ofertaid'],
            );
        }



	}


 ?>
