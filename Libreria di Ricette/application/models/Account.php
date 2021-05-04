<?php 

class Account extends CI_Model{
    
    // function untuk melakukan pendafataran akun baru kedalam database
    function register($table,$data){
        $daftar= $this->db->insert($table,$data);
        if($daftar){
            return true;
        }
        else{
            return false;
        }
    }

    // function untuk melakukan pemeriksaan username pada database
    function cekid_daftar($username){
        $this->db->where('username',$username);
        $cek = $this->db->get('user')->result_array();
        if(isset($cek[0])){
            return true;
        }
        else{
            return false;
        }
    }

    // function untuk melakukan login dengan mencocokkan username dan password pada database
    public function login($data) {
		$this->db->where('username', $data['username']);
		$this->db->where('password', $data['password']);
		$cek = $this->db->get('user')->row();
		if ($cek) {
			return true;
		} else {
			return false;
		}
	}
    
    // function untuk mengambil semua data akun yang ada di dalam database
    public function getakun($table)
	{
        $data = $this->db->get($table);
		return $data->result_array();
	}
    
    // function unutk mengambil data akun dari database berdasarkan id
    public function getakun_id($table,$id){
        $this->db->where('id',$id);
        $result = $this->db->get($table);
        if($result->num_rows()==1){
            return $result->result_array();
        }else{
            return false;
        }
        
    }

    // function untuk mengambil data akun dari database berdasarkan username
    public function getakun_username($table,$username){
        $this->db->where('username',$username);
        $result = $this->db->get($table);
        if($result->num_rows()==1){
            return $result->result_array();
        }else{
            return false;
        }
        
    }
    
    // function untuk melakukan hapus suatu data akun dari database berdasarkan username
    public function delete_akun($username){
        $this->db->where('username',$username);
		return $this->db->delete('user');
    }
    
    // function untuk melakukan update/modifikasi suatu data akun pada database berdasarkan username
    function update_profile($table,$username,$data){
        $this->db->where('username', $username);
        $update = $this->db->update($table,$data);
        if ($update){
            return TRUE;
        }else{
            return FALSE;
        }
    }
}
?>