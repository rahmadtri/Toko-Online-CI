<?php
defined('BASEPATH') or exit('No direct script access allowed');

class auth extends CI_Controller
{
    public function login()
    {
        if ($this->session->userdata('username')) {
            redirect('welcome');
        }

        $this->form_validation->set_rules('username', 'Username', 'required', [
            'required' => 'Username Wajib di isi!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header');
            $this->load->view('form_login');
            $this->load->view('template/footer');
        } else {
            $auth = $this->model_auth->cek_login();

            if ($auth == FALSE) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Username/Password anda salah!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');
                redirect('auth/login');
            } else {
                $this->session->set_userdata('username', $auth->username);
                $this->session->set_userdata('role_id', $auth->role_id);

                // switch ($auth->role_id) {
                //     case 1:
                //         redirect('admin/dashboard_admin');
                //         break;
                //     case 2:
                //         redirect('welcome');
                //         break;
                //     default:
                //         break;
                // }
                if($auth->role_id == 1){
                    redirect('admin/dashboard_admin');
                } else {
                    redirect('welcome');
                }


            }
        }
    }


    public function registrasi()
    {
        if ($this->session->userdata('username')) {
            redirect('welcome');
        }

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[tb_user.username]');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'password dont match!',
            'min_length' => 'password to short!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header');
            $this->load->view('registrasi');
            $this->load->view('template/footer');
        } else {
            $data = [
                'id' => '',
                'nama' => $this->input->post('nama'),
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password1'),
                'role_id' => 2
            ];

            $this->db->insert('tb_user', $data);
            redirect('auth/login');
        }
    }


    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            You have been logged out!</div>');
        redirect('auth/login');
    }
}
