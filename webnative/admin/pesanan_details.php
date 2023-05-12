<?php
$id = $_REQUEST['id'];
$model = new DataPesanan();
$pesanan = $model->getInfoPesanan($id);

?>

<h1 class="mt-4">Detail Pesanan</h1>
<div class="card-body mx-auto">
    <div class="card mb-4">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Nama Pelanggan</th>
                    <th>Nama Produk</th>
                    <th>Quantity</th>
                    <th>Harga</th>
                    <th>Total Harga</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?= $pesanan['tanggal'] ?></td>
                    <td><?= $pesanan['Nama_Pelanggan'] ?></td>
                    <td><?= $pesanan['Nama_Produk'] ?></td>
                    <td><?= $pesanan['qty'] ?></td>
                    <td><?= $pesanan['harga'] ?></td>
                    <td><?= $pesanan['total'] ?></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>