<?php 
	class RefToko extends CI_Model {
		function get_toko_nama($namaToko) {
            return $this->db->get_where('ref_toko', ['namaToko' => $namaToko])->row_array();
        }
        function get_all_toko(){
			return $this->db->get('ref_toko')->result_array();
		}
		function update_toko($id_toko, $data) {
            $this->db->where('idToko', $id_toko);
            return $this->db->update('ref_toko', $data);
        }
        function delete_toko($id_toko) {
            $this->db->where('idToko', $id_toko);
            return $this->db->delete('ref_toko');
        }
        function get_last_toko(){
            return $this->db->select("*")->limit(1)->order_by('ids',"DESC")->get("ref_toko")->row_array();
        }
        function cek_nama_toko($namaToko){
            $this->db->where('namaToko',$namaToko);
            $cek = $this->db->get('ref_toko')->row_array();
            if($cek){
                return false;
            }
            else{
                return true;
            }
        }
        function cek_alamat_toko($alamat){
            $this->db->where('alamat',$alamat);
            $cek = $this->db->get('ref_toko')->row_array();
            if($cek){
                return false;
            }
            else{
                return true;
            }
        }

	}
 ?>