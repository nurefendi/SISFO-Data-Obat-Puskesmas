<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_obat extends CI_Model
	{
		function m_obat()
		{
			parent::Model();
		}
        
		function Simpan_Obat($in)
		{
			$kat=$this->db->insert('tbl_obat',$in);
			return $kat;
		}
		
		function Edit_Obat($id)
		{
			$t=$this->db->query("select * from tbl_obat left join (tbl_kategori)on tbl_obat.id_kategori=tbl_kategori.id_kategori where id_obat='$id'");
			return $t;
		}
		
			function Detail($id)
			{
				$t=$this->db->query("select * from tbl_obat  where id_kategori='$id'");
				return $t;
			}
		
		function Update_Obat($in)
		{
			$this->db->where('id_obat',$in['id_obat']);
			$this->db->update('tbl_obat',$in);
		}
		
		function Delete_Obat($id)
		{
			$this->db->where('id_obat',$id);
			$this->db->delete('tbl_obat');
		}
		
		function Total_Obat()
		{
			$ta=$this->db->query("select * from tbl_obat");
			return $ta;
		}
		
		function Tampil_Obat($limit,$offset)
		{
			$t=$this->db->query("select * from tbl_obat left join(tbl_kategori)on tbl_obat.id_kategori=tbl_kategori.id_kategori 
			order by id_obat DESC LIMIT $offset,$limit");
			return $t;
		}
		
		function Tampil_Ska($id_kategori)
		{
			$t=$this->db->query("select * from tbl_obat  where id_kategori='$id_kategori'");
			return $t;
		}
		
		//cek ketersediaan obat kritis
		function Tampil_Stok($limit,$offset)
		{
			$stok=0;  
			$stok15=15;
			$t=$this->db->query("select * from tbl_obat left join(tbl_kategori)on tbl_obat.id_kategori=tbl_kategori.id_kategori 
			where tbl_obat.stok between '$stok' and '$stok15' order by id_obat DESC LIMIT $offset,$limit");
			return $t;
		}
				
		function Total_Stok()
		{
			$ta=$this->db->query("select * from tbl_obat");
			return $ta;
		}
			
}
?>