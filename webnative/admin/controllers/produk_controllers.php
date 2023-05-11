<?php
include_once '../koneksidb.php';
include_once '../models/Produk.php';

$model = new Produk();

$kode = $_POST['kode'];
$nama = $_POST['nama'];
$harga_beli = $_POST['harga_beli'];
$harga_jual = $_POST['harga_jual'];
$stok = $_POST['stok'];
$min_stok = $_POST['min_stok'];
$jenis_produk_id = $_POST['jenis_produk_id'];

$data = [
    $kode,
    $nama,
    $harga_beli,
    $harga_jual,
    $stok,
    $min_stok,
    $jenis_produk_id
];

$Btn = $_REQUEST['proses'];
switch($Btn){
    case 'setProduk':$model->setProduk($data); break;
    case 'updateProduk':
        $data[] = $_POST['idp']; $model->updateProduk($data); break;
    case 'deleteProduk':
        unset($data); $model->deleteProduk($_POST['idp']); break;
    default:
    header('location:../index.php?url=product');
    break;
}
header('location:../index.php?url=product');

?>