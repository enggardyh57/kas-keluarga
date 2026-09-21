<?php


class model_dashboard extends CI_Model
{
    public function get_ringkasan($user_id)
    {
        $bulan = date('m');
        $tahun = date('Y');

        $settings = $this->db
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
            ->where('MONTH(tanggal)', $bulan)
            ->where('YEAR(tanggal)', $tahun)
            ->get('penarikan_atm')
            ->row();

        $penarikan_bulan_ini = $penarikan && $penarikan->total !== null
            ? (float) $penarikan->total
            : 0;

        $pengeluaran = $this->db
            ->select_sum('nominal', 'total')
            ->where('user_id', $user_id)
            ->where('MONTH(tanggal)', $bulan)
            ->where('YEAR(tanggal)', $tahun)
            ->get('pengeluaran')
            ->row();

        $pengeluaran_bulan_ini = $pengeluaran && $pengeluaran->total !== null
            ? (float) $pengeluaran->total
            : 0;

        $saldo_atm = $saldo_awal_atm - $penarikan_bulan_ini;
       
        $saldo_tunai = $saldo_awal_tunai
            + $penarikan_bulan_ini
            - $pengeluaran_bulan_ini;

        $total_saldo = $saldo_atm + $saldo_tunai;


        return [
            'saldo_atm'             => $saldo_atm,
            'saldo_tunai'           => $saldo_tunai,
            'total_saldo'           => $total_saldo,
            'pengeluaran_bulan_ini' => $pengeluaran_bulan_ini,
            'penarikan_bulan_ini'   => $penarikan_bulan_ini,
            'saldo_awal_atm'        => $saldo_awal_atm,
            'saldo_awal_tunai'      => $saldo_awal_tunai
        ];
    }
}