<?php 
include_once '../koneksidb.php';
include_once '../models/Data_Pelanggan.php';

$model = new DataPelanggan();

$kodePelanggan = $_POST['kodePelanggan'];
$namaPelanggan = $_POST['namaPelanggan'];
$jk = $_POST['jk'];
$tmp_lahir = $_POST['tmp_lahir'];
$tgl_lahir = $_POST['tgl_lahir'];
$emailPelanggan = $_POST['emailPelanggan'];
$kartu_id = $_POST['kartu_id'];

$data = [
    $kodePelanggan,
    $namaPelanggan,
    $jk,
    $tmp_lahir,
    $tgl_lahir,
    $emailPelanggan,
    $kartu_id
];

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