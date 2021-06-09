<?php 
	class Bahan extends CI_Model {
		function get_bahan($id_bahan) {
            return $this->db->get_where('bahan', ['idBahan' => $id_bahan])->row_array();
        }
        function get_toko_bahan($id_bahan){
        	$idToko = $this->db->get_where('toko_bahan', ['idBahan' => $id_bahan])->result_array();
        	$toko = array();
        	foreach ($idToko as $t) {
        		$toko[] = $this->db->get_where('ref_toko', ['idToko' => $t['idToko']])->result_array();
        	}
        	return $toko;
        }
	}
 ?>