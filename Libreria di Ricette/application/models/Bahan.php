<?php 
	class Bahan extends CI_Model {
		function get_bahan($id_bahan) {
            return $this->db->get_where('bahan', ['idBahan' => $id_bahan])->row_array();
        }
	}
 ?>