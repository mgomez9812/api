<?php
	/**
	* clase cliente model
	*/
	class Inner_model extends CI_model
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
                $this->db->select('SELECT fotografias_pasteles.fotografias_p, pro_venta.nombre_pro_venta,pro_venta.precio_pro_venta, pro_venta.descripcion_pro_venta, pro_venta.decoracion_pastel FROM fotografias_pasteles INNER JOIN pro_venta on fotografias_pasteles.pro_ventaid = pro_venta.idpro_venta');

                //$query = $this->db->select('*')->from('pro_venta')->where('idpro_venta',$id)->get();
                $query = $this->db->get();
                if($query->num_rows()  === 1){
                    return $query->row_array();
                }
                return false;
            }

                //$this->db->select('fotografias_pasteles.fotografias_p, pro_venta.nombre_pro_venta,pro_venta.precio_pro_venta, pro_venta.descripcion_pro_venta, pro_venta.decoracion_pastel FROM fotografias_pasteles INNER JOIN pro_venta on fotografias_pasteles.pro_ventaid = pro_venta.idpro_venta');
            $this->db->select('fotografias_pasteles.fotografias_p, pro_venta.nombre_pro_venta,pro_venta.precio_pro_venta, pro_venta.descripcion_pro_venta, pro_venta.decoracion_pastel');
            $this->db->from('fotografias_pasteles');
            $this->db->join('pro_venta', 'fotografias_pasteles.pro_ventaid = pro_venta.idpro_venta');
                //$query = $this->db->select('*')->from('pro_venta')->where('idpro_venta',$id)->get();
                $query = $this->db->get();
            //$query = $this->db->select('*')->from('pro_venta')->get();
            if($query->num_rows() > 0){
                return $query->result_array();
            }

            return false;
        }
	



	}


 ?>
