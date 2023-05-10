<?php
include_once '../koneksidb.php';
include_once '../models/Data_Kartu.php';

$model = new DataKartu();

if(isset($_POST['addKartu'])){
    $kodeKartu = $_POST['kodeKartu'];
    $namaKartu = $_POST['namaKartu'];
    $diskon = $_POST['diskon'];
    $iuran = $_POST['iuran'];

    $data = [
        $kodeKartu,
        $namaKartu,
        $diskon,
        $iuran
    ];

    $addData = $model->setKartu($data);

    if($addData) {
        header('location:../index.php?url=kartupelanggan');
    } else {
        header('location:../index.php?url=kartupelanggan');
    }
    
} else {
    header('location:../index.php?url=kartupelanggan');
}
?>