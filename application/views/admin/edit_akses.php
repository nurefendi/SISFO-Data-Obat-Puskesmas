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
                <a href="<?php echo base_url()?>index.php/admin/tambahobat">Form Edit User</a></li>
			</ul>
	<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Form Edit Data User</h2>
						<div class="box-icon">
						</div>
					</div>
                    <?php echo form_open_multipart('admin/updateakses');?>
<?php
foreach($detail->result_array() as $k)
{
$nip = $k['nip'];
$nama_user = $k['nama_user'];
$jabatan = $k['jabatan'];
$jenis_kelamin= $k['jenis_kelamin'];
$status = $k['status'];
$username = $k['username'];
$id_user= $k['id_user'];
}
?>
					<div class="box-content">
						<div class="form-horizontal">

						  <fieldset>
        <div class="control-group">
       <label class="control-label" for="typeahead">Nama User</label>
       <div class="controls">
	   <input type="text" class="span6 typeahead" id="nama_user" name="nama_user" value="<?php echo $nama_user ?>" placeholder="Masukan Nama User">
        </div>
       </div>
       <div class="control-group">
       <label class="control-label" for="typeahead">NIP</label>
       <div class="controls">
	   <input type="text" class="span6 typeahead" id="nip" name="nip" value="<?php echo $nip ?>" placeholder="Masukan NIP Pegawai">
        </div>
       </div>
       <div class="control-group">
       <label class="control-label" for="typeahead">Jabatan</label>
       <div class="controls">
	   <input type="text" class="span6 typeahead" id="jabatan" name="jabatan" value="<?php echo $jabatan ?>" placeholder="Masukan Jabatan">
        </div>
       </div>
       <div class="control-group">
       <label class="control-label" for="typeahead">Jenis Kelamin</label>
       <div class="controls">
	   <select id="selectError" name='jenis_kelamin'>
       <option value="<?php echo $jenis_kelamin ?>" selected><?php echo $jenis_kelamin ?></option>
									<option value="Laki-laki">Laki-laki</option>
									<option value="Perempuan">Perempuan</option>
								  </select>
        </div>
       </div>
    <div class="control-group">
       <label class="control-label" for="typeahead">Status User</label>
       <div class="controls">
	  <select id="selectError" name='status'>
      <option value="<?php echo $status ?>" selected><?php echo $status ?></option>
									<option value="Admin">Admin</option>
									<option value="Pimpinan">Pimpinan</option>
								  </select>
         </div>
       </div>
      <div class="control-group">
       <label class="control-label" for="typeahead">Username</label>
       <div class="controls">
	   <input type="text" class="span6 typeahead" id="username" name="username" value="<?php echo $username ?>" placeholder="Masukan Username">
        </div>
       </div>
       <div class="control-group">
       <label class="control-label" for="typeahead">Password</label>
       <div class="controls">
	   <input type="text" class="span6 typeahead" id="password" name="password" placeholder="Masukan Password">
       </div>
       </div>
							<div class="form-actions"> <input type="hidden" name="id_user" value="<?php echo $id_user; ?>" />
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