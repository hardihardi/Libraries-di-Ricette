<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AccountController extends CI_Controller {

	// construct function that loads Account Model
	function __construct()
	{
		parent::__construct();
		$this->load->model('Account');
		$this->load->model('Resep');
		$this->load->model('Member');
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
		$isAdmin = $this->Account->is_admin($data);
		if ($masuk && !$isAdmin) {
			$this->session->set_userdata('username', $data['username']);
			redirect('recipeController');
		} elseif ($masuk && $isAdmin) {
			$this->session->set_userdata('username', $data['username']);
			redirect('AdminController');
		} else {
			$this->load->view('login');
		}
	}

	// logout function, destroy session too
	public function logout() {
		$this->session->sess_destroy();
		redirect(base_url());
	}

	// View profile
	public function view_profile($username){
		$content['member_info'] = $this->Account->getakun_username('member', $username);
		$content['resep_member'] = $this->Resep->get_resep_member($content['member_info']['idMember']);
		$this->load->view('header');
		$this->load->view('viewProfile', $content);
		$this->load->view('footer');
	}

	// Edit profile member
	public function edit_profile($id_member){
		$data = array(
            'nama' => $this->input->post('nama'),
            'email' => $this->input->post('email'),
            'jenisKelamin' => $this->input->post('jenisKelamin'),
        );
		$data_pass = array(
			'password' => md5($this->input->post('password', true)),
		);

		$update = $this->Member->update_member_id($id_member, $data);
		$user = $this->Member->get_member_id($id_member);
		$pass = $this->Account->update_profile('user', $user['username'], $data_pass);
		if ($update && $pass){
			redirect('AccountController/view_profile/'.$user['username']);
		}
	}
}
?>
