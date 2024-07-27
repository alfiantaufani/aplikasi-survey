<?php
	date_default_timezone_set("Asia/Jakarta");

	$controller = $this->router->fetch_class();
    $method = $this->router->fetch_method();
	foreach ($data as $r) {
		$id_instansi 			= $r->id;
		$nama_instansi 			= $r->nama_instansi;
		$alamat 				= $r->alamat;
		$email 					= $r->email;
		$website 				= $r->website;
		$kode_pos 				= $r->kode_pos;
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
<meta name="description" content="Survei Index Kepuasan Masyarakat <?php echo $nama_instansi?> MajaCode.">
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
	.wrapper_centering {
		overflow-y: auto;
	}
	.container_centering{
		vertical-align: top !important;
	}
	table td,th {
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

	#drop-box{  
	    border: 10px solid rgb(14, 56, 119);  
	    cursor: pointer;
	    position: relative;
	    text-align: center;
	    width: 100%;
	    background-color: rgb(14, 56, 119);
	    z-index: 1;
	}

	#drop-box p{
	    width: 90%;
	    display: block;
	    color: #fff;
	    margin: 3.3rem auto;
	}

	#drop-box:before {
	  content: " ";
	  position: absolute;
	  z-index: 2;
	  top: 1px;
	  left: 1px;
	  right: 1px;
	  bottom: 1px;
	  border: 1px dashed rgb(255,255,255); 
	}

	#drop-box2{  
	    border: 10px solid rgb(121, 122, 123);  
	    cursor: pointer;
	    position: relative;
	    text-align: center;
	    width: 100%;
	    background-color: rgb(121, 122, 123);
	    z-index: 1;
	}
	#drop-box2 p{
	    width: 90%;
	    display: block;
	    color: #000;
	    margin: 3.3rem auto;
	}
	#drop-box2:before {
	  content: " ";
	  position: absolute;
	  z-index: 2;
	  top: 1px;
	  left: 1px;
	  right: 1px;
	  bottom: 1px;
	  border: 1px dashed rgb(12, 12, 12); 
	}

	#upl{
	    display: none;
	}
	
</style>
</head>

<body class="style_2">
	<header style="background-color: #00000026;">
		<div class="container-fluid">
	        <div class="row">
	        	<div class="col-12 d-flex">
	            	<a href="<?php echo base_url();?>">
	            		<img src="<?php echo base_url()?>assets/img/<?php echo $logohp?>" alt="" style="margin:3px" width="70" height="55">
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
	        	<div class="row justify-content-between">
	        		<div class="col-xl-12 col-lg-12">
	                    <div id="wizard_container">
	                        <!-- /top-wizard -->
	                        <form id="wrapped" method="POST" autocomplete="off">
	                            <!-- Leave for security protection, read docs for details -->
	                            <div id="middle-wizard">
  	                                <div class="step">
										<div class="container">
											<h3 class="main_question"></h3>
										</div>
										<h3 class="main_question">Pengaturan Aplikasi</h3>

										<nav class="add_bottom_25">
											<div class="nav nav-tabs" id="nav-tab" role="tablist">
												<a class="nav-link active" id="instansi_tab" data-bs-toggle="tab" href="#instansi" role="tab" aria-controls="instansi" aria-selected="true">Instansi</a>
												<a class="nav-link" id="layanan_tab" data-bs-toggle="tab" href="#layanan" role="tab" aria-controls="layanan" aria-selected="true">Layanan</a>
											</div>
										</nav>
										<div class="tab-content" id="nav-tabContent">
											<div class="tab-pane fade show active"  id="instansi"  role="tabpanel" aria-labelledby="instansi">
				                                <div class="wrapper wrapper-content animated fadeInRight p-1">
				                                	 <div id="pesan-sukses" class="alert alert-success" hidden></div>
				                                	 <div id="pesan-error" class="alert alert-danger" hidden></div>
				                                	 
				                                	 <div class="row mb-4 m-1">
				                                	 	<div class="col-lg-12">
				                                			<form class="form-horizontal" id="form_identitas" role="form" >
													            <div class="row">
													                <div class="col-md-9 col-xs-12">
													                	<div class="row">
													                		<div class="col-md-6 ">
													                			<div id="pesan-sukses" class="alert alert-success" hidden></div>
													                            <div id="pesan-error" class="alert alert-danger" hidden></div>
													                            <div class="form-group">
													                                <label class="col-sm-12 control-label">Nama Instansi</label>
													                                <div class="col-sm-12 col-xs-12">
													                                    <input type="text" class="form-control" id="nama_instansi" name="nama_instansi"  value="<?php echo $nama_instansi;?>"/> 
													                                    <input type="hidden" class="form-control" id="id_instansi" name="id_instansi"  value="<?php echo $id_instansi;?>"/>
													                                </div>
													                            </div> 
													                            <div class="form-group">
													                                <label class="col-sm-12 control-label">Alamat</label>
													                                <div class="col-sm-12 col-xs-12">
													                                <textarea type="text" class="form-control" id="alamat" name="alamat" rows="4" cols="50" ><?php echo $alamat;?></textarea> 
													                                </div>
													                            </div>                   
													                            <div class="form-group">
													                                <label class="col-sm-12 control-label">Email</label>
													                                <div class="col-sm-12 col-xs-12">
													                                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $email?>" /> 
													                                </div>
													                            </div>
													                             <div class="form-group">
													                                <label class="col-sm-12 control-label">web</label>
													                                <div class="col-sm-12 col-xs-12">
													                                    <input type="text" class="form-control" id="website_instansi" name="website_instansi" value="<?php echo $website?>" /> 
													                                </div>
													                            </div>
													                            <div class="form-group">
													                                <label class="col-sm-12 control-label">Kode Pos</label>
													                                <div class="col-sm-12 col-xs-12">
													                                    <input type="number" class="form-control" id="kode_pos" name="kode_pos" value="<?php echo $kode_pos;?>" /> 
													                                </div>
													                            </div>
													                        </div>
													                        <div class="col-md-6">
													                            <div class="form-group">
													                                <label class="col-sm-12 control-label">Telp</label>
													                                <div class="col-sm-12 col-xs-12">
													                                    <input type="text" class="form-control" id="telp" name="telp" value="<?php echo $telp;?>" /> 
													                                </div>
													                            </div>
													                            <div class="form-group">
													                                <label class="col-sm-12 control-label">Fax</label>
													                                <div class="col-sm-12 col-xs-12">
													                                    <input type="text" class="form-control" id="fax" name="fax" value="<?php echo $fax;?>" /> 
													                                </div>
													                            </div>
													                            <div class="form-group">
													                                <label class="col-sm-12 control-label">Google Maps</label>
													                                <div class="col-sm-12 col-xs-12">
													                                    <input type="text" class="form-control" id="link_maps" name="link_maps" value="<?php echo $link_maps;?>" /> 
													                                </div>
													                            </div>
													                            <div class="form-group">
													                                <label class="col-sm-12 control-label">Kode Instansi </label>
													                                <div class="col-sm-12 col-xs-12">
													                                    <input type="text" class="form-control" id="kode_instansi" name="kode_instansi" value="<?php echo $kode_instansi;?>" placeholder="PA.ATN" /> 
													                                </div>
													                            </div>
															                	<div class="form-group">
															                		<label class="col-sm-12 control-label">Nama Singkat </label>
															                		<div class="col-sm-12 col-xs-12">
															                			<input type="text" class="form-control" id="nama_singkat_instansi" name="nama_singkat_instansi" value="<?php echo $nama_singkat_instansi;?>" placeholder="PA Majapahit" /> 
															                		</div>
															                	</div>
															                	<div class="form-group">
															                		<label class="col-sm-12 control-label">Status</label>
															                		<div class="col-sm-12 col-xs-12">
															                			<select class='form-control' id='status' name='status'>
															                				<option value="aktif" <?php if($status == 'aktif'){ echo "seleted";}?>>Aktif</option>
															                				<option value="blok" <?php if($status == 'blok'){ echo "seleted";}?>>Non Aktif</option>
															                			</select>
															                		</div>
															                	</div>													                        
													                        </div>
													                    </div>
													                </div>
													                <div class="col-md-3 col-xs-12">
													                	<div class="form-group">
													                		<label class="col-sm-12 text-center">Logo Warna</label>
													                		<div class="col-sm-12 col-xs-12">
													                			<div class="column-small-12 padd0 align-center">
													                				<div id="drop-box" class="ambilfoto1" >
													                					<p >Pilih Image</p>
													                				</div>
													                			</div>
													                			<div class="column-small-12 padd0" >
													                				<input type="file" name="upl1" id="upl1"  hidden/>
													                			</div>
													                			<input type="hidden" class="form-control" id="nama_file1" name="nama_file1" value="<?php echo $logowarna;?>" /> 
													                		</div>        
													                	</div>
													                	<div class="form-group">
													                		<label class="col-sm-12 text-center">Logo Hitam Putih</label>
													                		<div class="col-sm-12 col-xs-12">
													                			<div class="column-small-12 padd0 align-center">
													                				<div id="drop-box2" class="ambilfoto2" >
													                					<p >Pilih Image</p>
													                				</div>
													                			</div>
													                			<div class="column-small-12 padd0" hidden>
													                				<input type="file" name="upl2" id="upl2" />
													                			</div>
													                			<input type="hidden" class="form-control" id="nama_file2" name="nama_file2" value="<?php echo $logohp;?>"  readonly/>
													                		</div>
													                	</div>
													                	<div class="form-group">
													                		<div class="col-sm-12 col-xs-12">
													                			<button type="button" class="btn btn-light col-sm-12" id="simpan_identitas" >Simpan</button>
													                		</div>		
													                	</div>		
													                </div>
													            </div>
													        </form>
				                                		</div>
				                                	</div>
				                                </div>
				                            </div>
											<div class="tab-pane fade show"  id="layanan"  role="tabpanel" aria-labelledby="layanan">
				                                <div class="wrapper wrapper-content animated fadeInRight">
				                                	<div class="col-lg-12 p-1">
				                                		<div class="row m-1">
				                                			<div class="col-lg-6">
				                                				<h5 class="main_title_1">Data Layanan </h5>
				                                			</div>
				                                			<div class="col-lg-6 text-end">
				                                				<button type="button" class="btn btn-light" id="tambah_layanan" >Tambah Layanan</button>
				                                			</div>		
					                                		<div id="input_layanan" class="animated fadeInRight">
					                                			<hr>
					                                			<div class="form-group">
					                                				<label class="control-label modal-title">Nama Layanan</label>
					                                				<div class="col-md-12">
					                                					<input type="text" class="form-control" id="nama_layanan" placeholder="Nama Layanan" aria-label="nama_layanan" aria-describedby="nama_layanan">
					                                					<input type="hidden" class="form-control" id="id_layanan" placeholder="id" aria-label="id_layanan" aria-describedby="id_layanan">
					                                				</div>
					                                			</div>
					                                			<div class="form-group row">
					                                				<div class="col-sm-12 text-end">
					                                					<button type="button" class="btn btn-dark" id="batal_layanan" >Batal</button>
					                                					<button type="button" class="btn btn-primary" id="simpan_layanan" >Simpan</button>
					                                					<button type="button" class="btn btn-warning" id="ubah_layanan" >Ubah</button>
					                                				</div>
					                                			</div>
					                                			<hr>
					                                		</div>
				                                		</div>
				                                		<div id="view_layanan"></div>
															<br>
				                                		</div>
				                                	
				                                </div>
				                            </div>
										</div>
										<!-- /step 1-->
	                            	</div>
	                            </div><!-- /middle-wizard -->
	                        </form>
	                    </div><!-- /Wizard container -->
	                </div>
	                <!-- /col -->
	        	</div>
	        </div>
	    
	</div>
	
</body>
</html>


<script type="text/javascript">
	$(document).ready(function (){
		$('#input_layanan').attr('hidden',true);
		$('#ubah_layanan').attr('hidden',true);
		$(".ambilfoto1").html("<img src='<?php echo base_url();?>assets/img/<?php echo $logowarna;?>' style='width: 100px;'>");
        $(".ambilfoto2").html("<img src='<?php echo base_url();?>assets/img/<?php echo $logohp;?>' style='width: 100px;'>");
		
		$(document).on('click', '#simpan_identitas', function(e){			
			e.preventDefault();
			var id_instansi 				= $('#id_instansi').val();
			var nama_instansi 				= $('#nama_instansi').val();
			var alamat						= $('#alamat').val();
			var email						= $('#email').val();
			var website						= $('#website_instansi').val();
			var kode_pos					= $('#kode_pos').val();
			var telp						= $('#telp').val();
			var fax							= $('#fax').val();
			var link_maps					= $('#link_maps').val();
			var kode_instansi				= $('#kode_instansi').val();
			var nama_singkat_instansi 		= $('#nama_singkat_instansi').val();
			var logo_instansi_warna 		= $('#nama_file1').val();
			var logo_instansi_hitam_putih 	= $('#nama_file2').val();
			var status 						= $('#status').val();

			$.ajax({
				url: "<?php echo base_url();?>setting/ubah_identitas" , 
				type: 'POST', 
				data: {
					id_instansi:id_instansi,
					nama_instansi:nama_instansi,
					alamat:alamat,
					email:email,
					website:website,
					kode_pos:kode_pos,
					telp:telp,
					fax:fax,
					link_maps:link_maps,
					kode_instansi:kode_instansi,
					nama_singkat_instansi:nama_singkat_instansi,
					logo_instansi_warna:logo_instansi_warna,
					logo_instansi_hitam_putih:logo_instansi_hitam_putih,
					status:status
				},
				dataType: 'json',
                beforeSend: function(e) {
                    if(e && e.overrideMimeType) {
                        e.overrideMimeType('application/jsoncharset=UTF-8')
                    }
                },
				success: function(response) {
					window.location.reload(true);
				}
			});
		});
		$('#tambah_layanan').click(function(e){
			$('#input_layanan').attr('hidden',false);
			$('#simpan_layanan').attr('hidden',false);
			$('#ubah_layanan').attr('hidden',true);
		});
		$('#batal_layanan').click(function(e){
			$('#input_layanan').attr('hidden',true);
			$('#nama_layanan').val('');
			$('#id_layanan').val('');
		});
		$('#simpan_layanan').click(function(e){
			$('#input_layanan').attr('hidden',true);
			var nama_layanan = $('#nama_layanan').val();
			if(nama_layanan !=='') {
				$.ajax({
					url: "<?php echo base_url();?>setting/simpan_layanan" , 
					type: 'POST', 
					data: {nama_layanan:nama_layanan}, 
					dataType: 'json', 
					success: function(response) {
						if(response.status == 'sukses'){
							layanan();
						}else{ 
							alert("error");
						}
					}
				});
			}
		});
		

        $(".ambilfoto1").click(function(){
            $("#upl1").click();
        });
        $(".ambilfoto2").click(function(){
            $("#upl2").click();
        });

        $(document).on('drop dragover', function (e) {
            e.preventDefault();
        }); 

        $('#upl1').on('change', fileUpload1);
        $('#upl2').on('change', fileUpload2);

		function fileUpload1(event){             
			files1 = event.target.files[0];
			var data = new FormData();
			var error = 0;
			var file1 = files1;
			console.log(file1.size);
			if(!file1.type.match('image.*')) {
				$("#drop-box .ambilfoto1").html("<p> Hanya Images. Silahkan Pilih file yang lain</p>");
				error = 1;
			}else if(file1.size > 1048576){
				$("#drop-box .ambilfoto1").html("<p> File terlalu Besar. Silahkan Pilih file yang lain</p>");
				error = 1;
			}else{
				images = file1.name;
				fileimage = images.replace(new RegExp('\ '), '_');
				data.append('image', file1, fileimage);
			}
			if(!error){
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '<?php echo base_url();?>setting/upload_foto', true);
                xhr.send(data);
                xhr.onload = function () {
                    $('.loader').hide();
					if (xhr.status === 200) {
						images = file1.name;
						fileimage = images.replace(new RegExp('\ '), '_');
						$(".ambilfoto1").html("<img src=<?php echo base_url();?>assets/img/"+fileimage+" style='width: 100px;'>");
						$("#nama_file1").val(fileimage);
					} else {
						$(".ambilfoto1").html("<p> Error in upload, try again.</p>");
					}
				};
			}
		}
		function fileUpload2(event){                        
            files2 = event.target.files;
            var data2 = new FormData();
            var error = 0;
            var file2 = files2[0];
            console.log(file2.size);
            if(!file2.type.match('image.*')) {
                $(".ambilfoto2").html("<p> Hanya Images. Silahkan Pilih file yang lain</p>");
                error = 1;
            }else if(file2.size > 1048576){
                $(".ambilfoto2").html("<p> File terlalu Besar. Silahkan Pilih file yang lain</p>");
                error = 1;
            }else{
                images2 = file2.name;
                fileimage2 = images2.replace(new RegExp('\ '), '_');
                data2.append('image', file2, fileimage2);
            }
            if(!error){
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '<?php echo base_url();?>setting/upload_foto', true);
                xhr.send(data2);
                xhr.onload = function () {
                    $('.loader').hide();
                    if (xhr.status === 200) {
                        images2 = file2.name;
                        fileimage2 = images2.replace(new RegExp('\ '), '_');
                        $(".ambilfoto2").html("<img src=<?php echo base_url();?>assets/img/"+fileimage2+" style='width: 100px;'>");
                        $("#nama_file2").val(fileimage2);
                    } else {
                        $(".ambilfoto2").html("<p> Error in upload, try again.</p>");
                    }
                };
            }
        }
        $(document).on('click', '.btn-ubah', function(){
        	id=$(this).data('id');
        	layanan=$(this).data('nama_layanan');
        	$('#input_layanan').attr('hidden',false);
        	$('#ubah_layanan').attr('hidden',false);
        	$('#simpan_layanan').attr('hidden',true);


        	$('#id_layanan').val(id);
        	$('#nama_layanan').val(layanan);
        });
        $(document).on('click', '#ubah_layanan', function(e){
			$('#input_layanan').attr('hidden',true);
			var id = $('#id_layanan').val();
			var nama_layanan = $('#nama_layanan').val();
			if(nama_layanan !=='') {
				$.ajax({
					url: "<?php echo base_url();?>setting/ubah_layanan" , 
					type: 'POST', 
					data: {id:id,nama_layanan:nama_layanan}, 
					dataType: 'json', 
					success: function(response) {
						$('#simpan_layanan').attr('hidden',false);
						$('#ubah_layanan').attr('hidden',true);
						$.ajax({
							url: "<?php echo base_url()?>setting/get_data_layanan",
							type: "GET",
							dataType:'json',
							cache: false,
							success: function(data){
								$("#view_layanan").html(data.html);
							}
						});
					}
				});
			}
		});
		
	});
		
	function layanan(){
		$.ajax({
			url: "<?php echo base_url()?>setting/get_data_layanan",
			type: "GET",
			dataType:'json',
			cache: false,
			success: function(data){
				$("#view_layanan").html(data.html);
			}
		});
	}
	$('a[data-bs-toggle="tab"]').on('shown.bs.tab', function (e) {
		var target = $(e.target).attr("href") // activated tab
		if (target =="#layanan"){
			layanan();
		}
	});
	function hapus_layanan(id){
		$.ajax({
			url: "<?php echo base_url('setting/hapus_layanan');?>",
			type: 'post',
			data: {id:id},
			dataType: 'json',
			success: function(datajson){ 
				if(datajson.status == 'success') {
					layanan();
				} else {
					alert("Maaf! data gagal dihapus! ");
				}
			}
		});
	}

</script>