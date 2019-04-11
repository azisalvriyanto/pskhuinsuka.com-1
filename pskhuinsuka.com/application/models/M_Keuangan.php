<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class M_Keuangan extends CI_Model {
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

    public function listBulan($periode) {
        $query = $this->db->select("keuangan.keuangan_tanggal, bulan.*")->from("keuangan")
        ->join("bulan", "bulan.bulan_id=MONTH(keuangan.keuangan_tanggal)")
        ->where("keuangan_periode", $periode)
        ->get();

        if ($query->num_rows() > 0) {
            return array("status" => 200, "keterangan" => json_decode(json_encode($query->result()), TRUE));
        }
        else {
            return array("status" => 204, "keterangan" => "Data tidak ditemukan.");
        }
    }

    public function tambah($data, $table) {
        $this->db->insert($table, $data);
    }

    public function ubah($data, $table, $id) {
        $this->db->where('keuangan_id', $id);
        $this->db->update($table, $data);
    }
}