<?php

class cekPesanan extends CI_Controller
{

    public function index()
    {
        $this->load->view('frontend/header');
        $this->load->view('frontend/navbar');
        $this->load->view('frontend/cekpesanan');
        // $this->load->view('frontend/footer');
    }
}
