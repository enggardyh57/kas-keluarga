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

        $data['saldo'] = $this->model_anggaran->get_saldo_awal($user_id);

        $data['anggaran'] = $this->model_anggaran->get_data_anggaran($user_id);

        $this->load->view('templates/header');
        $this->load->view('user/anggaran', $data);
        $this->load->view('templates/footer');
    }
    public function update()
    {
        $user_id = $this->session->userdata('id');

        $kategori = $this->input->post('kategori');
        $target = $this->input->post('target');

        $target = preg_replace('/[^0-9]/', '', $target);

        if ($kategori && $target !== '') {

            $this->model_anggaran->simpan_anggaran(
                $user_id,
                $kategori,
                (float) $target
            );
        }

        redirect('anggaran');
    }
}
