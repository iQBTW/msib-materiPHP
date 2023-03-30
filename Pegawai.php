<?php
class Pegawai{
    protected $nip;
    public $nama;
    private $jabatan;
    private $agama;
    private $status;
    static $jml = 0;
    const PT = 'PT. HTP Indonesia';

    public function __construct($nip, $nama, $jabatan, $agama, $status){
        $this->nip = $nip;
        $this->nama = $nama;
        $this->jabatan = $jabatan;
        $this->agama = $agama;
        $this->status = $status;
        self::$jml++;
    }
    public function setGajiPokok($jabatan){
        $this->jabatan = $jabatan;

        switch($jabatan){
            case 'Manager': $gapok = 15000000; break;
            case 'Asisten Manager': $gapok = 10000000; break;
            case 'Kepala Bagian': $gapok = 7000000; break;
            case 'Staff': $gapok = 5000000; break;
            default: $gapok;
        }
        return $gapok;       
    }

    public function setTunjanganJabatan($jabatan) {

        if($jabatan == 'Manager') {
            $tunjangan = 0.2 * $this->setGajiPokok($this->jabatan);
        }else if($jabatan == 'Asisten Manager'){
            $tunjangan = 0.2 * $this->setGajiPokok($this->jabatan);
        }else if($jabatan == 'Kepala Bagian'){
            $tunjangan = 0.2 * $this->setGajiPokok($this->jabatan);
        }else if($jabatan == 'Staff'){
            $tunjangan = 0.2 * $this->setGajiPokok($this->jabatan);
        }
        return $tunjangan;
    }

    public function setTunjanganKeluarga($status) {
        $this->status = $status;
        
        $tunjanganKeluarga = ($status == 'Menikah') ? $this->setGajiPokok($this->jabatan) * 0.1 : 0;
        return $tunjanganKeluarga;
    }

    public function setZakatProfesi($agama){
        $this->agama = $agama;

        if($this->setGajiPokok($this->jabatan) > 5999999 && $agama == 'Islam') {
            $zakat_profesi = $this->setGajiPokok($this->jabatan) * 0.025;
        }else{
            $zakat_profesi = 0;
        }
        return $zakat_profesi;
    }

    public function getTotalGaji(){
        $gapok = $this->setGajiPokok($this->jabatan);
        $tunjanganJabatan = $this->setTunjanganJabatan($this->jabatan);
        $tunjanganKeluarga = $this->setTunjanganKeluarga($this->status,$this->jabatan);
        $zakat_profesi = $this->setZakatProfesi($this->agama,$this->jabatan);

        $total_Gaji = $gapok + $tunjanganJabatan + $tunjanganKeluarga - $zakat_profesi;
        return $total_Gaji;
    }

    public function cetak(){
        echo 'NIP Pegawai '.$this->nip;
        echo '<br>Nama Pegawai '.$this->nama;
        echo '<br>Jabatan '. $this->jabatan;
        echo '<br>Agama '.$this->agama;
        echo '<br>Status '.$this->status;
        echo '<br>Gaji Pokok Rp.'.number_format($this->setGajiPokok($this->jabatan),0,',','.');
        echo '<br>Tunjangan Jabatan '.number_format($this->setTunjanganJabatan($this->jabatan),0,',','.');
        echo '<br>Tunjangan Keluarga '.number_format($this->setTunjanganKeluarga($this->status),0,',','.');
        echo '<br>Zakat Profesi '.number_format($this->setZakatProfesi($this->agama,$this->jabatan),0,',','.');
        echo '<br>Gaji Bersih '.number_format($this->getTotalGaji($this->jabatan,$this->status,$this->agama),0,',','.');
        echo '<hr>';

    }

}



?>