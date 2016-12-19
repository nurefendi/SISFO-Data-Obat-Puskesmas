
</script>	
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
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>Data Transaksi Obat</h2>
						<div class="box-icon">
						</div>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>No</th>
									  <th>Nama</th>
									  <th>Kode Obat</th>
									  <th>Kategori</th>
                                      <th>Satuan</th>
                                      <th>Harga Beli</th>
                                      <th>Tgl Masuk</th>
                                      <th>Tgl Edit</th>
                                      <th>Jml Stok</th>
                                      <th>Menu</th>
							  </tr>
						  </thead>   
						  <tbody>
							<?php
$nomor=$page+1;
foreach($query->result() as $t)
{
   	$harga_beli = number_format($t->harga_beli,0,",",".");
    $harga = number_format($t->harga,0,",",".");
echo "<tr>
<td class='center'>".$nomor."</td>
<td class='center'>".$t->nama_obat."</td>
<td class='center'>".$t->kode_obat."</td>
<td class='center'>".$t->kategori."</td>
<td class='center'>".$t->satuan."</td>
<td class='center'>Rp. ".$harga_beli."</td>
<td class='center'>".$t->tgl_masuk."</td>
<td class='center'>".$t->tgl_edit."</td>
<td class='center'>".$t->stok."</td>
<td class='center'><a href='".base_url()."index.php/admin/addtransaksi/".$t->id_obat."'><span class='btn btn-small btn-info'>Transaki</span></a></td>
</tr>";
$nomor++;
}
?>
						  </tbody>
					  </table>				  
					</div>
				</div><!--/span-->
			</div><!--/row-->
</div><!--/.fluid-container-->

			<!-- end: Content -->
		</div><!--/#content.span10-->
		</div><!--/fluid-row-->