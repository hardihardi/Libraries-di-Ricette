<?php 

class Admin extends CI_Model{
    function verify_member($id_member, $data) {
        $this->db->where('idMember', $id_member);
        return $this->db->update('member', $data);
    }
}
?>
