<?php

	class Member extends CI_Model{

		// function untuk mendaftarkan member baru ke dalam database
		function buat_memeber($data){
			return $this->db->insert('member', $data);
		}

		// function untuk mengambil semua data member yang ada di dalam database
		function get_all_member(){
			return $this->db->get('member')->result_array();
		}

		// function untuk mengambil suatu data member berdasarkan id member
		function get_member_id($id_member){
			$this->db->where('idMember', $id_member);
			return $this->db->get('member')->row_array();
		}

		// function untuk melakukan update/modifikasu data member berdasarkan id member
		function update_member_id($id_member, $data){
			$this->db->where('idMember', $id_member);
			return $this->db->update('member', $data);
		}

		// function untuk menghapus suatu data member dari database berdasarkan id member
		function delete_member($id_member){
			$this->db->where('idMember', $id_member);
			return $this->db->delete('member');
		}

	}
?>