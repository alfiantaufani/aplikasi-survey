<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use Dompdf\Dompdf;

class Laporan extends CI_Controller {

	function __construct()
	{
		parent::__construct();
        $this->load->model('m_setting');
        $this->load->model('m_data_lap_harian');
    }
    public function index()
	{
        $x['data']=$this->m_setting->get_identitas_instansi();
		$this->load->view('lap/v_lap_harian',$x);
	}
	function get_jenis_layanan(){
		$data=$this->m_data_lap_harian->get_data_jenis_layanan();
        $hasil = '<option value="">:: Pilih Layanan ::</option> ';
        foreach ($data as $r) {
            $hasil .= '<option value="'.$r->id.'" >'.$r->nama_layanan.'</option>';
        }
        echo $hasil;
	}

	function get_data_survei(){
		$tgl_awal 		= $this->input->post('tgl_awal');
        $tgl_akhir 		= $this->input->post('tgl_akhir');
        $jenis_layanan 	= $this->input->post('jenis_layanan');
        
        if($jenis_layanan !==''){
			$layanan = $this->m_data_lap_harian->get_nama_layanan($jenis_layanan);
			foreach($layanan as $r) {
	            $nama_layanan =$r->nama_layanan;				
			
	        }

	        $results_all = $this->m_data_lap_harian->get_all_vote($tgl_awal,$tgl_akhir,$jenis_layanan);
	        $totalVote = $results_all->num_rows();

	        $results_sangat_puas 	= $this->m_data_lap_harian->get_all_vote_sangat_puas($tgl_awal,$tgl_akhir,$jenis_layanan);
	        $totalVote_sangat_puas 	= $results_sangat_puas->num_rows();
	        $hitungVote_sangat_puas = '';
	        if ($totalVote) {
	        	$hitungVote_sangat_puas = round( ($totalVote_sangat_puas/$totalVote) * 100 );
	        }

	        $results_puas 		= $this->m_data_lap_harian->get_all_vote_puas($tgl_awal,$tgl_akhir,$jenis_layanan);
	        $totalVote_puas 	= $results_puas->num_rows();

	        $hitungVote_puas = '';
	        if ($totalVote) {
	        	$hitungVote_puas = round( ($totalVote_puas/$totalVote) * 100 );
	        }

	        $results_cukup 	= $this->m_data_lap_harian->get_all_vote_cukup_puas($tgl_awal,$tgl_akhir,$jenis_layanan);
	        $totalVote_cukup 	= $results_cukup->num_rows();

	        $hitungVote_cukup = '';
	        if ($totalVote) {
	        	$hitungVote_cukup = round( ($totalVote_cukup/$totalVote) * 100 );
	        }

	        $results_kurang 	= $this->m_data_lap_harian->get_all_vote_kurang_puas($tgl_awal,$tgl_akhir,$jenis_layanan);
	        $totalVote_kurang 	= $results_kurang->num_rows();

	        $hitungVote_kurang = '';
	        if ($totalVote) {
	        	$hitungVote_kurang = round( ($totalVote_kurang/$totalVote) * 100 );
	        }

	        $html = $this->load->view('lap/isi_lap_harian', array(
	        	'nama_layanan' => $nama_layanan,
	        	'periode1' => $tgl_awal,
	        	'periode2' => $tgl_akhir,
	        	'prosen_sangat_puas'=>$hitungVote_sangat_puas,
	        	'prosen_puas'=>$hitungVote_puas,
	        	'prosen_cukup'=>$hitungVote_cukup,
	        	'prosen_kurang'=>$hitungVote_kurang), true);

	        $callback = array(
	        	'html' => $html,
	        	'pesan'=>'success'
	        	);
	        echo json_encode($callback);
        	
        }
        else {
        	$callback = array(
	        	'html' => "Maaf! anda belum memilih jenis layanan",
	        	'pesan'=>'gagal'
	        	);
	        echo json_encode($callback);
        }


		
	}
	function cetak_laporan(){
    	$tgl_awal 	= $this->input->get('tgl_awal');
        $tgl_akhir  = $this->input->get('tgl_akhir');
        $jenis_layanan 	= $this->input->get('jenis_layanan');

		if ($jenis_layanan !== '') {			

			$layanan = $this->m_data_lap_harian->get_nama_layanan($jenis_layanan);
			foreach ($layanan as $r) {
	            $nama_layanan = $r->nama_layanan;
	        }

			$results_all = $this->m_data_lap_harian->get_all_vote($tgl_awal,$tgl_akhir,$jenis_layanan);
			$totalVote = $results_all->num_rows();
			

			$results_sangat_puas 	= $this->m_data_lap_harian->get_all_vote_sangat_puas($tgl_awal,$tgl_akhir,$jenis_layanan);
			$totalVote_sangat_puas 	= $results_sangat_puas->num_rows();

			$hitungVote_sangat_puas = '';
			if ($totalVote) {			
				$hitungVote_sangat_puas = round( ($totalVote_sangat_puas/$totalVote) * 100 );
			}
			
			$results_puas 		= $this->m_data_lap_harian->get_all_vote_puas($tgl_awal,$tgl_akhir,$jenis_layanan);
			$totalVote_puas 	= $results_puas->num_rows();

			$hitungVote_puas = '';
			if ($totalVote) {			
				$hitungVote_puas = round( ($totalVote_puas/$totalVote) * 100 );
			}

			$results_cukup 	= $this->m_data_lap_harian->get_all_vote_cukup_puas($tgl_awal,$tgl_akhir,$jenis_layanan);
			$totalVote_cukup 	= $results_cukup->num_rows();

			$hitungVote_cukup = '';
			if ($totalVote) {			
				$hitungVote_cukup = round( ($totalVote_cukup/$totalVote) * 100 );
			}

			$results_kurang 	= $this->m_data_lap_harian->get_all_vote_kurang_puas($tgl_awal,$tgl_akhir,$jenis_layanan);
			$totalVote_kurang 	= $results_kurang->num_rows();

			$hitungVote_kurang = '';
			if ($totalVote) {			
				$hitungVote_kurang = round( ($totalVote_kurang/$totalVote) * 100 );
			}
    	
	      
	    	$data = $this->load->view('lap/cetak_lap_harian',  array(
	    		'identitas_pengadilan' => $this->m_setting->get_identitas_instansi(),
				'nama_layanan' => $nama_layanan,
				'tgl_awal' => $tgl_awal,
				'tgl_akhir' => $tgl_akhir,
				'prosen_sangat_puas'=>$hitungVote_sangat_puas,
				'prosen_puas'=>$hitungVote_puas,
				'prosen_cukup'=>$hitungVote_cukup,
				'prosen_kurang'=>$hitungVote_kurang
			), true);

	    	/*
				coba
	    	*/

			require_once APPPATH.'third_party/dompdf-3.0.0/autoload.inc.php';
			$dompdf = new Dompdf();
			$dompdf->loadHtml($data);
			$dompdf->setPaper('A4', 'portrait');

			// Render the HTML as PDF
			$dompdf->render();

			// Output the generated PDF to Browser
			$dompdf->stream('laporan_survei '.date("dmY").'.pdf', array('Attachment' => 0));
	    }
	    else
		{
			$callback = array(
				'html' => "Maaf anda belum memilih Jenis Layanan !",
				'pesan'=>'gagal'
				);
			echo json_encode($callback);
			
		}
    }
} 