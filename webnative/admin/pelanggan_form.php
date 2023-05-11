<br>
<?php
// error_reporting(0);
$obj_pelanggan = new DataPelanggan();
$data_pelanggan = $obj_pelanggan->dataPelanggan();
$idedit = $_REQUEST['idedit'];
$pelanggan = !empty($idedit) ? $obj_pelanggan->getPelanggan($idedit) : array() ;

?>
<form action="controllers/pelanggan_controllers.php" method="POST">
    <div class="form-group ">
		<div class="form-group row">
			<label for="text1" class="col-4 col-form-label">Kode</label>
			<div class="col-8">
			<input id="kodePelanggan" name="kodePelanggan" type="text" class="form-control" value="<?= $pelanggan['kode']?>">
			</div>
		</div>
		<div class="form-group row">
			<label for="text" class="col-4 col-form-label">Nama</label> 
			<div class="col-8">
			<input id="namaPelanggan" name="namaPelanggan" type="text" class="form-control" value="<?= $pelanggan['nama']?>">
			</div>
		</div>
		<div class="form-group row">
			<label for="text2" class="col-4 col-form-label">Jenis Kelamin</label> 
			<div class="col-8">
			<select name="jk" id="jk" class="form-control mb-3">
				<option value="<?=$pelanggan['jk']?>" disabled selected>Pilih Jenis Kelamin</option>
				<option value="L">Laki-Laki</option>
				<option value="P">Perempuan</option>
			</select>
			</div>
		</div>
		<div class="form-group row">
			<label for="text3" class="col-4 col-form-label">Tempat lahir</label> 
			<div class="col-8">
			<input id="tmp_lahir" name="tmp_lahir" type="text" class="form-control" value="<?= $pelanggan['tmp_lahir']?>">
			</div>
		</div>
		<div class="form-group row">
			<label for="text4" class="col-4 col-form-label">Tanggal Lahir</label> 
			<div class="col-8">
			<input value="<?=$pelanggan['tgl_lahir']?>" type="text" name="tgl_lahir" id="tgl_lahir" class="form-control mb-3" placeholder="Tanggal Lahir" onfocus="(this.type='date')"/>
			</div>
		</div>
		<div class="form-group row">
			<label for="text5" class="col-4 col-form-label">Email</label> 
			<div class="col-8">
			<input type="email" name="emailPelanggan" id="emailPelanggan" value="<?=$pelanggan['email']?>" placeholder="Email" class="form-control mb-3">
			</div>
		</div>
		<div class="form-group row">
			<label for="text6" class="col-4 col-form-label">Jenis Kartu</label> 
			<div class="col-8">
			<input id="kartu_id" name="kartu_id" type="text" class="form-control" value="<?= $pelanggan['kartu_id']?>">
			</div>
		</div> 
		<div class="form-group row">
			<div class="offset-4 col-8">
			<?php

			if(empty($idedit)){

			?>
			<button name="proses" type="submit" value="setPelanggan" class="btn btn-primary mt-2">Submit</button>
			<?php
			}
			else {
				?>
				<button name="proses" type="submit" value="updatePelanggan" class="btn btn-primary mt-2">Update</button>
				<input type="hidden" name="idp" value="<?= $idedit ?>">
				<?php
			}
			?>
			<button name="proses" type="submit" value="batal" class="btn btn-primary mt-2">Cancel</button>
			</div>
		</div>
    </div>
    </form>