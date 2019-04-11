<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class Keuangan extends CI_Controller {
    public function index()
	{
		json_output(200, array("status" => 400, "keterangan" => "Bad request."));
	}
	
	public function listBulan($periode)
	{
		$method = $_SERVER["REQUEST_METHOD"];
		if ($method === "GET" && !empty($periode) && is_numeric($periode) === TRUE) {
			$response = $this->M_Keuangan->listBulan($periode);
			json_output(200, $response);
		} else {
			json_output(200, array("status" => 400, "keterangan" => "Bad Request."));
		}
	}

    public function daftar($periode, $bulan)
	{
		$method = $_SERVER["REQUEST_METHOD"];
        if ($method === "GET" && !empty($periode) && is_numeric($periode) === TRUE && !empty($bulan) && is_numeric($bulan) === TRUE ) {
			$response = $this->M_Keuangan->daftar($periode, $bulan);
			json_output(200, $response);
		} else {
			json_output(200, array("status" => 400, "keterangan" => "Bad Request."));
		}
	}

	public function hapus($id)
	{
		$method = $_SERVER["REQUEST_METHOD"];
        if ($method === "GET" && !empty($id) && is_string($id) === TRUE) {
			$response = $this->M_Keuangan->hapus($id);
			json_output(200, $response);
		} else {
			json_output(200, array("status" => 400, "keterangan" => "Bad Request."));
		}
	}
}