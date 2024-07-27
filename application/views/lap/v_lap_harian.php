<?php
	date_default_timezone_set("Asia/Jakarta");

	$controller = $this->router->fetch_class();
    $method = $this->router->fetch_method();
    
    foreach ($data as $r) {
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
?> 
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Survei IKM Pengadilan Agama Coded By Antonycandra.">
<meta name="author" content="antonycandra">
<title>Index Kepuasan Masyarakat <?php echo $nama_instansi?></title>

<!-- Favicons-->
<link rel="shortcut icon" href="<?php echo base_url()?>assets/img/favicon.ico" type="image/x-icon">
<!-- GOOGLE WEB FONT -->
<link href="https://fonts.googleapis.com/css?family=Caveat|Poppins:300,400,500,600,700&display=swap" rel="stylesheet">

 <!--Bootstrap CSS-->
 <link href="<?php echo base_url()?>assets/css/bootstrap.min.css" rel="stylesheet" >

<link href="<?php echo base_url()?>assets/css/style.css" rel="stylesheet">
<link href="<?php echo base_url()?>assets/css/vendors.css" rel="stylesheet">
<link href="<?php echo base_url()?>assets/css/animate.css" rel="stylesheet">
<link href="<?php echo base_url()?>assets/css/custom.css" rel="stylesheet">
<link href="https://pro.fontawesome.com/releases/v6.0.0-beta2/css/all.css" rel="stylesheet">
<link id="bsdp-css" href="https://unpkg.com/bootstrap-datepicker@1.9.0/dist/css/bootstrap-datepicker3.min.css" rel="stylesheet">
<!--Bootstrap Js-->
<script src="<?php echo base_url()?>assets/js/bootstrap.bundle.min.js" ></script>
<script src="<?php echo base_url()?>assets/js/jquery.min.js"></script>
<script src="https://unpkg.com/bootstrap-datepicker@1.9.0/dist/js/bootstrap-datepicker.min.js"></script>
<style>
	.container_centering{
		vertical-align: top !important;
	}
	#isi table td,th {
		color: #fff;
	}
	.dropdown-menu {
	    background-color: #a3b4e4 !important;
	}
	.form-control {
	    height: auto !important;
	}
	.btn {
	    padding: .1rem .75rem;
	}
	@media (max-width: 767px){
		.main_title_1 {
		    text-align: left;
		    font-size: 1.1rem;
		}
	}
</style>
</head>

<body class="style_2">
	<header style="background-color: #00000026;">
		<div class="container-fluid">
	        <div class="row">
	        	<div class="col-12 d-flex">
	            	<a href="<?php echo base_url();?>">
	            		<img src="<?php echo base_url()?>assets/img/<?php echo $logohp ?>" alt="" style="margin:3px" width="70" height="55">
	            	</a>
	            	<div class="col-md-6">
	            		<h3 class="main_title_1"><?php echo $nama_instansi?></h3>
	            		<p class="main_title_1" style="color:white;font-size:0.9em"><?php echo $alamat?></p>
	            	</div>
	            	<div class="col-md-5 text-end">
	    				<p >
	    					<a href="<?php echo base_url()?>home" class="btn btn-outline-light <?php if($controller =='home' ) echo 'active'?>">Survei</a>
	    					<a href="<?php echo base_url()?>laporan" class="btn btn-outline-light <?php if($controller =='laporan' ) echo 'active'?>">Cetak laporan</a>
	    					<a href="<?php echo base_url()?>setting" class="btn btn-outline-light <?php if($controller =='setting' ) echo 'active'?>">Set Layanan</a>
	    				</p>
	    			</div>
	            </div>
	        </div>
	        <!-- /row -->
	       
	    </div>
	</header>
	<!-- /header -->

	<div class="wrapper_centering">
	     <div class="container_centering">
	        <div class="container">
	        	<div class"card">
	        		<div class="card-body">
	        			<h3 class="main_title_1">Laporan Survei IKM</h3>	
	        			<div class="col-12">
	        				<div class="form-group row">
	        					<div class="col-md-2">
	        						<div class="form-group">
	        							<input type="text" class="form-control form-control-sm date-picker"  id="tgl_awal" placeholder="Tanggal" aria-label="Tanggal" aria-describedby="clearTglAwal">
	        						</div>
	        					</div>
	        					<div class="col-md-2">
	        						<div class="form-group">
	        							<input type="text" class="form-control form-control-sm date-picker"  id="tgl_akhir" placeholder="Tanggal" aria-label="Tanggal" aria-describedby="clearTglAkhir">
	        						</div>
	        					</div>
	        					<div class="col-md-2">
	        						<div class="form-group">
	        							<select class="form-control form-control-sm" id="jenis_layanan" name="jenis_layanan"></select>
	        						</div>
	        					</div>
	        					<div class="col-md-4 d-flex">
		        					<div class="col-md-3 ">
		        						<button type="button" onclick="tampilkan_filter()" class="btn-shadow btn btn-info mr-1">
		        							Filter
		        						</button>
		        					</div>
		        					<div class="col-md-3 ">
		        						<button type="button" onclick="cetak_laporan()" id="cetak_pdf" class="btn-shadow btn btn-danger mr-1">Cetak</button>
		        					</div>
	        					</div>
	        				</div>	
	        			</div>	
	        			<hr>
	        			
	        			<div class="table-responsive" id="isi">
	        				<div id="view"></div>
	        			</div>
	        		</div>
	        	</div>
	        </div>
	    </div>
	</div>
	  
</body>
</html>


<script type="text/javascript">
	$(document).ready(function () {
		$('.date-picker').datepicker({
			format: 'yyyy-mm-dd',
    		todayHighlight:'TRUE',
    		autoclose: true,
    	});
		load_jenis_layanan();
		loaddata();
		$('#cetak_form_ipk').hide();
		
    });

    function load_jenis_layanan(){
        $.ajax({
            cache: false,
            type: 'GET',
            url: "<?php echo base_url('laporan/get_jenis_layanan');?>",
            success: function(data) {
                $('#jenis_layanan').html(data);
            }
        });
    }

	function loaddata()
    {
    	var d           = new Date();
    	var month       = d.getMonth()+1;
    	var day         = d.getDate();
    	var tglsekarang = d.getFullYear() + '-' + ((''+month).length<2 ? '0' : '') + month + '-' + ((''+day).length<2 ? '0' : '') + day;
    	$('.date-picker').val(tglsekarang);

    	tgl_awal    = $('#tgl_awal').val();
    	tgl_akhir   = $('#tgl_akhir').val();
    }

    function tampilkan_filter() 
    {
		tgl_awal 		= $('#tgl_awal').val();
    	tgl_akhir 		= $('#tgl_akhir').val();
    	jenis_layanan   = $('#jenis_layanan').val();
    	nama_layanan   	= $( "#jenis_layanan option:selected" ).text();


    	$.ajax({
    		url: "<?php echo base_url();?>laporan/get_data_survei",
    		type: 'post', 
    		dataType: 'json',
    		data: {tgl_awal: tgl_awal,tgl_akhir:tgl_akhir,jenis_layanan:jenis_layanan},
    		beforeSend: function(e) {
    			if(e && e.overrideMimeType) {
    				e.overrideMimeType('application/jsoncharset=UTF-8');
    			}
    		},
    		success: function(data){
    			if(data.pesan == 'success') {
    				$("#view").html(data.html);
    			}else{
	    			$("#view").html("<p class='main_title_1'>Maaf anda belum memilih jenis layanan</p>");
	    			$("#jenis_layanan").focus();
    			} 					
    		}
    	});
    }


    function cetak_laporan(){
    	tgl_awal 		= $('#tgl_awal').val();
    	tgl_akhir 		= $('#tgl_akhir').val();
    	jenis_layanan   = $('#jenis_layanan').val();
    	nama_layanan   	= $( "#jenis_layanan option:selected" ).text();

    	if(jenis_layanan !=='') {
	    	tampilkan_filter();
	    	var url = "<?php echo base_url()?>laporan/cetak_laporan?tgl_awal="+tgl_awal+"&tgl_akhir="+tgl_akhir+"&jenis_layanan="+jenis_layanan;
	    	window.open(url, '_blank');		
    	}else{
    		$("#view").html("<p class='main_title_1'>Maaf anda belum memilih jenis layanan</p>");
    	}
    		
	}
	function beranda(){
		var url = "<?php echo base_url()?>home";
    	window.location.href=url;	
	}
</script>