<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelKonsumen extends CI_Model
{
    public function generate_kode_konsumen()
    {
        $this->db->select('RIGHT(konsumen.kode_konsumen,3) as kode');
        $this->db->order_by('kode_konsumen', 'desc');
        $this->db->limit(1);
        // membuat variabel query 
        $query = $this->db->get('konsumen');
        // melakukan pengecekan/kondisi
        if ($query->num_rows() > 0) {
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            $kode = 1;
        }

        $kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT);
        $kodejadi = "K" . $kodemax;
        return $kodejadi;
    }

    // memanggil semua data Customer
    public function getAllDatakonsumen()
    {
        return $this->db->get('konsumen');
    }

    public function KonsumenWhere($where)
    {
        return $this->db->get_where('konsumen', $where);
    }

    public function simpanKonsumen($data = null)
    {
        $this->db->insert('konsumen', $data);
    }

    public function updateKonsumen($data = null, $where = null)
    {
        $this->db->update('konsumen', $data, $where);
    }

    public function hapusKonsumen($where = null)
    {
        $this->db->delete('konsumen', $where);
    }
}
