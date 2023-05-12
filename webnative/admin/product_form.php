<br>
<?php
// error_reporting(0);
$obj_produk = new Produk();
$data_produk = $obj_produk->dataProduk();
$idedit = $_REQUEST['idedit'];
$prod = $obj_produk->getProduk($idedit);

?>
<form action="controllers/produk_controllers.php" method="POST">
    <div class="form-group ">
        <div class="form-group row">
            <label for="text1" class="col-4 col-form-label">Kode</label>
            <div class="col-8">
            <input id="kodeProduk" name="kodeProduk" type="text" class="form-control" value="<?= $prod['kode']?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="text" class="col-4 col-form-label">Nama</label> 
            <div class="col-8">
            <input id="namaProduk" name="namaProduk" type="text" class="form-control" value="<?= $prod['nama']?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="text2" class="col-4 col-form-label">Harga Beli</label> 
            <div class="col-8">
            <input id="hargaBeli" name="hargaBeli" type="text" class="form-control" value="<?= $prod['harga_beli']?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="text3" class="col-4 col-form-label">Harga Jual</label> 
            <div class="col-8">
            <input id="hargaJual" name="hargaJual" type="text" class="form-control" value="<?= $prod['harga_jual']?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="text4" class="col-4 col-form-label">Stok</label> 
            <div class="col-8">
            <input id="stok" name="stok" type="text" class="form-control" value="<?= $prod['stok']?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="text5" class="col-4 col-form-label">Minimal Stok</label> 
            <div class="col-8">
            <input id="minStok" name="minStok" type="text" class="form-control" value="<?= $prod['min_stok']?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="text6" class="col-4 col-form-label">Jenis Produk</label> 
            <div class="col-8">
            <input id="jenisProduk" name="jenisProduk" type="text" class="form-control" value="<?= $prod['jenis_produk_id']?>">
            </div>
        </div> 
        <div class="form-group row">
            <div class="offset-4 col-8">
            <?php

            if(empty($idedit)){
                echo $prod = "Data tidak ditemukan, Silahkan isi data terlebih dahulu!";
            ?>
            <?php
            }
            else {
                ?>
                <button name="proses" type="submit" value="updateProduk" class="btn btn-primary mt-2">Update</button>
                <input type="hidden" name="idp" value="<?= $idedit ?>">
                <?php
            }
            ?>
            <button name="proses" type="submit" value="batal" class="btn btn-primary mt-2">Cancel</button>
            </div>
        </div>
    </div>
    </form>