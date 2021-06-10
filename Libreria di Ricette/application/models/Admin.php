<?php
 
class Admin extends CI_Model{							//Kelas Admin untuk mengetahui apakah user member biasa atau admin
    function verify_member($id_member, $data) {				//Function untuk verifikasi member dengan parameter id_member dan data
        $this->db->where('idMember', $id_member);			//Set idMember dengan parameter dari id_member
        return $this->db->update('member', $data);			//Mengembalikan member dengan parameter data

    }

    function create_ref_toko($data) {
        return $this->db->insert('ref_toko', $data);
    }

    function add_relation_ref_bahan($data) {
        return $this->db->insert('toko_bahan', $data);
    }
    function is_toko_bahan_duplicate($data){
        $this->db->where('idBahan', $data['idBahan']);
        $this->db->where('idToko', $data['idToko']);
        return $this->db->get('toko_bahan')->row_array();
    }
    function delete_toko_from_bahan($data) {
        $this->db->where('idBahan', $data['idBahan']);
        $this->db->where('idToko', $data['idToko']);
        return $this->db->delete('toko_bahan');
    }
}
?>
