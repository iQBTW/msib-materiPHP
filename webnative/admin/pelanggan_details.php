<?php
$id = $_REQUEST['id'];
$model = new DataPelanggan();
$pelanggan = $model->getPelanggan($id);

?>

<h1 class="mt-4">Detail Pelanggan</h1>
<div class="card-body mx-auto">
    <div class="card mb-4">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>Kode</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>Email</th>
                    <th>Membership</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?= $pelanggan['kode'] ?></td>
                    <td><?= $pelanggan['nama'] ?></td>
                    <td><?= $pelanggan['jk'] ?></td>
                    <td><?= $pelanggan['tmp_lahir'] ?></td>
                    <td><?= $pelanggan['tgl_lahir'] ?></td>
                    <td><?= $pelanggan['email'] ?></td>
                    <td><?= $pelanggan['jenis_kartu'] ?></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>