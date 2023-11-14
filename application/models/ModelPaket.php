<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelPaket extends CI_Model
{
    public function generate_kode_paket()
    {
        $this->db->select('RIGHT(Paket.kode_paket,3) as kode');
        $this->db->order_by('kode_paket', 'desc');
        $this->db->limit(1);
        // membuat variabel query 
        $query = $this->db->get('paket');
        // melakukan pengecekan/kondisi
        if ($query->num_rows() > 0) {
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            $kode = 1;
        }

        $kodemax = str_pad($kode, 3, "0", STR_PAD_LEFT);
        $kodejadi = "QQ" . $kodemax;
        return $kodejadi;
    }

    // memanggil semua data paket
    public function getAllDataPaket()
    {
        return $this->db->get('paket');
    }

    public function paketWhere($where)
    {
        return $this->db->get_where('paket', $where);
    }

    public function simpanPaket($data = null)
    {
        $this->db->insert('paket', $data);
    }

    public function updatePaket($data = null, $where = null)
    {
        $this->db->update('paket', $data, $where);
    }

    public function hapusPaket($where = null)
    {
        $this->db->delete('paket', $where);
    }
}
