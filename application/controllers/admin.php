<?php
defined('BASEPATH') or exit('No direct script access allowed');


class admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
    }

    public function index()
    {
        $data['judul'] = 'Dashboard';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['total_konsumen'] = $this->ModelAdmin->total_konsumen()->num_rows();
        $data['transaksi_baru'] = $this->ModelAdmin->transaksi_baru()->num_rows();
        $data['total_transaksi'] = $this->ModelAdmin->total_transaksi()->num_rows();


        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar', $data);
        $this->load->view('templates_admin/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates_admin/footer');
    }
}
