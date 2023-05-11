<?php
include_once '../koneksidb.php';
include_once '../models/Data_Pesanan.php';

$model = new DataPesanan();

$produk_id = $_POST['produk_id'];
$pesanan_id = $_POST['pesanan_id'];
$qty = $_POST['qty'];
$harga= $_POST['harga'];


$data = [
    $produk_id,
    $pesanan_id,
    $qty,
    $harga
];

$Btn = $_REQUEST['proses'];
switch($Btn){
    case 'setPesanan':$model->setPesanan($data); break;
    case 'updatePesanan':
        $data[] = $_POST['idp']; $model->updatePesanan($data); break;
    case 'deletePesanan':
        unset($data); $model->deletePesanan($_POST['idp']); break;
    default:
    header('location:../index.php?url=pesanan');
    break;
}
header('location:../index.php?url=pesanan');

?>