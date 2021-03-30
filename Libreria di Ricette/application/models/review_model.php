<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Review_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    public function tambahReviewBaru()
    {
        $data = [
            'idReview' => htmlspecialchars($this->input->post('idReview', true)),
            'idResep' => htmlspecialchars($this->input->post('idResep', true)),
            'idMember' => htmlspecialchars($this->input->post('idMember', true)),
            'rating' => htmlspecialchars($this->input->post('rating', true)),
            'isi' => htmlspecialchars($this->input->post('isi', true)),
            'tglReview' => htmlspecialchars($this->input->post('tglReview', true)),
        ];
    }
    public function editReview($id)
    {
        $data = array(
            'idReview' => htmlspecialchars($this->input->post('idReview', true)),
            'idResep' => htmlspecialchars($this->input->post('idResep', true)),
            'idMember' => htmlspecialchars($this->input->post('idMember', true)),
            'rating' => htmlspecialchars($this->input->post('rating', true)),
            'isi' => htmlspecialchars($this->input->post('isi', true)),
            'tglReview' => htmlspecialchars($this->input->post('tglReview', true)),
        );
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
