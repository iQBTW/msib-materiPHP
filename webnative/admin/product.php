<?php
// include_once 'top.php';
// include_once 'menu.php';

$model = new Produk();
$model_jenis_produk = new JenisProduk();
$data_produk = $model->dataProduk();

$sesi = $_SESSION['MEMBER'];
if(isset($sesi)){


?>
<h1 class="mt-4">Data Produk</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
    <li class="breadcrumb-item active">Tables</li>
</ol>
<div class="card mb-4">
    <div class="card-body">
        DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the
        <a target="_blank" href="https://datatables.net/">official DataTables documentation</a>
        .
    </div>
</div>
<!-- Button modal -->
<?php 
    if($sesi['role'] != 'staff'){
?>
<button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#TambahProduk">
  Tambah Produk
</button>
<?php } ?>
<div class="card mb-4">
    <!-- Modal -->
    <div class="modal fade" id="TambahProduk" tabindex="-1" aria-labelledby="TambahProdukLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="TambahProdukLabel">Tambah Produk</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="controllers/produk_controllers.php" method="POST">
                <div class="modal-body">
                    <input type="text" name="kodeProduk" id="kodeProduk" placeholder="Kode Produk" class="form-control mb-2">
                    <input type="text" name="namaProduk" id="namaProduk" placeholder="Nama Produk" class="form-control mb-2">
                    <input type="number" name="hargaBeli" id="hargaBeli" placeholder="Harga Beli" class="form-control mb-2">
                    <input type="number" name="hargaJual" id="hargaJual" placeholder="Harga Jual" class="form-control mb-2">
                    <input type="number" name="stok" id="stok" placeholder="Stock Barang" class="form-control mb-2" required>
                    <input type="number" name="minStok" id="minStok" placeholder="Minimal Stock Barang" class="form-control mb-2" required>
                    <select name="jenisProduk" id="jenisProduk" class="form-control">
                        <option value="" disabled selected>Pilih Jenis Produk</option>
                        <?php 
                        $data_jenis_produk = $model_jenis_produk->JenisProduk();
                        foreach($data_jenis_produk as $jp ){
                            echo '<option value="'.$jp['id'].'">'.$jp['nama'].'</option>';
                        }
                        ?>
                    </select>
                </div>
            
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="proses" value="setProduk">Submit</button>
                </div>
            </form>
            </div>
        </div>
    </div>
    
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode</th>
                    <th>Nama</th>
                    <th>Harga Beli</th>
                    <th>Harga Jual</th>
                    <th>Stok</th>
                    <th>Minimal Stok</th>
                    <th>Jenis Produk</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Kode</th>
                    <th>Nama</th>
                    <th>Harga Beli</th>
                    <th>Harga Jual</th>
                    <th>Stok</th>
                    <th>Minimal Stok</th>
                    <th>Jenis Produk</th>
                    <th>Action</th>
                </tr>
            </tfoot>
            <tbody>
                <?php
                $no = 1;
                foreach ($data_produk as $row) {
                ?>
                <tr>
                    <td><?= $no ?></td>
                    <td><?= $row['kode'] ?></td>
                    <td><?= $row['nama'] ?></td>
                    <td><?= $row['harga_beli'] ?></td>
                    <td><?= $row['harga_jual'] ?></td>
                    <td><?= $row['stok'] ?></td>
                    <td><?= $row['min_stok'] ?></td>
                    <td><?= $row['Kategori'] ?></td>
                    <td>
                        <form action="controllers/produk_controllers.php" method="POST">
                            <a href="#" class="btn btn-info btn-sm">Details</a>
                            <?php 
                                if($sesi['role'] == 'admin'){
                            ?>
                            <a href="index.php?url=product_form&idedit=<?=$row['id']?>" class="btn btn-secondary btn-sm">Edit</a>
                            <button class="btn btn-danger btn-sm" type="submit" name="proses" value="deleteProduk" onclick="return confirm('Gak bahaya ta?')">Delete</button>

                            <input type="hidden" name="idp" value="<?=$row['id']?>">
                            <?php } ?>
                        </form>
                    </td>

                </tr>
                <?php 
                $no++;
                } 
                ?>
            </tbody>
        </table>
    </div>
</div>
</div>

<?php
} else {
    echo '<script> alert("Silahkan login!");window.location.href="../index.php?hal=admin/login";</script>';
}
// include_once 'bottom.php';
?>