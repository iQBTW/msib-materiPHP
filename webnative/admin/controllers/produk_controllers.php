<?php
include_once '../koneksidb.php';
include_once '../models/Produk.php';

if(isset($_POST['addtoProduk'])){
    $kodeProduk = $_POST['kodeProduk'];
    $namaProduk = $_POST['namaProduk'];
    $hargaBeli = $_POST['hargaBeli'];
    $hargaJual = $_POST['hargaJual'];
    $stokProduk = $_POST['stok'];
    $minStokProduk = $_POST['minStok'];
    $jenisProduk = $_POST['jenisProduk'];

    $data = [
        $kode,
        $nama,
        $harga_beli,
        $harga_jual,
        $stok,
        $min_stok,
        $jenis_produk_id
    ];

    $model = new Produk();
    $setBtn = $_REQUEST['addToProduk'];
    switch($setBtn){
        case 'setProduk' : $model->setProduk($data); break;
        default:
        header('location:index.php?url=product');
        break;
    }
    header('location:index.php?url=product');
}
?>