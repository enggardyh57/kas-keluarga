<?php

class Laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('id')) {
            redirect('auth');
        }

        $this->load->model('model_laporan');
    }

    public function index()
    {
        $bulan = $this->input->get('bulan');
        $tahun = $this->input->get('tahun');

        $bulan = $bulan ? (int) $bulan : (int) date('n');
        $tahun = $tahun ? (int) $tahun : (int) date('Y');

        if ($bulan < 1 || $bulan > 12) {
            $bulan = (int) date('n');
        }

        $data['bulan'] = $bulan;
        $data['tahun'] = $tahun;

        $data['laporan'] = $this->model_laporan->get_laporan($bulan, $tahun);
        $data['saldo'] = $this->model_laporan->get_saldo_saat_ini();

        $this->load->view('templates/header');
        $this->load->view('user/laporan', $data);
        $this->load->view('templates/footer');
    }
}