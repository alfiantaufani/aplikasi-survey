		<table id="datatable" class="mb-0 table table-bordered table-striped">
		<thead>
			<tr>
				<th class="text-center">No</th>
				<th class="text-center">Nama Layanan</th>
				<th class="text-center">Action</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$i=1;
				foreach ($data as $r) {
					
			?>
			<tr>
				<td class='text-center'><?php echo $i;?></td>
				<td nowrap><?php echo $r->nama_layanan;?></td>
				<td class='text-center' nowrap>
					<a href='#' data-id="<?php echo $r->id; ?>" data-nama_layanan="<?php echo $r->nama_layanan ?>" class="btn btn-outline-light btn-icon btn-ubah" >
						<div><i class="fa fa-edit"></i></div>
					</a>
					<a href='#' data-id="<?php echo $r->id; ?>"  class="btn btn-outline-light btn-icon btn-hapus"  onclick="hapus_layanan(<?php echo $r->id; ?>)">
						<div><i class="fa fa-trash"></i></div> 
					</a>  
				</td>
			</tr>

			<?php
			$i++;
			} 
			?>
		</tbody>
		
	</table>