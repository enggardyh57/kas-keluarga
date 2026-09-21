<?php

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (! $this->session->userdata('email')) {
            $this->session->set_flashdata(
                'pesan-login',
                'Anda harus login!'
            );
            redirect('auth');
        }
    }
    public function index()
    {
        $user_id = $this->session->userdata('id');

        $data['ringkasan'] = $this->model_dashboard->get_ringkasan($user_id);
        $this->load->view('templates/header');
        $this->load->view('user/dashboard',$data);
        $this->load->view('templates/footer');
    }
}
