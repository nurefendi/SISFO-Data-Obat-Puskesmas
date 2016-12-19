<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_transaksi extends CI_Model
	{
				//Tampil Daftar Obat yang tersedia
        function Add_Transaksi()
		{
			$t=$this->db->query("select * from tbl_obat  where id_obat");
			return $t;
		}
		
		//Update berapa kali transaksi obat keluar
		
        function Update_Counter($id_obat)
		{
			$query_update=$this->db->query("update tbl_obat set counter=counter+1 where id_obat='$id_obat'");
			return $query_update;
		}
		
		//Simpan Tambah Data Transaksi
		function Simpan_TransaksiObat($tabel,$data)
		{
			$s=$this->db->insert($tabel,$data);
			return $s;
		}
		
		//Update Jumlah Stok yang Ada
        function Update($in,$stok)
		{
			$query_update=$this->db->query("update tbl_obat set stok=stok-'$stok' where id_obat=".$in['id_obat']."");
			return $query_update;
		}
      
		//Tampil Detail Transaksi
		function Detail_Transaksi($id_obat)
		{
			$query_detail_obat=$this->db->query("SELECT * from tbl_obat right join (tbl_kategori)on tbl_obat.id_kategori=tbl_kategori.id_kategori 
			where id_obat='$id_obat'");
			return $query_detail_obat;
		}
	
		//Lihat Menu Data Transaksi Obat
        function Tampil($limit,$offset)
		{
		$t=$this->db->query("select * from tbl_transaksi left join (tbl_kategori,tbl_obat) on tbl_transaksi.id_obat=tbl_obat.id_obat 
		and tbl_transaksi.id_kategori=tbl_kategori.id_kategori order by id_transaksi DESC LIMIT $offset,$limit");
		return $t;
		}
		
		function Total_Transaksi()
		{
		$ta=$this->db->query("select * from tbl_transaksi");
		return $ta;
		}
		}
		?>