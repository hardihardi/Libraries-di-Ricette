<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AccountController extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Account');
	}

	public function index()
	{
		$this->load->view('login');
	}

	public function login()
	{
		$data = [
			"username" => $this->input->post('username', true),
			"password" => $this->input->post('password', true),
		];
		$masuk = $this->Account->login($data);
		if ($masuk) {
			$this->session->set_userdata('username', $data['username']);
			$this->load->view('homepage');
		} else {
			$this->load->view('login');
		}
	}

    public function register() {
        $dataUser = array(
            "username" => $this->input->post('username', true),
            "password" => $this->input->post('password', true),
            "isAdmin" => 0
        );

        $daftar = $this->Account->register("user", $dataUser);
        if ($daftar) {
            $this->load->view('homepage');
        } else {
            $this->load->view('register');
        }
    }

	public function guest()
	{
		$data['username'] = "Guest";
		$this->session->set_userdata('username', $data['username']);
		redirect(base_url());
	}

}
?>