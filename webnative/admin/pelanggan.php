<?php
// include_once 'top.php';
// include_once 'menu.php';

$model = new DataPelanggan();
$data_pelanggan = $model->dataPelanggan();
$model_kartu = new DataKartu();

$sesi = $_SESSION['MEMBER'];
if(isset($sesi)){



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

<?php 
if($sesi['role'] != 'staff'){
?>
<!-- Button modal -->
<button type="button" class="btn btn-primary mb-1" data-bs-toggle="modal" data-bs-target="#TambahPelanggan">
  Tambah Pelanggan
</button>
<?php } ?>

<div class="card mb-4">
    <!-- Modal -->
    <div class="modal fade" id="TambahPelanggan" tabindex="-1" aria-labelledby="TambahPelangganLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="TambahPelangganLabel">Tambah Pelanggan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="controllers/pelanggan_controllers.php" method="POST">
                <div class="modal-body">
                    <input type="text" name="kodePelanggan" id="kodePelanggan" placeholder="Kode Pelanggan" class="form-control mb-2">
                    <input type="text" name="namaPelanggan" id="namaPelanggan" placeholder="Nama Pelanggan" class="form-control mb-2">
                    <select name="jenisKelamin" id="jenisKelamin" class="form-control mb-2">
                        <option value="" disabled selected>Pilih Jenis Kelamin</option>
                        <option value="L">Laki-Laki</option>
                        <option value="P" >Perempuan</option>
                    </select>
                    <input type="text" name="tempatLahir" id="tempatLahir" placeholder="Tempat Lahir" class="form-control mb-2">
                    <input type="text" name="tanggalLahir" id="tanggalLahir" placeholder="Tanggal Lahir" class="form-control mb-2" onfocus="(this.type='date')" required>
                    <input type="email" name="emailPelanggan" id="emailPelanggan" placeholder="Email" class="form-control mb-2" required>
                    <select name="jenisKartu" id="jenisKartu" class="form-control">
                        <option value="" disabled selected>Pilih Kartu Membership</option>
                        <?php 
                        $data_kartu = $model_kartu->dataKartu();
                        foreach($data_kartu as $kartu ){
                            echo '<option value="'.$kartu['id'].'">'.$kartu['nama'].'</option>';
                        }
                        ?>
                    </select>
                </div>
            
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="proses" value="setPelanggan">Submit</button>
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
                            <?php 
                            if($sesi['role'] == 'admin'){

                            
                            ?>
                            <a href="index.php?url=pelanggan_form&idedit=<?=$row['id']?>" class="btn btn-secondary btn-sm">Edit</a>
                            <button type="submit" class="btn btn-danger btn-sm" name="proses" value="deletePelanggan" onclick="return confirm('Apakah anda yakin?')">Delete</button>

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