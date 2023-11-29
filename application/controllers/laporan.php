<?php
defined('BASEPATH') or exit('No direct script access allowed');


class laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('tgl_indo_helper');
        cek_login();
    }

    public function index()
    {
        $data['judul'] = 'Laporan';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates_admin/header', $data);
        $this->load->view('templates_admin/sidebar', $data);
        $this->load->view('templates_admin/topbar', $data);
        $this->load->view('laporan/index', $data);
        $this->load->view('templates_admin/footer');
    }

    public function cetakLaporan()
    {
        $data['judul'] = 'Laporan';
        $tgl_mulai = $this->input->post('tgl_mulai');
        $tgl_ahir = $this->input->post('tgl_ahir');
        // Menampilkan nilai variabel sebelum mengirimkannya ke fungsi filter_laporan()
        // var_dump($tgl_mulai, $tgl_ahir);

        $data['laporan'] = $this->ModelLaporan->filter_laporan($tgl_mulai, $tgl_ahir);


        $this->session->set_userdata('tanggal_mulai', $tgl_mulai);
        $this->session->set_userdata('tanggal_ahir', $tgl_ahir);
        $this->load->library('dompdf_gen');
        $this->load->view('laporan/cetakLaporan', $data);

        $paper_size = 'A5';
        $orientation = 'landscape';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("Detail Transaksi", array('Attachment' => 0));
    }
}
