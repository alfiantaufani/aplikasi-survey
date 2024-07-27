<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_setting extends CI_Model{ 

    public function get_identitas_instansi(){
    	$hsl=$this->db->from('identitas_instansi');
    	$this->db->where('status', 'aktif');
		$hsl=$this->db->order_by('id DESC');
		$hsl=$this->db->limit('1');
		return $this->db->get()->result();
    }
	function cek_row(){
		$this->db->from('identitas_instansi');
		return $this->db->get();
	}	
	function update_identitas($id,$data){
		$this->db->where('id', $id);
		return $this->db->update('identitas_instansi', $data);
	}
	function get_layanan(){
    	$hsl=$this->db->from('layanan');
		$hsl=$this->db->order_by('id ASC');
		return $this->db->get()->result();
    }
	function simpan_layanan(){
		$data = array(
			"nama_layanan" 	=> $this->input->post('nama_layanan')
		);
		return $this->db->insert('layanan', $data);
	}
	function ubah_layanan(){
		$id =  $this->input->post('id');
		$data = array(
			"nama_layanan" 	=> $this->input->post('nama_layanan')
		);
		$this->db->where('id', $id);
		return $this->db->update('layanan', $data);
	}
	function hapus_data_layanan($id){
		
		$this->db->where('id', $id);
    	$hapus = $this->db->delete('layanan');
    	if($hapus) {
    		return true;
    	}else {
    		return false;
    	}
	}
	function hapus_data_vote($id){		
		$this->db->where('id_layanan', $id);
    	$hapus = $this->db->delete('hasil');
    	if($hapus) {
    		return true;
    	}else {
    		return false;
    	}
	}
	
}