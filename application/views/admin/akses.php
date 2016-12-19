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
						<h2><i class="halflings-icon align-justify"></i><span class="break"></span>Data Akses User</h2>
						<div class="box-icon">
						</div>
					</div>
					<div class="box-content">
						<table class="table table-bordered table-striped table-condensed">
							  <thead>
								  <tr>
                                      <th>No</th>
									  <th>Nama Pegawai</th>
									  <th>NIP</th>
									  <th>Jabatan</th>
                                      <th>Jenis Kelamin</th>
                                      <th>Status</th>
                                      <th>Username</th>
									  <th>Status</th>
								  </tr>
							  </thead>
							  <tbody>
                              <?php
$no=$page+1;
foreach($akses->result_array() as $s)
{
echo "<tr>
<td class='center'>".$no."</td>
<td class='center'>".$s['nama_user']."</td>
<td class='center'>".$s['nip']."</td>
<td class='center'>".$s['jabatan']."</td>
<td class='center'>".$s['jenis_kelamin']."</td>
<td class='center'>".$s['status']."</td>
<td class='center'>".$s['username']."</td>
<td class='center'>
<a class='btn btn-info'  href='".base_url()."index.php/admin/editakses/".$s['id_user']."' title='Edit'>
<i class='halflings-icon white edit'></i></a>
<a class='btn btn-danger' href='".base_url()."index.php/admin/hapusakses/".$s['id_user']."' onClick=\"return confirm('Anda yakin ingin menghapus agenda ini?')\" title='Hapus'>
<i class='halflings-icon white trash'></i></a></td>
</td></tr>";
	$no++;
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
                <?php echo form_open_multipart('admin/simpanakses');?>
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">X</button>
			<h3>ADD DATA USER</h3>
		</div>
	   <div class="modal-body">
       <label class="control-label" for="typeahead">Nama User</label>
	   <input type="text" class="span6 typeahead" id="nama_user" name="nama_user" placeholder="Masukan Nama User">
       <label class="control-label" for="typeahead">NIP</label>
	   <input type="text" class="span6 typeahead" id="nip" name="nip" placeholder="Masukan NIP Pegawai">
       <label class="control-label" for="typeahead">Jabatan</label>
	   <input type="text" class="span6 typeahead" id="jabatan" name="jabatan" placeholder="Masukan Jabatan">
       <label class="control-label" for="typeahead">Jenis Kelamin</label>
	   <select id="selectError" name='jenis_kelamin'>
									<option value="Laki-laki">Laki-laki</option>
									<option value="Perempuan">Perempuan</option>
								  </select>
       <label class="control-label" for="typeahead">Status User</label>
	  <select id="selectError" name='status'>
									<option value="Admin">Admin</option>
									<option value="Pimpinan">Pimpinan</option>
								  </select>
       <label class="control-label" for="typeahead">Username</label>
	   <input type="text" class="span6 typeahead" id="username" name="username" placeholder="Masukan Username">
       <label class="control-label" for="typeahead">Password</label>
	   <input type="text" class="span6 typeahead" id="password" name="password" placeholder="Masukan Password">
		</div>
		<div class="modal-footer">
			<button type="submit" class="btn btn-primary">Save Data</button>
		<button type="reset" class="btn">Cancel</button>
		</div>
	</div>