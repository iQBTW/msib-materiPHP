<?php
class DataPelanggan{
    private $koneksi;
    public function __construct()
    {
        global $dbh;
        $this->koneksi = $dbh;
    }
    public function dataPelanggan(){
        $sql = "SELECT pelanggan.*, kartu.nama AS jenis_kartu FROM pelanggan INNER JOIN kartu ON kartu.id = pelanggan.kartu_id";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute();
        $rs = $ps->fetchAll();
        return $rs;
    }
    public function getPelanggan($id){
        $sql = "SELECT pelanggan.*, kartu.nama AS jenis_kartu FROM pelanggan INNER JOIN kartu ON kartu.id = pelanggan.kartu_id WHERE pelanggan.id=?";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute([$id]);
        $rs = $ps->fetch();
        return $rs;
    }
    public function setPelanggan($data){
        $sql = "INSERT INTO pelanggan (kode, nama, jk, tmp_lahir, tgl_lahir, email, kartu_id) VALUES (?,?,?,?,?,?,?)";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);
    }
    public function updatePelanggan($data){
        $sql = "UPDATE pelanggan SET kode=?, nama=?, jk=?, tmp_lahir=?, tgl_lahir=?, email=?, kartu_id=? WHERE id=?";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);
    }
    public function deletePelanggan($id){
        $sql = "DELETE FROM pelanggan WHERE id=?";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($id);
    }
}
?>