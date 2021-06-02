<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AccountController extends CI_Controller {

	// construct function that loads Account Model
	function __construct()
	{
		parent::__construct();
		$this->load->model('Account');
	}

	// function index that will take a user/guest to login page
	public function index()
	{
		$this->load->view('login');
	}

	// login function
	// if the login succeed, it will take the user to homepage. if not, then it will stay on login page
	public function login()
	{
		$data = [
			"username" => $this->input->post('username', true),
			"password" => md5($this->input->post('password', true)),
		];
		$masuk = $this->Account->login($data);
		if ($masuk) {
			$this->session->set_userdata('username', $data['username']);
			$this->load->view('header');
			$this->load->view('homepage');
			$this->load->view('footer');
		} else {
			$this->load->view('login');
		}
	}

	// logout function, destroy session too
	public function logout() {
		$this->session->sess_destroy();
		redirect(base_url());
	}
}
?>
