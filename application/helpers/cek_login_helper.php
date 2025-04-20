<?php

if (!function_exists('cek_login')) {
    function cek_login()
    {
        $ci = &get_instance();
        if ($ci->session->userdata('logged_in') === null) {
            $ci->session->set_tempdata('login_message', '<div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>Access Denied!</strong> You are not logged in.<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>', 3);
            redirect('auth');
        }
    }
}
