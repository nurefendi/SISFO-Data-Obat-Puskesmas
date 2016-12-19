Pilih Siswa : 
<select name="id_desa" id="id_desa">
    <?php
	if(count($siswa->result_array())>0)
	{
		echo "<option>- Pilih Nama Siswa -</option>";
		foreach($ceksub->result_array() as $k)
		{
			echo "<option value='".$k['id_sub']."'>Kelas ".$k['nama_sub']." - ".$k['nama_sub']."</option>";
		}
	}
	else{
		echo "<option>- Data Belum Tersedia -</option>";
	}
    ?>
	</select>