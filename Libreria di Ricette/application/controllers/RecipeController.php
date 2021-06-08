<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RecipeController extends CI_Controller {

	// construct function that loads Resep Model and Pagination Library
    function __construct()
	{
		parent::__construct();
		$this->load->model('Resep');
		$this->load->model('Member');
		$this->load->model('Review');
		$this->load->model('Bahan');
		$this->load->library('pagination');
		$this->load->helper('date');
	}

	// function index that loads all available recipe in database
	// loading is configured by pagination
    public function index() {
        // pagination configuration
		$config['base_url'] = site_url('RecipeController/index');
		$config['total_rows'] = $this->db->count_all('resep');
		$config['per_page'] = 9;
		$config["uri_segment"] = 3;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);

		// pagination style
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

		// initialize pagination and content
		$this->pagination->initialize($config);
        $content['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $content['recipe'] = $this->Resep->get_resep_list($config["per_page"], $content['page']);
        
        $resepPage = $this->Resep->get_resep_list($config["per_page"], $content['page']);
        $arrMember =array();
		foreach ($resepPage as $y) {
			$arrMember[] = $this->Member->get_member_id($y['idMember']);
		}
		$content['member'] = $arrMember;
        $content['pagination'] = $this->pagination->create_links();

		// load the page
		$this->load->view('header');
		$this->load->view('homepage',$content);
		$this->load->view('footer');
    }

	// function to read a recipe based on its id
	public function view_recipe($id_recipe) {
		$content['recipe'] = $this->Resep->get_resep_id($id_recipe);
		$content['langkah'] = $this->Resep->get_langkah($id_recipe);
		
		$bahanid = $this->Resep->get_resep_bahan($id_recipe);
		$content['takaran'] = $bahanid;
		$arrBahan = array();
		foreach ($bahanid as $x) {
			$arrBahan[] = $this->Bahan->get_bahan($x['idBahan']);	
		}
		$content['bahan'] = $arrBahan;

		$reviewMember = $this->Review->getAllReview($id_recipe);
		$content['review'] = $reviewMember;
		$arrMember =array();
		foreach ($reviewMember as $y) {
			$arrMember[] = $this->Member->get_member_id($y['idMember']);
		}
		$content['memberReview'] = $arrMember;

		$member = $this->Resep->get_resep_id($id_recipe);
		$content['member'] = $this->Member->get_member_id($member['idMember']);

		$this->load->view('header');
		$this->load->view('fullRecipe', $content);
		$this->load->view('footer');
	}

	// function to load create recipe form
	public function form_recipe() {
		$this->load->view('header');
		$this->load->view('formCreateResep');
		$this->load->view('footer');
	}

	// function to create a recipe
	public function create_recipe() {
		$data = array(
			'judul' => $this->input->post('judul'),
			'penulis' => $this->session->username,
			'deskripisi' => $this->input->post('deskripsi'),
			'bahan' => $this->input->post('bahan'),
			'langkah' => $this->input->post('langkah'),
			'rating' => 0,
		);

		$cek = $this->Resep->buat_resep($data);
		if ($cek) {
			redirect('RecipeController', 'refresh');
		}
	}

	// function to edit a recpie
	public function edit_recipe($id_recipe) {
		$data = array(
			'judul' => $this->input->post('judul'),
			'penulis' => $this->session->username,
			'deskripisi' => $this->input->post('deskripsi'),
			'bahan' => $this->input->post('bahan'),
			'langkah' => $this->input->post('langkah'),
		);

		$cek = $this->Resep->update_resep($id_recipe, $data);
		if ($cek) {
			redirect('RecipeController', 'refresh');
		}
	}

	// function to delete a recipe based on its id
	public function delete_recipe($id_recipe) {
		$cek = $this->Resep->delete_resep($id_recipe);
		if ($cek) {
			redirect('RecipeController', 'refresh');
		}
	}
	public function add_review($id_recipe){
		$username = $this->session->userdata('username');
		$member = $this->Member->get_member_username($username);
		$data = array(
			'rating' => $this->input->post('rating'),
			'isi' => $this->input->post('isi'),
			'idMember' => $member['idMember'],
			'idResep' => $id_recipe,
			'tglReview' => time(),
		);
		$cek = $this->Review->tambahReviewBaru($data);
		redirect('RecipeController/view_recipe/'.$id_recipe, 'refresh');
	}
}
?>
