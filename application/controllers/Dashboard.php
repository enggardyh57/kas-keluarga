<?php

class Dashboard extends CI_Controller
{
    public function index()
    {
        $this->load->view('templates/header');
        $this->load->view('user/dashboard');
        $this->load->view('templates/footer');
    }
}
