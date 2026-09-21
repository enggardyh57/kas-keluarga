<?php

class Auth extends CI_Controller
{
    public function index()
    {
        $this->form_validation->set_rules(
            'email',
            'Email',
            'required|trim',
            [
                'required' => 'Email wajib diisi.'
            ]
        );

        $this->form_validation->set_rules(
            'password',
            'Password',
            'required|trim|min_length[5]|max_length[8]',
            [
                'required'   => 'Password wajib diisi.',
                'min_length' => 'Password minimal 5 karakter.',
                'max_length' => 'Password maksimal 8 karakter.'
            ]
        );

        if ($this->form_validation->run() == false) {
            $data['title'] = 'TRIVIREXA Login';

            $this->load->view('templates/header');
            $this->load->view('auth/login');
            $this->load->view('templates/footer');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $email = trim($this->input->post('email', true));
        $password = $this->input->post('password');

        $user = $this->db
            ->get_where('user', ['email' => $email])
            ->row_array();

        // User tidak ditemukan
        if (!$user) {
            $this->session->set_flashdata(
                'pesan-login',
                'User belum ada, silakan daftar.'
            );

            redirect('auth');
            return;
        }

        // Password salah
        if (!password_verify($password, $user['password'])) {
            $this->session->set_flashdata(
                'pesan-login',
                'Password salah.'
            );

            redirect('auth');
            return;
        }

        // Login berhasil
        $data = [
            'id'       => $user['id'],
            'email'  => $user['email'],
            'nama' => $user['nama']
        ];

        $this->session->set_userdata($data);

        $this->session->set_flashdata(
            'pesan-success',
            'Selamat datang, ' . $data['nama'] . '!'
        );

        redirect('dashboard');
    }

    public function daftar()
    {
        $this->form_validation->set_rules(
            'email',
            'Email',
            'required|trim',
            [
                'required' => 'Email wajib diisi.'
            ]
        );
        $this->form_validation->set_rules(
            'nama',
            'Nama',
            'required|trim',
            [
                'required' => 'Nama wajib diisi.'
            ]
        );

        $this->form_validation->set_rules(
            'password1',
            'Password',
            'required|trim|min_length[5]|max_length[8]|matches[password2]',
            [
                'required'   => 'Password wajib diisi.',
                'min_length' => 'Password minimal 5 karakter.',
                'max_length' => 'Password maksimal 8 karakter.',
                'matches'    => 'Password tidak sama'
            ]
        );

        $this->form_validation->set_rules(
            'password2',
            'Password',
            'required|trim|min_length[5]|max_length[8]|matches[password1]',
            [
                'required'   => 'Password wajib diisi.',
                'min_length' => 'Password minimal 5 karakter.',
                'max_length' => 'Password maksimal 8 karakter.',
                'matches'    => 'Password tidak sama'
            ]
        );

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header');
            $this->load->view('auth/daftar');
            $this->load->view('templates/footer');
        } else {
            $this->model_auth->daftar_akun();
            $this->session->set_flashdata(
                'pesan-success',
                'Selamat akun telah terdaftar, silahkan login'
            );
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('nama');
        $this->session->set_flashdata(
            'pesan-success',
            'Berhasil logout'
        );
        redirect('auth');
    }
}
