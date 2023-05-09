<?php
// include_once 'top.php';
// include_once 'menu.php';

$model = new Produk();
$data_produk = $model->dataProduk();

// foreach ($data_produk as $row){
//     print $row['kode'];
// }

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
<div class="card mb-4">
    <!-- <div class="card-header">
        <i class="fas fa-table me-1"></i>
        DataTable Example
    </div> -->
    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Tambah Produk
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Produk</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="POST">
        <div class="modal-body">
            <input type="text" name="kodeProduk" id="" placeholder="Nama Produk" class="form-control mb-2">
            <input type="text" name="namaProduk" id="" placeholder="Nama Produk" class="form-control mb-2">
            <input type="number" name="hargaBeli" id="" placeholder="Nama Produk" class="form-control mb-2">
            <input type="number" name="stok" id="" placeholder="Nama Produk" class="form-control mb-2" required>
            <input type="number" name="minStok" id="" placeholder="Nama Produk" class="form-control mb-2" required>
            <input type="number" name="jenisProduk" id="" placeholder="Nama Produk" class="form-control mb-2" required>
        </div>
      </form>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" name="addtoProduk">Submit</button>
      </div>
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