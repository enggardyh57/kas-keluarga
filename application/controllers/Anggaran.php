<?php

class Anggaran extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        if (!$this->session->userdata('id')) {
            redirect('auth');
        }

        $this->load->model('model_anggaran');
    }

    public function index()
    {
        $user_id = $this->session->userdata('id');
        $bulan = $this->input->get('bulan');
        $tahun = $this->input->get('tahun');

        $bulan = $bulan ? (int) $bulan : (int) date('n');
        $tahun = $tahun ? (int) $tahun : (int) date('Y');

        if ($bulan < 1 || $bulan > 12) {
            $bulan = (int) date('n');
        }


        $data['saldo'] = $this->model_anggaran->get_saldo_awal($user_id);

        $data['anggaran'] = $this->model_anggaran->get_data_anggaran($user_id, $bulan, $tahun);
        $data['bulan'] = $bulan;
        $data['tahun'] = $tahun;

        $this->load->view('templates/header');
        $this->load->view('user/anggaran', $data);
        $this->load->view('templates/footer');
    }
    public function update()
    {
        $user_id = $this->session->userdata('id');

        $kategori = $this->input->post('kategori');
        $target = $this->input->post('target');
        $bulan = (int) $this->input->post('bulan');
        $tahun = (int) $this->input->post('tahun');


        $target = preg_replace('/[^0-9]/', '', $target);

        if ($kategori && $target !== '') {

            $this->model_anggaran->simpan_anggaran(
                $user_id,
                $kategori,
                (float) $target,
                $bulan,
                $tahun
            );
        }
        $this->session->set_flashdata('pesan', 'Anggaran berhasil diperbarui');

        redirect('anggaran?bulan=' . $bulan . '&tahun=' . $tahun);
    }
}
