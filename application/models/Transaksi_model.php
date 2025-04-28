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
            'total_pendapatan' => $this->total_pendapatan,
            'sudah_diambil' => null
        ]);
        $id_transaksi = $this->db->insert_id();

        for ($i = 0; $i < count($this->detail_transaksi); $i++) {
            $this->db->insert('detail_transaksi', [
                'id_transaksi' => $id_transaksi,
                'id_barang' => $this->detail_transaksi[$i]['id_barang'],
                'quantity' => $this->detail_transaksi[$i]['qty'],
                'total' => $this->detail_transaksi[$i]['total']
            ]);
            // $this->db->update('barang', ['stok',], 'id_barang=' . $this->detail_transaksi[$i]['id_barang']);
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
}
