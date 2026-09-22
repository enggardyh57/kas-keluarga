<?php
defined('BASEPATH') or exit('No direct script access allowed');

class model_laporan extends CI_Model
{
    private $kategori = [
        'Belanja Rumah',
        'Saku Bintang',
        'Saku Keysia'
    ];

    public function get_laporan($bulan, $tahun)
    {
        $user_id = $this->session->userdata('id');

        $data = [
            'kategori' => [],
            'total_pengeluaran' => 0,
            'total_penarikan' => 0
        ];

        foreach ($this->kategori as $kategori) {
            $result = $this->db
                ->select_sum('nominal', 'total')
                ->where('user_id', $user_id)
                ->where('kategori', $kategori)
                ->where('MONTH(tanggal)', $bulan)
                ->where('YEAR(tanggal)', $tahun)
                ->get('pengeluaran')
                ->row();

            $total = $result && $result->total !== null
                ? (float) $result->total
                : 0;

            $data['kategori'][$kategori] = $total;
            $data['total_pengeluaran'] += $total;
        }

        $result = $this->db
            ->select_sum('nominal', 'total')
            ->where('user_id', $user_id)
            ->where('MONTH(tanggal)', $bulan)
            ->where('YEAR(tanggal)', $tahun)
            ->get('penarikan_atm')
            ->row();

        $data['total_penarikan'] = $result && $result->total !== null
            ? (float) $result->total
            : 0;

        return $data;
    }

    public function get_saldo_saat_ini()
    {
        $user_id = $this->session->userdata('id');

        $settings = $this->db
            ->select('saldo_awal_atm, saldo_awal_tunai')
            ->where('user_id', $user_id)
            ->get('settings')
            ->row();

        $saldo_awal_atm = $settings
            ? (float) $settings->saldo_awal_atm
            : 0;

        $saldo_awal_tunai = $settings
            ? (float) $settings->saldo_awal_tunai
            : 0;

        $penarikan = $this->db
            ->select_sum('nominal', 'total')
            ->where('user_id', $user_id)
            ->get('penarikan_atm')
            ->row();

        $pengeluaran = $this->db
            ->select_sum('nominal', 'total')
            ->where('user_id', $user_id)
            ->get('pengeluaran')
            ->row();

        $total_penarikan = $penarikan && $penarikan->total !== null
            ? (float) $penarikan->total
            : 0;

        $total_pengeluaran = $pengeluaran && $pengeluaran->total !== null
            ? (float) $pengeluaran->total
            : 0;

        $saldo_atm = $saldo_awal_atm - $total_penarikan;

        $saldo_tunai = $saldo_awal_tunai
            + $total_penarikan
            - $total_pengeluaran;

        return $saldo_atm + $saldo_tunai;
    }
}