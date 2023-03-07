<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_m extends CI_Model
{

    // untuk mengambil data laporan berdasarkan tgl transaksi, tgl bayar, id paket dan id outlet
    // public function get_laporan()
    // {
    //     $this->db->select('*, tb_outlet.nama as nama_outlet');

    //     if ($dari != '') {
    //         $this->db->where('DATE(tgl) >=', $dari);
    //         $this->db->where('DATE(tgl) <=', $sampai);
    //     }

    //     if ($id_paket != '') {
    //         $this->db->where('tb_paket.id_paket', $id_paket);
    //     }

    //     if ($id_outlet != '') {
    //         $this->db->where('tb_outlet.id_outlet', $id_outlet);
    //     }
    // untuk menjoin tabel outlet
    // $this->db->join('tb_outlet', 'id_outlet', 'left');
    // $this->db->join('tb_paket', 'id_paket', 'left');
    // untuk menjoin tabel det transaksi
    // $this->db->join('tb_detail_transaksi', 'id_transaksi', 'left');
    // untuk menjoin tabel paket dengan tabel detail transaksi
    // $this->db->join('tb_paket', 'tb_detail_transaksi.id_paket = tb_paket.id_paket', 'left');
    // $this->db->group_by('tb_paket.id_paket, tb_outlet.id_outlet, DATE(tgl)');
    // return $this->db->get('tb_transaksi')->result_array();
    // }



    // public function filter_laporan($dari = '', $sampai = '', $id_paket = '', $id_outlet  = '')
    // {

    //     if ($dari != '') {
    //         $this->db->where('DATE(tgl) >=', $dari);
    //         $this->db->where('DATE(tgl) <=', $sampai);
    //     }

    //     if ($id_paket != '') {
    //         $this->db->where('tb_paket.id_paket', $id_paket);
    //     }

    //     if ($id_outlet != '') {
    //         $this->db->where('tb_outlet.id_outlet', $id_outlet);
    //     }

    //     $this->db->select('
    //         DATE(tgl) as tgl,
    //         tb_outlet.nama as nama_outlet,
    //          nama_paket,
    //          harga,
    //          SUM(qty) as jumlah,
    //          harga * SUM(qty) as total,
    //          dibayar
    //     ');
    //     $this->db->join('tb_outlet', 'id_outlet', 'left');
    //     // untuk menjoin tabel det transaksi
    //     $this->db->join('tb_detail_transaksi', 'id_transaksi', 'left');
    //     // untuk menjoin tabel paket dengan tabel detail transaksi
    //     $this->db->join('tb_paket', 'tb_detail_transaksi.id_paket = tb_paket.id_paket', 'left');
    //     $this->db->group_by('tb_paket.id_paket, tb_outlet.id_outlet, DATE(tgl)');
    //     return $this->db->get('tb_transaksi')->result_array();
    // }

    public function filter_laporan($dari = '', $sampai = '', $id_paket = '', $id_outlet = '', $dibayar = '')
    {

        if ($dari != '') {
            $this->db->where('DATE(tgl) >=', $dari);
            $this->db->where('DATE(tgl) <=', $sampai);
        }

        if ($id_paket != '') {
            $this->db->where('tb_paket.id_paket', $id_paket);
        }

        if ($id_outlet != '') {
            $this->db->where('tb_outlet.id_outlet', $id_outlet);
        }

        if ($dibayar != '') {
            $this->db->where('tb_transaksi.dibayar', $dibayar);
        }

        $this->db->select('
            DATE(tgl) as tgl,
            tb_outlet.nama as nama_outlet,
             nama_paket,
             harga,
             SUM(qty) as jumlah,
             harga * SUM(qty) as total,
             dibayar
        ');

        // untuk menjoin tabel outlet
        $this->db->join('tb_outlet', 'id_outlet', 'left');

        $this->db->join('tb_detail_transaksi', 'id_transaksi', 'left');

        $this->db->join('tb_paket', 'tb_detail_transaksi.id_paket = tb_paket.id_paket', 'left');
        $this->db->group_by('tb_paket.id_paket, tb_outlet.id_outlet, DATE(tgl), dibayar');
        return $this->db->get('tb_transaksi')->result_array();

        // $this->db->from('tb_transaksi');
        // $this->db->join('tb_member', 'tb_transaksi.id_member = tb_member.id_member', 'left');
        // // $this->db->join('tb_paket', 'tb_transaksi.id_paket = tb_paket.id_paket', 'left');
        // $this->db->where('tb_transaksi.tgl>=', $dari);
        // $this->db->where('tb_transaksi.tgl<=', $sampai);
        // return $this->db->get()->result();
    }
}
