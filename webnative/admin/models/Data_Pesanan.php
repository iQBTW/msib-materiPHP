<?php
class DataPesanan{
    private $koneksi;
    public function __construct()
    {
        global $dbh;
        $this->koneksi = $dbh;
    }
    public function dataPesanan(){
        $sql = "SELECT pesanan.id, pesanan.tanggal, pelanggan.nama, produk.nama AS Nama_Produk, pesanan_items.qty, pesanan_items.harga, pesanan.total
        FROM pesanan
        JOIN pelanggan ON pesanan.pelanggan_id = pelanggan.id
        JOIN pesanan_items ON pesanan.id = pesanan_items.pesanan_id
        JOIN produk ON pesanan_items.produk_id = produk.id";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute();
        $rs = $ps->fetchAll();
        return $rs;
    }
}
?>