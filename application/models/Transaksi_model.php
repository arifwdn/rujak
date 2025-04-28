<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi_model extends CI_Model
{
    public $id_transaksi;
    public $id_customer;
    public $tanggal;
    public $total_pendapatan;
    public $sudah_diambil;
    public $pengambil;
    public $detail_transaksi = [];

    public function insert_transaksi()
    {
        $this->db->trans_start();
        $this->db->insert('transaksi', [
            'id_customer' => $this->id_customer,
            'tanggal' => $this->tanggal,
            'total_pendapatan' => $this->total_pendapatan
        ]);
        $id_transaksi = $this->db->insert_id();

        for ($i = 0; $i < count($this->detail_transaksi); $i++) {
            $this->db->insert('detail_transaksi', [
                'id_transaksi' => $id_transaksi,
                'id_barang' => $this->detail_transaksi[$i]['id_barang'],
                'quantity' => $this->detail_transaksi[$i]['qty'],
                'total' => $this->detail_transaksi[$i]['total']
            ]);
            $data = $this->db->get_where('barang', 'id_barang=' . $this->detail_transaksi[$i]['id_barang'])->row_array();

            $this->db->update('barang', ['stok' => (int)$data['stok'] - (int)$this->detail_transaksi[$i]['qty']], 'id_barang=' . $data['id_barang']);
        }

        $this->db->trans_complete();

        if ($this->db->trans_status() === false) {
            $this->db->trans_rollback();
            return false;
        } else {
            $this->db->trans_commit();
            return true;
        }
    }

    public function getTransaksi()
    {
        $data = $this->db->query('SELECT id_transaksi, tanggal, customer.nama as nama, customer.lokasi as lokasi, sudah_diambil  FROM transaksi, customer WHERE transaksi.id_customer = customer.id_customer')->result_array();
        return $data;
    }
}
