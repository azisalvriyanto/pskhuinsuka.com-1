<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class C_PBeranda extends CI_Controller {
    public function index() {
		// if($this->session->userdata("username")) {
			if (true){
			$menu = array(
				"judul" => "Beranda",
				"judul_sub" => "Keterangan"
			);
			$data  = $this->M_Pendahuluan->pengurus($menu, $this->session->userdata("username"));

			$this->load->view("pengurus/beranda", $data);
		} else {
			redirect("pengurus");
		}
	}
}