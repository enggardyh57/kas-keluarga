<?php

class Riwayat extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('email')) {
            $this->session->set_flashdata(
                'pesan-login',
                'Anda harus login!'
            );
            redirect('auth');
        }
    }

    public function index()
    {
        $keyword = $this->input->get('keyword');
        $kategori = $this->input->get('kategori');
        $bulan = $this->input->get('bulan');

        $data['riwayat'] = $this->model_riwayat->getRiwayat(
            $keyword,
            $kategori,
            $bulan
        );

        $data['keyword'] = $keyword;
        $data['kategori'] = $kategori;
        $data['bulan'] = $bulan;
        $this->load->view('templates/header');
        $this->load->view('user/riwayat',$data);
        $this->load->view('templates/footer');
    }
}
