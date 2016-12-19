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
	<div class="row-fluid">

				<div class="box span4" onTablet="span6" onDesktop="span4">
                <?php echo form_open_multipart('admin/pdf_data');?>
					<div class="box-header">
						<h2><i class="halflings-icon list"></i><span class="break"></span>Laporan Data Transaksi Obat</h2>
						<div class="box-icon">

						</div>
					</div>
					<div class="box-content">
						<ul class="dashboard-list">
		<div class="modal-header">
		</div>
		<div class="modal-body">
			<div class="modal-body">
            <div class="control-group">
			 <label class="control-label" for="date01">Tanggal Awal</label>
			 <div class="controls">
			 <input type="text" class="input-xlarge datepicker" id="date01" name="tgl_awal">
			 </div>
			 </div>
			 <div class="control-group">
			 <label class="control-label" for="date01">Tanggal Akhir</label>
			 <div class="controls">
			 <input type="text" class="input-xlarge datepicker" id="date02" name="tgl_akhir">
			 </div>
			 </div>
		<div class="modal-footer">
		    <button type="submit" class="btn btn-primary">Cetak Data</button>
	</div>
						</ul>
					</div>
				</div><!--/span-->
			</div><!--/row-->


                 	</div><!--/.fluid-container-->

			<!-- end: Content -->
		</div><!--/#content.span10-->
		</div><!--/fluid-row-->

