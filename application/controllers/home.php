<?php

class Home extends CI_Controller
{

    public function index()
    {
        $data['paket'] = $this->db->get('paket')->result();

        $this->load->view('frontend/header');
        $this->load->view('frontend/navbar');
        $this->load->view('frontend/index', $data);
        $this->load->view('frontend/footer');
    }
}
