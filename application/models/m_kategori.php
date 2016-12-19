<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_kategori extends CI_Model
	{
		function Tampil_Katobat($limit,$ofset)
		{
			$t=$this->db->query("select * from tbl_kategori order by id_kategori DESC LIMIT $ofset,$limit");
			return $t;
		}
		
			function Total_Katobat()
			{
			$t=$this->db->query("select * from tbl_kategori");
			return $t;
			}
		
	   	function Edit_Kat_Obat($id)
		{
			$t=$this->db->query("select * from tbl_kategori where id_kategori='$id'");
			return $t;
		}
		
		function Kat_Obat()
		{
			$kat=$this->db->query("select * from tbl_kategori order by id_kategori DESC");
			return $kat;
		}
		
        function Kategori($id_kategori)
		{
			$kat=$this->db->query("select * from tbl_kategori where id_kategori='$id_kategori' order by id_kategori DESC");
			return $kat;
		}
		
        function Kat_Rekap()
		{
			$kat=$this->db->query("select * from tbl_kategori order by id_kategori DESC");
			return $kat;
		}
		
		function Update_Kat_obat($in)
		{
			$this->db->where('id_kategori',$in['id_kategori']);
			$this->db->update('tbl_kategori',$in);
		}
		
		function Simpan_Kat_obat($in)
		{
			$kat=$this->db->insert('tbl_kategori',$in);
			return $kat;
		}
		
		function Hapus_Kat_obat($id)
		{
			$this->db->where('id_kategori',$id);
			$this->db->delete('tbl_kategori');
		}
		
		//Pilih kategori di ADD transaksi
			function Get_idKategori()	
			{
				$query = $this->db->get('tbl_kategori');
				return $query->result();
			}
		
				function Get_IdSub()	
				{
					$sql = $this->db->get('tbl_sub');
					return $sql;
				}
     
}
?>