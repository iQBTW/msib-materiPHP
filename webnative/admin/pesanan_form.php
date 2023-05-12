<br>
<?php
// error_reporting(0);
$obj_pesanan = new DataPesanan();
$model_data_produk = new Produk();
$data_pesanan = $obj_pesanan->dataPesanan();
$idedit = $_REQUEST['idedit'];
$pesanan = $obj_pesanan->getPesanan($idedit);

?>
<form action="controllers/pesanan_controllers.php" method="POST">
    <div class="form-group ">
        <div class="form-group row">
            <label for="text1" class="col-4 col-form-label">ID Produk</label>
            <div class="col-8">
            <select name="idProduk" id="idProduk" class="form-control mb-2">
                <option value="<?=$pesanan['produk_id']?>" disabled selected>Pilih Produk</option>
                <?php
                $data_produk = $model_data_produk->dataProduk();
                foreach($data_produk as $namaProduk) {
                    echo '<option value="'.$namaProduk['id'].'">'.$namaProduk['nama'].'</option>';
                }
                ?>
            </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="text" class="col-4 col-form-label">ID Pesanan</label> 
            <div class="col-8">
            <input id="idPesanan" name="idPesanan" type="number" class="form-control" value="<?= $pesanan['pesanan_id']?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="text2" class="col-4 col-form-label">Quantity</label> 
            <div class="col-8">
            <input id="qty" name="qty" type="text" class="form-control" value="<?= $pesanan['qty']?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="text3" class="col-4 col-form-label">Harga</label> 
            <div class="col-8">
            <input id="harga" name="harga" type="text" class="form-control" value="<?= $pesanan['harga']?>">
            </div>
        </div>
        <div class="form-group row">
            <div class="offset-4 col-8">
            <?php

            if(empty($idedit)){

            ?>
            <button name="proses" type="submit" value="setPesanan" class="btn btn-primary mt-2">Submit</button>
            <?php
            }
            else {
                ?>
                <button name="proses" type="submit" value="updatePesanan" class="btn btn-primary mt-2">Update</button>
                <input type="hidden" name="idp" value="<?= $idedit ?>">
                <?php
            }
            ?>
            <button name="proses" type="submit" value="batal" class="btn btn-primary mt-2">Cancel</button>
            </div>
        </div>
    </div>
    </form>