<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen_model extends CI_Model {

    // Mengambil data dosen dengan pagination dan pencarian
    public function get_all_dosen($limit, $start, $search = '') {
        if (!empty($search)) {
            $this->db->like('nama', $search);
        }
        $this->db->limit($limit, $start);
        return $this->db->get('dosen')->result_array();
    }

    // Menghitung jumlah total dosen (untuk pagination)
    public function count_dosen($search = '') {
        if (!empty($search)) {
            $this->db->like('nama', $search);
        }
        return $this->db->count_all_results('dosen');
    }

    // Menambahkan data dosen baru
    public function insert_dosen($data) {
        return $this->db->insert('dosen', $data);
    }

    // Menghapus data dosen berdasarkan ID
    public function delete_dosen($id) {
        $this->db->where('id', $id);
        return $this->db->delete('dosen');
    }

    // Mengambil data dosen berdasarkan ID
    public function get_dosen_by_id($id) {
        return $this->db->get_where('dosen', ['id' => $id])->row_array();
    }

    // Memperbarui data dosen berdasarkan ID
    public function update_dosen($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('dosen', $data);
    }
}
