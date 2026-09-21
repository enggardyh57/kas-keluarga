<?php

class model_pengaturan extends CI_Model
{
    public function tambah_pengaturan()
    {
        $user_id = $this->session->userdata('id');

        $saldo_atm = preg_replace(
            '/[^0-9]/',
            '',
            $this->input->post('saldo_atm')
        );

        $saldo_tunai = preg_replace(
            '/[^0-9]/',
            '',
            $this->input->post('saldo_tunai')
        );

        $data = [
            'saldo_awal_atm'   => $saldo_atm,
            'saldo_awal_tunai' => $saldo_tunai,
            'updated_at'       => date('Y-m-d H:i:s')
        ];

        $cek = $this->db
            ->where('user_id', $user_id)
            ->get('settings')
            ->row_array();

        if ($cek) {

            $this->db
                ->where('user_id', $user_id)
                ->update('settings', $data);

        } else {

            $data['user_id'] = $user_id;
            $data['created_at'] = date('Y-m-d H:i:s');

            $this->db->insert('settings', $data);
        }
    }

    public function getPengaturan()
    {
        $user_id = $this->session->userdata('id');

        return $this->db
            ->where('user_id', $user_id)
            ->get('settings')
            ->row_array();
    }
}