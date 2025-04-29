<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    // Fungsi untuk menyimpan data user baru
    public function insert_user($data){
        return $this->db->insert('user', $data);
    }

    // Fungsi untuk registrasi user baru
    public function register($data){
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        
        return $this->insert_user($data);  
    }
    public function check_user($username, $password){
        $this->db->where('username', $username);
        $user = $this->db->get('user')->row();

        if($user && password_verify($password, $user->password)){
            return $user;
        }
        return false;
    }
}
