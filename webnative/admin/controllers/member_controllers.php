<?php
session_start();
include_once '../koneksidb.php';
include_once '../models/Member.php';

$model = new Member();

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $data = [
        $username,
        $password
    ];
    $rs = $model->cekLogin($data);
    if(!empty($rs)){
        $_SESSION['MEMBER'] = $rs;
        header('location:../index.php');
    } else {
        echo '<script> alert("Username/Password tidak ditemukan!");window.location.href="/msib-materiPHP/webnative/index.php?hal=admin/login";</script>';
    }
} else if(isset($_POST['roleRegis'])) {
    $fullname = $_POST['fullname'];
    $usernameRegis = $_POST['usernameRegis'];
    $passwordRegis = $_POST['passwordRegis'];
    $roleRegis = $_POST['roleRegis'];
    $fotoRegis = $_POST['fotoRegis'];

    $data = [
        $fullname,
        $usernameRegis,
        $passwordRegis,
        $roleRegis,
        $fotoRegis
    ];

    $Btn = $_REQUEST['proses'];
    switch($Btn){
        case 'setMember':
            $result = $model->setMember($data);
            if ($result['success']) {
                echo '<script> alert("Registration successful!"); window.location.href="/msib-materiPHP/webnative/index.php?hal=admin/login";</script>';
            } else {
                echo '<script> alert("Registration failed: '.$result['message'].'"); window.location.href="/msib-materiPHP/webnative/index.php?hal=admin/login";</script>';
            }
        break;
        default:
        header('location.href:../../../index.php?hal=admin/login');
        break;
    }
}

?>