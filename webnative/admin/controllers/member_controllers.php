<?php
session_start();
include_once '../koneksidb.php';
include_once '../models/Member.php';

$model = new Member();

if(isset($_POST['username']) && isset($_POST['password'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $data = [
        $username,
        $password
    ];
}

$rs = $model->cekLogin($data);
if(!empty($rs)){
    $_SESSION['MEMBER'] = $rs;
    header('location:../index.php');
}
else {
    echo '<script> alert("Username/Password anda salah);history.back();</script>';
}

?>