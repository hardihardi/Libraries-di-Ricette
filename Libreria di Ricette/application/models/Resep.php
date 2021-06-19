<?php 
    class Resep extends CI_Model {

        //function buat_resep will add a new recipe to the member's database
        function buat_resep($data) {                
            return $this->db->insert('resep', $data);
        }

        //function get_all will take every data from the resep table
        function get_all() {
            return $this->db->get('resep')->result_array();
        }

        //function get_resep_id will take data from the id_resep table by id if the id is in the table
        function get_resep_id($id_resep) {
            $this->db->where('idResep', $id_resep);
            return $this->db->get('resep')->row_array();
        }

        // get resep by Id_Member
        function get_resep_member($id_member) {
            $this->db->where('idMember', $id_member);
            return $this->db->get('resep')->result_array();
        }

        function create_bahan_resep($data) {
            return $this->db->insert('bahan_resep', $data);
        }

        function get_resep_bahan($id_resep) {
            $this->db->where('idResep', $id_resep);
            return $this->db->get('bahan_resep')->result_array();
        }

        function delete_bahan_resep($id_resep) {
            $this->db->where('idResep', $id_resep);
            return $this->db->delete('bahan_resep');
        }

        //function update_resep can use by the authors to updating their uploaded recipes
        function update_resep($id_resep, $data) {
            $this->db->where('idResep', $id_resep);
            return $this->db->update('resep', $data);
        }

        //function delete_resep can use by the authors to deleting their uploaded recipes
        function delete_resep($id_resep) {
            $this->db->where('idResep', $id_resep);
            return $this->db->delete('resep');
        }

        function get_resep_list($limit, $start) {
            return $this->db->get('resep', $limit, $start)->result_array();
        }

        //function tambah_langkah is use to add new steps in uploaded recipes
        function tambah_langkah($data) {
            return $this->db->insert('step_resep', $data);
        }

        //function get_langkah will take data from the id_resep table by id if the id is in the table
        function get_langkah($id_resep) {
            $this->db->where('idResep', $id_resep);
            return $this->db->get('step_resep')->result_array();
        }

        //function get_langkah will take data from the id_step table by id if the id is in the table
        function get_langkah_id($id_step) {
            $this->db->where('id_step', $id_step);
            return $this->db->get('step_resep')->row_array();
        }

        //function update_langkah is use to updating steps in uploaded recipes
        function update_langkah($id_step, $data) {
            $this->db->where('id_step', $id_step);
            return $this->db->update('step_resep', $data);
        }

        //function delete_langkah is use to deleting the steps in uploaded recipes
        function delete_langkah($id_step) {
            $this->db->where('idStep', $id_step);
            return $this->db->delete('step_resep');
        }

        function get_resep_keyword($keyword){
            $this->db->select('*');
            $this->db->from('resep');
            $this->db->like('judul',$keyword);
            $this->db->or_like('deskripsi',$keyword);
            return $this->db->get()->result_array();
        }

        function get_resep_keyword_not_id($keyword, $id_resep){
            $this->db->select('*')->from('resep')
                ->where('idResep !=', $id_resep)
                ->group_start()
                    ->like('judul',$keyword)
                    ->or_like('deskripsi',$keyword)
                ->group_end();
            $this->db->order_by('rating', 'DESC');
            return $this->db->get()->result_array();
        }

        function get_resep_sorted($x, $limit,$start){
            if ($x == 'down') {
                $this->db->order_by("rating", "asc");
                $query = $this->db->get('resep',$limit, $start); 
                return $query->result_array();
            } else{
                $this->db->order_by("rating", "desc");
                $query = $this->db->get('resep',$limit, $start); 
                return $query->result_array();
            }
            $this->db->order_by("rating", "desc");
            $query = $this->db->get('resep',$limit, $start); 
            return $query->result_array();
        }
        function get_resep_by_user($id_member){
            $this->db->where('idMember', $id_member);
            return $this->db->get('resep')->result_array();
        }
        function get_last_resep(){
            return $this->db->select("*")->limit(1)->order_by('ids',"DESC")->get("resep")->row_array();
        }

        function get_last_step(){
            return $this->db->select("*")->limit(1)->order_by('ids',"DESC")->get("step_resep")->row_array();
        }
    }
?>