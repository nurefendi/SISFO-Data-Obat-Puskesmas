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
				<li><a href="<?php echo base_url()?>index.php/admin/obat">Data Obat</a></li>
			</ul>
<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header">
						<h2><i class="halflings-icon align-justify"></i><span class="break"></span>Data Transaksi Obat Keluar</h2>
						<div class="box-icon">
						</div>
					</div>
					<div class="box-content">
						<table class="table table-bordered table-striped table-condensed">
							  <thead>
								  <tr>
                                      <th>No</th>
									  <th>Nama Pasien</th>
									  <th>Nama</th>
									  <th>Kode Obat</th>
									  <th>Kategori</th>
                                      <th>Harga</th>
                                      <th>Tanggal Keluar</th>
                                      <th>Jumlah Obat</th>
								  </tr>
							  </thead>
							  <tbody>
                              <?php
$nomor=$page+1;
if(count($query->result())>0){
foreach($query->result() as $t)
{
   	$harga = number_format($t->harga,0,",",".");
echo "<tr>
<td class='center'>".$nomor."</td>
<td class='center'>".$t->nama."</td>
<td class='center'>".$t->nama_obat."</td>
<td class='center'>".$t->kode_obat."</td>
<td class='center'>".$t->kategori."</td>
<td class='center'>Rp. ".$harga."</td>
<td class='center'>".$t->tanggal."</td>
<td class='center'>".$t->jumlah."</td>
</tr>";
$nomor++;
}
}
else{
echo "<tr><td colspan='5'>Belum ada data Transaksi</td></tr>";
}
?>
							  </tbody>
						 </table>
                        <div class="pagination pagination-centered">
                		<ul>
                		<?php
                		echo $paginator;
                		?>
                		</ul>
                	</div>
					</div>
				</div><!--/span-->
			</div><!--/row-->


                 	</div><!--/.fluid-container-->

			<!-- end: Content -->
		</div><!--/#content.span10-->
		</div><!--/fluid-row-->
        <div class="modal hide fade" id="myModal">
                <?php echo form_open_multipart('admin/pdf_data_jamkesmas');?>
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">X</button>
			<h3>ADD DATA USER</h3>
		</div>
	   <div class="modal-body">
       <label class="control-label" for="typeahead">Tanggal</label>
	   <input type="text" class="input-xlarge datepicker" id="tgl_masuk" name="tgl_masuk" placeholder="Masukan Nama User">
		</div>
		<div class="modal-footer">
			<button type="submit" class="btn btn-primary">Save Data</button>
		<button type="reset" class="btn">Cancel</button>
		</div>
	</div>