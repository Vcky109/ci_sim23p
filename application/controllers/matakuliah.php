<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Matakuliah extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Matakuliah_model');
        $this->load->library('pagination');
    }

    public function index() {
        $config['base_url'] = base_url('matakuliah/index');
        $config['total_rows'] = $this->Matakuliah_model->count_matakuliah(); 
        $config['per_page'] = $this->input->get('records_per_page') ?: 10;
        $config['page_query_string'] = TRUE;

        $this->pagination->initialize($config);
        $offset = $this->input->get('per_page') ?: 0;
        $search = $this->input->get('search');

        $data['matakuliah'] = $this->Matakuliah_model->get_all_matakuliah($config['per_page'], $offset, $search); // Sesuai model
        $data['pagination'] = $this->pagination->create_links();
        $data['offset'] = $offset;

        $this->load->view('templates/header');
        $this->load->view('matakuliah/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah() {
        $this->load->view('templates/header');
        $this->load->view('matakuliah/form_matakuliah');
        $this->load->view('templates/footer');
    }

    public function insert() {
        $data = array(
            'kode_matakuliah' => $this->input->post('kode_matakuliah'),
            'nama_matakuliah' => $this->input->post('nama_matakuliah'),
            'sks' => $this->input->post('sks'),
            'semester' => $this->input->post('semester'),
            'jenis' => $this->input->post('jenis'),
            'prodi' => $this->input->post('prodi')
        );

        if ($this->Matakuliah_model->insert_matakuliah($data)) {
            $this->session->set_flashdata('success', 'Mata kuliah berhasil ditambahkan');
        } else {
            $this->session->set_flashdata('error', 'Gagal menambahkan mata kuliah');
        }
        redirect('matakuliah');
    }

    public function edit($kode_matakuliah) {
        $data['matakuliah'] = $this->Matakuliah_model->get_matakuliah_by_kode($kode_matakuliah);
        $this->load->view('templates/header');
        $this->load->view('matakuliah/edit_matakuliah', $data);
        $this->load->view('templates/footer');
    }

    public function update($kode_matakuliah) {
        $data = array(
            'kode_matakuliah' => $this->input->post('kode_matakuliah'),
            'nama_matakuliah' => $this->input->post('nama_matakuliah'),
            'sks' => $this->input->post('sks'),
            'semester' => $this->input->post('semester'),
            'jenis' => $this->input->post('jenis'),
            'prodi' => $this->input->post('prodi')
        );

        if ($this->Matakuliah_model->update_matakuliah($kode_matakuliah, $data)) {
            $this->session->set_flashdata('success', 'Mata kuliah berhasil diperbarui');
        } else {
            $this->session->set_flashdata('error', 'Gagal memperbarui mata kuliah');
        }
        redirect('matakuliah');
    }

    public function hapus($kode_matakuliah) {
        if ($this->Matakuliah_model->delete_matakuliah($kode_matakuliah)) {
            $this->session->set_flashdata('success', 'Mata kuliah berhasil dihapus');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus mata kuliah');
        }
        redirect('matakuliah');
    }
}
