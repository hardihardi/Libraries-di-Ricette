<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminController extends CI_Controller {
    function __construct()
	{
		parent::__construct();
		$this->load->model('Account');
        $this->load->model('Admin');
        $this->load->model('Member');
	}

    public function index() {
        
        $this->load->view('header');
        $data['member_list'] = $this->Member->get_all_member();
        $this->load->view('viewMember', $data);
        $this->load->view('footer');
    }

    public function verify($id_member) {
        $data = array(
            'verified' => $this->input->post('verified')
        );
        $this->Admin->verify_member($id_member,$data);
        redirect('AdminController', 'refresh');
    }
}
?>
