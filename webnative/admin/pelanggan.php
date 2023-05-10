<?php
// include_once 'top.php';
// include_once 'menu.php';

$model = new DataPelanggan();
$modelKartuMembership = new DataKartu();
$data_pelanggan = $model->dataPelanggan();
$model_kartuMembership = $modelKartuMembership->dataKartu();

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
<!-- Modal Tambah Pelanggan -->
<button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
  Tambah Pelanggan
</button>
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Pelanggan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="controllers/pelanggan_controllers.php" method="POST">
                <div class="modal-body">
                    <input type="text" name="kodePelanggan" id="kodePelanggan" placeholder="Kode Pelanggan" class="form-control mb-3">
                    <input type="text" name="namaPelanggan" id="namaPelanggan" placeholder="Nama Pelanggan" class="form-control mb-3">
                    <select name="jenisKelamin" id="jenisKelamin" class="form-control mb-3">
                        <option value="" disabled selected>Pilih Jenis Kelamin</option>
                        <option value="L">Laki-Laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                    <input type="text" name="tempatLahir" id="tempatLahir" placeholder="Tempat Lahir" class="form-control mb-3">
                    <input required="" type="text" name="tanggalLahir" class="form-control mb-3" placeholder="Tanggal Lahir" onfocus="(this.type='date')"/>
                    <input type="email" name="emailPelanggan" id="emailPelanggan" placeholder="Email" class="form-control mb-3" required>
                    <select name="kartuMembership" id="kartuMembership" class="form-control mb-3" placeholder="Kartu Membership">
                        <option value="" disabled selected>Pilih Kartu Membership</option>
                        <?php 
                            $kartuMember = $modelKartuMembership->dataKartu();
                            foreach($kartuMember as $km){
                                echo '<option value="'.$km['id'].'">'.$km['nama'].'</option>';
                            }
                        ?>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" name="addtoPelanggan" value="setPelanggan">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal Tambah Pelanggan -->
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