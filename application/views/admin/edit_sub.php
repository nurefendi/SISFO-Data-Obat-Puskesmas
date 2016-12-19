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
                <a href="<?php echo base_url()?>index.php/admin/tambahobat">Form Edit Kategori</a></li>
			</ul>
	<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Form Edit Data Kategori Obat</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
                    <?php echo form_open_multipart('admin/updatesub');?>
<?php
foreach($ed->result_array() as $e){
$ps=array();
$nama_sub=$e["nama_sub"];
$id=$e["id_sub"];
}
?>
					<div class="box-content">
						<div class="form-horizontal">

						  <fieldset>
							<div class="control-group">
							  <label class="control-label" for="typeahead">Kategori Obat</label>
							  <div class="controls">
						<?php
								foreach($ed->result_array() as $e)
								{
								$id_sel=$e["id_kategori"];
								}
								?>
								<select id="selectError3" name="kategori">
								<?php
								foreach($kategori->result_array() as $e)
								{
								if($e["id_kategori"]==$id_sel)
								{
								echo "<option value='".$e["id_kategori"]."' selected>".$e["kategori"]."</option>";
								}
								else
								{
								echo "<option value='".$e["id_kategori"]."'>".$e["kategori"]."</option>";
								}
								}
								?>
								</select>
							  </div>
							  <label class="control-label" for="typeahead">Nama Sub Kategori Obat</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" id="nama_sub" name="nama_sub" value="<?php echo $nama_sub; ?>" data-provide="typeahead" data-items="4">
							  </div>
							</div>
							<div class="form-actions"> <input type="hidden" name="id_sub" value="<?php echo $id; ?>" />
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