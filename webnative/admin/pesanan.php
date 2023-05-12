<?php
// include_once 'top.php';
// include_once 'menu.php';

$model = new DataPesanan();
$model_data_produk = new Produk();
$data_pesanan = $model->dataPesanan();

$sesi = $_SESSION['MEMBER'];
if(isset($sesi)){



// foreach ($data_produk as $row){
//     print $row['kode'];
// }

?>
<h1 class="mt-4">Data Pesanan</h1>
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
<button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#TambahPesanan">
  Tambah Pesanan
</button>
<?php } ?>

<div class="card mb-4">
    <div class="modal fade" id="TambahPesanan" tabindex="-1" aria-labelledby="TambahPesananLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="TambahPesananLabel">Tambah Produk</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="controllers/pesanan_controllers.php" method="POST">
                    <div class="modal-body">
                        <select name="idProduk" id="idProduk" class="form-control mb-2">
                            <option value="" disabled selected>Pilih Produk</option>
                            <?php
                            $data_produk = $model_data_produk->dataProduk();
                            foreach($data_produk as $namaProduk) {
                                echo '<option value="'.$namaProduk['id'].'">'.$namaProduk['nama'].'</option>';
                            }
                            ?>
                        </select>
                        <input type="number" name="idPesanan" id="idPesanan" placeholder="ID Pesanan" class="form-control mb-2">
                        <input type="number" name="qty" id="qty" placeholder="Quantity" class="form-control mb-2">
                        <input type="number" name="harga" id="harga" placeholder="Harga" class="form-control mb-2">
                    </div>
                
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="proses" value="setPesanan">Submit</button>
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
                        <th>Tanggal</th>
                        <th>Nama</th>
                        <th>Nama Produk</th>
                        <th>Quantity</th>
                        <th>Harga</th>
                        <th>Total Harga</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Nama</th>
                        <th>Nama Produk</th>
                        <th>Quantity</th>
                        <th>Harga</th>
                        <th>Total Harga</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($data_pesanan as $row) {
                    ?>
                    <tr>
                        <td><?= $no ?></td>
                        <td><?= $row['tanggal'] ?></td>
                        <td><?= $row['Nama_Pelanggan'] ?></td>
                        <td><?= $row['Nama_Produk'] ?></td>
                        <td><?= $row['qty'] ?></td>
                        <td><?= $row['harga'] ?></td>
                        <td><?= $row['total'] ?></td>
                        <td>
                            <form action="controllers/pesanan_controllers.php" method="POST"> 
                                <a href="index.php?url=pesanan_details&id=<?=$row['id']?>" class="btn btn-info btn-sm">Details</a>
                                <?php 
                                if($sesi['role'] == 'admin'){
                                ?>
                                <a href="index.php?url=pesanan_form&idedit=<?=$row['id']?>" class="btn btn-secondary btn-sm">Edit</a>
                                <button type="submit" class="btn btn-danger btn-sm" name="proses" value="deletePesanan" onclick="return confirm('Apakah anda yakin?')">Delete</button>

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
// include_once 'bottom.php';
} else {
    '<script> alert("Silahkan login!");window.location.href="../index.php?hal=admin/login";</script>';
}

?>