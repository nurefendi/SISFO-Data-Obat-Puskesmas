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
                <a href="<?php echo base_url()?>index.php/admin/tambahobat">Form Edit Data</a></li>
			</ul>
	<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Form Edit Data Stok Obat</h2>
						<div class="box-icon">
							
						</div>
					</div>
                    <?php echo form_open_multipart('admin/updateobat');?>
<?php
foreach($ed->result_array() as $e){
$nama_obat=$e["nama_obat"];
$kode_obat=$e["kode_obat"];
$produsen=$e["produsen"];
$distributor=$e["distributor"];
$satuan=$e["satuan"];
$harga_beli=$e["harga_beli"];
$harga=$e["harga"];
$stok=$e["stok"];
$expired=$e["expired"];
$tgl_masuk=$e["tgl_masuk"];
$tgl_edit=$e["tgl_edit"];
$id_kategori=$e["id_kategori"];
$kategori=$e["kategori"];
$id=$e["id_obat"];
}
?>
					<div class="box-content">
						<div class="form-horizontal">

						  <fieldset>
							<div class="control-group">
							  <label class="control-label" for="typeahead">Nama Obat</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" id="nama_obat" name="nama_obat" value="<?php echo $nama_obat; ?>" data-provide="typeahead" data-items="4">
							  </div>
							</div>
                            <div class="control-group">
							  <label class="control-label" for="typeahead">Kode Obat</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" id="kode_obat" name="kode_obat" value="<?php echo $kode_obat; ?>"  data-provide="typeahead" data-items="4">
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
							  <label class="control-label" for="typeahead">Produsen Obat</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" id="produsen" name="produsen" value="<?php echo $produsen; ?>" data-provide="typeahead" data-items="4">
							  </div>
							</div>
                            <div class="control-group">
							  <label class="control-label" for="typeahead">Distributor Obat</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" id="distributor" name="distributor" value="<?php echo $distributor; ?>" data-provide="typeahead" data-items="4">
							  </div>
							</div>
                            <div class="control-group">
							  <label class="control-label" for="typeahead">Satuan Obat</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" id="satuan" name="satuan" value="<?php echo $satuan; ?>" data-provide="typeahead" data-items="4">
							  </div>
							</div>
                            <div class="control-group">
							  <label class="control-label" for="typeahead">Harga Beli Obat</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" id="harga_beli" name="harga_beli" value="<?php echo $harga_beli; ?>"  data-provide="typeahead" data-items="4">
							  </div>
							</div>
                            <div class="control-group">
							  <label class="control-label" for="typeahead">Harga Obat</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" id="harga" name="harga" value="<?php echo $harga; ?>"  data-provide="typeahead" data-items="4">
							  </div>
							</div>
                            <div class="control-group">
							  <label class="control-label" for="typeahead">Stok Obat</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" id="stok" name="stok" value="<?php echo $stok; ?>"  data-provide="typeahead" data-items="4">
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="typeahead">Expired Obat</label>
							  <div class="controls">
								<input type="text" class="input-xlarge datepicker" id="date01" name="expired" value="<?php echo $expired;?>">
								</div>
							</div>
                            <div class="control-group">
							  <label class="control-label" for="typeahead">Tanggal Masuk</label>
							  <div class="controls">
								<input type="text" class="input-xlarge datepicker" id="date02" name="tgl_masuk" value="<?php echo $tgl_masuk; ?>">
								</div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="typeahead">Tanggal Edit</label>
							  <div class="controls">
							  <input type="text" class="input-xlarge datepicker" id="date03" name="tgl_edit" value="<?php echo $tgl_edit; ?>">
								</div>
							</div>
							<div class="form-actions"> <input type="hidden" name="id_obat" value="<?php echo $id; ?>" />
							  <button type="submit" class="btn btn-primary">Save Data</button>
							  <button type="reset" class="btn" onclick=self.history.back()>Cancel</button>
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
	
				<script type="text/javascript">
				
                $("#id_sub").chained("#id_kategori");
				
   </script>