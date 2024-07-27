<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct(){
		parent::__construct();
        $this->load->model('m_data_vote');
        $this->load->model('m_setting');
    }


	public function index()
	{
		$x['data']=$this->m_setting->get_identitas_instansi();  
		$x['layanan']=$this->m_setting->get_layanan(); 
		$this->load->view('home',$x);
	}
	public function vote(){
		$id_layanan 		= $_POST['layanan']; 
        $nilai_kepuasan 	= $_POST['kepuasan'];
        
        $results = $this->m_data_vote->get_nama_layanan($id_layanan);
        if(!empty($results) ) {
        	foreach($results as $row) {
        		$nama_layanan = $row->nama_layanan;
        	}
        }
        

        $simpan = $this->m_data_vote->simpan_input_vote($nilai_kepuasan,$id_layanan,$nama_layanan);
        if($simpan) {
        	
        	$callback = array(
        		'status'=>'sukses',
        		'pesan'=>'Data berhasil disimpan'
        		);
        	echo json_encode($callback);
        }
        else
        {
        	$callback = array(
        		'status'=>'gagal',
        		'pesan'=>'data gagal disimpan'
        		);
        	echo json_encode($callback);
        }
	}
	
	function total_prosen(){
		$id_layanan= $_POST['id_layanan']; 

		$layanan=$this->m_data_vote->get_nama_layanan($id_layanan);
		foreach ($layanan as $row) {
			$nama_layanan = $row->nama_layanan;
		}
		
		$results_all = $this->m_data_vote->get_all_vote($id_layanan);
		$totalVote = $results_all->num_rows();
		
		$results_sangat_puas 	= $this->m_data_vote->get_all_vote_sangat_puas($id_layanan);
		$totalVote_sangat_puas 	= $results_sangat_puas->num_rows();

		$hitungVote_sangat_puas = '';
		if ($totalVote) {			
			$hitungVote_sangat_puas = round( ($totalVote_sangat_puas/$totalVote) * 100 );
		}

		
		$results_puas 	= $this->m_data_vote->get_all_vote_puas($id_layanan);
		$totalVote_puas 	= $results_puas->num_rows();

		$hitungVote_puas = '';
		if ($totalVote) {			
			$hitungVote_puas = round( ($totalVote_puas/$totalVote) * 100 );
		}

		$results_cukup 	= $this->m_data_vote->get_all_vote_cukup($id_layanan);
		$totalVote_cukup 	= $results_cukup->num_rows();

		$hitungVote_cukup = '';
		if ($totalVote) {			
			$hitungVote_cukup = round( ($totalVote_cukup/$totalVote) * 100 );
		}

		$results_kurang 	= $this->m_data_vote->get_all_vote_kurang($id_layanan);
		$totalVote_kurang 	= $results_kurang->num_rows();

		$hitungVote_kurang = '';
		if ($totalVote) {			
			$hitungVote_kurang = round( ($totalVote_kurang/$totalVote) * 100 );
		}


		$callback = array(
			'nama_layanan'=> str_replace(" ","",strtolower($nama_layanan)),
			'prosen_sangat_puas'=>$hitungVote_sangat_puas,
			'prosen_puas'=>$hitungVote_puas,
			'prosen_cukup'=>$hitungVote_cukup,
			'prosen_kurang'=>$hitungVote_kurang,
			'pesan'=>'success'
			);
		echo json_encode($callback);
	}

	
}
