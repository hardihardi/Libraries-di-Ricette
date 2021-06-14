<?php

class Review extends CI_Model
{
    //adding new review from users
    public function tambahReviewBaru($data)
    {
        $this->db->insert('review', $data);
    }

    //editing/updating review if the id is in the idReview table
    public function editReview($id, $data)
    {
        $this->db->where('idReview', $id);
        return $this->db->update('review', $data);
    }

    //deleting review if the id is in the idReview table
    public function delete_Review($id)
    {
        $this->db->where('idReview', $id);
        return $this->db->delete('review');
    }

    //take every data from the idResep table and returning to the review table
    public function getAllReview($id)
    {
        $this->db->where('idResep', $id);
        return $this->db->get('review')->result_array();
    }
    public function getAllReviewByUser($id)
    {
        $this->db->where('idMember', $id);
        return $this->db->get('review')->result_array();
    }
    function get_last_review(){
        return $this->db->select("*")->limit(1)->order_by('ids',"DESC")->get("review")->row_array();
    }
}