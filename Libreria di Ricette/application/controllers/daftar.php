<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class daftar extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Account');
	}

	public function index()
	{
		$this->load->view('register');
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
}
?>
