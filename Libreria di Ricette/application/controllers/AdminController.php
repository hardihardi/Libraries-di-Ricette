<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminController extends CI_Controller {
    // construct function that loads Admin and Member Model
    function __construct()
	{
		parent::__construct();
        $this->load->model('Admin');
        $this->load->model('Member');
	}

    // function index that will take admin to admin's dashboard
    // the page will show a table which contains list of available members, and the admin can verify them here
    public function index() {
        
        $this->load->view('header');
        $data['member_list'] = $this->Member->get_all_member();
        $this->load->view('viewMember', $data);
        $this->load->view('footer');
    }

    // function to verify a member by utilizing their id
    public function verify($id_member) {
        $data = array(
            'verified' => $this->input->post('verified')
        );
        $this->Admin->verify_member($id_member,$data);
        redirect('AdminController', 'refresh');
    }

    // function to add ref toko
    public function add_ref_toko($id_bahan) {
        $data = array(
            'namaToko' => $this->input->post('namaToko');
            'alamat' => $this->input->post('alamat');
        );
        $this->Admin->create_ref_toko($data);
    }
}
?>
