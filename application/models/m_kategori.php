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
		
			function Edit_Sub($id)
			{
			$t=$this->db->query("select * from tbl_sub where id_sub='$id'");
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
		
			function Update_Sub($in)
			{
			$this->db->where('id_sub',$in['id_sub']);
			$this->db->update('tbl_sub',$in);
			}
		
		function Simpan_Kat_obat($in)
		{
			$kat=$this->db->insert('tbl_kategori',$in);
			return $kat;
		}
		
			function Simpan_Sub($in)
			{
			$kat=$this->db->insert('tbl_sub',$in);
			return $kat;
			}
		
		function Hapus_Kat_obat($id)
		{
			$this->db->where('id_kategori',$id);
			$this->db->delete('tbl_kategori');
		}
		
			function Total_Sub()
			{
				$ta=$this->db->query("select * from tbl_obat");
				return $ta;
			}
			
			 function Tampil_Sub($limit,$offset)
			{
				$t=$this->db->query("select * from tbl_sub left join tbl_kategori
				on tbl_sub.id_kategori=tbl_kategori.id_kategori order by id_sub DESC LIMIT $offset,$limit");
				return $t;
			}
			
		
     
}
?>