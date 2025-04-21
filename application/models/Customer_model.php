<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customer_model extends CI_Model
{
    public $id_customer;
    public $nama;
    public $no_hp;
    public $lokasi;

    public function insertCustomer()
    {
        $customer = [
            'nama' => $this->nama,
            'no_hp' => $this->no_hp,
            'lokasi' => $this->lokasi,
        ];
        $query = $this->db->insert('customer', $customer, true);
        return $query;
    }

    public function getCustomer()
    {
        $data = $this->db->get('customer');
        return $data->result_array();
    }

    public function getDetailCustomer()
    {
        $data = $this->db->get_where('customer', 'id_customer=' . $this->id_customer);
        return $data->row_array();
    }

    public function updateCustomer()
    {
        $customer = [
            'nama' => $this->nama,
            'no_hp' => $this->no_hp,
            'lokasi' => $this->lokasi,
        ];
        $query = $this->db->update('customer', $customer, 'id_customer=' . $this->id_customer);
        return $query;
    }

    public function deleteCustomer()
    {
        $query = $this->db->delete('customer', 'id_customer=' . $this->id_customer);
        return $query;
    }
}
