<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
    }
    public function index()
    {
        $data['title'] = "Profile";
        $data['navbar'] = $this->load->view('navbar', $data, true);
        $data['content'] = $this->load->view('profile', [], true);
        $this->load->view('main', $data);
    }

    public function change_password()
    {
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
        $this->form_validation->set_rules('password_confirm', 'Password Confirmation', 'required|min_length[8]|matches[password]');
        if ($this->form_validation->run() == false) {
            $this->session->set_tempdata('profile_message', '<div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>Change Password Failed!</strong> Please Check errors<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>', 3);
            $this->index();
        } else {
            $username = $this->session->userdata('username');
            $password = $this->input->post('password');
            $password = password_hash($password, PASSWORD_DEFAULT);
            $changePass = $this->db->query('UPDATE user SET password="' . $password . '" WHERE username="' . $username . '"');
            if ($changePass) {
                $this->session->set_tempdata('profile_message', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Change Password Success!</strong><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>', 3);
                redirect('profile');
            } else {
                $this->session->set_tempdata('profile_message', '<div class="alert alert-warning alert-dismissible fade show" role="alert"><strong>Change Password Failed!</strong> Error in Query<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>', 3);
                redirect('profile');
            }
        }
    }
}
