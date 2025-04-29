<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_model extends CI_Model {
    
    public function get_all_kategori() {
        return $this->db->get('kategori')->result_array(); 
    }

    public function insert_kategori($data) {
        return $this->db->insert('kategori', $data);
    }

    public function delete_kategori($idkategori) {
        return $this->db->delete('kategori', ['idkategori' => $idkategori]);
    }

    public function get_kategori_by_id($idkategori) {
        return $this->db->get_where('kategori', ['idkategori' => $idkategori])->row_array();
    }

    public function update_kategori($idkategori, $data) {
        return $this->db->where('idkategori', $idkategori)->update('kategori', $data);
    }
}
