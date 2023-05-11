<?php
//memanggil dan memproses file bagian atas
include_once 'koneksidb.php';
include_once 'models/Produk.php';
include_once 'models/Jenis_Produk.php';
include_once 'models/Data_Pelanggan.php';
include_once 'models/Data_Pesanan.php';
include_once 'models/Data_Kartu.php';
include_once 'top.php';
//memanggil dan memproses file bagian menu
include_once 'menu.php';
?>
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <?php 
            //algoritma menangkap url agar masuk kedalam index
            $url = isset($_GET['url'])?$_GET['url']:'dashboard';
            if($url == 'dashboard'){
                include_once 'dashboard.php';
            } else if (!empty($url)){
                include_once ''.$url.'.php';
            } else { 
                include_once 'dashboard.php';   
            }
            ?>
        </div>
    </main>
</div>

<?php
//memanggil file bagian bawah
include_once 'bottom.php';
?>
