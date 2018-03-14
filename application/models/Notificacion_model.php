<?php
	/**
	* clase cliente model
	*/
	class Notificacion_model extends CI_model
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
                $query = $this->db->select('*')->from('notificacion')->where('idnotificacion',$id)->get();

                if($query->num_rows()  === 1){
                    return $query->row_array();
                }
                return false;
            }

            $query = $this->db->select('*')->from('notificacion')->get();
            if($query->num_rows() > 0){
                return $query->result_array();
            }

            return false;
        }

        public function save($notificacion)
        {
            $this->db->set($this->_setNotificacion($notificacion))->insert('notificacion');
            if ($this->db->affected_rows() === 1) {
                return $this->db->insert_id();
            }
            return null;
        }
        public function update($id, $notificacion)
        {
            $this->db->set($this->_setNotificacion($notificacion))->where('idnotificacion', $id)->update('notificacion');
            if ($this->db->affected_rows() === 1) {
                return true;
            }
            return null;
        }
        public function delete($id)
        {
            $this->db->where('idnotificacion', $id)->delete('notificacion');
            if ($this->db->affected_rows() === 1) {
                return true;
            }
            return null;
        }

/*
*se crea el array para contener toda la informacion la cual sera insertada en la tabla empresa
*
*/
        private function _setNotificacion($notificacion)
        {
            return array(
                'estado_notificacion' => $notificacion['estado'],
                'pedido_idpedido' => $notificacion['pedidoid'],

            );
        }



	}


 ?>
