<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_akses extends CI_Model 
{
	function m_akses()
	{
		parent::Model();
	}
	
	//validasi login
	function validasi($username,$password)
	{
		$username=mysql_real_escape_string($username);
		$password=mysql_real_escape_string($password);
		$query=$this->db->query("select * from tbl_akses where username='$username' and password=md5('$password')");
		return $query;
	}
	
	//Create admin
	function Simpan_Akses($in)
	{
		$this->db->trans_start();
		$this->db->query("INSERT INTO tbl_akses (nip, nama_user, jabatan, jenis_kelamin, status, username, password) VALUES ('".$in['nip']."',
		'".$in['nama_user']."', '".$in['jabatan']."','".$in['jenis_kelamin']."', '".$in['status']."', '".$in['username']."', md5( '".$in['password']."'))");
		$this->db->trans_complete();
		$sukses = TRUE;
			if ($this->db->trans_status() === FALSE)
			{
				$sukses = FALSE;
			} 
			return $sukses;
	}
	
	//Read daftar admin
	function Daftar_Akses($offset,$limit)
	{
		$da=$this->db->query("select * from tbl_akses order by tbl_akses.id_user ASC LIMIT $offset,$limit");
		return $da;
	}
		
	//Update Password	
	function Update_Password($in,$id)
	{
		$update=$this->db->query("update tbl_akses set password=md5('".$in."') where id_user='".$id."'");
		return $update;
	}
	
	//Delete hak akses
	function Hapus_Akses($id)
	{
		$this->db->where('id_user',$id);
		$this->db->delete('tbl_akses');
	}
		
		//content user
		function Edit_Content($tabel,$seleksi)
		{
			$query=$this->db->query("select * from $tabel where $seleksi");
			return $query;
		}
		
		function Update_Content($tabel,$isi,$seleksi)
		{
			$this->db->where($seleksi,$isi[$seleksi]);
			$this->db->update($tabel,$isi);
		}
		
		function Delete_Content($id,$seleksi,$tabel)
		{
			$this->db->where($seleksi,$id);
			$this->db->delete($tabel);
		}
	
	//artikel page
	function Total_Artikel($tabel)
	{
		$q=$this->db->query("select * from $tabel");
		return $q;
	}
		
}
?>