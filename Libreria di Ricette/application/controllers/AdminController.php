<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminController extends CI_Controller {
    // construct function that loads Admin and Member Model
    function __construct()
	{
		parent::__construct();
        $this->load->model('Admin');
        $this->load->model('Member');
        $this->load->model('Bahan');
        $this->load->model('RefToko');
        $this->load->model('Resep');
        $this->load->model('Review');
        $this->load->model('Account');
	}

    // function index that will take admin to admin's dashboard
    // the page will show a table which contains list of available members, and the admin can verify them here
    public function index() {
        
        $this->load->view('headerAdmin');
        $data['member_list'] = $this->Member->get_all_member();
        $this->load->view('viewMember', $data);
        $this->load->view('footer');
    }

    // function to verify a member by utilizing their id
    public function verify($id_member) {
        $ver = $this->input->post('verified');
        if ($ver== "Verify User"){
            $data = array(
                'verified' => "1",
            );
        } else{
            $data = array(
                'verified' => "0",
            );
        }
        $this->Admin->verify_member($id_member,$data);
        redirect('AdminController', 'refresh');
    }

    // function to add ref toko
    public function add_toko() {
        $x = $this->RefToko->get_last_toko();
        if ($x == null) {
            $x['ids'] = 0;
        }
        $data = array(
            'idToko' => 'T-'.$x['ids']+1,
            'namaToko' => $this->input->post('namaToko'),
            'alamat' => $this->input->post('alamat'),
        );
        $this->Admin->create_ref_toko($data);
        redirect('AdminController/view_toko', 'refresh');
    }
    public function delete_toko($id_toko) {
        $cek = $this->RefToko->delete_toko($id_toko);
        if ($cek){
            redirect('AdminController/view_toko', 'refresh');    
        }
    }
    public function view_bahan(){
    	$this->load->view('headerAdmin');
        $data['bahan_list'] = $this->Bahan->get_all_bahan();
        $arrBahan = $this->Bahan->get_all_bahan();
        $toko = array();
		foreach ($arrBahan as $index => $b) {
			$toko[] = $this->Bahan->get_toko_bahan($b['idBahan']);
		}
		$data['toko'] = $toko;
        $data['allToko'] = $this->RefToko->get_all_toko();
        $this->load->view('addRefTokoToBahan', $data);
        $this->load->view('footer');
    }
    public function view_toko(){
        $this->load->view('headerAdmin');
        $data['toko'] = $this->RefToko->get_all_toko();
        $this->load->view('addRefToko', $data);
        $this->load->view('footer');
    }
    public function edit_toko($id_toko) {
        $data = array(
            'namaToko' => $this->input->post('namaToko'),
            'alamat' => $this->input->post('alamat'),
        );

        $cek = $this->RefToko->update_toko($id_toko, $data);
        if ($cek) {
            redirect('AdminController/view_toko', 'refresh');
        }
    }
    public function add_ref_toko($id_bahan) {
        $content = array(
            'idToko' => $this->input->post('idToko'),
            'idBahan' => $id_bahan,
        );
        $cek = $this->Admin->is_toko_bahan_duplicate($content);
        if ($cek == null){
            $this->Admin->add_relation_ref_bahan($content);
        }
        redirect('AdminController/view_bahan', 'refresh');
    }
    public function delete_ref_toko($id_bahan,$id_toko){
        $content = array(
            'idToko' => $id_toko,
            'idBahan' => $id_bahan,
        );
        $this->Admin->delete_toko_from_bahan($content);
        redirect('AdminController/view_bahan', 'refresh');
    }
    public function delete_bahan($id_bahan) {
        $cek = $this->Bahan->delete_bahan($id_bahan);
        if ($cek){
            redirect('AdminController/view_bahan', 'refresh');    
        }
    }
        public function edit_bahan($id_bahan) {
        $data = array(
            'namaBahan' => $this->input->post('namaBahan'),
        );

        $cek = $this->Bahan->update_bahan($id_bahan, $data);
        if ($cek) {
            redirect('AdminController/view_bahan', 'refresh');
        }
    }
    public function add_bahan() {
        $x = $this->Bahan->get_last_bahan();
        if ($x == null) {
            $x['ids'] = 0;
        }
        $data = array(
            "idbahan" => 'B-'.$x['ids']+1,
            'namaBahan' => $this->input->post('namaBahan'),
        );
        $this->Bahan->create_bahan($data);
        redirect('AdminController/view_bahan', 'refresh');
    }
        public function view_resep(){
        $this->load->view('headerAdmin');
        $data['resep'] = $this->Resep->get_all();
        $this->load->view('viewTabelResep', $data);
        $this->load->view('footer');
    }
    public function delete_resep($id_resep) {
		$review = $this->Review->getAllReview($id_resep);
		foreach ($review as $r) {
			$this->Review->delete_review($r['idReview']);
		}
		$langkah = $this->Resep->get_langkah($id_resep);
		foreach ($langkah as $l) {
			$this->Resep->delete_langkah($l['idStep']);
		}
		$cek = $this->Resep->delete_resep($id_resep);
		if ($cek) {
			redirect('AdminController/view_resep', 'refresh');
		}
    }
    public function delete_member($id_member) {
        $review = $this->Review->getAllReviewByUser($id_member);
        foreach ($review as $r) {
            $this->Review->delete_review($r['idReview']);
        }
        $resep = $this->Resep->get_resep_by_user($id_member);
        foreach ($resep as $r) {
            $this->delete_resep($r['idResep']);
        }
        $member = $this->Member->get_member_id($id_member);
        $cek = $this->Member->delete_member($id_member);

        $this->Account->delete_akun($member['username']);
        if ($cek){
            redirect('AdminController', 'refresh');    
        }
    }
}
?>
