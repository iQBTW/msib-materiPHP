<?php
// include_once 'top.php';
// include_once 'menu.php';

$model = new DataPelanggan();
$data_pelanggan = $model->dataPelanggan();
$model_kartu = new DataKartu();
$data_kartu = $model_kartu->dataKartu();

// foreach ($data_produk as $row){
//     print $row['kode'];
// }

?>
<h1 class="mt-4">Data Pelanggan</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
    <li class="breadcrumb-item active">Tables</li>
</ol>
<div class="card mb-4">
    <div class="card-body">
        DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the
        <a target="_blank" href="https://datatables.net/">official DataTables documentation</a>
        .
    </div>
</div>

<a href="index.php?url=pelanggan_form" class="btn btn-primary mb-2">
  Tambah Pelanggan
</a>

<div class="card mb-4">
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>Email</th>
                    <th>Membership</th>
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
                    <th>Tanggal Lahir</th>
                    <th>Email</th>
                    <th>Membership</th>
                    <th>Action</th>
                </tr>
            </tfoot>
            <tbody>
                <?php
                $no = 1;
                foreach ($data_pelanggan as $row) {
                ?>
                <tr>
                    <td><?= $no ?></td>
                    <td><?= $row['kode'] ?></td>
                    <td><?= $row['nama'] ?></td>
                    <td><?= $row['jk'] ?></td>
                    <td><?= $row['tmp_lahir'] ?></td>
                    <td><?= $row['tgl_lahir'] ?></td>
                    <td><?= $row['email'] ?></td>
                    <td><?= $row['jenis_kartu'] ?></td>
                    <td>
                        <form action="controllers/pelanggan_controllers.php" method="POST"> 
                            <a href="" class="btn btn-info btn-sm">Detail</a>
                            <a href="index.php?url=pelanggan_form&idedit=<?=$row['id']?>" class="btn btn-secondary btn-sm">Edit</a>
                            <button type="submit" class="btn btn-danger btn-sm" name="proses" value="deletePelanggan" onclick="return confirm('Apakah anda yakin?')">Delete</button>

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