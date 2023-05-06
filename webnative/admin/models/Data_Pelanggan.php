<?php
class DataPelanggan{
    private $koneksi;
    public function __construct()
    {
        global $dbh;
        $this->koneksi = $dbh;
    }
    public function dataPelanggan(){
        $sql = "SELECT pelanggan.kode, pelanggan.nama, pelanggan.jk, pelanggan.tmp_lahir, pelanggan.tgl_lahir, pelanggan.email, kartu.nama AS jenis_kartu FROM pelanggan JOIN kartu ON kartu.id = pelanggan.kartu_id";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute();
        $rs = $ps->fetchAll();
        return $rs;
    }
}
?>