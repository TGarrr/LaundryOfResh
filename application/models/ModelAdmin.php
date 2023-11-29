<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelAdmin extends CI_Model
{
    public function total_konsumen()
    {
        return $this->db->get('konsumen');
    }

    public function transaksi_baru()
    {
        $this->db->where('status', 'Baru');
        return $this->db->get('transaksi');
    }

    public function total_transaksi()
    {
        // $this->db->where('status', 'Baru');
        return $this->db->get('transaksi');
    }
}
