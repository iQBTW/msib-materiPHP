<?php
include_once '../koneksidb.php';
include_once '../models/Data_Kartu.php';

$model = new DataKartu();

if(isset($_POST['kodeKartu'])){
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
}

$Btn = $_REQUEST['proses'];
switch($Btn){
    case 'setKartu':$model->setKartu($data); break;
    case 'updateKartu':
        $data[] = $_POST['idp']; $model->updateKartu($data); break;
    case 'deleteKartu':
        unset($data); $model->deleteKartu($_POST['idp']); break;
    default:
    header('location:../index.php?url=kartupelanggan');
    break;
}
header('location:../index.php?url=kartupelanggan');

?>