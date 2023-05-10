<?php
include_once '../koneksidb.php';
include_once '../models/Data_Pesanan.php';

$model = new DataPesanan();

if(isset($_POST['addPesanan'])){
    $idProduk = $_POST['idProduk'];
    $idPesanan = $_POST['idPesanan'];
    $qty = $_POST['qty'];
    $harga = $_POST['harga'];

    $data = [
        $idProduk,
        $idPesanan,
        $qty,
        $harga
    ];

    $addData = $model->setPesanan($data);

    if($addData) {
        header('location:../index.php?url=pesanan');
    } else {
        header('location:../index.php?url=pesanan');
    }
    
} else {
    header('location:../index.php?url=pesanan');
}
?>