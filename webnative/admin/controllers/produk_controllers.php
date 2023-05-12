<?php
include_once '../koneksidb.php';
include_once '../models/Produk.php';

$model = new Produk();

if(isset($_POST['kodeProduk'] )){
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
}
$Btn = $_REQUEST['proses'];
switch($Btn){
    case 'setProduk' : $model->setProduk($data); break;
    case 'updateProduk' :
        $data[] = $_POST['idp']; $model->updateProduk($data); break;
    case 'deleteProduk' :
        unset($data); $model->deleteProduk($_POST['idp']); break;
    default:
    header('location:../index.php?url=product');
    break;
}
header('location:../index.php?url=product');

?>