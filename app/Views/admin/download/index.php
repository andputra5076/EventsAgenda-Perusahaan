<p>
	<a href="<?php echo base_url('admin/download/tambah') ?>" class="btn btn-success">
		<i class="fa fa-plus"></i> Tambah Baru
	</a>
</p>

<table class="table table-bordered" id="example1">
	<thead>
		<tr>
			<th width="5%">No</th>
			<th width="15%">Tanggal</th>
			<th width="10%">Waktu</th>
			<th width="35%">Kegiatan</th>
			<th width="15%">Tempat</th>
			<th width="10%">Pelaksana</th>
			<th width="10%">Action</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$hari = array(
			'Sunday' => 'Minggu',
			'Monday' => 'Senin',
			'Tuesday' => 'Selasa',
			'Wednesday' => 'Rabu',
			'Thursday' => 'Kamis',
			'Friday' => 'Jumat',
			'Saturday' => 'Sabtu'
		);
		?>
		<?php $no = 1;
		foreach ($download as $data) { ?>
			<tr>
				<td><?php echo $no ?></td>
				<td><?php
					$tanggal = $data['tanggal']; // Tanggal contoh

					// Ubah format tanggal menjadi nama hari dalam bahasa Indonesia
					$nama_hari = date('l', strtotime($tanggal)); // 'l' akan mengembalikan nama hari dalam bahasa Inggris

					// Menggunakan array yang telah dibuat sebelumnya
					$nama_hari_indonesia = $hari[$nama_hari];

					echo $nama_hari_indonesia.', '.date('d-m-Y', strtotime($data['tanggal'])); // Output: Minggu
					?>
				</td>
				<td><?php echo date('H:i', strtotime($data['tanggal'])) ?> WIB</td>
				<td><?php echo $data['nama_kegiatan'] ?></td>
				<td><?php echo $data['tempat'] ?></td>
				<td><?php echo $data['pelaksana'] ?></td>
				<td>
					<a href="<?php echo base_url('admin/download/edit/' . $data['id_download']) ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
					<a href="<?php echo base_url('admin/download/delete/' . $data['id_download']) ?>" class="btn btn-dark btn-sm" onclick="confirmation(event)"><i class="fa fa-trash"></i></a>
				</td>
			</tr>
		<?php $no++;
		} ?>
	</tbody>
</table>