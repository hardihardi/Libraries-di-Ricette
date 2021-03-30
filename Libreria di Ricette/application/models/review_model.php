<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Review_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    public function tambahReviewBaru($data)
    {
        $this->db->insert('review', $data);
    }
    public function editReview($id, $data)
    {
        $this->db->where('idReview', $id);
        return $this->db->update('review', $data);
    }
    public function delete_Review($id)
    {
        $this->db->where('idReview', $id);
        return $this->db->delete('review');
    }
    public function getAllReview($id)
    {
        $this->db->where('idResep', $id);
        return $this->db->get('review')->result_array();
    }
}
