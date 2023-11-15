<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelTransaksi extends CI_Model
{
    public function getHargaPaket($kode_paket)
    {
        $this->db->where('kode_paket', $kode_paket);
        return $this->db->get('paket')->row_array();
    }

    public function generateKode()
    {
        $this->db->select('RIGHT(transaksi.kode_transaksi,3) as kode');
        $this->db->order_by('kode_transaksi', 'desc');
        $this->db->limit(1);
        // membuat variabel query 
        $query = $this->db->get('transaksi');
        // melakukan pengecekan/kondisi
        if ($query->num_rows() > 0) {
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            $kode = 1;
        }

        $kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT);
        $kodejadi = "" . $kodemax;
        return $kodejadi;
    }

    public function simpanTransaksi($data = null)
    {
        $this->db->insert('transaksi', $data);
    }
}
