<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Cetak_laporan extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->library('Cetak_pdf');
        $this->load->model('m_hasil_pemilihan');
    }

	function index()
	{
        $pdf = new FPDF('P', 'mm','A4');
        $today = new DateTime("today");
        $hariini = $today->format('d/m/Y');
        $pdf->AddPage();

        $pdf->SetFont('Times','B',16);
        $pdf->Cell(0,7,'LAPORAN HASIL PEMUNGUTAN SUARA',0,1,'C');
        $pdf->Cell(0,7,'PEMILIHAN CALON KETUA RT',0,1,'C');
        $pdf->Cell(0,7,'______________________________________________________________',0,1,'C');
        $pdf->Ln('9');
        $pdf->SetFont('Times','',11);
        $pdf->Cell(25,0,'RT',0,0,'L');
        $pdf->Cell(100,0,': ........................................',0,0,'L');
        $pdf->Cell(17,0,'NO',0,0,'L');
        $pdf->Cell(50,0,': ........................................',0,0,'L');
        $pdf->Ln('7');
        $pdf->Cell(25,0,'RW',0,0,'L');
        $pdf->Cell(100,0,': ........................................',0,0,'L');
        $pdf->Cell(17,0,'Tanggal',0,0,'L');
        $pdf->Cell(50,0,': '.$hariini,0,0,'L');
        $pdf->Ln('7');
        $pdf->Cell(25,0,'Kelurahan',0,0,'L');
        $pdf->Cell(100,0,': ........................................',0,0,'L');
        $pdf->Ln('12');
        
        $pdf->Cell(0,0,'    Sehubungan dengan telah dilaksanakannya pemilihan calon ketua RT, dengan ini ADMIN melaporkan hasil pengu-',0,0,'L');
        $pdf->Ln('7');
        $pdf->Cell(107,0,'ngumpulan suara pemilihan calon ketua RT per tanggal '.$hariini.',',0,0,'L');
        $pdf->Cell(110,0,'sebagai berikut :',0,0,'L');
        $pdf->Ln('10');
        $pdf->SetFont('Times','B',10);
        $pdf->Cell(8,6,'No',1,0,'C');
        $pdf->Cell(67,6,'Nama Calon',1,0,'C');
        $pdf->Cell(8,6,'RT',1,0,'C');
        $pdf->Cell(26,6,'Calon No Urut',1,0,'C');
        $pdf->Cell(30,6,'Suara Terkumpul',1,0,'C');
        $pdf->Cell(45,6,'Warga belum memilih / RT',1,1,'C');

        $pdf->SetFont('Times','',11);
        $this->db->order_by("hasil_pemilihan_rt ASC, calon_noUrut ASC");
        $query = $this->db->get('tbl_hasil_pemilihan')->result();
        $no=1;
        foreach ($query as $data){
            $pdf->Cell(8,6,$no,1,0);
            $pdf->Cell(67,6,$data->hasil_pemilihan_calon,1,0);
            $pdf->Cell(8,6,$data->hasil_pemilihan_rt,1,0);
            $pdf->Cell(26,6,$data->calon_noUrut,1,0);
            $pdf->Cell(30,6,$data->hasil_pemilihan_suara,1,0);
            $pdf->Cell(45,6,$data->hasil_pemilihan_golput,1,1);
           
            $no++;
        }
        
        $pdf->Ln('25');
        $pdf->SetFont('Times','',11);
        $pdf->Cell(175,0,'Cimahi, ..........................................',0,0,'R');
        $pdf->Ln('7');
        $pdf->Cell(157,0,'Ketua RW',0,0,'R');
        $pdf->Ln('27');
        $pdf->Cell(175,0,'(...................................................)',0,0,'R');

        $pdf->Output();

	}
}