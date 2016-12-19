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
<td align="center">Daftar Urut Kepangkatan</td>
</tr>
<tr>
<td></td>
<td>
  <table cellpadding="8" style="border-collapse:collapse;" border="1">
      <tr height="40" style="background-color:#EA7D57;">
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
		foreach($data_pegawai->result_array() as $dp)
		{
	?>
      <tr height="35">
        <td><?php echo $no; ?></td>
        <td><?php echo $dp['nama_obat'].'<font color="white">_</font>'; ?></td>
        <td><?php echo $dp['kode_obat'].'<font color="white">_</font>'; ?></td>
        <td><?php echo $dp['kategori']; ?></td>
        <td><?php echo $dp['produsen']; ?></td>
        <td><?php echo $dp['distributor'].' - '.$dp['tanggal_lahir']; ?></td>
        <td><?php echo $dp['satuan']; ?></td>
        <td><?php echo $dp['harga_beli']; ?></td>
        <td><?php echo $dp['harga']; ?></td>
        <td><?php echo $dp['stok']; ?></td>
        <td><?php echo $dp['expired']; ?></td>
        <td><?php echo $dp['tgl_masuk']; ?></td>
        <td><?php echo $dp['tgl_edit']; ?></td>
      </tr>
	 <?php
	 		$no++;
	 	}
	 ?>
  </table>
</td>
</tr>
</table>