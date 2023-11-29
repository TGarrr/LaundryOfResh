<?php

class cekPesanan extends CI_Controller
{

    public function index()
    {
        $kode_transaksi = $this->input->post('kode_transaksi');
        $data['data'] = $this->ModelCekPesanan->cekPesanan($kode_transaksi);
        // var_dump($data['data']);

        $this->load->view('frontend/header');
        $this->load->view('frontend/navbar');
        $this->load->view('frontend/cekpesanan', $data);
        // $this->load->view('frontend/footer');
    }
}
