    	<noscript>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js" type="text/javascript"></script>
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
                <a href="<?php echo base_url()?>index.php/admin/tambahobat">Form Add Data</a></li>
			</ul>
	<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Form Add Data Stok Obat</h2>
						<div class="box-icon">
						</div>
					</div>
					<div class="box-content">
                    <?php echo form_open_multipart('admin/simpanobat');?>
						<div class="form-horizontal">

						  <fieldset>
							<div class="control-group">
							  <label class="control-label" for="typeahead">Nama Obat</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" id="nama_obat" name="nama_obat"  data-provide="typeahead" data-items="4">
							  </div>
							</div>
                            <div class="control-group">
							  <label class="control-label" for="typeahead">Kode Obat</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" id="kode_obat" name="kode_obat"  data-provide="typeahead" data-items="4">
							  </div>
							</div>
                            <div class="control-group">
							  <label class="control-label" for="typeahead">Kategori Obat</label>
							  <div class="controls">
								 <select id="selectError3" name="kategori">
									<?php
										foreach($kategori->result_array() as $k)
										{
										echo "<option value='".$k["id_kategori"]."'>".$k["kategori"]."</option>";
										}
										?>
								  </select>
								</div>
							</div>
                            <div class="control-group">
							  <label class="control-label" for="typeahead">Produsen Obat</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" id="produsen" name="produsen"  data-provide="typeahead" data-items="4">
							  </div>
							</div>
                            <div class="control-group">
							  <label class="control-label" for="typeahead">Distributor Obat</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" id="distributor" name="distributor"  data-provide="typeahead" data-items="4">
							  </div>
							</div>
                            <div class="control-group">
							  <label class="control-label" for="typeahead">Satuan Obat</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" id="satuan" name="satuan"  data-provide="typeahead" data-items="4">
							  </div>
							</div>
                            <div class="control-group">
							  <label class="control-label" for="typeahead">Harga Beli Obat</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" id="harga_beli" name="harga_beli"  data-provide="typeahead" data-items="4">
							  </div>
							</div>
                            <div class="control-group">
							  <label class="control-label" for="typeahead">Harga Obat</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" id="harga" name="harga"  data-provide="typeahead" data-items="4">
							  </div>
							</div>
                            <div class="control-group">
							  <label class="control-label" for="typeahead">Stok Obat</label>
							  <div class="controls">
								<input type="text" class="span6 typeahead" id="stok" name="stok"  data-provide="typeahead" data-items="4">
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="typeahead">Expired Obat</label>
							  <div class="controls">
								 <?php
								$psh=array();
								$psh=explode("-",$wkt_skr);
								$tgl_skr=$psh[0];
								$bln_skr=$psh[1];
								$thn_skr=$psh[2];

								echo "<select name='tgl_obat'style='width:50px;'>";
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

								echo "<select name='bln_obat'style='width:50px;'>";
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

								echo "<select name='thn_obat'style='width:70px;'>";
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
							  <label class="control-label" for="typeahead">Tanggal Masuk</label>
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
							  <label class="control-label" for="typeahead">Tanggal Edit</label>
							  <div class="controls">
								 <?php
								$psh=array();
								$psh=explode("-",$wkt_skr);
								$tgl_skr=$psh[0];
								$bln_skr=$psh[1];
								$thn_skr=$psh[2];

								echo "<select name='tgl_ska'style='width:50px;'>";
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

								echo "<select name='bln_ska'style='width:50px;'>";
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

								echo "<select name='thn_ska'style='width:70px;'>";
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
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Save Data</button>
							  <button type="reset" class="btn">Cancel</button>
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
