<?php

class model_auth extends CI_Model
{
    public function daftar_akun()
    {
        $data = [
            'email' => $this->input->post('email',true),
            'nama'  => $this->input->post('nama',true),
            'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT)
        ];
        $this->db->insert('user', $data);
    }
}
