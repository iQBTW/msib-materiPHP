<?php
// include_once 'top.php';
// include_once 'menu.php';

$modelProduk = new Produk(); 
$modelJenisProduk = new JenisProduk();
$data_produk = $modelProduk->dataProduk();
// $data_JenisProduk = $modelJenisProduk->JenisProduk();


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

<!-- Modal Tambah Produk -->
<button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
  Tambah Produk
</button>
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Produk</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="controllers/produk_controllers.php" method="POST">
                <div class="modal-body">
                    <input type="text" name="kodeProduk" id="kodeProduk" placeholder="Kode Produk" class="form-control mb-3">
                    <input type="text" name="namaProduk" id="namaProduk" placeholder="Nama Produk" class="form-control mb-3">
                    <input type="number" name="hargaBeli" id="hargaBeli" placeholder="Harga Beli" class="form-control mb-3">
                    <input type="number" name="hargaJual" id="hargaJual" placeholder="Harga Jual" class="form-control mb-3">
                    <input type="number" name="stok" id="stok" placeholder="Stock Barang" class="form-control mb-3" required>
                    <input type="number" name="minStok" id="minStok" placeholder="Minimal Stock Barang" class="form-control mb-3" required>
                    <select name="jenisProduk" id="jenisProduk" class="form-control mb-2" placeholder="Jenis Produk">
                        <option value="" disabled selected>Pilih Jenis Produk</option>
                        <?php 
                            $jenis_produk = $modelJenisProduk->JenisProduk();
                            foreach($jenis_produk as $jp){
                                echo '<option value="'.$jp['id'].'">'.$jp['nama'].'</option>';
                            }
                        ?>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" name="addtoProduk" value="setProduk">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal Tambah Produk -->

<div class="card mb-3">
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
                        <a href="" class="btn btn-info btn-sm">Detail</a>
                        <button name="modalEditButton" class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#editModal<?=$row['id']?>">Edit</button>
                        <a href="" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
                
                <!-- Modal Edit Produk -->
                <div class="modal fade" id="editModal<?= $row['id'] ?>" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editModalLabel">Edit Produk</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="controllers/produk_controllers.php" method="POST">
                                <div class="modal-body">
                                    <input type="hidden" name="action" value="editProduk">
                                    <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                    <input type="text" name="kodeProduk" id="kodeProduk" value="<?= $row['kode']?>" placeholder="Kode Produk" class="form-control mb-3" required>
                                    <input type="text" name="namaProduk" id="namaProduk" value="<?= $row['nama']?>" placeholder="Nama Produk" class="form-control mb-3" required>
                                    <input type="number" name="hargaBeli" id="hargaBeli" value="<?= $row['harga_beli']?>" placeholder="Harga Beli" class="form-control mb-3" required>
                                    <input type="number" name="hargaJual" id="hargaJual" value="<?= $row['harga_jual']?>" placeholder="Harga Jual" class="form-control mb-3" required>
                                    <input type="number" name="stok" id="stok" value="<?= $row['stok']?>" placeholder="Stock Barang" class="form-control mb-3" required>
                                    <input type="number" name="minStok" id="minStok" value="<?= $row['min_stok']?>" placeholder="Minimal Stock Barang" class="form-control mb-3" required>
                                    <select name="jenisProduk" id="jenisProduk" class="form-control mb-2" placeholder="Jenis Produk">
                                        <option value="<?= $row['jenis_produk_id']?>" disabled selected>Pilih Jenis Produk</option>
                                        <?php 
                                            $jenis_produk = $modelJenisProduk->JenisProduk();
                                            foreach($jenis_produk as $jp){
                                                echo '<option value="'.$jp['id'].'">'.$jp['nama'].'</option>';
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" name="editProduk" value="updateProduk" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Modal Edit Produk -->
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