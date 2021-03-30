<?php 
    class Resep extends CI_Model {
        function buat_resep($data) {
            return $this->db->insert('resep', $data);
        }

        function get_all() {
            return $this->db->get('resep')->result_array();
        }

        function get_resep_id($id_resep) {
            $this->db->where('id_resep', $id_resep);
            return $this->db->get('resep')->row_array();
        }

        function update_resep($id_resep, $data) {
            $this->db->where('id_resep', $id_resep);
            return $this->db->update('resep', $data);
        }

        function delete_resep($id_resep) {
            $this->db->where('id_resep', $id_resep);
            return $this->db->delete('resep');
        }

        // Langkah
        function tambah_langkah($data) {
            return $this->db->insert('step_resep', $data);
        }

        function get_langkah($id_resep) {
            $this->db->where('id_resep', $id_resep);
            return $this->db->get('step_resep')->result_array();
        }

        function get_langkah_id($id_step) {
            $this->db->where('id_step', $id_step);
            return $this->db->get('step_resep')->row_array();
        }

        function update_langkah($id_step, $data) {
            $this->db->where('id_step', $id_step);
            return $this->db->update('step_resep', $data);
        }

        function delete_langkah($id_step) {
            $this->db->where('id_step', $id_step);
            return $this->db->delete('step_resep');
        }
    }
?>
