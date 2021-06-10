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
        function get_all_bahan(){
            return $this->db->get('bahan')->result_array();
        }
        function delete_bahan($id_bahan){
            $this->db->where('idBahan', $id_bahan);
            return $this->db->delete('bahan');
        }
        function update_bahan($id_bahan, $data) {
            $this->db->where('idBahan', $id_bahan);
            return $this->db->update('bahan', $data);
        }
	}
 ?>