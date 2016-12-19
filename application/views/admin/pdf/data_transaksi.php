<?php

$this->fpdf->FPDF("l","cm","LEGAL");

// kita set marginnya dimulai dari kiri, atas, kanan. jika tidak diset, defaultnya 1 cm
$this->fpdf->SetMargins(1,1,1);


/* AliasNbPages() merupakan fungsi untuk menampilkan total halaman
   di footer, nanti kita akan membuat page number dengan format : number page / total page
*/
$this->fpdf->Ln();
$this->fpdf->AliasNbPages();

// AddPage merupakan fungsi untuk membuat halaman baru
$this->fpdf->AddPage();

// Setting Font : String Family, String Style, Font size
$this->fpdf->SetFont('Times','B',20);

/* Kita akan membuat header dari halaman pdf yang kita buat
   -------------- Header Halaman dimulai dari baris ini -----------------------------
*/
$this->fpdf->Cell(32,0.7,'UPTD KESEHATAN PUSKESMAS BENGKALIS',0,0,'C');

// fungsi Ln untuk membuat baris baru
$this->fpdf->Ln();
$this->fpdf->Cell(32,0.7,'PUSKESMAS KECAMATAN BENGKALIS ',0,0,'C');

$this->fpdf->Ln();
/* Setting ulang Font : String Family, String Style, Font size
   kenapa disetting ulang ???
   jika tidak disetting ulang, ukuran font akan mengikuti settingan sebelumnya.
   tetapi karena kita menginginkan settingan untuk penulisan alamatnya berbeda,
   maka kita harus mensetting ulang Font nya.
   jika diatas settingannya : helvetica, 'B', '12'
   khusus untuk penulisan alamat, kita setting : helvetica, '', 10
   yang artinya string stylenya normal / tidak Bold dan ukurannya 10
*/
$this->fpdf->SetFont('helvetica','',16);
$this->fpdf->Cell(34,0.4,'Jl. Utama Pematang Duku No. 49 Bengkalis - Riau 330 Telp : 0853-5555-4518 Fax : 0232-875123',0,0,'C');

$this->fpdf->Ln();
$this->fpdf->Cell(35,0.9,'homepage : www.puskesmasbengkalis.ac.id  email : puskesmasbengkalis@gmail.com',0,0,'C');

/* Fungsi Line untuk membuat garis */
$this->fpdf->Line(1,3.70,34,3.70);
$this->fpdf->Line(1,3.72,34,3.72);


/* -------------- Header Halaman selesai ------------------------------------------------*/

$this->fpdf->Ln(1);
$this->fpdf->SetFont('Times','B',12);
$this->fpdf->Cell(34,1,'LAPORAN DATA TRANSAKSI OBAT',0,0,'C');


$this->fpdf->Ln();
$this->fpdf->Cell(0, 0.3, '', 0, '2', 'C');
$this->fpdf->SetFont('Times','B',10);
$this->fpdf->Cell(0.7, 0.8, 'No', 1, 0, 'C');
$this->fpdf->Cell(3.9, 0.8, 'NAMA PASIEN', 1, 0, 'C');
$this->fpdf->Cell(4.9, 0.8, 'OBAT', 1, 0, 'C');
$this->fpdf->Cell(2.6, 0.8, 'KODE OBAT', 1, 0, 'C');
$this->fpdf->Cell(3.6, 0.8, 'KATEGORI', 1, 0, 'C');
$this->fpdf->Cell(3.6, 0.8, 'PRODUSEN', 1, 0, 'C');
$this->fpdf->Cell(7.6, 0.8, 'DISTRIBUTOR', 1, 0, 'C');
$this->fpdf->Cell(1.6, 0.8, 'HARGA', 1, 0, 'C');
$this->fpdf->Cell(3.6, 0.8, 'TGL TRANSAKSI', 1, 0, 'C');
$this->fpdf->Cell(1.6, 0.8, 'JMLH', 1, 0, 'C');

$i = 0;
foreach($data->result_array() as $rows)
{
    $harga_beli = number_format($rows['harga_beli'],0,",",".");
    $harga = number_format($rows['harga'],0,",",".");
	$i++;
    $this->fpdf->Ln();
    $this->fpdf->SetFont('Times','',10);
    $this->fpdf->Cell(0.7  , 0.7, $i , 1, 'LR', 'L');
	 $this->fpdf->Cell(3.9 , 0.7, $rows['nama'] , 1, 'LR', 'L');
    $this->fpdf->Cell(4.9 , 0.7, $rows['nama_obat'] , 1, 'LR', 'L');
	$this->fpdf->Cell(2.6  , 0.7, $rows['kode_obat'] , 1, 'LR', 'C');
    $this->fpdf->Cell(3.6 , 0.7,$rows['kategori'] , 1, 'LR', 'C');
    $this->fpdf->Cell(3.6  , 0.7,$rows['produsen']  , 1, 'LR', 'C');
    $this->fpdf->Cell(7.6  , 0.7,$rows['distributor']  , 1, 'LR', 'L');
    $this->fpdf->Cell(1.6  , 0.7,$harga  , 1, 'LR', 'C');
	$this->fpdf->Cell(3.6  , 0.7,$rows['tanggal']  , 1, 'LR', 'C');
    $this->fpdf->Cell(1.6, 0.7, $rows['jumlah'] , 1, 'LR', 'C');
}

$this->fpdf->SetFont('helvetica', '', 8);
$this->fpdf->SetY(28);
$this->fpdf->Cell(0, 0.5, 'Powered By AKSESBLOG', 0, 2, 'C');
$this->fpdf->output('DATA LAPORAN TRANSAKSI OBAT.pdf', 'D');
?>