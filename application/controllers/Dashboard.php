<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $data['title'] = "Dashboard";
        $data['navbar'] = $this->load->view('navbar', [], true);
        $data['content'] = $this->load->view('dashboard', [], true);
        $this->load->view('main', $data);
    }
}
