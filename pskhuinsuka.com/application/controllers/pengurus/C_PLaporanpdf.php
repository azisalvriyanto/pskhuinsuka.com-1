<?php
defined("BASEPATH") OR exit("No direct script access allowed");

class C_PLaporanpdf extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->library('pdf');
    }
    
    function index(){
        // membuat halaman baru
        $pdf = new FPDF('P','mm','A4');
        $pdf->SetMargins(10, 10, 10);
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
        // Body tabel
        $pdf->Cell(25,6,'',1,0,'C');
        $pdf->Cell(69,6,'',1,0, 'C');
        $pdf->Cell(12,6,'',1,0, 'C');
        $pdf->Cell(28,6,'',1,0, 'C');
        $pdf->Cell(28,6,'',1,0, 'C');
        $pdf->Cell(28,6,'',1,1, 'C');

        $pdf->Cell(25,6,'',1,0,'C');
        $pdf->Cell(69,6,'',1,0, 'C');
        $pdf->Cell(12,6,'',1,0, 'C');
        $pdf->Cell(28,6,'',1,0, 'C');
        $pdf->Cell(28,6,'',1,0, 'C');
        $pdf->Cell(28,6,'',1,1, 'C');

        $pdf->Cell(25,6,'',1,0,'C');
        $pdf->Cell(69,6,'',1,0, 'C');
        $pdf->Cell(12,6,'',1,0, 'C');
        $pdf->Cell(28,6,'',1,0, 'C');
        $pdf->Cell(28,6,'',1,0, 'C');
        $pdf->Cell(28,6,'',1,1, 'C');

        $pdf->Output('I','Laporan[tgl]',true);
    }



}