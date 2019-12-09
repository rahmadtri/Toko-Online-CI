<?php
defined('BASEPATH') or exit('No direct script access allowed');

class kategori extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function elektronik()
    {
        $data['elektronik'] = $this->model_kategori->data_elektronik()->result();
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('elektronik', $data);
        $this->load->view('template/footer');
    }
    public function pakaian_pria()
    {
        $data['pakaian_pria'] = $this->model_kategori->data_pakaian_pria()->result();
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('pakaian_pria', $data);
        $this->load->view('template/footer');
    }
    public function kecantikan()
    {
        $data['kecantikan'] = $this->model_kategori->data_kecantikan()->result();
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('kecantikan', $data);
        $this->load->view('template/footer');
    }
}
