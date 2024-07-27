<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
use Dompdf\Dompdf;

class Dompdf_v3 {
		
	public function __construct() {
		
		require_once APPPATH.'third_party/dompdf-3.0.0/autoload.inc.php';
		
		$pdf = new Dompdf();
		
		$CI =& get_instance();
		$CI->dompdf = $pdf;
		
	}
	
}