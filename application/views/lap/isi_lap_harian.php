<?php 
	function tanggal_indo($tanggal)
	{
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
		$tgl_indo = $split[2] . '-' . $bulan[ (int)$split[1] ] . '-' . $split[0];
		return $tgl_indo;
	}

	if($periode1 !==''){
		$periodeke1 = tanggal_indo($periode1); 
	}else {
		$periodeke1 = ""; 
	}
	if($periode2 !==''){
		$periodeke2 = tanggal_indo($periode2); 
	}else {
		$periodeke2 ="";
	}
	if($periodeke2 !==""){
		$periodecetak = "Periode : ".$periodeke1."s/d ".$periodeke2;
	}
	else if($periodeke1 =="") {
		$periodecetak = "Periode : ".$periodeke2;
	}else {
		$periodecetak = "Periode : ".$periodeke1;
	}
	
	?>
	<h5 class="main_title_1"><?php echo $periodecetak;?></h5>
	<br>
	<table id="datatable" class="mb-0 table table-bordered table-striped">
		<thead>
			<tr>
				<th>Layanan</th>
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