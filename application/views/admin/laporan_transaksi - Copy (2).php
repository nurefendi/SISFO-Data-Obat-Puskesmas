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
			 <label class="control-label" for="date01">Tanggal Akhir</label>
			 <div class="controls">
			 <?php
								$psh=array();
								$psh=explode("-",$wkt_skr);
								$tgl_skr=$psh[0];
								$bln_skr=$psh[1];
								$thn_skr=$psh[2];

								echo "<select name='tgl_akhir'style='width:50px;'>";
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

								echo "<select name='bln_akhir'style='width:50px;'>";
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

								echo "<select name='thn_akhir'style='width:70px;'>";
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

