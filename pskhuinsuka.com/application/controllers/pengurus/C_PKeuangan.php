<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class C_PKeuangan extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->library('pdf');
    }

    public function index() {
        if($this->session->userdata("username")) {
			$menu = array(
				"judul" => "Keuangan",
				"judul_sub" => "Laporan"
			);
			$data		= $this->M_Pendahuluan->pengurus($menu, $this->session->userdata("username"));
			$periode	= $this->M_Periode->daftar();
			
			if ($periode["status"] === 200) {
				$bulan 	= $this->M_Keuangan->listBulan($periode["keterangan"][count($periode["keterangan"])-1]["periode_id"]);
				if ($bulan["status"] === 200) {
					$result	= $this->M_Keuangan->daftar($periode["keterangan"][count($periode["keterangan"])-1]["periode_id"], date('n'));
					if ($result["status"] === 200) {
						$data = @array_merge($data,
							array(
								"data" => array(
									"list_periode" => $periode["keterangan"],
									"list_bulan" => $bulan["keterangan"],
									"list_keuangan" => $result["keterangan"]
								)
							)
						);
					} else {
						$data = @array_merge($data,
							array(
								"data" => array(
									"list_periode" => $periode["keterangan"],
									"list_bulan" => $bulan["keterangan"],
									"list_keuangan" => ""
								)
							)
						);
					}
				} else {
					$data = @array_merge($data,
						array(
							"data" => array(
								"list_periode" => $periode["keterangan"],
								"list_bulan" => "",
								"list_keuangan" => ""
							)
						)
					);
				}
				
			} else {
				$data = @array_merge($data,
					array(
						"data" => array(
							"list_periode" => "",
							"list_bulan" => "",
							"list_keuangan" => ""
						)
					)
				);
			}

			// print_r(json_encode($result["keterangan"], TRUE)); exit;
			$this->load->view("pengurus/keuangan", $data);
		} else {
			redirect(base_url("pengurus"));
		}
	}
	
	public function tambah() {
		if($this->session->userdata("username")) {
			$tanggal = date('Y-m-d', strtotime(str_replace('/', '-', $this->input->post('tanggal'))));
			$data = array(
				'keuangan_tanggal' => $tanggal,
				'keuangan_periode' => $this->input->post('periode'),
				'keuangan_judul' => $this->input->post('keterangan'),
				'keuangan_jumlah' => $this->input->post('qty'),
				'keuangan_Keterangan' => $this->input->post('jenisData'),
				'keuangan_nominal' => $this->input->post('nominal')
			);

			// print_r(json_encode($data['keuangan_tanggal'], TRUE)); exit;
			// $timestamp = str_replace('/', '-', $this->input->post('tanggal')); var_dump(date('Y-m-d', strtotime($timestamp))); exit;
			// var_dump(date('Y-m-d', strtotime(str_replace('/', '-', $this->input->post('tanggal'))))); exit;
			$this->M_Keuangan->tambah($data, 'keuangan');
			redirect(base_url("pengurus/keuangan"));
		} else {
			redirect(base_url("pengurus"));
		}
	}

	public function edit($id) {
		if($this->session->userdata("username")) {
			redirect(base_url("pengurus/keuangan"));
		} else {
			redirect(base_url("pengurus"));
		}
	}

	public function ubah() {
		if($this->session->userdata("username")) {
			$tanggal = date('Y-m-d', strtotime(str_replace('/', '-', $this->input->post('tanggal'))));
			$id = $this->input->post('id');
			$data = array(
				// 'keuangan_periode' => $this->input->post('periode'),
				'keuangan_tanggal' => $tanggal,
				'keuangan_judul' => $this->input->post('keterangan'),
				'keuangan_jumlah' => $this->input->post('qty'),
				// 'keuangan_keterangan' => $this->input->post('jenisData'),
				'keuangan_nominal' => $this->input->post('nominal')
			);
			$this->db->where('keuangan_id', $id);
            $this->db->update('keuangan',$data);
			// $this->M_Keuangan->tambah($data, 'keuangan', $id);
			redirect(base_url("pengurus/keuangan"));
		} else {
			redirect(base_url("pengurus"));
		}
	}

	public function hapus($id) {
		if($this->session->userdata("username")) {
			if($id==""){
				$this->session->set_flashdata('error',"Data Anda Gagal Di Hapus");
				redirect(base_url("pengurus/keuangan"));
			}else{
				$this->db->where('keuangan_id', $id);
				$this->db->delete('keuangan');
				$this->session->set_flashdata('sukses',"Data Berhasil Dihapus");
				redirect(base_url("pengurus/keuangan"));
			}
		} else {
			redirect(base_url("pengurus"));
		}
	}

	public function cetak($periode, $bulan) {
		if($this->session->userdata("username")) {
			$result	= $this->M_Keuangan->daftar($periode, $bulan);
				if ($result["status"] === 200) {
					// membuat halaman baru
					$pdf = new FPDF('P','mm','A4');
					$pdf->SetMargins(10, 10, 10);
					$pdf->SetTitle('Laporan'.$periode.'_'.$bulan, true);
					$pdf->AddPage();
					// bagian Kop
					$pdf->Image('http://2.bp.blogspot.com/-LgSuDBZJMg8/UdTh-YO0FuI/AAAAAAAAAaQ/vetdwab21WA/s174/41670_100000046735461_6533_n.png',16,10,24);
					$pdf->SetFont('Times','B',12);
					$pdf->Cell(190,5,'PUSAT STUDI DAN KONSULTASI HUKUM',0,1,'C');
					$pdf->SetFont('Times','',12);
					$pdf->Cell(190,5,"FAKULTAS SYARI'AH DAN HUKUM",0,1,'C');
					$pdf->SetFont('Times','',12);
					$pdf->Cell(190,5,"UNIVERSITAS ISLAM NEGERI SUNAN KALIJAGA",0,1,'C');
					$pdf->SetFont('Times','B',10);
					$pdf->Cell(190,5,"Sekretariat: Jl. Marsda Adisucipto Gedung Student Center Lt. 2 No. 2.42",0,1,'C');
					$pdf->SetFont('Times','B',10);
					$pdf->Cell(190,5,"UIN Sunan Kalijaga Yogyakarta Telp. 087736704264, Yogyakarta 55281",0,1,'C');
					$pdf->SetLineWidth(1);
					$pdf->Line(10,35.5,200,35.5);
					$pdf->SetLineWidth(0);
					$pdf->Line(10,36.5,200,36.5);
					$pdf->Ln(10);
					// Bagian body
					// Judul
					$pdf->SetFont('Times','B',12);
					$pdf->Cell(190,5,"Laporan Keuangan Bulan [nama bulan]",0,1,'L');
					$pdf->Ln(3);
					// Header Tabel
					$pdf->SetFont('Times','B',10);
					$pdf->Cell(25,6,'Tanggal',1,0,'C');
					$pdf->Cell(69,6,'Keterangan',1,0, 'C');
					$pdf->Cell(12,6,'Qty',1,0, 'C');
					$pdf->Cell(28,6,'Debit',1,0, 'C');
					$pdf->Cell(28,6,'Kredit',1,0, 'C');
					$pdf->Cell(28,6,'Saldo',1,1, 'C');
					$pdf->SetFont('Times','',10);

					foreach ($result["keterangan"] as $daftar) {
					// for ($i=0; $i < count($result["keterangan"]) ;$i++) {
						// Body tabel
						$pdf->Cell(25,6,$daftar["keuangan_tanggal"],1,0,'C');
						$pdf->Cell(69,6,$daftar["keuangan_judul"],1,0, 'C');
						$pdf->Cell(12,6,$daftar["keuangan_jumlah"],1,0, 'C');
						if($daftar["keuangan_keterangan"]==1) {
							$pdf->Cell(28,6,$daftar["keuangan_nominal"],1,0, 'C');
							$pdf->Cell(28,6,'',1,0, 'C');
						} else {
							$pdf->Cell(28,6,'',1,0, 'C');
							$pdf->Cell(28,6,$daftar["keuangan_nominal"],1,0, 'C');
						}
						$pdf->Cell(28,6,'saldo',1,1, 'C');
					}
					
					$pdf->Output('I','Laporan'.$periode.'_'.$bulan.'.pdf',true);
				} else {
					// membuat halaman baru
					$pdf = new FPDF('P','mm','A4');
					$pdf->SetMargins(10, 10, 10);
					$pdf->SetTitle('Laporan tidak ditemukan', true);
					$pdf->AddPage();
					// bagian Kop
					$pdf->Image('http://2.bp.blogspot.com/-LgSuDBZJMg8/UdTh-YO0FuI/AAAAAAAAAaQ/vetdwab21WA/s174/41670_100000046735461_6533_n.png',16,10,24);
					$pdf->SetFont('Times','B',12);
					$pdf->Cell(190,5,'PUSAT STUDI DAN KONSULTASI HUKUM',0,1,'C');
					$pdf->SetFont('Times','',12);
					$pdf->Cell(190,5,"FAKULTAS SYARI'AH DAN HUKUM",0,1,'C');
					$pdf->SetFont('Times','',12);
					$pdf->Cell(190,5,"UNIVERSITAS ISLAM NEGERI SUNAN KALIJAGA",0,1,'C');
					$pdf->SetFont('Times','B',10);
					$pdf->Cell(190,5,"Sekretariat: Jl. Marsda Adisucipto Gedung Student Center Lt. 2 No. 2.42",0,1,'C');
					$pdf->SetFont('Times','B',10);
					$pdf->Cell(190,5,"UIN Sunan Kalijaga Yogyakarta Telp. 087736704264, Yogyakarta 55281",0,1,'C');
					$pdf->SetLineWidth(1);
					$pdf->Line(10,35.5,200,35.5);
					$pdf->SetLineWidth(0);
					$pdf->Line(10,36.5,200,36.5);
					$pdf->Ln(20);
					// Bagian body
					// Judul
					$pdf->SetFont('Times','B',30);
					$pdf->SetTextColor(255,0,0);
					$pdf->Cell(190,5,"Laporan Tidak Ditemukan!!!",0,1,'C');

					$pdf->Output('I','Laporan tidak ditemukan!!!.pdf',true);
				}
		} else {
			redirect(base_url("pengurus"));
		}
	}
}