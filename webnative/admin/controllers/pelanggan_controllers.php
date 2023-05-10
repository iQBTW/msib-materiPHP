<?php 
include_once '../koneksidb.php';
include_once '../models/Data_Pelanggan.php';

$model = new DataPelanggan();

if(isset($_POST['addtoPelanggan'])){
    $kodePelanggan = $_POST['kodePelanggan'];
    $namaPelanggan = $_POST['namaPelanggan'];
    $jenisKelamin = $_POST['jenisKelamin'];
    $tempatLahir = $_POST['tempatLahir'];
    $tanggalLahir = $_POST['tanggalLahir'];
    $emailPelanggan = $_POST['emailPelanggan'];
    $kartuMembership = $_POST['kartuMembership'];

    $data = [
        $kodePelanggan,
        $namaPelanggan,
        $jenisKelamin,
        $tempatLahir,
        $tanggalLahir,
        $emailPelanggan,
        $kartuMembership
    ];

    $addData = $model->setPelanggan($data);

    if($addData) {
        header('location:../index.php?url=pesanan');
    } else {
        header('location:../index.php?url=pesanan');
    }
    
} else {
    header('location:../index.php?url=pesanan');
}
?>