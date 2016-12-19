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
						<h2><i class="halflings-icon align-justify"></i><span class="break"></span>Data Stok Obat</h2>
						<div class="box-icon">
                        <a href="<?php echo base_url(); ?>index.php/admin/tambahobat"><i class='halflings-icon plus-sign'></i></a>
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<table class="table table-bordered table-striped table-condensed">
							  <thead>
								  <tr>
                                      <th>No</th>
									  <th>Nama</th>
									  <th>Kode Obat</th>
									  <th>Kategori</th>
                                      <th>Satuan</th>
                                      <th>Harga Beli</th>
                                      <th>Harga</th>
                                      <th>Tgl Masuk</th>
                                      <th>Tgl Edit</th>
                                      <th>Jml Stok</th>
                                      <th>Transaksi</th>
                                      <th>Status Stok</th>
								  </tr>
							  </thead>
							  <tbody>
                              <?php
$nomor=$page+1;
foreach($query->result() as $t)
{
   	$harga_beli = number_format($t->harga_beli,0,",",".");
    $harga = number_format($t->harga,0,",",".");
        if($t->stok >=16) {
			$tampil="<span class='label label-info'>Stok Tersedia</span>";
		}
        elseif($t->stok <=15){
			$tampil="<span class='label label-warning'>Stok Obat Keritis</span>";
		}else{
		    $tampil="data kosong";
		}
echo "<tr>
<td class='center'>".$nomor."</td>
<td class='center'>".$t->nama_obat."</td>
<td class='center'>".$t->kode_obat."</td>
<td class='center'>".$t->kategori."</td>
<td class='center'>".$t->satuan."</td>
<td class='center'>Rp. ".$harga_beli."</td>
<td class='center'>Rp. ".$harga."</td>
<td class='center'>".$t->tgl_masuk."</td>
<td class='center'>".$t->tgl_edit."</td>
<td class='center'>".$t->stok."</td>
<td class='center'>".$t->counter."</td>
<td class='center'><a href='".base_url()."index.php/admin/cek_stok/".$t->id_obat."'>".$tampil."</a></td>
</tr>";
$nomor++;
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
                  <?php echo form_open_multipart('admin/updatestok');?>
<?php
foreach($query->result_array() as $e){
$ps=array();
$stok=$e["stok"];
$tgl_edit=$e["tgl_edit"];
$id=$e["id_obat"];
}
?>
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">X</button>
			<h3>WARNING....!!!!</h3>
		</div>
		<div class="modal-body">
                <label class="control-label" for="typeahead">Setok Obat</label>
		<input type="text" class="span6 typeahead" id="stok" name="stok" value="<?php echo $stok; ?>" data-provide="typeahead" data-items="4">
        <label class="control-label" for="date01">Tanggal Edit Obat</label>
		<input type="text" class="input-xlarge datepicker" id="tgl_edit" value="<?php echo $tgl_edit; ?>" name="tgl_edit" placeholder="Tanggal-Bulan-Tahun">
			<p>Persedian Obat Anda Telah Berkurang Melewati Batas Persedian Segera Lakukan Pengimputan Segera
            segera melakukan persedian obat untuk antisipasi keadaan darurat pada pasien</p>
		</div>
		<div class="modal-footer"> <input type="hidden" name="id_obat" value="<?php echo $id; ?>" />
		  <button type="submit" class="btn btn-primary">Save Data</button>
		<button type="reset" class="btn">Cancel</button>
		</div>
	</div>