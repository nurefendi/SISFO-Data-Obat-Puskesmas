    	<noscript>
				<div class="alert alert-block span10">
					<h4 class="alert-heading">Warning!</h4>
					<p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
				</div>
			</noscript>

			<!-- start: Content -->
			<div id="content" class="span10">


			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a>
					<i class="icon-angle-right"></i>
				</li>
				<li>
                	<i class="icon-edit"></i>
                <a href="<?php echo base_url()?>index.php/admin/tambahobat">Form Transaksi Data</a></li>
			</ul>
	<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header">
						<h2><i class="halflings-icon list"></i><span class="break"></span>Form Transaksi Obat Keluar</h2>
						<div class="box-icon">
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
                    <?php echo form_open_multipart('admin/simpantransaksi');?>
<?php
foreach($detail->result_array() as $e){
$ps=array();
$id_kategori=$e["id_kategori"];
$kategori=$e["kategori"];
$nama_obat=$e["nama_obat"];
$id_obat=$e["id_obat"];
}
?>
					<div class="box-content">
						<div class="form-horizontal">

						  <fieldset>
						  <div class="control-group">
							   <label class="control-label" for="typeahead">Nama Pasien</label>
							   <div class="controls">
							   <input type="text" class="span6 typeahead" id="nama" name="nama" placeholder="Masukan Nama Pasien">
								</div>
							   </div>
                            <div class="control-group">
							   <label class="control-label" for="typeahead">Nama Obet</label>
							   <div class="controls">
							   <input type="text" class="span6 typeahead" id="nama_obat" name="nama_obat" value="<?php echo $nama_obat; ?>">
								</div>
							   </div>
							<div class="control-group">
							  <label class="control-label" for="typeahead">Jenis Kelmin</label>
							  <div class="controls">
								<select name="jenis_kelmin" id="jenis_kelamin">
								<option value="laki-laki" selected>Laki-laki</option>
								<option value="Perempuan">Perempuan</option>
								</select>
								</div>
							</div>
							 <div class="control-group">
							  <label class="control-label" for="typeahead">Kategori Obat</label>
							  <div class="controls">
								<select name="id_kategori" id="id_kategori">
								<option value="<?php echo $id_kategori?>" selected><?php echo $kategori?></option>
								<?php foreach($provinsi as $row_ska)	{	?>
								<option value="<?php echo $row_ska->id_kategori?>"><?php echo $row_ska->kategori?></option>
								<?php } ?>
								</select>
								</div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="typeahead">Tanggal</label>
							  <div class="controls">
								 <?php
$psh=array();
$psh=explode("-",$wkt_skr);
$tgl_skr=$psh[0];
$bln_skr=$psh[1];
$thn_skr=$psh[2];

echo "<select name='tgl'style='width:50px;'>";
for($i=1;$i<32;$i++)
{
if($tgl_skr==$i){
echo "<option selected>".$i."</option>";
}
else{
echo "<option>".$i."</option>";
}
}
echo "</select> - ";

echo "<select name='bln'style='width:50px;'>";
for($i=1;$i<13;$i++)
{
if($bln_skr==$i){
echo "<option selected>".$i."</option>";
}
else{
echo "<option>".$i."</option>";
}
}
echo "</select> - ";

echo "<select name='thn'style='width:70px;'>";
for($i=$thn_skr-2;$i<=$thn_skr+2;$i++)
{
if($thn_skr==$i){
echo "<option selected>".$i."</option>";
}
else{
echo "<option>".$i."</option>";
}
}
echo "</select>";
?>
								</div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="typeahead">Jml Obat</label>
							  <div class="controls">
								 <input type="text"  class="span6 typeahead" id="jumlah" name="jumlah" placeholder="Masukan Jumlah Obat">
								</div>
							</div>
							</div>
							<div class="form-actions">
                            <input type="hidden" name="id_obat" value="<?php echo $id_obat; ?>" />
                            <input type="hidden" name="id_kategori" value="<?php echo $id_kategori; ?>" />
							  <button type="submit" class="btn btn-primary">Save Data</button>
							</div>
						  </fieldset>
						</div>

					</div>
				</div><!--/span-->
			</div><!--/row-->


                 	</div><!--/.fluid-container-->

			<!-- end: Content -->
		</div><!--/#content.span10-->
		</div><!--/fluid-row-->

            	<div class="modal hide fade" id="myModal">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">X</button>
			<h3>Settings</h3>
		</div>
		<div class="modal-body">
			<p>Here settings can be configured...</p>
		</div>
		<div class="modal-footer">
			<a href="#" class="btn" data-dismiss="modal">Close</a>
			<a href="#" class="btn btn-primary">Save changes</a>
		</div>
	</div>