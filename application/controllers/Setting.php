<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller {

	function __construct()
	{
		parent::__construct();
        $this->load->model('m_setting');
    }
    public function index()
	{
        $x['data']=$this->m_setting->get_identitas_instansi();        
		$this->load->view('setting/v_setting',$x);
	}
	function get_data_layanan(){
		$x=$this->m_setting->get_layanan();
		$html=$this->load->view('setting/isi_setting', array('data'=>$x), true);
        $callback = array(
            'status'=>'success',
            'pesan'=>'Data loaded',
            'html'=>$html
        );
        echo json_encode($callback);			
	}
	public function upload_foto(){		
		$errors= array();
	    $file_name = $_FILES['image']['name'];
	    $file_size =$_FILES['image']['size'];
	    $file_tmp =$_FILES['image']['tmp_name'];
	    $file_type=$_FILES['image']['type'];   
	    		
	    if(empty($errors)==true){
	    	move_uploaded_file($file_tmp,"./assets/img/".$file_name);
	    	$callback = array(
				'status'=>'success',
				'namafile'=>$file_name,
				'pesan'=>'Foto berhasil disimpan'
			);
	    } 
	    else 
	    {
	    	$callback = array(
				'status'=>'gagal',
				'namafile'=>$file_name,
				'pesan'=>'Gagal Menyimpan foto di database'
			);
	    }
        echo json_encode($callback);
	}
	public function ubah_identitas(){	
		$id = $this->input->post('id_instansi');
		$data = array(
			"nama_instansi" 			=> $this->input->post('nama_instansi'),
			"alamat"					=> $this->input->post('alamat'),
			"email"						=> $this->input->post('email'),
			"website"					=> $this->input->post('website'),
			"kode_pos"					=> $this->input->post('kode_pos'),
			"telp"						=> $this->input->post('telp'),
			"fax"						=> $this->input->post('fax'),
			"link_maps"					=> $this->input->post('link_maps'),
			"kode_instansi"				=> $this->input->post('kode_instansi'),
			"nama_singkat_instansi" 	=> $this->input->post('nama_singkat_instansi'),
			"logo_instansi_warna" 		=> $this->input->post('logo_instansi_warna'),
			"logo_instansi_hitam_putih" => $this->input->post('logo_instansi_hitam_putih'),
			"status" 					=> $this->input->post('status')
		);
		
		$update = $this->m_setting->update_identitas($id,$data); 		
		if ($update) {
			$callback = array(
				'status'=>$data,
				'pesan'=>'Data berhasil diubah'
			);
			
		}
		else {
			$callback = array(
				'status'=>'gagal',
				'pesan'=>'Data berhasil diubah'
			);
		}
		echo json_encode($callback);
	}
	function simpan_layanan(){
		$simpan = $this->m_setting->simpan_layanan(); 		
		if ($simpan) {
			$callback = array(
				'status'=>'sukses',
				'pesan'=>'Data berhasil diubah'
			);
			
		} else {
			$callback = array(
				'status'=>'gagal',
				'pesan'=>'Data berhasil diubah'
			);
		}
		echo json_encode($callback);
	}
	function ubah_layanan(){
		$simpan = $this->m_setting->ubah_layanan(); 		
		if ($simpan) {
			$callback = array(
				'status'=>'sukses',
				'pesan'=>'Data berhasil diubah'
			);
			
		} else {
			$callback = array(
				'status'=>'gagal',
				'pesan'=>'Data berhasil diubah'
			);
		}
		echo json_encode($callback);
	}
	function hapus_layanan(){
		$id 	= $this->input->post('id');
		$hapus = $this->m_setting->hapus_data_layanan($id);
		if($hapus){
			//hapus data pada table hasil vote 
			$hapus = $this->m_setting->hapus_data_vote($id);
			$callback = array(
				'status'=>'success'
			);	
		}
		else {
			$callback = array(
				'status'=>'gagal'
			);
		}
		echo json_encode($callback);
	}
} 