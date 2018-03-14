<?php
    class Viewpasteles_model extends CI_model{

        public function __construct(){
            parent::__construct();
        }


        public function get($id = null){
            if(!is_null($id)){
                $query = $this->db->select('*')->from('pro_venta')->where('idpro_venta',$id)->get();

                if($query->num_rows()  === 1){
                    return $query->row_array();
                }
                return false;
            }

            $query = $this->db->select('*')->from('pro_venta')->get();
            if($query->num_rows() > 0){
                return $query->result_array();
            }

            return false;
        }

        public function save($viewpasteles)
        {
            $this->db->set($this->_setViewpasteles($viewpasteles))->insert('pro_venta');
            if ($this->db->affected_rows() === 1) {
                return $this->db->insert_id();
            }
            return null;
        }
        public function update($id, $viewpasteles)
        {
            $this->db->set($this->_setViewpasteles($viewpastelescity))->where('idpro_venta', $id)->update('pro_venta');
            if ($this->db->affected_rows() === 1) {
                return true;
            }
            return null;
        }
        public function delete($id)
        {
            $this->db->where('idpro_venta', $id)->delete('pro_venta');
            if ($this->db->affected_rows() === 1) {
                return true;
            }
            return null;
        }
        private function _setViewpasteles($viewpasteles)
        {
            return array(
                'nombre_pro_venta' => $viewpasteles['nombre'],
                'precio_pro_venta' => $viewpasteles['precio'],
                'descripcion_pro_venta' => $viewpasteles['descripcion'],
                'decoracion_pasle' => $viewpasteles['decoracion'],
                'oferta_idoferta' => $viewpasteles['oferta'],
                'categoria_id' => $viewpasteles['categoria'],
            );
        }
    }

?>
