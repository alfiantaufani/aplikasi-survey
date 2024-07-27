<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_data_vote extends CI_Model{ 
	
	function simpan_input_vote($nilai_kepuasan,$id_layanan,$nama_layanan){
		$tgl 	= date("Y-m-d H:i:s");	
		$data 	= array(
			"id_opsi"=> $nilai_kepuasan,
			"date_create" => $tgl,
			'id_layanan' => $id_layanan, 
			"bagian" => $nama_layanan
			);		
		$this->db->insert('hasil', $data);
		return true;
	}
	function get_nama_layanan($id_layanan){
		$results = array();
		$this->db->from('layanan');
		$this->db->where('id', $id_layanan);
		$query = $this->db->get();
		if($query->num_rows() > 0) {
			$results = $query->result();
		}
		return $results;
    }
    function get_all_vote($id_layanan){
    	$tahun 	= date("Y");	
    	$results = array();
		$this->db->from('hasil');
		$this->db->where('id_layanan', $id_layanan);
		$this->db->where('year(date_create)', $tahun);
		$results = $this->db->get();
		
		return $results;
    }
    function get_all_vote_sangat_puas($id_layanan){
    	$tahun 	= date("Y");
    	$results = array();
		$this->db->from('hasil');
		$this->db->where('id_layanan', $id_layanan);
		$this->db->where('id_opsi', 1);
		$this->db->where('year(date_create)', $tahun);
		$results = $this->db->get();
		
		return $results;
    }
    function get_all_vote_puas($id_layanan){
    	$tahun 	= date("Y");
    	$results = array();
		$this->db->from('hasil');
		$this->db->where('id_layanan', $id_layanan);
		$this->db->where('id_opsi', 2);
		$this->db->where('year(date_create)', $tahun);
		$results = $this->db->get();
		
		return $results;
    }
    function get_all_vote_cukup($id_layanan){
    	$tahun 	= date("Y");
    	$results = array();
		$this->db->from('hasil');
		$this->db->where('id_layanan', $id_layanan);
		$this->db->where('id_opsi', 3);
		$this->db->where('year(date_create)', $tahun);
		$results = $this->db->get();
		
		return $results;
    }
    function get_all_vote_kurang($id_layanan){
    	$tahun 	= date("Y");
    	$results = array();
		$this->db->from('hasil');
		$this->db->where('id_layanan', $id_layanan);
		$this->db->where('id_opsi', 4);
		$this->db->where('year(date_create)', $tahun);
		$results = $this->db->get();
		
		return $results;
    }

   
    






/*

    //PENDAFTARAN
    function get_all_vote_pendaftaran(){
    	$tahun 	= date("Y");	
    	$results = array();
		$this->db->from('hasil');
		$this->db->where('id_layanan', 1);
		$this->db->where('year(date_create)', $tahun);
		$results = $this->db->get();
		
		return $results;
    }
    function get_all_vote_daftar_sangat_puas(){
    	$tahun 	= date("Y");
    	$results = array();
		$this->db->from('hasil');
		$this->db->where('id_layanan', 1);
		$this->db->where('id_opsi', 1);
		$this->db->where('year(date_create)', $tahun);
		$results = $this->db->get();
		
		return $results;
    }
    function get_all_vote_daftar_puas(){
    	$tahun 	= date("Y");
    	$results = array();
		$this->db->from('hasil');
		$this->db->where('id_layanan', 1);
		$this->db->where('id_opsi', 2);
		$this->db->where('year(date_create)', $tahun);
		$results = $this->db->get();
		
		return $results;
    }
    function get_all_vote_daftar_cukup(){
    	$tahun 	= date("Y");
    	$results = array();
		$this->db->from('hasil');
		$this->db->where('id_layanan', 1);
		$this->db->where('id_opsi', 3);
		$this->db->where('year(date_create)', $tahun);
		$results = $this->db->get();
		
		return $results;
    }
    function get_all_vote_daftar_kurang(){
    	$tahun 	= date("Y");
    	$results = array();
		$this->db->from('hasil');
		$this->db->where('id_layanan', 1);
		$this->db->where('id_opsi', 4);
		$this->db->where('year(date_create)', $tahun);
		$results = $this->db->get();
		
		return $results;
    }

    //INFORMASI
    function get_all_vote_informasi(){
    	$tahun 	= date("Y");
    	$results = array();
		$this->db->from('hasil');
		$this->db->where('id_layanan', 2);
		$this->db->where('year(date_create)', $tahun);
		$results = $this->db->get();
		
		return $results;
    }
    function get_all_vote_informasi_sangat_puas(){
    	$tahun 	= date("Y");
    	$results = array();
		$this->db->from('hasil');
		$this->db->where('id_layanan', 2);
		$this->db->where('id_opsi', 1);
		$this->db->where('year(date_create)', $tahun);
		$results = $this->db->get();
		
		return $results;
    }
    function get_all_vote_informasi_puas(){
    	$tahun 	= date("Y");
    	$results = array();
		$this->db->from('hasil');
		$this->db->where('id_layanan', 2);
		$this->db->where('id_opsi', 2);
		$this->db->where('year(date_create)', $tahun);
		$results = $this->db->get();
		
		return $results;
    }
    function get_all_vote_informasi_cukup(){
    	$tahun 	= date("Y");
    	$results = array();
		$this->db->from('hasil');
		$this->db->where('id_layanan', 2);
		$this->db->where('id_opsi', 3);
		$this->db->where('year(date_create)', $tahun);
		$results = $this->db->get();
		
		return $results;
    }
    function get_all_vote_informasi_kurang(){
    	$tahun 	= date("Y");
    	$results = array();
		$this->db->from('hasil');
		$this->db->where('id_layanan', 2);
		$this->db->where('id_opsi', 4);
		$this->db->where('year(date_create)', $tahun);
		$results = $this->db->get();
		
		return $results;
    }

     //PENETAPAN
    function get_all_vote_penetapan(){
    	$tahun 	= date("Y");
    	$results = array();
		$this->db->from('hasil');
		$this->db->where('id_layanan', 3);
		$this->db->where('year(date_create)', $tahun);
		$results = $this->db->get();
		
		return $results;
    }
    function get_all_vote_penetapan_sangat_puas(){
    	$tahun 	= date("Y");
    	$results = array();
		$this->db->from('hasil');
		$this->db->where('id_layanan', 3);
		$this->db->where('id_opsi', 1);
		$this->db->where('year(date_create)', $tahun);
		$results = $this->db->get();
		
		return $results;
    }
    function get_all_vote_penetapan_puas(){
    	$tahun 	= date("Y");
    	$results = array();
		$this->db->from('hasil');
		$this->db->where('id_layanan', 3);
		$this->db->where('id_opsi', 2);
		$this->db->where('year(date_create)', $tahun);
		$results = $this->db->get();
		
		return $results;
    }
    function get_all_vote_penetapan_cukup(){
    	$tahun 	= date("Y");
    	$results = array();
		$this->db->from('hasil');
		$this->db->where('id_layanan', 3);
		$this->db->where('id_opsi', 3);
		$results = $this->db->get();
		
		return $results;
    }
    function get_all_vote_penetapan_kurang(){
    	$tahun 	= date("Y");
    	$results = array();
		$this->db->from('hasil');
		$this->db->where('id_layanan', 3);
		$this->db->where('id_opsi', 4);
		$this->db->where('year(date_create)', $tahun);
		$results = $this->db->get();
		
		return $results;
    }

     //PUTUSAN
    function get_all_vote_putusan(){
    	$tahun 	= date("Y");
    	$results = array();
		$this->db->from('hasil');
		$this->db->where('id_layanan', 4);
		$this->db->where('year(date_create)', $tahun);
		$results = $this->db->get();
		
		return $results;
    }
    function get_all_vote_putusan_sangat_puas(){
    	$tahun 	= date("Y");
    	$results = array();
		$this->db->from('hasil');
		$this->db->where('id_layanan', 4);
		$this->db->where('id_opsi', 1);
		$this->db->where('year(date_create)', $tahun);
		$results = $this->db->get();
		
		return $results;
    }
    function get_all_vote_putusan_puas(){
    	$tahun 	= date("Y");
    	$results = array();
		$this->db->from('hasil');
		$this->db->where('id_layanan', 4);
		$this->db->where('id_opsi', 2);
		$this->db->where('year(date_create)', $tahun);
		$results = $this->db->get();
		
		return $results;
    }
    function get_all_vote_putusan_cukup(){
    	$tahun 	= date("Y");
    	$results = array();
		$this->db->from('hasil');
		$this->db->where('id_layanan', 4);
		$this->db->where('id_opsi', 3);
		$this->db->where('year(date_create)', $tahun);
		$results = $this->db->get();
		
		return $results;
    }
    function get_all_vote_putusan_kurang(){
    	$tahun 	= date("Y");
    	$results = array();
		$this->db->from('hasil');
		$this->db->where('id_layanan', 4);
		$this->db->where('id_opsi', 4);
		$this->db->where('year(date_create)', $tahun);
		$results = $this->db->get();
		
		return $results;
    }

    //AC
    function get_all_vote_ac(){
    	$tahun 	= date("Y");
    	$results = array();
		$this->db->from('hasil');
		$this->db->where('id_layanan', 5);
		$this->db->where('year(date_create)', $tahun);
		$results = $this->db->get();
		
		return $results;
    }
    function get_all_vote_ac_sangat_puas(){
    	$tahun 	= date("Y");
    	$results = array();
		$this->db->from('hasil');
		$this->db->where('id_layanan', 5);
		$this->db->where('id_opsi', 1);
		$this->db->where('year(date_create)', $tahun);
		$results = $this->db->get();
		
		return $results;
    }
    function get_all_vote_ac_puas(){
    	$tahun 	= date("Y");
    	$results = array();
		$this->db->from('hasil');
		$this->db->where('id_layanan', 5);
		$this->db->where('id_opsi', 2);
		$this->db->where('year(date_create)', $tahun);
		$results = $this->db->get();
		
		return $results;
    }
    function get_all_vote_ac_cukup(){
    	$tahun 	= date("Y");
    	$results = array();
		$this->db->from('hasil');
		$this->db->where('id_layanan', 5);
		$this->db->where('id_opsi', 3);
		$this->db->where('year(date_create)', $tahun);
		$results = $this->db->get();
		
		return $results;
    }
    function get_all_vote_ac_kurang(){
    	$tahun 	= date("Y");
    	$results = array();
		$this->db->from('hasil');
		$this->db->where('id_layanan', 5);
		$this->db->where('id_opsi', 4);
		$this->db->where('year(date_create)', $tahun);
		$results = $this->db->get();
		
		return $results;
    }
    */
}
