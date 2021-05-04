<?php
 
class Admin extends CI_Model{							//Kelas Admin untuk mengetahui apakah user member biasa atau admin
    function verify_member($id_member, $data) {				//Function untuk verifikasi member dengan parameter id_member dan data
        $this->db->where('idMember', $id_member);			//Set idMember dengan parameter dari id_member
        return $this->db->update('member', $data);			//Mengembalikan member dengan parameter data

    }
}
?>
