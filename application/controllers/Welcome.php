<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	public function index()
	{
		$config['base_url']		= site_url('welcome/index');
		$config['total_rows']	= $this->db->count_all('tb_barang');
		$config['per_page']		= 3;
		$config['uri_segment']	= 3;
		$choice					= $config['total_rows'] / $config['per_page'];
		$config['num_links']	= floor($choice);

		// modifikasi saja
		$config['first_link']	= 'First';
		$config['last_link']	= 'Last';
		$config['next_link']	= 'Next';
		$config['prev_link']	= 'Prev';
		$config['full_tag_open']	= '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
		$config['full_tag_close']	= '</div></nav></ul>';
		$config['num_tag_open']		= '<li class="page-item"><span class="page-link">';
		$config['num_tag_close']	= '</span></li>';
		$config['cur_tag_open']		= '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close']	= '</span></li>';
		$config['next_tag_open']		= '<li class="page-item"><span class="page-link">';
		$config['next_tagl_close']	= '<span aria-hidden="true">&raquo</span></span></li>';
		$config['prev_tag_open']		= '<li class="page-item"><span class="page-link">';
		$config['prev_tagl_close']	= '</span>Next</li>';
		$config['first_tag_open']		= '<li class="page-item"><span class="page-link">';
		$config['first_tagl_close']	= '</span>Next</li>';
		$config['last_tag_open']		= '<li class="page-item"><span class="page-link">';
		$config['last_tagl_close']	= '</span>Next</li>';
		// akhir modifikasi


		$this->pagination->initialize($config);
		$data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;


		$data['barang'] = $this->model_barang->tampil_data($config['per_page'], $data['page'])->result();
		$data['pagination'] = $this->pagination->create_links();
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('dashboard', $data);
		$this->load->view('template/footer');
	}
}
