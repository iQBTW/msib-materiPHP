<?php 
include_once '../koneksidb.php';
include_once '../models/Data_Pelanggan.php';

$model = new DataPelanggan();
if(isset($_POST['kodePelanggan'])){
    $kodePelanggan = $_POST['kodePelanggan'];
    $namaPelanggan = $_POST['namaPelanggan'];
    $jenisKelamin = $_POST['jenisKelamin'];
    $tempatLahir = $_POST['tempatLahir'];
    $tanggalLahir = $_POST['tanggalLahir'];
    $emailPelanggan = $_POST['emailPelanggan'];
    $jenisKartu = $_POST['jenisKartu'];

    $data = [
        $kodePelanggan,
        $namaPelanggan,
        $jenisKelamin,
        $tempatLahir,
        $tanggalLahir,
        $emailPelanggan,
        $jenisKartu
    ];

}

$Btn = $_REQUEST['proses'];
switch($Btn){
    case 'setPelanggan':$model->setPelanggan($data); break;
    case 'updatePelanggan':
        $data[] = $_POST['idp']; $model->updatePelanggan($data); break;
    case 'deletePelanggan':
        unset($data); $model->deletePelanggan($_POST['idp']); break;
    default:
    header('location:../index.php?url=pelanggan');
    break;
}
header('location:../index.php?url=pelanggan');

?>