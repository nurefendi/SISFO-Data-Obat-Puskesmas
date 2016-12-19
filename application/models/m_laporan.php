<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_laporan extends CI_Model
	{
		function m_laporan()
		{
			parent::Model();
		}
		 	
		function Tampil_Data($tabel,$id)
		{
			$q=$this->db->query("select * from ".$tabel." order by ".$id." DESC");
			return $q;
		}
		
		function Tampil_Data_Terbatas($tabel,$id,$join,$offset,$limit)
		{
			$q=$this->db->query("select * from ".$tabel." ".$join." order by ".$id." DESC LIMIT ".$offset.",".$limit."");
			return $q;
		}
		
		function Tampil_Data_Terseleksi($tabel,$id,$id_seleksi)
		{
			$q=$this->db->query("select * from ".$tabel." where ".$id." = ".$id_seleksi."");
			return $q;
		}
		
		
		
		function Total_Data($tabel)
		{
			$q=$this->db->query("select * from $tabel");
			return $q;
		}
		
		function Rekap_Jamkesmas($tanggal,$tanggal_awal)
   		{
      	$query_tampil=$this->db->query("SELECT * from tbl_obat left join (tbl_kategori)on tbl_obat.id_kategori=tbl_kategori.id_kategori where  tgl_masuk between '$tanggal' and '$tanggal_awal'");
        return $query_tampil;
        }
        
		
	
	}
?>