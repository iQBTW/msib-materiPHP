<?php
// include_once 'top.php';
// include_once 'menu.php';

$model = new Datakartu();
$data_kartu = $model->dataKartu();

// foreach ($data_produk as $row){
//     print $row['kode'];
// }

?>
<h1 class="mt-4">Data Kartu Membership</h1>
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
<!-- Modal Tambah Kartu Pelanggan -->
<button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
  Tambah Kartu Membership
</button>
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Kartu Membership</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="controllers/kartumember_controllers.php" method="POST">
                <div class="modal-body">
                    <input type="text" name="kodeKartu" id="kodeKartu" placeholder="Kode Kartu" class="form-control mb-3">
                    <input type="text" name="namaKartu" id="namaKartu" placeholder="Nama Kartu" class="form-control mb-3">
                    <input type="number" step="0.0001" name="diskon" id="diskon" placeholder="Diskon" class="form-control mb-3">
                    <input type="number" name="iuran" id="iuran" placeholder="Iuran" class="form-control mb-3">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" name="addKartu" value="setKartu">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal Tambah kartu Pelanggan-->
<div class="card mb-4">
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode</th>
                    <th>Nama</th>
                    <th>Diskon</th>
                    <th>Iuran</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Kode</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Tempat Lahir</th>
                    <th>Action</th>
                </tr>
            </tfoot>
            <tbody>
                <?php
                $no = 1;
                foreach ($data_kartu as $row) {
                ?>
                <tr>
                    <td><?= $no ?></td>
                    <td><?= $row['kode'] ?></td>
                    <td><?= $row['nama'] ?></td>
                    <td><?= $row['diskon'] ?></td>
                    <td><?= $row['iuran'] ?></td>
                    <td>
                        <form action="controllers/kartumember_controllers.php" method="POST"> 
                            <a href="" class="btn btn-info btn-sm">Detail</a>
                            <a href="index.php?url=kartu_form&idedit=<?=$row['id']?>" class="btn btn-secondary btn-sm">Edit</a>
                            <button type="submit" class="btn btn-danger btn-sm" name="proses" value="deleteProduk" onclick="return confirm('Apakah anda yakin?')">Delete</button>

                            <input type="hidden" name="idp" value="<?=$row['id']?>">
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
                ?>