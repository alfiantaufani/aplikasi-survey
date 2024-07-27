<?php
	date_default_timezone_set("Asia/Jakarta");
    
    $controller = $this->router->fetch_class();
    $method = $this->router->fetch_method();
    
    foreach ($data as $r) {
        $id_identitas 			= $r->id;
		$nama_instansi 			= $r->nama_instansi;
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
<html lang="en" id="fullscreen">

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

<script src="<?php echo base_url()?>assets/js/chartflot/jquery.flot.js"></script>
<script src="<?php echo base_url()?>assets/js/chartflot/jquery.flot.js"></script>
<script src="<?php echo base_url()?>assets/js/chartflot/jquery.flot.tooltip.min.js"></script>
<script src="<?php echo base_url()?>assets/js/chartflot/jquery.flot.resize.js"></script>
<script src="<?php echo base_url()?>assets/js/chartflot/jquery.flot.pie.js"></script>
<script src="<?php echo base_url()?>assets/js/chartflot/jquery.flot.time.js"></script>
<script src="<?php echo base_url()?>assets/js/chartflot/jquery.flot.axislabels.js"></script>
<script src="https://unpkg.com/bootstrap-datepicker@1.9.0/dist/js/bootstrap-datepicker.min.js"></script>


<style>
	.form-control {
	    height: auto !important;
	}
	.btn {
	    padding: .1rem .75rem;
	}
	header {
		height: 90px !important;
	}
</style>
</head>

<body class="style_2">
	<header>
		<div class="container-fluid">
	        <div class="row">
	        	<div class="col-12 text-end">
	        		<p>
						<span id="menghilang">
							<a href="<?php echo base_url()?>home" class="btn btn-outline-light <?php if($controller =='home' ) echo 'active'?>">Survei</a>
							<a href="<?php echo base_url()?>laporan" class="btn btn-outline-light <?php if($controller =='laporan' ) echo 'active'?>">Cetak laporan</a>
							<a href="<?php echo base_url()?>setting" class="btn btn-outline-light <?php if($controller =='setting' ) echo 'active'?>">Set Layanan</a>
						</span>
						<button onclick="openFullscreen()" class="btn btn-outline-light" id="name">Full Screen</button>
	        		</p>
	            </div>
	        </div>
	        <!-- /row -->
	    </div>
	</header>
	<div class="wrapper_centering">
	    <div class="container_centering">
	        <div class="container">
	            <div class="row justify-content-between">
	                <div class="col-xl-4 col-lg-4 d-flex">
	                    <div class="main_title_1">
	                    	<center class="add_bottom_45">
	                    		<a href="<?php echo base_url()?>"><img src="<?php echo base_url()?>assets/img/<?php echo $logohp?>" alt="" width="100"></a>
	                    	</center>
	                    	<center class="add_bottom_25">
		                        <h3>
									<!-- <img src="<?php echo base_url()?>assets/img/main_icon_1.svg" width="80" height="80" alt="">  -->
									Survei Kepuasan Pelanggan
								</h3>
	                    	</center>
	                    	<p>Guna meningkatkan mutu layanan dan kualitas kerja yang lebih baik di masa yang akan datang, kami sangat berterima kasih apabila Anda berpartisipasi dan berkenan meluangkan waktu untuk mengisi Survey Indeks Kepuasan Masyarakat terkait Pelayanan Publik</p>
	                    	<p><em>- <?php echo $nama_instansi?></em></p>
	                    </div>
	                </div>
	                <!-- /col -->
	                <div class="col-xl-8 col-lg-8">
	                    <div id="wizard_container">
	                        <!-- /top-wizard -->
	                        <form id="wrapped" method="POST" autocomplete="off">
	                            <div id="middle-wizard">
  	                                <div class="step">
										<div class="container">
											<h3 class="main_question">Silahkan memilih Penilaian untuk Layanan Kami!</h3>
										</div>
										<nav class="add_bottom_25">
											<div class="nav nav-tabs" id="nav-tab" role="tablist">
												<?php
												$i=1;
												foreach ($layanan as $row) {
													if($i ==1){
														$active = "active";
													}else{
														$active = "";
													}
													echo '<a class="nav-link '.$active.'" id="'.str_replace(" ","",strtolower($row->nama_layanan)).'_tab" data-bs-toggle="tab" href="#'.str_replace(" ","",strtolower($row->nama_layanan)).'" role="tab" aria-controls="'.str_replace(" ","",strtolower($row->nama_layanan)).'" aria-selected="true">'.ucwords(strtolower($row->nama_layanan)).'</a>';
													
													$i++;
												}
												?>
											</div>
										</nav>
										<div class="tab-content" id="nav-tabContent">
											<?php
												$i=1;
												foreach ($layanan as $row) {
													if($i ==1){
														$active = "active";
													}else{
														$active = "";
													}
											?>
												<div class="tab-pane fade show <?php echo $active?>"  id="<?php echo str_replace(" ","",strtolower($row->nama_layanan))?>"  role="tabpanel" aria-labelledby="<?php echo str_replace(" ","",strtolower($row->nama_layanan))?>">
													<div class="review_block_smiles add_bottom_25">
														<h3 class="main_question"><?php echo ucwords(strtolower($row->nama_layanan))?></h3>
					                                    <ul class="clearfix animated fadeInLeft">
					                                    	<li>
					                                    	 	<div class="container_smile text-center">
					                                                <a href="#" onclick="vote(<?php echo $row->id?>,4)">
					                                                	<img src="<?php echo base_url();?>assets/img/4sad.png" class="img-thumb" alt="">
					                                                	<br/>
					                                                	<small>
					                                                		<span id='prosen_<?php echo str_replace(" ","",strtolower($row->nama_layanan))?>_4'></span><span>%</span>
					                                                		<span style='display:inline-block'>Tidak Puas</span>
					                                                	</small>
					                                                </a>
					                                            </div>
					                                    	</li>
					                                    	<li>
					                                            <div class="container_smile text-center">
					                                            	<a href="#" onclick="vote(<?php echo $row->id?>,3)">
					                                            		<img src="<?php echo base_url();?>assets/img/3fair.png" class="img-thumb" alt="">
					                                                	<br/>
					                                            		<small>
					                                                		<span id='prosen_<?php echo str_replace(" ","",strtolower($row->nama_layanan))?>_3'></span><span>%</span>
					                                                		<span style='display:inline-block'>Cukup</span>
					                                                	</small>
					                                            	</a>
					                                            </div>
					                                        </li>
					                                        <li>
					                                            <div class="container_smile text-center">
					                                                <a href="#" onclick="vote(<?php echo $row->id?>,2)">
					                                                	<img src="<?php echo base_url();?>assets/img/2happy.png" class="img-thumb" alt="">
					                                                	<br/>
					                                                	<small>
					                                                		<span id='prosen_<?php echo str_replace(" ","",strtolower($row->nama_layanan))?>_2'></span><span>%</span>
					                                                		<span style='display:inline-block'>Puas</span>
					                                                	</small>
					                                                </a>
					                                            </div>
					                                        </li>
					                                        <li>
					                                    		<div class="container_smile text-center">
					                                                <a href="#" onclick="vote(<?php echo $row->id?>,1)">
					                                                	<img class="img-thumb" src="<?php echo base_url();?>assets/img/1super.png"  alt="">
					                                                	<br/>
					                                                	<small>
					                                                		<span id='prosen_<?php echo str_replace(" ","",strtolower($row->nama_layanan))?>_1'></span><span>%</span>
					                                                		<span style='display:inline-block'>Sangat Puas</span>
					                                                	</small>
					                                                </a>
					                                            </div>
					                                    	</li>
					                                    </ul>
					                                </div>
					                                <div class="wrapper wrapper-content animated fadeInRight">
					                                	<div class="row">
					                                		<div class="col-lg-12 bgnya">
					                                			<div class="flot-chart">
					                                				<div class="flot-chart-content" id="flot-bar-chart_<?php echo str_replace(" ","",strtolower($row->nama_layanan))?>"></div>
					                                			</div>
					                                			
					                                		</div>
					                                	</div>
					                                </div>
					                            </div>
											<?php
											$i++;
												}
											?>
										</div>
	                                <!-- /step 1-->    
	                            	</div>
	                            </div>
	                            <!-- /middle-wizard -->
	                        </form>
	                    </div>
	                    <!-- /Wizard container -->
	                </div>
	                <!-- /col -->
	            </div>
	        </div>
	        <!-- /row -->
	    </div>
	    <!-- /container_centering -->
	    <!-- /footer -->
	</div>
	<!-- /wrapper_centering -->
	<div class="modal fade" id="modal-hasilvote" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Terima Kasih</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					Terimakasih sudah memberikan penilaian kepada pelayanan kami. <br><br>Penilaian anda akan kami gunakan sebagai tolok ukur perbaikan pelayanan kami kedepannya 
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-outline-primary btn-lg btn-block" data-bs-dismiss="modal">TUTUP</button>
				</div>
			</div>
		</div>
	</div>
	
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
	$('a[data-bs-toggle="tab"]').on('shown.bs.tab', function (e) {
		var target = $(e.target).attr("href") // activated tab
		<?php 
			foreach ($layanan as $row):
		?>
			if(target =="#<?php echo str_replace(" ","",strtolower($row->nama_layanan))?>") {
				prosen(<?php echo $row->id?>);
			}
			prosen(<?php echo $row->id?>);
		<?php endforeach;?>
	});
	<?php 
	foreach ($layanan as $row):
	?>
	prosen(<?php echo $row->id?>);
	<?php endforeach;?>
	
		function prosen(id_layanan){
			$.ajax({
				url: "<?php echo base_url()?>home/total_prosen",
				type: "POST",
				dataType:'json',
				data:{id_layanan:id_layanan},
				cache: false,
				success: function(datajson){

					$('#prosen_'+datajson.nama_layanan+'_4').html(datajson.prosen_kurang);
					$('#prosen_'+datajson.nama_layanan+'_3').html(datajson.prosen_cukup);
					$('#prosen_'+datajson.nama_layanan+'_2').html(datajson.prosen_puas);
					$('#prosen_'+datajson.nama_layanan+'_1').html(datajson.prosen_sangat_puas);
					
					var barData = {
				        label: "bar",
				        data: [
				            [1, datajson.prosen_kurang],
				            [2, datajson.prosen_cukup],
				            [3, datajson.prosen_puas],
				            [4, datajson.prosen_sangat_puas]
				        ]
				    };
				    $.plot($("#flot-bar-chart_"+datajson.nama_layanan), [barData], barOptions);
				}
			});
		}
	
	var barOptions = {
		series: {
			bars: {
				align: "center",
				show: true,
				barWidth: 0.8,
				fill: true,
				fillColor: {
					colors: [{
						opacity: 0.8
					}, {
						opacity: 0.8
					}]
				}
			}
		},
		
		xaxis: {
			ticks: [[0,'Index'],[1,'Kecewa'],[2,'Cukup'],[3,'Puas'],[4,'Sangat Puas']]
		},
		colors: ["#fff"],
		valueLabels:
		{
			show: true,
			showTextLabel: true,
			yoffset: 1,
			align: 'right'
		},
		grid: {
			color: "#999999",
			hoverable: true,
			clickable: true,
			tickColor: "#D4D4D4",
			borderWidth:0
		},
		legend: {
			show: false
		},
		tooltip: false,
		tooltipOpts: {
			content: "x: %x, y: %y"
		},
		axisLabels: {
            show: true
        },
        yaxes: [{
            position: 'left',
            axisLabel: 'Voters %',
        }]
	};

	function vote(layanan,kepuasan){
		$.ajax({
			url: "<?php echo base_url()?>home/vote",
			type: "POST",
			dataType:'json',
			cache: false,
			data: {layanan:layanan,kepuasan:kepuasan},
			success: function(datajson){
				<?php 
					foreach ($layanan as $row):
				?>
					prosen(<?php echo $row->id?>);
				<?php endforeach;?>
				// $('#modal-hasilvote').modal('show');
				hasilvote();
			}
		});
	}
	
	$('a[data-toggle="tab"]').on('hide.bs.tab', function (e) {
		var $old_tab = $($(e.target).attr("href"));
		var $new_tab = $($(e.relatedTarget).attr("href"));

		if($new_tab.index() < $old_tab.index()){
			$old_tab.css('position', 'relative').css("right", "0").show();
			$old_tab.animate({"right":"-100%"}, 300, function () {
				$old_tab.css("right", 0).removeAttr("style");
			});
		}
		else {
			$old_tab.css('position', 'relative').css("left", "0").show();
			$old_tab.animate({"left":"-100%"}, 300, function () {
				$old_tab.css("left", 0).removeAttr("style");
			});
		}
	});

	$('a[data-toggle="tab"]').on('show.bs.tab', function (e) {
		var $new_tab = $($(e.target).attr("href"));
		var $old_tab = $($(e.relatedTarget).attr("href"));

		if($new_tab.index() > $old_tab.index()){
			$new_tab.css('position', 'relative').css("right", "-2500px");
			$new_tab.animate({"right":"0"}, 500);
		}
		else {
			$new_tab.css('position', 'relative').css("left", "-2500px");
			$new_tab.animate({"left":"0"}, 500);
		}
	});

	var isFullscreen = false;
	var elem = document.getElementById("fullscreen");
	function openFullscreen() {
		if (isFullscreen == false) {
			isFullscreen = true;
			$("#menghilang").hide();
			$("#name").text("Exit Full Screen");
			
			if (elem.requestFullscreen) {
				elem.requestFullscreen();
			} else if (elem.webkitRequestFullscreen) { /* Safari */
				elem.webkitRequestFullscreen();
			} else if (elem.msRequestFullscreen) { /* IE11 */
				elem.msRequestFullscreen();
			}
		}else {
			isFullscreen = false;
			$("#menghilang").show();
			$("#name").text("Full Screen");
			if (document.exitFullscreen) {
				document.exitFullscreen();
			} else if (document.webkitExitFullscreen) { /* Safari */
				document.webkitExitFullscreen();
			} else if (document.msExitFullscreen) { /* IE11 */
				document.msExitFullscreen();
			}
		}
	}

	function hasilvote() {
		Swal.fire({
			title: "Terima Kasih",
			text: "Penilaian anda akan kami gunakan sebagai tolok ukur perbaikan pelayanan kami kedepannya",
			icon: "success",
			confirmButtonText: "TUTUP",
		});
		document.body.classList.remove('swal2-height-auto');
	}
</script>


</body>
</html>
