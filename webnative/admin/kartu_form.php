<br>
<?php
// error_reporting(0);
$obj_kartu = new DataKartu();
$data_kartu = $obj_kartu->dataKartu();
$idedit = $_REQUEST['idedit'];
$kartu = !empty($idedit) ? $obj_kartu->getKartu($idedit) : array() ;

?>
<form action="controllers/kartumember_controllers.php" method="POST">
    <div class="form-group ">
        <div class="form-group row">
            <label for="text1" class="col-4 col-form-label">Kode Kartu</label>
            <div class="col-8">
            <input id="kode" name="kode" type="text" class="form-control" value="<?= $kartu['kode']?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="text" class="col-4 col-form-label">Nama Kartu</label> 
            <div class="col-8">
            <input id="nama" name="nama" type="text" class="form-control" value="<?= $kartu['nama']?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="text2" class="col-4 col-form-label">Diskon</label> 
            <div class="col-8">
            <input id="diskon" name="diskon" type="number" step="0.0001" class="form-control" value="<?= $kartu['diskon']?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="text3" class="col-4 col-form-label">Iuran</label> 
            <div class="col-8">
            <input id="iuran" name="iuran" type="Number" class="form-control" value="<?= $kartu['iuran']?>">
            </div>
        </div>
        <div class="form-group row">
            <div class="offset-4 col-8">
            <?php

            if(empty($idedit)){

            ?>
            <button name="proses" type="submit" value="setKartu" class="btn btn-primary mt-2">Submit</button>
            <?php
            }
            else {
                ?>
                <button name="proses" type="submit" value="updateKartu" class="btn btn-primary mt-2">Update</button>
                <input type="hidden" name="idp" value="<?= $idedit ?>">
                <?php
            }
            ?>
            <button name="proses" type="submit" value="batal" class="btn btn-primary mt-2">Cancel</button>
            </div>
        </div>
    </div>
</form>