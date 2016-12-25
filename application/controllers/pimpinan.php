<?php

class Pimpinan extends Controller {

	function Pimpinan()
	{
		parent::Controller();
        session_start();
        ob_start();
		$this->load->helper(array('form','url', 'text_helper','date','file'));
		$this->load->database();
		$this->load->library(array('Pagination','image_lib','session'));
		$this->load->plugin();
		$this->load->model('Admin_model');

	}

	function index()
	{
		$datestring = "Login : %d-%m-%Y pukul %h:%i %a";
		$time = time();
		$data = array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["nim"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
		if($data["status"]=="Pimpinan"){
		$data["tanggal"] = mdate($datestring, $time);
        $data['kategori']=$this->Admin_model->Kat_Obat();
			$this->load->view('pimpinan/bg_atas',$data);
			$this->load->view('pimpinan/bg_menu',$data);
			$this->load->view('pimpinan/isi_index',$data);
			$this->load->view('pimpinan/bg_ska',$data);
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
			else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Login dulu donk...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
   function detail()
	    {
		$id_kategori='';
		if ($this->uri->segment(3) === FALSE)
		{
    			$id_kategori='';
		}
		else
		{
    			$id_kategori = $this->uri->segment(3);
		}
		$datestring = "Login : %d-%m-%Y pukul %h:%i %a";
		$time = time();
		$data = array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data=array();
		$data["nim"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
		if($data["status"]=="Pimpinan"){
			$page=$this->uri->segment(4);
      		$limit_ti=10;
			if(!$page):
			$offset_ti = 0;
			else:
			$offset_ti = $page;
			endif;
			$this->load->model('Admin_model');
			$this->load->library('Pagination');
			$query=$this->Admin_model->Tampil_Detail($id_kategori,$limit_ti,$offset_ti);
            $data['ed']=$this->Admin_model->Tampil_Ska($id_kategori);
			$tot_hal = $this->Admin_model->Total_Detail($id_kategori);
      		$config['base_url'] = base_url() .'/index.php/pimpinan/detail/'.$id_kategori;
       		$config['total_rows'] = $tot_hal->num_rows();
			$config['per_page'] = $limit_ti;
			$config['uri_segment'] =4;
			$config['first_link'] = 'Awal';
			$config['last_link'] = 'Akhir';
			$config['next_link'] = 'Selanjutnya';
			$config['prev_link'] = 'Sebelumnya';
			$this->pagination->initialize($config);
			$paginator=$this->pagination->create_links();
	   		$data['scriptmce'] = $this->scripttiny_mce();
        	$data_isi = array('query' => $query,'paginator'=>$paginator, 'page'=>$page);
			$data["tanggal"] = mdate($datestring, $time);
			$this->load->view('pimpinan/bg_atas',$data);
			$this->load->view('pimpinan/bg_menu');
			$this->load->view('pimpinan/detail_obat',$data_isi);
			$this->load->view('pimpinan/bg_ska');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
			else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Login dulu donk...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
      	function obat()
	{
		$datestring = "Login : %d-%m-%Y pukul %h:%i %a";
		$time = time();
		$data = array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data=array();
		$data["nim"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
		if($data["status"]=="Pimpinan"){
			$page=$this->uri->segment(3);
      		$limit_ti=12;
			if(!$page):
			$offset_ti = 0;
			else:
			$offset_ti = $page;
			endif;
			$this->load->model('Admin_model');
			$this->load->library('Pagination');
			$query=$this->Admin_model->Tampil_Obat($limit_ti,$offset_ti);
			$tot_hal = $this->Admin_model->Total_Obat();
      		$config['base_url'] = base_url() . '/index.php/admin/obat';
       		$config['total_rows'] = $tot_hal->num_rows();
			$config['per_page'] = $limit_ti;
			$config['uri_segment'] =3;
			$config['first_link'] = 'Awal';
			$config['last_link'] = 'Akhir';
			$config['next_link'] = 'Selasjutnya';
			$config['prev_link'] = 'Sebelumnya';
			$this->pagination->initialize($config);
			$paginator=$this->pagination->create_links();
	   		$data['scriptmce'] = $this->scripttiny_mce();
        	$data_isi = array('query' => $query,'paginator'=>$paginator, 'page'=>$page);
			$data["tanggal"] = mdate($datestring, $time);
			$this->load->view('pimpinan/bg_atas',$data);
			$this->load->view('pimpinan/bg_menu');
			$this->load->view('pimpinan/obat',$data_isi);
			$this->load->view('pimpinan/bg_ska');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
			else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Login dulu donk...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}

   //============KATEGORI OBAT=============================================================
    function katobat()
	{
		$datestring = "Login : %d-%m-%Y pukul %h:%i %a";
		$time = time();
		$data = array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data=array();
		$data["nim"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
		if($data["status"]=="Pimpinan"){
			$page=$this->uri->segment(3);
      		$limit_ti=15;
			if(!$page):
			$offset_ti = 0;
			else:
			$offset_ti = $page;
			endif;
			$this->load->model('Admin_model');
			$this->load->library('Pagination');
			$query=$this->Admin_model->Tampil_Katobat($limit_ti,$offset_ti);
			$tot_hal = $this->Admin_model->Total_Katobat();
      		$config['base_url'] = base_url() . '/index.php/admin/katobat';
       		$config['total_rows'] = $tot_hal->num_rows();
			$config['per_page'] = $limit_ti;
			$config['uri_segment'] = 3;
			$config['first_link'] = 'Awal';
			$config['last_link'] = 'Akhir';
			$config['next_link'] = 'Selanjutnya';
			$config['prev_link'] = 'Sebelumnya';
			$this->pagination->initialize($config);
			$paginator=$this->pagination->create_links();
	   		$data['scriptmce'] = $this->scripttiny_mce();
        	$data_isi = array('query' => $query,'paginator'=>$paginator, 'page'=>$page);
			$data["tanggal"] = mdate($datestring, $time);
			$this->load->view('pimpinan/bg_atas',$data);
			$this->load->view('pimpinan/bg_menu');
			$this->load->view('pimpinan/kat_obat',$data_isi);
			$this->load->view('pimpinan/bg_ska');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
			else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Login dulu donk...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
    	function transaksiobat()
	{
		$datestring = "Login : %d-%m-%Y pukul %h:%i %a";
		$time = time();
		$data = array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data=array();
		$data["nim"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
		if($data["status"]=="Pimpinan"){
			$page=$this->uri->segment(3);
      		$limit_ti=12;
			if(!$page):
			$offset_ti = 0;
			else:
			$offset_ti=$page;
			endif;
			$this->load->model('Admin_model');
			$this->load->library('Pagination');
			$query=$this->Admin_model->Tampil($limit_ti,$offset_ti);
			$tot_hal = $this->Admin_model->Total_Transaksi();
      		$config['base_url'] = base_url() . '/index.php/admin/transaksiobat';
       		$config['total_rows'] = $tot_hal->num_rows();
			$config['per_page'] = $limit_ti;
			$config['uri_segment'] =3;
			$config['first_link'] = 'Awal';
			$config['last_link'] = 'Akhir';
			$config['next_link'] = 'Selasjutnya';
			$config['prev_link'] = 'Sebelumnya';
			$this->pagination->initialize($config);
			$paginator=$this->pagination->create_links();
	   		$data['scriptmce'] = $this->scripttiny_mce();
        	$data_isi = array('query' => $query,'paginator'=>$paginator, 'page'=>$page);
			$data["tanggal"] = mdate($datestring, $time);
			$this->load->view('pimpinan/bg_atas',$data);
			$this->load->view('pimpinan/bg_menu');
			$this->load->view('pimpinan/data_transaksi',$data_isi);
			$this->load->view('pimpinan/bg_ska');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
			else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Login dulu donk...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	function subkategori()
	{
		$datestring = "Login : %d-%m-%Y pukul %h:%i %a";
		$time = time();
		$data = array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data=array();
		$data["nim"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
		if($data["status"]=="Pimpinan"){
			$page=$this->uri->segment(3);
      		$limit_ti=10;
			if(!$page):
			$offset_ti = 0;
			else:
			$offset_ti = $page;
			endif;
			$this->load->model('Admin_model');
			$this->load->library('Pagination');
			$query=$this->Admin_model->Tampil_Sub($limit_ti,$offset_ti);
			$data['kategori']=$this->Admin_model->Kat_Obat();
			$tot_hal = $this->Admin_model->Total_Sub();
      		$config['base_url'] = base_url() . '/index.php/Pimpinan/subkategori';
       		$config['total_rows'] = $tot_hal->num_rows();
			$config['per_page'] = $limit_ti;
			$config['uri_segment'] = 3;
			$config['first_link'] = 'Awal';
			$config['last_link'] = 'Akhir';
			$config['next_link'] = 'Selanjutnya';
			$config['prev_link'] = 'Sebelumnya';
			$this->pagination->initialize($config);
			$paginator=$this->pagination->create_links();
	   		$data['scriptmce'] = $this->scripttiny_mce();
        	$data_isi = array('query' => $query,'paginator'=>$paginator, 'page'=>$page);
			$data["tanggal"] = mdate($datestring, $time);
			$this->load->view('Pimpinan/bg_atas',$data);
			$this->load->view('Pimpinan/bg_menu');
			$this->load->view('Pimpinan/sub',$data_isi);
			$this->load->view('Pimpinan/bg_ska');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
			else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Login dulu donk...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
		function cekstok()
	{
		$datestring = "Login : %d-%m-%Y pukul %h:%i %a";
		$time = time();
		$data = array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data=array();
		$data["nim"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
		if($data["status"]=="Pimpinan"){
			$page=$this->uri->segment(10);
      		$limit_ti=10;
			if(!$page):
			$offset_ti = 0;
			else:
			$offset_ti = $page;
			endif;
			$this->load->model('Admin_model');
			$this->load->library('Pagination');
			$query=$this->Admin_model->Tampil_Stok($limit_ti,$offset_ti);
			$tot_hal = $this->Admin_model->Total_Obat();
      		$config['base_url'] = base_url() . '/index.php/Pimpinan/obat';
       		$config['total_rows'] = $tot_hal->num_rows();
			$config['per_page'] = $limit_ti;
			$config['uri_segment'] =10;
			$config['first_link'] = 'Awal';
			$config['last_link'] = 'Akhir';
			$config['next_link'] = 'Selasjutnya';
			$config['prev_link'] = 'Sebelumnya';
			$this->pagination->initialize($config);
			$paginator=$this->pagination->create_links();
	   		$data['scriptmce'] = $this->scripttiny_mce();
        	$data_isi = array('query' => $query,'paginator'=>$paginator, 'page'=>$page);
			$data["tanggal"] = mdate($datestring, $time);
			$this->load->view('Pimpinan/bg_atas',$data);
			$this->load->view('Pimpinan/bg_menu');
			$this->load->view('Pimpinan/obat_keritis',$data_isi);
			$this->load->view('Pimpinan/bg_ska');
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
			else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Login dulu donk...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
	 //===============================
    //======================================LAPORAN================================
    	function laporan()
	{
		$data = array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$tgl = "%d-%m-%Y";
		$time = time();
		$data["wkt_skr"] = mdate($tgl,$time);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
		if($data["status"]=="Pimpinan"){
			$this->load->view('pimpinan/bg_atas',$data);
			$this->load->view('pimpinan/bg_menu',$data);
			$this->load->view('pimpinan/laporan',$data);
			$this->load->view('pimpinan/bg_ska',$data);
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
			else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Login dulu donk...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
    	function laporantransaksi()
	{
		$data = array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$tgl = "%d-%m-%Y";
		$time = time();
		$data["wkt_skr"] = mdate($tgl,$time);
		$data["username"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
		if($data["status"]=="Pimpinan"){
			$this->load->view('pimpinan/bg_atas',$data);
			$this->load->view('pimpinan/bg_menu',$data);
			$this->load->view('pimpinan/laporan_transaksi',$data);
			$this->load->view('pimpinan/bg_ska',$data);
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
		}
			else{
			?>
			<script type="text/javascript" language="javascript">
		alert("Login dulu donk...!!!");
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/'>";
			}
	}
      	//==========================================REKAP DATA PDF=====================================//
 function pdf_data()
		{

			// load
			$this->load->library('fpdf');

			// deklarasi font fpdf
			define('FPDF_FONTPATH', $this->config->item('fonts_path'));

			// model
			$tanggal=$this->input->post('tgl_awal');
			$tanggal_akhir=$this->input->post('tgl_akhir');
			$data["data"]=$this->Admin_model->Rekap_Transaksi($tanggal,$tanggal_akhir);

			// load view
			$this->load->view('pimpinan/pdf/data_transaksi', $data);

		}
   function pdf_data_jamkesmas()
		{

			// load
			$this->load->library('fpdf');

			// deklarasi font fpdf
			define('FPDF_FONTPATH', $this->config->item('fonts_path'));

			// model
			$tanggal=$this->input->post('tgl');
			$tanggal_awal=$this->input->post('tgl_awal');
			$data["data"]=$this->Admin_model->Rekap_Jamkesmas($tanggal,$tanggal_awal);

			// load view
			$this->load->view('pimpinan/pdf/data_jamkesmas', $data);

		}
	/* ............................. Upload ...................................... */
//Function TinyMce------------------------------------------------------------------
		private function scripttiny_mce($selectcategory=null) {
		return '
		<!-- TinyMCE -->
		<script type="text/javascript" src="'.base_url().'jscripts/tiny_mce/tiny_mce_src.js"></script>
		<script type="text/javascript">
		tinyMCE.init({
		// General options
		mode : "textareas",
		theme : "advanced",
		plugins : "pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave",

		// Theme options
		theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
		theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

		// Example content CSS (should be your site CSS)
		content_css : "'.base_url().'system/application/views/themes/css/BrightSide.css",

		// Drop lists for link/image/media/template dialogs
		//"'.base_url().'media/lists/image_list.js"
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "'.base_url().'index.php/",
		media_external_list_url : "lists/media_list.js",

		// Style formats
		style_formats : [
			{title : \'Bold text\', inline : \'b\'},
			{title : \'Red text\', inline : \'span\', styles : {color : \'#ff0000\'}},
			{title : \'Red header\', block : \'h1\', styles : {color : \'#ff0000\'}},
			{title : \'Example 1\', inline : \'span\', classes : \'example1\'},
			{title : \'Example 2\', inline : \'span\', classes : \'example2\'},
			{title : \'Table styles\'},
			{title : \'Table row 1\', selector : \'tr\', classes : \'tablerow1\'}
		],

		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	});
</script>';
	}
}








?>
