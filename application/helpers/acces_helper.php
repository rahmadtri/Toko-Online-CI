<?php

function is_logged_in()
{
    // memanggil instansi ci karena pada helper tidak termasuk MVC. kalo pake $this langsung tidak dikenali
    $ci = get_instance();

    if (!$ci->session->userdata('username')) {
        $ci->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Anda Harus Login Dulu
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>');
        redirect('auth/login');
    }
}
