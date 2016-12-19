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
						<h2><i class="halflings-icon list"></i><span class="break"></span>Form Cetak Laporan</h2>
						<div class="box-icon">
						</div>
					</div>
                    <?php echo form_open_multipart('admin/pdf_data');?>
					<div class="box-content">
						<div class="form-horizontal">

						  <fieldset>
							<div class="control-group">
							   <label class="control-label" for="typeahead">Jml Obat</label>
							   <div class="controls">
							   <input type="text" class="input-xlarge datepicker" id="date01" name="tgl_awal">
								</div>
							   </div>
							<div class="control-group">
							  <label class="control-label" for="typeahead">Tanggal Edit</label>
							  <div class="controls">
								<input type="text" class="input-xlarge datepicker" id="date02" name="tgl_akhir">
								</div>
							</div>
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Cetak Data</button>
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