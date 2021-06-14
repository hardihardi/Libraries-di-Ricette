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
        $x = $this->Member->get_last_member();
        if ($x == null) {
            $x['ids'] = 0;
        }
        $dataMember = array(
            "idMember" => 'M-'.$x['ids']+1,
            "profilePic" => "user.png",
            "username" => $this->input->post('username', true),
            "nama" => $this->input->post('nama', true),
            "email" => $this->input->post('email', true),
            "jenisKelamin" => $this->input->post('jenisKelamin', true),
            "Verified" => 0,
        );
        $masuk = $this->Account->cekid_daftar($dataMember['username']);
        if ($masuk){
        	$daftar = $this->Account->register("user", $dataUser);
        	$daftar1 = $this->Member->buat_member($dataMember);
        	if ($daftar) {
            	redirect('AccountController');
        	} else {
            	$this->load->view('register');
        	}
        } else {
        	$this->load->view('register');
        }
    }
}
?>
