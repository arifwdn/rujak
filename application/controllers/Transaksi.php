<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
        $this->load->model('Customer_model', 'customer');
    }

    public function index()
    {
        $data['title'] = "Transaksi";
        $data['navbar'] = $this->load->view('navbar', $data, true);
        $data['content'] = $this->load->view('transaksi', [], true);
        $this->load->view('main', $data);
    }

    public function add_transaksi()
    {
        $data['title'] = "Transaksi";
        $data['transaksi'] = [];
        $data['customer'] = $this->customer->getCustomer();
        $data['navbar'] = $this->load->view('navbar', $data, true);
        $data['content'] = $this->load->view('form_transaksi', $data, true);
        $data['script'] = $this->load->view('script_transaksi', [], true);
        $this->load->view('main', $data);
    }
}
