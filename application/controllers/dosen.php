<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Dosen_model');
        $this->load->library('pagination');
    }

    public function index() {
        // Ambil parameter pencarian dan jumlah record per halaman dari GET
        $search = $this->input->get('search');
        $records_per_page = $this->input->get('records_per_page') ?: 10; // Default 10
        $page = $this->uri->segment(3) ?: 0;

        // Konfigurasi pagination
        $config['base_url'] = base_url('dosen/index');
        $config['total_rows'] = $this->Dosen_model->count_dosen($search);
        $config['per_page'] = $records_per_page;
        $config['uri_segment'] = 3;
        $config['query_string_segment'] = 'page';
        $config['enable_query_strings'] = TRUE;
        $config['reuse_query_string'] = TRUE;

        // Styling pagination
        $config['full_tag_open'] = '<nav><ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul></nav>';
        $config['num_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close'] = '</span></li>';
        $config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close'] = '</span></li>';
        $config['next_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['next_tag_close'] = '</span></li>';
        $config['prev_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['prev_tag_close'] = '</span></li>';

        $this->pagination->initialize($config);

        // Ambil data dosen dengan filter pagination dan pencarian
        $data['dosen'] = $this->Dosen_model->get_all_dosen($records_per_page, $page, $search);
        $data['pagination'] = $this->pagination->create_links();
        $data['offset'] = $page;

        $this->load->view('templates/header');
        $this->load->view('dosen/index', $data);
        $this->load->view('templates/footer');
    }

    public function tambah() {
        $this->load->view('templates/header');
        $this->load->view('dosen/form_dosen');
        $this->load->view('templates/footer');
    }

    public function insert() {
        $data = array(
            'id' => $this->input->post('id'),
            'nama' => $this->input->post('nama'),
            'alamat' => $this->input->post('alamat'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'email' => $this->input->post('email'),
            'telp' => $this->input->post('telp')
        );

        if ($this->Dosen_model->insert_dosen($data)) {
            $this->session->set_flashdata('success', 'Dosen berhasil ditambahkan');
        } else {
            $this->session->set_flashdata('error', 'Gagal menambahkan dosen');
        }
        redirect('dosen');
    }

    public function edit($id) {
        $data['dosen'] = $this->Dosen_model->get_dosen_by_id($id);
        $this->load->view('templates/header');
        $this->load->view('dosen/edit_dosen', $data);
        $this->load->view('templates/footer');
    }

    public function update($id) {
        $data = array(
            'id' => $this->input->post('id'),
            'nama' => $this->input->post('nama'),
            'alamat' => $this->input->post('alamat'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'email' => $this->input->post('email'),
            'telp' => $this->input->post('telp')
        );

        if ($this->Dosen_model->update_dosen($id, $data)) {
            $this->session->set_flashdata('success', 'Data dosen berhasil diperbarui');
        } else {
            $this->session->set_flashdata('error', 'Gagal memperbarui data dosen');
        }
        redirect('dosen');
    }

    public function hapus($id) {
        if ($this->Dosen_model->delete_dosen($id)) {
            $this->session->set_flashdata('success', 'Dosen berhasil dihapus');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus dosen');
        }
        redirect('dosen');
    }
}
