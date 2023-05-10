<?php
include_once '../koneksidb.php';
include_once '../models/Produk.php';

$model = new Produk();

if(isset($_POST['addtoProduk'])){
    $kodeProduk = $_POST['kodeProduk'];
    $namaProduk = $_POST['namaProduk'];
    $hargaBeli = $_POST['hargaBeli'];
    $hargaJual = $_POST['hargaJual'];
    $stokProduk = $_POST['stok'];
    $minStokProduk = $_POST['minStok'];
    $jenisProduk = $_POST['jenisProduk'];

    $data = [
        $kodeProduk,
        $namaProduk,
        $hargaBeli,
        $hargaJual,
        $stokProduk,
        $minStokProduk,
        $jenisProduk
    ];

    $addData = $model->setProduk($data);

    if($addData) {
        header('location:../index.php?url=product');
    } else {
        header('location:../index.php?url=product');
    }
    
} else {
    header('location:../index.php?url=product');
}

if(isset($_POST['editProduk'])){
    $idProduk = $_POST['id'];
    $kodeProduk = $_POST['kodeProduk'];
    $namaProduk = $_POST['namaProduk'];
    $hargaBeli = $_POST['hargaBeli'];
    $hargaJual = $_POST['hargaJual'];
    $stokProduk = $_POST['stok'];
    $minStokProduk = $_POST['minStok'];
    $jenisProduk = $_POST['jenisProduk'];

    $data = [
        $kodeProduk,
        $namaProduk,
        $hargaBeli,
        $hargaJual,
        $stokProduk,
        $minStokProduk,
        $jenisProduk
    ];

    $editData = $model->updateProduk($data, $idProduk);

    if($editData){
        header('location:../index.php?url=product');
    } else {
        header('location:../index.php?url=product');
    }

} else {
    header('location:index.php?url=product');
}
?>