<?php
	function tanggal_indo($tanggal) {
		$bulan = array (
				1 => 'Januari',
				'Februari',
				'Maret',
				'April',
				'Mei',
				'Juni',
				'Juli',
				'Agustus',
				'September',
				'Oktober',
				'November',
				'Desember'
			);
		$split 	  = explode('-', $tanggal);
		$tgl_indo = $bulan[ (int)$split[1] ] . ' ' . $split[0];
		return $tgl_indo;
	}

	$periode1 = tanggal_indo($tgl_awal);
	$periode2 = tanggal_indo($tgl_akhir);
	if ($periode1 == $periode2) {
		$periode = $periode1;
	}else {
		$periode = $periode1." / ".$periode2;
	}
	
	foreach ($identitas_pengadilan as $r) {
		$id_identitas 			=  $r->id;
		$nama_instansi 			=  $r->nama_instansi;
		$alamat 				= $r->alamat;
		$email 					= $r->email;
		$website 				= $r->website;
		$kodepos 				= $r->kode_pos;
		$telp   				= $r->telp;
		$fax   					= $r->fax;
		$link_maps 				= $r->link_maps;
		$kode_instansi 			= $r->kode_instansi;
		$nama_singkat_instansi 	= $r->nama_singkat_instansi;
		$logowarna 				= $r->logo_instansi_warna;
		$logohp 				= $r->logo_instansi_hitam_putih;
		$status 				= $r->status;
	}
	
	$path = base_url("assets/img/".$logowarna);
	$type = pathinfo($path, PATHINFO_EXTENSION);
	$data = file_get_contents($path);
	$logo = 'data:image/' . $type . ';base64,' . base64_encode($data);
?>
<!doctype html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Index Kepuasan Masyarakat <?php echo $nama_instansi?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="SURVEI INDEK KEPUASAN MASYARAKAT.">
    <meta name="msapplication-tap-highlight" content="no">
	<link href="<?php echo base_url();?>assets/main.css" rel="stylesheet">
	<link href="<?php echo base_url();?>assets/plugins/datepicker/css/datepicker.css" rel="stylesheet">
	
	
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/plugins/datepicker/js/bootstrap-datepicker.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/scripts/main.2.js"></script>
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	
	
	<style>
		@page { size: 8.5in 13in; margin: 30px 60px 30px 80px; }
		body { margin: 0px;font-size: 14px; }
		body { font-family: 'Times New Roman', Times, serif; }
		p {font-size: 1.1em;line-height: 1.6;}
		
		.tab { 
			display:inline-block; 
			margin-left: 500px; 
		}

		hr{
			border: 0;
			height: 1px;
			background: #333;
			background-image: linear-gradient(to right, #ccc, #333, #ccc);
		}
		.table{
			border-collapse: collapse;
			width: 100%;      
			font-size: 1em;
		}
		.table th{
			padding: 3px;
			font-weight: bold;
			text-align: center;
			height: 20px;
			border:1px solid #000;
		}
		.table td{
			border:1px solid #000;
			padding: 5px;
			vertical-align: top;
		}
		#head{
			background: #d1d1d1 !important;color: black;
			color:#000000;
		}
		.contreng:after {
			content:'X';
			font-weight:bold;
			margin-left:-155px;
			margin-top:-10px;
		} 

	</style>
</head>
<body>
	<table style="min-width:200mm !important;max-width:210mm !important " border=0>
		<tr>
			<td style="width:10%;align:right;valign:top" class="text-left">
				<img src="<?php echo $logo ?>" style="width:80px;" class="img-responsive" alt="logo">
			</td>
			<td style="width:70%;align:left;valign:top" class="text-left">
				<h2><strong><?php echo strtoupper($nama_instansi);?></strong></h2>
				<p style="font-size: .8em;padding-top:-20px;"><i><?php echo $alamat?>,<br/> Telpon: <?php echo $telp;?>, Fax: <?php echo $fax?> <br>E-mail : <?php echo $email;?>, website : <?php echo $website?></i></p>
			</td>
		</tr>
	</table>
	<hr>
	<br>
	<center>	
	<h3>HASIL PENGOLAHAN SURVEI LAYANAN <?php echo strtoupper($nama_layanan)?></h3>
	<h4>PERIODE <?php echo $periode;?></h4>
	</center>
	<table id="tabledata" class="mb-0 table table-bordered table-striped">
		<thead>
			<tr>
				<th>Jenis Layanan</th>
				<th>Sangat Puas</th>
				<th>Puas</th>
				<th>Cukup Puas</th>
				<th>Kurang Puas </th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td><?php echo $nama_layanan;?></td>
				<td><?php echo $prosen_sangat_puas;?>%</td> 
				<td><?php echo $prosen_puas;?>%</td> 
				<td><?php echo $prosen_cukup;?>%</td>
				<td><?php echo $prosen_kurang;?>%</td>
			</tr>
		</tbody>
		
	</table>
	<br>
	<br>
	<br>
	
</body>
</html>
