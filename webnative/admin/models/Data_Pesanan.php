<?php
class DataPesanan{
    private $koneksi;
    public function __construct()
    {
        global $dbh;
        $this->koneksi = $dbh;
    }
    public function dataPesanan(){
        $sql = "SELECT pesanan.*, produk.nama AS Nama_Produk, pesanan_items.qty, pesanan_items.harga, pesanan.total
        FROM pesanan
        JOIN pelanggan ON pesanan.pelanggan_id = pelanggan.id
        JOIN pesanan_items ON pesanan.id = pesanan_items.pesanan_id
        JOIN produk ON pesanan_items.produk_id = produk.id";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute();
        $rs = $ps->fetchAll();
        return $rs;
    }
    public function getPesanan($id){
        $sql = "SELECT pesanan.*, produk.nama AS Nama_Produk, pesanan_items.qty, pesanan_items.harga, pesanan.total
        FROM pesanan
        JOIN pelanggan ON pesanan.pelanggan_id = pelanggan.id
        JOIN pesanan_items ON pesanan.id = pesanan_items.pesanan_id
        JOIN produk ON pesanan_items.produk_id = produk.id WHERE pesanan_items.id=?";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute([$id]);
        $rs = $ps->fetch();
        return $rs;
    }
    public function setPesanan($data){
        $sql = "INSERT INTO pesanan_items (produk_id, pesanan_id, qty, harga) VALUES (?,?,?,?)";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);
    }
    public function updatePesanan($data){
        $sql = "UPDATE pesanan_items SET produk_id=?, pesanan_id=?, qty=?, harga=? WHERE id=?";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);
    }
    public function deletePesanan($id){
        $sql = "DELETE FROM pesanan_items WHERE id=?";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($id);
    }
}
?>