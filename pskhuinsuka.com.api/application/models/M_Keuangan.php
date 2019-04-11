<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class M_Keuangan extends CI_Model {
    public function listBulan($periode) {
        $query = $this->db->select("keuangan.keuangan_tanggal, bulan.*")->from("keuangan")
        ->join("bulan", "bulan.bulan_id=MONTH(keuangan.keuangan_tanggal)")
        ->where("keuangan_periode", $periode)
        ->order_by("MONTH(keuangan_tanggal)")
        ->get();

        if ($query->num_rows() > 0) {
            return array("status" => 200, "keterangan" => json_decode(json_encode($query->result()), TRUE));
        }
        else {
            return array("status" => 204, "keterangan" => "Data tidak ditemukan.");
        }
    }

    public function daftar($periode, $bulan)
    {
        $query = $this->db->select("*")->from("keuangan")
        ->where("keuangan_periode", $periode)
        ->where("MONTH(keuangan_tanggal)", $bulan)
        ->get();

        if ($query->num_rows() > 0) {
            return array(
                "status" => 200,
                "keterangan" => json_decode(json_encode($query->result()), TRUE)
            );
        }
        else {
            return array(
                "status" => 204,
                "keterangan" => "Laporan tidak ditemukan."
            );
        }
    }

    public function hapus($id)
    {
        $query = $this->db->where("keuangan_id", $id)->delete("keuangan");
        if (!empty($query)) {
            return array(
                "status" => 200,
                "keterangan" => "Data berhasil dihapus."
            );
        }
        else {
            return array(
                "status" => 204,
                "keterangan" => "Data gagal dihapus."
            );
        }
    }
}