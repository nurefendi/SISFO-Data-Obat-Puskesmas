<div id="kiri"><h2>Module Berita</h2>
<div id="isi">
<br>
<a href="<?php echo base_url(); ?>index.php/admin/tambahberita"><div class="pagingpage"><b> + Tambah Berita </b></div></a>
<a href="<?php echo base_url(); ?>index.php/admin/katberita"><div class="pagingpage"><b> + Kategori Berita </b></div></a>
<a href="<?php echo base_url(); ?>index.php/admin/komenberita"><div class="pagingpage"><b> + Lihat Komentar Berita </b></div></a>
<br /><br />
<table width="756" cellpadding="2" cellspacing="1" bgcolor="#ccc" class="widget-small">
<tr bgcolor="#FFF" align="center"><td width="30"><strong>No.</strong></td><td><strong>Judul Berita</strong></td><td><strong>Kategori</strong></td><td><strong>Tanggal</strong></td><td colspan="2"><strong>Aksi</strong></td></tr>
<?php
$nomor=$page+1;
foreach($query->result() as $b)
{
		if(($nomor%2)==0){
			$warna="#C8E862";
		} else{
			$warna="#D6F3FF";
		}
echo "<tr bgcolor='$warna'><td align='center'>".$nomor."</td><td>".$b->judul_berita."</td><td>".$b->nama_kategori."</td><td align='center'>".$b->tanggal."</td><td align='center'><a href='".base_url()."index.php/admin/editberita/".$b->id_berita."' title='Edit'><img src='".base_url()."system/application/views/admin/images/edit-icon.gif' border='0'></a></td>
<td align='center'><a href='".base_url()."index.php/admin/hapusberita/".$b->id_berita."' onClick=\"return confirm('Anda yakin ingin menghapus berita ini?')\" title='Hapus'><img src='".base_url()."system/application/views/admin/images/hapus-icon.gif' border='0'></a></td></tr>";
$nomor++;
}
?>
</table>
<table class="widget" align="center"><tr><td><?=$paginator;?></td></tr></table>
<br />
<br />
<br />
<br />
</div>
</div>