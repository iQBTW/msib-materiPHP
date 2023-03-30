<?php 
require 'Pegawai.php';

$pegawai1 = new Pegawai('01111','Andi','Manager','Kristen','Menikah');
$pegawai2 = new Pegawai('01111','Andi','Asisten Manager','Islam','Menikah');
$pegawai3 = new Pegawai('01111','Andi','Kepala Bagian','Islam','Menikah');
$pegawai4 = new Pegawai('01111','Andi','Staff','Islam','Belum Menikah');
$pegawai5 = new Pegawai('01111','Andi','Staff','Islam','Belum Menikah');

$ar_pegawai = [$pegawai1, $pegawai2, $pegawai3, $pegawai4, $pegawai5];

foreach($ar_pegawai as $pegawai){
    $pegawai->cetak();
}


?>