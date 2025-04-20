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
        redirect('profile');
    }
}
