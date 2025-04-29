<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    // Fungsi untuk menyimpan data user baru
    public function insert_user($data){
        return $this->db->insert('user', $data);
    }

    // Fungsi untuk registrasi user baru
    public function register($data){
        // Hash password sebelum disimpan
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        
        // Insert data ke tabel user
        return $this->insert_user($data);  // Panggil fungsi insert_user untuk menyimpan data user
    }
}
