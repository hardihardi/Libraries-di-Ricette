<?php
	define('BASEPATH') or exit('No direct script access allowed');

	class Member extends CI_Model{
		function buat_memeber($data){
			return $this->db->insert('member', $data);
		}
		function get_all_member(){
			return $this->db->get('member')->result_array();
		}
		function get_member_id($id_member){
			$this->db->where('idMember', $id_member);
			return $this->db->get('member')->row_array();
		}
		function update_member_id($id_member, $data){
			$this->db->where('idMember', $id_member);
			return $this->db->update('member', $data);
		}
		function delete_member($id_member){
			$this->db->where('idMember', $id_member);
			return $this->db->delete('member');
		}

	}
?>