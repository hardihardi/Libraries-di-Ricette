<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class daftar extends CI_Controller {

    // construct function that loads Account Model
	function __construct()
	{
		parent::__construct();
		$this->load->model('Account');
        $this->load->model('Member');
	}

    // function index that will take you to the register page
	public function index()
	{
		$this->load->view('register');
	}

    // function to register as a member, the password will be hashed with md5
    public function register() {
        $dataUser = array(
            "username" => $this->input->post('username', true),
            "password" => md5($this->input->post('password', true)),
            "isAdmin" => 0
        );
        $dataMember = array(
            "username" => $this->input->post('username', true),
        );

        $daftar = $this->Account->register("user", $dataUser);
        $daftar1 = $this->Member->buat_member($dataMember);
        if ($daftar) {
            redirect('AccountController');
        } else {
            $this->load->view('register');
        }
    }
}
?>
