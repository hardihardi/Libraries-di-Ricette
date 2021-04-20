<?php 

class Account extends CI_Model{
    
    function register($table,$data){
        $daftar= $this->db->insert($table,$data);
        if($daftar){
            return true;
        }
        else{
            return false;
        }
    }
    
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
    
    public function get_akun2($table,$username){
        $this->db->where('username',$username);
        $result = $this->db->get($table);
        if($result->num_rows()==1){
            return $result->row(0);
        }else{
            return false;
        }
        
    }
    
    public function getakun($table)
	{
        $data = $this->db->get($table);
		return $data->result_array();
	}
    
    public function getakun_id($table,$username){
        $this->db->where('username',$username);
        $result = $this->db->get($table);
        if($result->num_rows()==1){
            return $result->result_array();
        }else{
            return false;
        }
        
    }
    
    public function delete_akun($username){
        $this->db->where('username',$username);
		return $this->db->delete('user');
    }
    
    function update_profile($table,$username,$data){
        $this->db->where('username', $username);
        $update = $this->db->update($table,$data);
        if ($update){
            return TRUE;
        }else{
            return FALSE;
        }
    }

    public function get_akun_name($name)
    {
        $this->db->where('username',$name);
        return $this->db->get('pencari')->row_array();
    }
}




?>