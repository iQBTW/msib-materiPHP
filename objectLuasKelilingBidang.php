<?php
require "Lingkaran.php";
require "PersegiPanjang.php";
require "Segitiga.php";

$l1 = new Lingkaran(50);
$p1 = new PersegiPanjang(20,10);
$s1 = new Segitiga(20,10,2,20,10);


$ar_data = [$l1,$p1,$s1];

foreach($ar_data as $data){
    $data->cetak();
}
?>