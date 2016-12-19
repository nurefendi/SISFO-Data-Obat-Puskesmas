<?php
$nama_file = date('Y-m-d')."_laporan_pegawai_urut_kepangkatan.xls";    
header("Pragma: public");   
header("Expires: 0");   
header("Cache-Control: must-revalidate, post-check=0,pre-check=0");     
header("Content-Type: application/force-download");     
header("Content-Type: application/octet-stream");   
header("Content-Type: application/download");   
header("Content-Disposition: attachment;filename=".$nama_file."");  
header("Content-Transfer-Encoding: binary ");
?>
<table>
<tr>
<td></td>
<td align="center">DAFTAR STOK OBAT</td>
</tr>
<tr>
<td></td>
<td>
  <table cellpadding="8" style="border-collapse:collapse;" border="1">
      <tr height="40" style="background-color:#F7F43B;">
        <td>Nomor</td>
        <td>NAMA</td>
        <td>KODE OBAT</td>
        <td>KATEGORI</td>
        <td>PRODUSEN</td>
        <td>DISTRIBUTOR</td>
        <td>SATUAN</td>
        <td>HARGA</td>
        <td>HARGA</td>
        <td>STOK</td>
        <td>EXPIRED</td>
        <td>TGL MASUK</td>
        <td>TGL EDIT</td>
      </tr>
	<?php
		$no=1;
       foreach($export->result_array() as $dp)
		{
   echo"
      <tr height='35'>
        <td>".$no."</td>
        <td>".$dp["nama_obat"]."</td>
        <td>".$dp["kode_obat"]."</td>
        <td>".$dp["kategori"]."</td>
        <td>".$dp["produsen"]."</td>
        <td>".$dp["distributor"]."</td>
        <td>".$dp["satuan"]."</td>
        <td>".$dp["harga_beli"]."</td>
        <td>".$dp["harga"]."</td>
        <td>".$dp["stok"]."</td>
        <td>".$dp["expired"]."</td>
        <td>".$dp["tgl_masuk"]."</td>
        <td>".$dp["tgl_edit"]."</td>
      </tr>";
	 		$no++;
	 	}
	 ?>
  </table>
</td>
</tr>
</table>