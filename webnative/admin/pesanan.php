<?php
// include_once 'top.php';
// include_once 'menu.php';

$model = new DataPesanan();
$data_pesanan = $model->dataPesanan();
$modelDataProduk = new Produk();


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

<!-- Modal Tambah Pesanan -->
<button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
  Tambah Pesanan
</button>
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Pesanan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="controllers/pesanan_controllers.php" method="POST">
                <div class="modal-body">
                    <select name="idProduk" id="idProduk" placeholder="Pilih Produk" class="form-control mb-3">
                        <option value="" disabled>Pilih Produk</option>
                        <?php
                            $namaProduk = $modelDataProduk->dataProduk();
                            foreach($namaProduk as $np){
                                echo '<option value="'.$np['id'].'">'.$np['nama'].'</option>';
                            }
                        ?>
                    </select>
                    <input type="number" name="idPesanan" id="idPesanan" placeholder="ID Pesanan" class="form-control mb-3">
                    <input type="number" name="qty" id="qty" placeholder="Quantity" class="form-control mb-3">
                    <input type="number" name="harga" id="harga" placeholder="Harga" class="form-control mb-3">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" name="addPesanan" value="setPesanan">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal Tambah Pesanan -->

<div class="card mb-4">
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
                    <td><?= $row['nama'] ?></td>
                    <td><?= $row['Nama_Produk'] ?></td>
                    <td><?= $row['qty'] ?></td>
                    <td><?= $row['harga'] ?></td>
                    <td><?= $row['total'] ?></td>
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
                ?>