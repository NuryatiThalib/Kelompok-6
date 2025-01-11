<?php
require('fpdf.php');
require('koneksi.php');

class PDF extends FPDF {

    public function Header() {
        $this->SetFont('Times','B');
        $this->Cell(100,10,'Laporan Wajib Pajak',ln: 'C');
    }
    public function LoadData($data) {
        // var_dump($data);
        // die();
        $row = [];
        foreach($data as $item ) {
            $row[] = $item;
        }

        return $row;
    }


    public function BasicTable($header, $data) {


        foreach($header as $head) {
            $this->Cell(30,7, $head,1,);
        }
        $this->Ln();
       
        $no = 1;
        foreach($data as $row) {
            $row = [$no++, ...$row];
            foreach($row as $col) {
                $this->Cell(30,6,$col,1);
            }
            $this->Ln();
        }
    }
}


$query = mysqli_query($koneksi,'SELECT nma_wp,nik_wp,jns_kel,alamat_wp,no_dg,jns_kdrn FROM tbl_wp');

$result = mysqli_fetch_all($query,MYSQLI_ASSOC);

$pdf = new PDF('L','mm','legal');

$header = ['no','nip','nama','jenis_kelamain','alamat','no Plat','jenis_kendaraan'];

$data = $pdf->LoadData($result);
$pdf->SetFont('Times','',11);
// $pdf->SetMargins(2,2,2);
$pdf->AddPage();
$pdf->BasicTable($header,$data);
$pdf->Output();



?>