<br>
<?php
// error_reporting(0);
$obj_pelanggan = new DataPelanggan();
$data_pelanggan = $obj_pelanggan->dataPelanggan();
$model_kartu = new DataKartu();
$idedit = $_REQUEST['idedit'];
$pelanggan = $obj_pelanggan->getPelanggan($idedit);

?>
<form action="controllers/pelanggan_controllers.php" method="POST">
    <div class="form-group ">
		<div class="form-group row">
			<label for="text1" class="col-4 col-form-label mb-2">Kode</label>
			<div class="col-8">
			<input id="kodePelanggan" name="kodePelanggan" type="text" class="form-control mb-2" value="<?= $pelanggan['kode']?>">
			</div>
		</div>
		<div class="form-group row">
			<label for="text" class="col-4 col-form-label mb-2">Nama</label> 
			<div class="col-8">
			<input id="namaPelanggan" name="namaPelanggan" type="text" class="form-control mb-2" value="<?= $pelanggan['nama']?>">
			</div>
		</div>
		<div class="form-group row">
			<label for="text2" class="col-4 col-form-label mb-2">Jenis Kelamin</label> 
			<div class="col-8">
			<select name="jenisKelamin" id="jenisKelamin" class="form-control mb-2">
				<option value="<?=$pelanggan['jk']?>" disabled selected>Pilih Jenis Kelamin</option>
				<option value="L">Laki-Laki</option>
				<option value="P">Perempuan</option>
			</select>
			</div>
		</div>
		<div class="form-group row">
			<label for="text3" class="col-4 col-form-label mb-2">Tempat lahir</label> 
			<div class="col-8">
			<input id="tempatLahir" name="tempatLahir" type="text" class="form-control mb-2" value="<?= $pelanggan['tmp_lahir']?>">
			</div>
		</div>
		<div class="form-group row">
			<label for="text4" class="col-4 col-form-label mb-2">Tanggal Lahir</label> 
			<div class="col-8">
			<input value="<?=$pelanggan['tgl_lahir']?>" type="text" name="tanggalLahir" id="tanggalLahir" class="form-control mb-2" placeholder="Tanggal Lahir" onfocus="(this.type='date')"/>
			</div>
		</div>
		<div class="form-group row">
			<label for="text5" class="col-4 col-form-label mb-2">Email</label> 
			<div class="col-8">
			<input type="email" name="emailPelanggan" id="emailPelanggan" value="<?=$pelanggan['email']?>" placeholder="Email" class="form-control mb-1">
			</div>
		</div>
		<div class="form-group row">
			<label for="text6" class="col-4 col-form-label">Jenis Kartu</label> 
			<div class="col-8">
			<select name="jenisKartu" id="jenisKartu" class="form-control">
                        <option value="" disabled selected>Pilih Kartu Membership</option>
                        <?php 
                        $data_kartu = $model_kartu->dataKartu();
                        foreach($data_kartu as $kartu ){
                            echo '<option value="'.$kartu['id'].'">'.$kartu['nama'].'</option>';
                        }
                        ?>
			</select>
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