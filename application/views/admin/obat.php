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
                                      <th>Produsen</th>
                                      <th>Harga Beli</th>
                                      <th>Harga</th>
                                      <th>Stok</th>
                                      <th>Tgl Masuk</th>
									  <th>Status</th>
								  </tr>
							  </thead>
							  <tbody>
                              <?php
$nomor=$page+1;
if(count($query->result())>0){
foreach($query->result() as $t)
{
       	$harga_beli = number_format($t->harga_beli,0,",",".");
    $harga = number_format($t->harga,0,",",".");
		if(($nomor%2)==0){
			$warna="#C8E862";
		} else{
			$warna="#D6F3FF";
		}
echo "<tr>
<td class='center'>".$nomor."</td>
<td class='center'>".$t->nama_obat."</td>
<td class='center'>".$t->kode_obat."</td>
<td class='center'>".$t->kategori."</td>
<td class='center'>".$t->produsen."</td>
<td class='center'>Rp.".$harga_beli."</td>
<td class='center'>Rp.".$harga."</td>
<td class='center'>".$t->stok."</td>
<td class='center'>".$t->tgl_masuk."</td>
<td class='center'>
<a class='btn btn-info'  href='".base_url()."index.php/admin/editobat/".$t->id_obat."' title='Edit'>
<i class='halflings-icon white edit'></i></a>
<a class='btn btn-danger' href='".base_url()."index.php/admin/hapusobat/".$t->id_obat."' onClick=\"return confirm('Anda yakin ingin menghapus agenda ini?')\" title='Hapus'>
<i class='halflings-icon white trash'></i></a></td>
</td></tr>";
$nomor++;
}
}
else{
echo "<tr><td colspan='5'>Belum ada </td></tr>";
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