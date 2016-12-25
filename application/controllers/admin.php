<?php

class Admin extends Controller {

	function Admin()
	{
		parent::Controller();
        session_start();
        ob_start();
		$this->load->helper(array('form','url', 'text_helper','date','file'));
		$this->load->database();
		$this->load->library(array('Pagination','image_lib','session'));
		$this->load->plugin();
		$this->load->model('m_kategori');
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
		if($data["status"]=="Administrator"){
		$data["tanggal"] = mdate($datestring, $time);
        $data['kategori']=$this->m_kategori->Kat_Obat();
			$this->load->view('admin/bg_atas',$data);
			$this->load->view('admin/bg_menu',$data);
			$this->load->view('admin/isi_index',$data);
			$this->load->view('admin/bg_ska',$data);
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
    //===================================cek obat===================================
     	function cekobat()
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
		if($data["status"]=="Administrator"){
			$page=$this->uri->segment(3);
      		$limit_ti=15;
			if(!$page):
			$offset_ti = 0;
			else:
			$offset_ti = $page;
			endif;
			$this->load->model('m_obat');
			$this->load->model('m_kategori');
			$this->load->library('Pagination');
			$query=$this->m_obat->Tampil_Obat($limit_ti,$offset_ti);
			$data["kategori"] = $this->m_kategori->Kat_Obat();
			$tot_hal = $this->m_obat->Total_Obat();
      		$config['base_url'] = base_url() . '/index.php/admin/cekobat';
       		$config['total_rows'] = $tot_hal->num_rows();
			$config['per_page'] = $limit_ti;
			$config['uri_segment'] =3;
			$config['first_link'] = 'Awal';
			$config['last_link'] = 'Akhir';
			$config['next_link'] = 'Selanjutnya';
			$config['prev_link'] = 'Sebelumnya';
			$this->pagination->initialize($config);
			$paginator=$this->pagination->create_links();
	   		$data['scriptmce'] = $this->scripttiny_mce();
        	$data_isi = array('query' => $query,'paginator'=>$paginator, 'page'=>$page);
			$data["tanggal"] = mdate($datestring, $time);
			$this->load->view('admin/bg_atas',$data);
			$this->load->view('admin/bg_menu');
			$this->load->view('admin/cek_obat',$data_isi);
			$this->load->view('admin/bg_ska');
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
	 	function rekabobat()
	{
		$id_kategori= $this->input->post('kategori');
		if ($this->uri->segment(3) === FALSE)
		{
    			$id_kategori= $this->input->post('kategori');
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
		if($data["status"]=="Administrator"){
			$page=$this->uri->segment(4);
      		$limit_ti=10;
			if(!$page):
			$offset_ti = 0;
			else:
			$offset_ti = $page;
			endif;
			$this->load->model('m_kategori');
			$this->load->model('m_obat');
			$this->load->library('Pagination');
            $data["kategori"] = $this->m_kategori->Kategori($id_kategori);
             $data["kat"] = $this->m_kategori->Kat_Rekap();
			$query=$this->m_obat->Tampil_Detail($id_kategori,$limit_ti,$offset_ti);
            $data['ed']=$this->m_obat->Tampil_Ska($id_kategori);
			$tot_hal = $this->m_obat->Total_Detail($id_kategori);
      		$config['base_url'] = base_url() .'/index.php/admin/rekabobat/'.$id_kategori;
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
			$this->load->view('admin/bg_atas',$data);
			$this->load->view('admin/bg_menu');
			$this->load->view('admin/rekap_obat',$data_isi);
			$this->load->view('admin/bg_ska');
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
		if($data["status"]=="Administrator"){
			$page=$this->uri->segment(3);
      		$limit_ti=20;
			if(!$page):
			$offset_ti = 0;
			else:
			$offset_ti = $page;
			endif;
			$this->load->model('m_obat');
			$this->load->library('Pagination');
			$query=$this->m_obat->Tampil_Stok($limit_ti,$offset_ti);
			$tot_hal = $this->m_obat->Total_Stok();
      		$config['base_url'] = base_url() . '/index.php/admin/cekstok';
       		$config['total_rows'] = $tot_hal->num_rows();
			$config['per_page'] = $limit_ti;
			$config['uri_segment'] =3;
			$config['first_link'] = 'Awal';
			$config['last_link'] = 'Akhir';
			$config['next_link'] = 'Selanjutnya';
			$config['prev_link'] = 'Sebelumnya';
			$this->pagination->initialize($config);
			$paginator=$this->pagination->create_links();
	   		$data['scriptmce'] = $this->scripttiny_mce();
        	$data_isi = array('query' => $query,'paginator'=>$paginator, 'page'=>$page);
			$data["tanggal"] = mdate($datestring, $time);
			$this->load->view('admin/bg_atas',$data);
			$this->load->view('admin/bg_menu');
			$this->load->view('admin/obat_keritis',$data_isi);
			$this->load->view('admin/bg_ska');
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
		if($data["status"]=="Administrator"){
			$page=$this->uri->segment(3);
      		$limit_ti=12;
			if(!$page):
			$offset_ti = 0;
			else:
			$offset_ti = $page;
			endif;
			$this->load->model('m_obat');
			$this->load->library('Pagination');
			$query=$this->m_obat->Tampil_Obat($limit_ti,$offset_ti);
			$tot_hal = $this->m_obat->Total_Obat();
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
			$this->load->view('admin/bg_atas',$data);
			$this->load->view('admin/bg_menu');
			$this->load->view('admin/obat',$data_isi);
			$this->load->view('admin/bg_ska');
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
	function tambahobat()
	{
		$data = array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$tgl = "%d-%m-%Y";
		$time = time();
		$data["wkt_skr"] = mdate($tgl,$time);
		$data["nim"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
		if($data["status"]=="Administrator"){
		    $this->load->model('m_kategori');
			$data['kategori']=$this->m_kategori->Kat_Obat();
			$this->load->view('admin/bg_atas',$data);
			$this->load->view('admin/bg_menu');
			$this->load->view('admin/add_obat',$data);
			$this->load->view('admin/bg_ska');
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
	function simpanobat()
	{
		$in=array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$nim=$pecah[0];
		$status=$pecah[2];
			if($status=="Administrator"){
			$this->load->model('m_obat');
			$tgl = " %Y-%m-%d";
			$time = time();
			$in['id_kategori']=$this->input->post('kategori');
			$in["nama_obat"]=strip_tags($this->input->post('nama_obat'));
			$in["kode_obat"]=strip_tags($this->input->post('kode_obat'));
			$in["produsen"]=strip_tags($this->input->post('produsen'));
			$in["distributor"]=$this->input->post('distributor');
			$in["satuan"]=strip_tags($this->input->post('satuan'));
            $in["harga_beli"]=$this->input->post('harga_beli');
			$in["harga"]=strip_tags($this->input->post('harga'));
            $in["stok"]=$this->input->post('stok');
			$tgl_obat=$this->input->post('tgl_obat');
			$bln_obat=$this->input->post('bln_obat');
			$thn_obat=$this->input->post('thn_obat');
			$in["expired"]="".$thn_obat."-".$bln_obat."-".$tgl_obat."";
            $tgl=$this->input->post('tgl');
			$bln=$this->input->post('bln');
			$thn=$this->input->post('thn');
			$in["tgl_masuk"]="".$thn."-".$bln."-".$tgl."";
			$t_ska=$this->input->post('tgl_ska');
			$b_ska=$this->input->post('bln_ska');
			$y_ska=$this->input->post('thn_ska');
			$in["tgl_edit"]="".$y_ska."-".$b_ska."-".$t_ska."";
			$this->m_obat->Simpan_Obat($in);
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/admin/obat'>";

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
   function editobat()
	{
	   $data = array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$tgl = "%d-%m-%Y";
		$time = time();
		$data["wkt_skr"] = mdate($tgl,$time);
		$data["nim"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
		if($data["status"]=="Administrator"){
		$id='';
		if ($this->uri->segment(3) === FALSE)
		{
    			$id='';
		}
		else
		{
    			$id = $this->uri->segment(3);
		}
			$page=$this->uri->segment(3);
			$this->load->model('m_kategori');
			$this->load->model('m_obat');
			$data['ed']=$this->m_obat->Edit_Obat($id);
			$data['provinsi'] = $this->m_kategori->Get_Provinsi();
			$data['kota'] = $this->m_kategori->Get_Kota();
	   		$data['scriptmce'] = $this->scripttiny_mce();
			$this->load->view('admin/bg_atas',$data);
			$this->load->view('admin/bg_menu');
			$this->load->view('admin/edit_obat',$data);
			$this->load->view('admin/bg_ska');
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
	function updateobat()
	{
		$in=array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$nim=$pecah[0];
		$status=$pecah[2];
			if($status=="Administrator"){
			$this->load->model('m_obat');
			$this->load->model('m_kategori');
			$in["id_obat"]=$this->input->post('id_obat');
            $in["id_kategori"]=$this->input->post('id_kategori');
			$in["nama_obat"]=$this->input->post('nama_obat');
			$in["kode_obat"]=strip_tags($this->input->post('kode_obat'));
			$in["produsen"]=$this->input->post('produsen');
			$in["distributor"]=$this->input->post('distributor');
			$in["satuan"]=strip_tags($this->input->post('satuan'));
            $in["harga_beli"]=strip_tags($this->input->post('harga_beli'));
			$in["harga"]=$this->input->post('harga');
			$in["stok"]=$this->input->post('stok');
			$in["expired"]=$this->input->post('expired');
			$in["tgl_masuk"]=$this->input->post('tgl_masuk');
			$in["tgl_edit"]=$this->input->post('tgl_edit');
			$id_kategori=$this->input->post('id_kategori');
			$this->m_obat->Update_Obat($in);
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/admin/detail/".$id_kategori."'>";
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

	function hapusobat()
	{
		$in=array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$nim=$pecah[0];
		$status=$pecah[2];
		$id='';
		if ($this->uri->segment(3) === FALSE)
		{
    			$id='';
		}
		else
		{
    			$id = $this->uri->segment(3);
		}
			if($status=="Administrator"){
			$this->load->model('m_obat');
			$this->m_obat->Delete_Obat($id);
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/admin/obat'>";
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
    function edit()
	{
	    $datestring = "Login : %d-%m-%Y pukul %h:%i %a";
		$time = time();
		$data = array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$data = array();
		$pecah=explode("|",$session);
		$data["nim"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
		if($data["status"]=="Administrator"){
		$id='';
		if ($this->uri->segment(3) === FALSE)
		{
    			$id='';
		}
		else
		{
    			$id = $this->uri->segment(3);
		}
			$page=$this->uri->segment(3);
			$this->load->model('m_kategori');
			$data['ed']=$this->m_obat->Edit_Obat($id);
	   		$data['scriptmce'] = $this->scripttiny_mce();
			$data["tanggal"] = mdate($datestring, $time);
			$this->load->view('admin/bg_atas',$data);
			$this->load->view('admin/bg_menu');
			$this->load->view('admin/cek_obat',$data);
			$this->load->view('admin/bg_ska');
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
    //-------------------------------

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
		if($data["status"]=="Administrator"){
			$page=$this->uri->segment(3);
      		$limit_ti=10;
			if(!$page):
			$offset_ti = 0;
			else:
			$offset_ti = $page;
			endif;
			$this->load->model('m_kategori');
			$this->load->library('Pagination');
			$query=$this->m_kategori->Tampil_Katobat($limit_ti,$offset_ti);
			$tot_hal = $this->m_kategori->Total_Katobat();
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
			$this->load->view('admin/bg_atas',$data);
			$this->load->view('admin/bg_menu');
			$this->load->view('admin/kat_obat',$data_isi);
			$this->load->view('admin/bg_ska');
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
		if($data["status"]=="Administrator"){
			$page=$this->uri->segment(4);
      		$limit_ti=10;
			if(!$page):
			$offset_ti = 0;
			else:
			$offset_ti = $page;
			endif;
			//$this->load->model('m_kategori');
			$this->load->model('m_obat');
			$this->load->library('Pagination');
			$query=$this->m_obat->Tampil_Detail($id_kategori,$limit_ti,$offset_ti);
            $data['ed']=$this->m_obat->Tampil_Ska($id_kategori);
			$tot_hal = $this->m_obat->Total_Detail($id_kategori);
      		$config['base_url'] = base_url() .'/index.php/admin/detail/'.$id_kategori;
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
			$this->load->view('admin/bg_atas',$data);
			$this->load->view('admin/bg_menu');
			$this->load->view('admin/detail_obat',$data_isi);
			$this->load->view('admin/bg_ska');
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
	function saveobat()
	{
		$in=array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$nim=$pecah[0];
		$status=$pecah[2];
			if($status=="Administrator"){
			$this->load->model('m_kategori');
			$tgl = " %Y-%m-%d";
			$time = time();
			$in['id_kategori']=$this->input->post('id_kategori');
			$in["nama_obat"]=strip_tags($this->input->post('nama_obat'));
			$in["kode_obat"]=strip_tags($this->input->post('kode_obat'));
			$in["produsen"]=strip_tags($this->input->post('produsen'));
			$in["distributor"]=$this->input->post('distributor');
			$in["satuan"]=strip_tags($this->input->post('satuan'));
            $in["harga_beli"]=$this->input->post('harga_beli');
			$in["harga"]=strip_tags($this->input->post('harga'));
            $in["stok"]=$this->input->post('stok');
			$in["expired"]=$this->input->post('expired');
			$in["tgl_masuk"]=$this->input->post('tgl_masuk');
			$in["tgl_edit"]=$this->input->post('tgl_edit');
			$id_kategori=$this->input->post('id_kategori');
			$this->m_obat->Simpan_Obat($in);
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/admin/detail/".$id_kategori."'>";

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
   function inputobat()
	{
	   $data = array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$tgl = "%d-%m-%Y";
		$time = time();
		$data["wkt_skr"] = mdate($tgl,$time);
		$data["nim"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
		if($data["status"]=="Administrator"){
		$id='';
		if ($this->uri->segment(3) === FALSE)
		{
    			$id='';
		}
		else
		{
    			$id = $this->uri->segment(3);
		}
			$page=$this->uri->segment(3);
			$this->load->model('m_kategori');
			$data['ed']=$this->m_obat->Edit_Obat($id);
			$data['provinsi'] = $this->m_kategori->Get_Provinsi();
			$data['kota'] = $this->m_kategori->Get_Kota();
	   		$data['scriptmce'] = $this->scripttiny_mce();
			$this->load->view('admin/bg_atas',$data);
			$this->load->view('admin/bg_menu');
			$this->load->view('admin/input_obat',$data);
			$this->load->view('admin/bg_ska');
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
	function simpankatobat()
	{
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$data = array();
		$pecah=explode("|",$session);
		$data["nim"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
		if($data["status"]=="Administrator"){
			$this->load->model('m_kategori');
			$in=array();
			$in['kategori']=$this->input->post('kategori');
			$this->m_kategori->Simpan_Kat_obat($in);
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/admin/katobat'>";
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
	function editkatobat()
	{
		$datestring = "Login : %d-%m-%Y pukul %h:%i %a";
		$time = time();
		$data = array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$data = array();
		$pecah=explode("|",$session);
		$data["nim"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
		if($data["status"]=="Administrator"){
		$id='';
		if ($this->uri->segment(3) === FALSE)
		{
    			$id='';
		}
		else
		{
    			$id = $this->uri->segment(3);
		}
			$this->load->model('m_kategori');
			$data['ed']=$this->m_kategori->Edit_Kat_Obat($id);
	   		$data['scriptmce'] = $this->scripttiny_mce();
			$data["tanggal"] = mdate($datestring, $time);
			$this->load->view('admin/bg_atas',$data);
			$this->load->view('admin/bg_menu');
			$this->load->view('admin/edit_katobat',$data);
			$this->load->view('admin/bg_ska');
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
	function updatekatobat()
	{
		$in=array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$nim=$pecah[0];
		$status=$pecah[2];
			if($status=="Administrator"){
			$this->load->model('m_kategori');
			$in=array();
			$in['id_kategori']=$this->input->post('id_kategori');
			$in['kategori']=$this->input->post('kategori');
			$this->m_kategori->Update_Kat_Obat($in);
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/admin/katobat'>";
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
	function hapuskatobat()
	{
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$data = array();
		$pecah=explode("|",$session);
		$data["nim"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
		if($data["status"]=="Administrator"){
		$id='';
		if ($this->uri->segment(3) === FALSE)
		{
    			$id='';
		}
		else
		{
    			$id = $this->uri->segment(3);
		}
			$this->load->model('m_kategori');
			$this->m_kategori->Hapus_Kat_Obat($id);
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/admin/katobat'>";
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
   //======================================**************==================================
   //============SUB KATEGORI OBAT=============================================================
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
		if($data["status"]=="Administrator"){
			$page=$this->uri->segment(3);
      		$limit_ti=15;
			if(!$page):
			$offset_ti = 0;
			else:
			$offset_ti = $page;
			endif;
			$this->load->model('m_kategori');
			$this->load->library('Pagination');
			$query=$this->m_kategori->Tampil_Sub($limit_ti,$offset_ti);
			$data['kategori']=$this->m_kategori->Kat_Obat();
			$tot_hal = $this->m_kategori->Total_Sub();
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
			$this->load->view('admin/bg_atas',$data);
			$this->load->view('admin/bg_menu');
			$this->load->view('admin/sub',$data_isi);
			$this->load->view('admin/bg_ska');
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
	function simpansub()
	{
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$data = array();
		$pecah=explode("|",$session);
		$data["nim"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
		if($data["status"]=="Administrator"){
			$this->load->model('m_kategori');
			$in=array();
			$in['id_kategori']=$this->input->post('kategori');
			$in['nama_sub']=$this->input->post('nama_sub');
			$this->m_kategori->Simpan_Sub($in);
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/admin/subkategori'>";
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
	function editsub()
	{
		$datestring = "Login : %d-%m-%Y pukul %h:%i %a";
		$time = time();
		$data = array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$data = array();
		$pecah=explode("|",$session);
		$data["nim"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
		if($data["status"]=="Administrator"){
		$id='';
		if ($this->uri->segment(3) === FALSE)
		{
    			$id='';
		}
		else
		{
    			$id = $this->uri->segment(3);
		}
			$this->load->model('m_kategori');
			$data['kategori']=$this->m_kategori->Kat_Obat();
			$data['ed']=$this->m_kategori->Edit_Sub($id);
	   		$data['scriptmce'] = $this->scripttiny_mce();
			$data["tanggal"] = mdate($datestring, $time);
			$this->load->view('admin/bg_atas',$data);
			$this->load->view('admin/bg_menu');
			$this->load->view('admin/edit_sub',$data);
			$this->load->view('admin/bg_ska');
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
	function updatesub()
	{
		$in=array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$nim=$pecah[0];
		$status=$pecah[2];
			if($status=="Administrator"){
			$this->load->model('m_kategori');
			$in=array();
			$in['id_sub']=$this->input->post('id_sub');
			$in['id_kategori']=$this->input->post('kategori');
			$in['nama_sub']=$this->input->post('nama_sub');
			$this->m_kategori->Update_Sub($in);
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/admin/subkategori'>";
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
	function hapussub()
	{
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$data = array();
		$pecah=explode("|",$session);
		$data["nim"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
		if($data["status"]=="Administrator"){
		$id='';
		if ($this->uri->segment(3) === FALSE)
		{
    			$id='';
		}
		else
		{
    			$id = $this->uri->segment(3);
		}
			$this->load->model('m_kategori');
			$this->m_kategori->Hapus_Kat_Obat($id);
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/admin/katobat'>";
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
   //======================================**************==================================
   //=====================SOF CODING UNTUK CLSS AKSES LOGIN USER============================
   function akses()
	{

		$page=$this->uri->segment(3);
      	$limit=9;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
		endif;
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
		$data["tanggal"] = mdate($datestring, $time);
			if($data["status"]=="Administrator"){
			$this->load->model('m_akses');
			$tot_hal = $this->m_akses->Total_Artikel("tbl_akses");
			$config['base_url'] = base_url() . '/index.php/admin/akses/';
			$config['total_rows'] = $tot_hal->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
			$config['first_link'] = 'Awal';
			$config['last_link'] = 'Akhir';
			$config['next_link'] = 'Selanjutnya';
			$config['prev_link'] = 'Sebelumnya';
			$this->pagination->initialize($config);
			$data["paginator"]=$this->pagination->create_links();
			$data["page"] = $page;
			$data["akses"] = $this->m_akses->Daftar_Akses($offset,$limit);
			$this->load->view('admin/bg_atas',$data);
			$this->load->view('admin/bg_menu');
			$this->load->view('admin/akses',$data);
			$this->load->view('admin/bg_ska');
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
	function simpanakses()
	{
		$this->load->model('m_akses');
		$data=array();
		$data2=array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["nim"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="Administrator"){
				$tgl = " %Y-%m-%d";
				$time = time();
				$in["nip"]=$this->input->post('nip');
				$in["nama_user"]=$this->input->post('nama_user');
				$in["jabatan"]=$this->input->post('jabatan');
				$in["jenis_kelamin"]=$this->input->post('jenis_kelamin');
				$in["status"]=$this->input->post('status');
				$in["username"]=$this->input->post('username');
				$in["password"]=$this->input->post('password');
				if($in["nip"]=="" || $in["nama_user"]=="" || $in["jabatan"]=="" || $in["jenis_kelamin"]=="" || $in["status"]=="" || $in["username"]=="" || $in["password"]=="")
				{
					echo "Data masih kosong..!!!";
				}
				else{
				$this->m_akses->Simpan_Akses($in);
				echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/admin/akses'>";
				}
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

	function editakses()
	{
		$this->load->model('m_akses');
		$id='';
		if ($this->uri->segment(3) === FALSE)
		{
    			$id=$id;
		}
		else
		{
    			$id = $this->uri->segment(3);
		}
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
		$data["tanggal"] = mdate($datestring, $time);
			if($data["status"]=="Administrator"){
			$tgl = "%d-%m-%Y";
			$time = time();
			$data["wkt_skr"] = mdate($tgl,$time);
			$data["detail"]=$this->m_akses->Edit_Content("tbl_akses","id_user=".$id."");
			$this->load->view('admin/bg_atas',$data);
			$this->load->view('admin/bg_menu');
			$this->load->view('admin/edit_akses',$data);
			$this->load->view('admin/bg_ska');
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

	function updateakses()
	{
		$this->load->model('m_akses');
		$in = array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["nim"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="Administrator"){

				$pass=$this->input->post('password');
				if($pass!="")
				{
					$in["nip"]=$this->input->post('nip');
					$in["nama_user"]=$this->input->post('nama_user');
					$in["jabatan"]=$this->input->post('jabatan');
					$in["jenis_kelamin"]=$this->input->post('jenis_kelamin');
					$in["status"]=$this->input->post('status');
					$in["username"]=$this->input->post('username');
					$pass=$this->input->post('password');
					$in["id_user"]=$this->input->post('id_user');
					$this->m_akses->Update_Content("tbl_akses",$in,"id_user");
					$this->m_akses->Update_Password($pass,$in["id_user"]);
					echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/admin/akses'>";
				}
				else{
					$in["nip"]=$this->input->post('nip');
					$in["nama_user"]=$this->input->post('nama_user');
					$in["jabatan"]=$this->input->post('jabatan');
					$in["jenis_kelamin"]=$this->input->post('jenis_kelamin');
					$in["status"]=$this->input->post('status');
					$in["username"]=$this->input->post('username');
					$in["id_user"]=$this->input->post('id_user');
					$this->m_akses->Update_Content("tbl_akses",$in,"id_user");
					echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/admin/akses'>";

				}
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

	function hapusakses()
	{
		$this->load->model('m_akses');
		$id='';
		if ($this->uri->segment(3) === FALSE)
		{
    			$id=$id;
		}
		else
		{
    			$id = $this->uri->segment(3);
		}
		$data = array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$data["nim"]=$pecah[0];
		$data["nama"]=$pecah[1];
		$data["status"]=$pecah[2];
	   	$data['scriptmce'] = $this->scripttiny_mce();
			if($data["status"]=="Administrator"){
			$this->m_akses->Delete_Content($id,"id_user","tbl_akses");
			?>
			<script type="text/javascript">
			javascript:history.go(-1);
			</script>
			<?php
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
         function updatestok()
	{
		$in=array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$nim=$pecah[0];
		$status=$pecah[2];
			if($status=="Administrator"){
			$this->load->model('m_kategori');
			$in["id_obat"]=$this->input->post('id_obat');
            $in["stok"]=$this->input->post('stok');
			$in["tgl_edit"]=$this->input->post('tgl_edit');
			$this->m_obat->Update_Obat($in);
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/admin/cekobat'>";

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
	function cek_stok()
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
		if($data["status"]=="Administrator"){
		$id_obat='';
		if ($this->uri->segment(3) === FALSE)
		{
    			$id_obat='';
		}
		else
		{
    			$id_obat= $this->uri->segment(3);
		}
			$page=$this->uri->segment(3);
			$this->load->model('m_kategori');
            $data["detail"]=$this->m_kategori->Detail_Transaksi($id_obat);
			//$data['provinsi'] = $this->m_kategori->Get_Provinsi();
			//$data['kota'] = $this->m_kategori->Get_Kota();
            $this->m_kategori->Update_Counter($id_obat);
	   		$data['scriptmce'] = $this->scripttiny_mce();
			$this->load->view('admin/bg_atas',$data);
			$this->load->view('admin/bg_menu');
			$this->load->view('admin/add_stok',$data);
			$this->load->view('admin/bg_ska');
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
    //===============================================SIMPAN TRANSAKSI====================
     function addtransaksi()
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
		if($data["status"]=="Administrator"){
		$id_obat='';
		if ($this->uri->segment(3) === FALSE)
		{
    			$id_obat='';
		}
		else
		{
    			$id_obat= $this->uri->segment(3);
		}
			$page=$this->uri->segment(3);
			$this->load->model('m_kategori');
			$this->load->model('m_transaksi');
            $data["detail"]=$this->m_transaksi->Detail_Transaksi($id_obat);
			$data['add'] = $this->m_transaksi->Add_Transaksi();
			//$data['provinsi'] = $this->m_kategori->Get_Provinsi();
			//$data['kota'] = $this->m_kategori->Get_Kota();
            $this->m_transaksi->Update_Counter($id_obat);
	   		$data['scriptmce'] = $this->scripttiny_mce();
			$this->load->view('admin/bg_atas',$data);
			$this->load->view('admin/bg_menu');
			$this->load->view('admin/add_transaksi',$data);
			$this->load->view('admin/bg_ska');
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
    function simpantransaksi()
	{
		$in=array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$nim=$pecah[0];
		$status=$pecah[2];
			if($status=="Administrator"){
			$this->load->model('m_transaksi');
			$tgl = "%d-%m-%Y";
			$in['id_kategori']=$this->input->post('id_kategori');
			$in["id_obat"]=strip_tags($this->input->post('id_obat'));
			$in["nama"]=strip_tags($this->input->post('nama'));
			$in["jenis_kelamin"]=$this->input->post('jenis_kelamin');
			$in["tanggal"]=$this->input->post('tanggal');
            $in["jumlah"]=strip_tags($this->input->post('jumlah'));
			$stok=strip_tags($this->input->post('jumlah'));
			$this->m_transaksi->Simpan_TransaksiObat("tbl_transaksi",$in);
			$this->m_transaksi->Update($in,$stok);
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/admin/transaksi'>";

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
     	function transaksi()
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
		if($data["status"]=="Administrator"){
			$page=$this->uri->segment(3);
      		$limit_ti=100;
			if(!$page):
			$offset_ti = 0;
			else:
			$offset_ti = $page;
			endif;
			$this->load->model('m_obat');
			$this->load->library('Pagination');
			$query=$this->m_obat->Tampil_Obat($limit_ti,$offset_ti);
			$tot_hal = $this->m_obat->Total_Obat();
      		$config['base_url'] = base_url() . '/index.php/admin/transaksi';
       		$config['total_rows'] = $tot_hal->num_rows();
			$config['per_page'] = $limit_ti;
			$config['uri_segment'] =3;
			$config['first_link'] = 'Awal';
			$config['last_link'] = 'Akhir';
			$config['next_link'] = 'Selajutnya';
			$config['prev_link'] = 'Sebelumnya';
			$this->pagination->initialize($config);
			$paginator=$this->pagination->create_links();
	   		$data['scriptmce'] = $this->scripttiny_mce();
        	$data_isi = array('query' => $query,'paginator'=>$paginator, 'page'=>$page);
			$data["tanggal"] = mdate($datestring, $time);
			$this->load->view('admin/bg_atas',$data);
			$this->load->view('admin/bg_menu');
			$this->load->view('admin/transaksi_obat',$data_isi);
			$this->load->view('admin/bg_ska');
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
		if($data["status"]=="Administrator"){
			$page=$this->uri->segment(3);
      		$limit_ti=12;
			if(!$page):
			$offset_ti = 0;
			else:
			$offset_ti=$page;
			endif;
			$this->load->model('m_transaksi');
			$this->load->library('Pagination');
			$query=$this->m_transaksi->Tampil($limit_ti,$offset_ti);
			$tot_hal = $this->m_transaksi->Total_Transaksi();
      		$config['base_url'] = base_url() . '/index.php/admin/transaksiobat';
       		$config['total_rows'] = $tot_hal->num_rows();
			$config['per_page'] = $limit_ti;
			$config['uri_segment'] =3;
			$config['first_link'] = 'Awal';
			$config['last_link'] = 'Akhir';
			$config['next_link'] = 'Selanjutnya';
			$config['prev_link'] = 'Sebelumnya';
			$this->pagination->initialize($config);
			$paginator=$this->pagination->create_links();
	   		$data['scriptmce'] = $this->scripttiny_mce();
        	$data_isi = array('query' => $query,'paginator'=>$paginator, 'page'=>$page);
			$data["tanggal"] = mdate($datestring, $time);
			$this->load->view('admin/bg_atas',$data);
			$this->load->view('admin/bg_menu');
			$this->load->view('admin/data_transaksi',$data_isi);
			$this->load->view('admin/bg_ska');
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
		if($data["status"]=="Administrator"){
			$this->load->view('admin/bg_atas',$data);
			$this->load->view('admin/bg_menu',$data);
			$this->load->view('admin/laporan',$data);
			$this->load->view('admin/bg_ska',$data);
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
		if($data["status"]=="Administrator"){
			$this->load->view('admin/bg_atas',$data);
			$this->load->view('admin/bg_menu',$data);
			$this->load->view('admin/laporan_transaksi',$data);
			$this->load->view('admin/bg_ska',$data);
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
			$this->load->model('m_laporan');
			$tanggal=$this->input->post('tgl_awal');
			$tanggal_akhir=$this->input->post('tgl_akhir');
			$data["data"]=$this->m_laporan->Rekap_Transaksi($tanggal,$tanggal_akhir);

			// load view
			$this->load->view('admin/pdf/data_transaksi', $data);

		}
   function pdf_data_jamkesmas()
		{

			// load
			$this->load->library('fpdf');

			// deklarasi font fpdf
			define('FPDF_FONTPATH', $this->config->item('fonts_path'));

			// model
			$this->load->model('m_laporan');
			$tanggal=$this->input->post('tgl');
			$tanggal_awal=$this->input->post('tgl_awal');
			$data["data"]=$this->m_laporan->Rekap_Jamkesmas($tanggal,$tanggal_awal);

			// load view
			$this->load->view('admin/pdf/data_jamkesmas', $data);

		}
    function pdf_data_askesda()
	{
            $this->load->library('cezpdf');
        $this->load->helper('pdf_helper');
        $id_kategori=$this->input->post('id_kategori');
        $data['data']=$this->m_laporan->Ambildata($id_kategori);
        $title=array(
            'ID KATEGORI'=>'id_kategori',
            'KATEGORI'=>'kategori'
            );
        $this->cezpdf->ezTable($data['data']);
        $this->cezpdf->ezStream();

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
