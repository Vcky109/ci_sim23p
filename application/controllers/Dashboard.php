<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();

        // Cek apakah pengguna sudah login
        if (!$this->session->userdata('logged_id')) {
            redirect('auth/login');
        }

        // Cek apakah role pengguna adalah admin
        if ($this->session->userdata('role') !== 'admin') {
            redirect('auth/login');
        }

        // Menghindari cache halaman
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
        $this->output->set_header("Cache-Control: post-check=0, pre-check=0", false);
        $this->output->set_header("Pragma: no-cache");
    }

    public function index() {
        // Halaman dashboard admin
        $this->load->view('templates/header');
        $this->load->view('dashboard');
        $this->load->view('templates/footer');
    }
}
