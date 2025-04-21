<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customer extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
        $this->load->model('Customer_model', 'customer');
    }
    public function index()
    {
        $data['title'] = "Customer";
        $data['navbar'] = $this->load->view('navbar', $data, true);
        $data['content'] = $this->load->view('customer', [], true);
        $this->load->view('main', $data);
    }

    public function add_customer()
    {
        $data['title'] = "Customer";
        $data['customer'] = [];
        $data['navbar'] = $this->load->view('navbar', $data, true);
        $data['content'] = $this->load->view('form_customer', $data, true);
        $this->load->view('main', $data);
    }

    public function proses_add_customer()
    {
        $this->customer->nama = $this->input->post('nama');
        $this->customer->no_hp = $this->input->post('no_hp');
        $this->customer->lokasi = $this->input->post('lokasi');

        $save = $this->customer->insertCustomer();
        if ($save) {
            $this->session->set_tempdata('customer_message', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Add Data Success!</strong><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>', 3);
            redirect('customer');
        }
    }
}
