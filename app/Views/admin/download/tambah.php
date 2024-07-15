<form action="<?php echo base_url('admin/download/tambah') ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
<?php 
echo csrf_field(); 
?>

<div class="form-group row">
	<label class="col-md-2">Nama Kegiatan</label>
	<div class="col-md-10">
		<input type="text" name="nama_kegiatan" class="form-control" value="<?php echo set_value('nama_kegiatan') ?>" required>
	</div>
</div>
<div class="form-group row">
	<label class="col-md-2">Tempat</label>
	<div class="col-md-10">
		<input type="text" name="tempat" class="form-control" value="<?php echo set_value('tempat') ?>" required>
	</div>
</div>
<div class="form-group row">
	<label class="col-md-2">Pelaksana</label>
	<div class="col-md-10">
		<input type="text" name="pelaksana" class="form-control" value="<?php echo set_value('pelaksana') ?>" required>
	</div>
</div>

<div class="form-group row">
    <label class="col-md-2">Tanggal</label>
    <div class="col-md-10">
        <input type="datetime-local" name="tanggal" class="form-control" value="<?php echo set_value('tanggal') ?>" required>
    </div>
</div>

<div class="form-group row">
	<label class="col-md-2">Upload File</label>
	<div class="col-md-10">
		<input type="file" name="gambar" class="form-control" value="<?php echo set_value('gambar') ?>" required>
	</div>
</div>

<div class="form-group row">
    <label class="col-md-2 text-right"></label>
    <div class="col-md-10 text-left">
        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
		<a href="<?php echo base_url('admin/download') ?>"><button type="button" class="btn btn-secondary"><i class="fa fa-arrow-left"></i> Kembali</button></a>
    </div>
</div>



<?php echo form_close(); ?>