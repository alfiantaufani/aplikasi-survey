<?php defined('BASEPATH') OR exit('No direct script access allowed');

	class M_data_lap_harian extends CI_Model
	{ 
		public function __construct()
		{
			parent::__construct();
		}
		function get_data_jenis_layanan(){
			$results = array();
			$this->db->from('layanan');
			$query = $this->db->get();
			if($query->num_rows() > 0) {
				$results = $query->result();
			}
			return $results;
	    }
	    function get_nama_layanan($jenis_layanan){
	    	if ($jenis_layanan != '') {
				$results = array();
				$this->db->from('layanan');
				$this->db->where('id', $jenis_layanan);
				$query = $this->db->get();
				if($query->num_rows() > 0) {
					$results = $query->result();
				}
				return $results;
	    	} else {
	    		$results = array();
				$this->db->from('layanan');
				$query = $this->db->get();
				if($query->num_rows() > 0) {
					$results = $query->result();
				}
				return $results;
	    	}
	    		
	    }
		function get_all_vote($tgl_awal,$tgl_akhir,$jenis_layanan){
			$results = array();
			$this->db->from('hasil');
			$this->db->where('id_layanan', $jenis_layanan);
			$this->db->where('DATE(date_create) BETWEEN "'. date('Y-m-d', strtotime($tgl_awal)). '" and "'. date('Y-m-d', strtotime($tgl_akhir)).'"');
			$results = $this->db->get();
			return $results;
		}
		
		function get_all_vote_sangat_puas($tgl_awal,$tgl_akhir,$jenis_layanan){
			$results = array();
			$this->db->from('hasil');
			$this->db->where('id_layanan', $jenis_layanan);
			$this->db->where('id_opsi', 1);
			$this->db->where('DATE(date_create) BETWEEN "'. date('Y-m-d', strtotime($tgl_awal)). '" and "'. date('Y-m-d', strtotime($tgl_akhir)).'"');
			$results = $this->db->get();
			return $results;
		}

		function get_all_vote_puas($tgl_awal,$tgl_akhir,$jenis_layanan){
	    	$results = array();
			$this->db->from('hasil');
			$this->db->where('id_layanan', $jenis_layanan);
			$this->db->where('id_opsi', 2);
			$this->db->where('DATE(date_create) BETWEEN "'. date('Y-m-d', strtotime($tgl_awal)). '" and "'. date('Y-m-d', strtotime($tgl_akhir)).'"');
			$results = $this->db->get();
			
			return $results;
	    }
	    function get_all_vote_cukup_puas($tgl_awal,$tgl_akhir,$jenis_layanan){
	    	$results = array();
			$this->db->from('hasil');
			$this->db->where('id_layanan', $jenis_layanan);
			$this->db->where('id_opsi', 3);
			$this->db->where('DATE(date_create) BETWEEN "'. date('Y-m-d', strtotime($tgl_awal)). '" and "'. date('Y-m-d', strtotime($tgl_akhir)).'"');
			$results = $this->db->get();
			
			return $results;
	    }
	    function get_all_vote_kurang_puas($tgl_awal,$tgl_akhir,$jenis_layanan){
	    	$results = array();
			$this->db->from('hasil');
			$this->db->where('id_layanan', $jenis_layanan);
			$this->db->where('id_opsi', 4);
			$this->db->where('DATE(date_create) BETWEEN "'. date('Y-m-d', strtotime($tgl_awal)). '" and "'. date('Y-m-d', strtotime($tgl_akhir)).'"');
			$results = $this->db->get();
			
			return $results;
	    }
		
		function get_model_cetak_lap_survei_harian($tgl_awal,$tgl_akhir,$jenis_layanan){
			$sql 		= "select a.*,b.id_pendidikan,b.kode,b.nama,c.id_responden,c.persyaratan,c.prosedur,c.waktu,c.biayatarif,c.spesifikasi_jenis,c.kompetensi,c.perilaku,c.maklumat,c.penanganan,c.saran 
							  from data_responden a 
							  left join tingkat_pendidikan b 
							  on a.pendidikan=b.id_pendidikan
							  left join data_ikm c 
							  on a.id = c.id_responden
							  where DATE_FORMAT(tgl_input,'%Y-%m-%d') between '".$tgl_awal."' and '".$tgl_akhir."' ";
			$results 	= $this->db->query($sql)->result();
			return $results;
		}
		
	}
