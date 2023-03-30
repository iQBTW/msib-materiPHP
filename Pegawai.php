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
        $this->jabatan = $jabatan;

        if($jabatan == 'Manager') {
            $gapok = 15000000;
            $tunjangan = 0.2 * $gapok;
        }else if($jabatan == 'Asisten Manager'){
            $gapok = 10000000;
            $tunjangan = 0.2 * $gapok;
        }else if($jabatan == 'Kepala Bagian'){
            $gapok = 7000000;
            $tunjangan = 0.2 * $gapok;
        }else if($jabatan == 'Staff'){
            $gapok = 5000000;
            $tunjangan = 0.2 * $gapok;
        }
        return $tunjangan;
    }

    public function setTunjanganKeluarga($agama, $jabatan) {
        $this->agama = $agama;
        $this->jabatan = $jabatan;

        if($jabatan == 'Manager') {
            $gapok = 15000000;
        }else if($jabatan == 'Asisten Manager'){
            $gapok = 10000000;
        }else if($jabatan == 'Kepala Bagian'){
            $gapok = 7000000;
        }else if($jabatan == 'Staff'){
            $gapok = 5000000;
        }
        
        $tunjanganKeluarga = ($this->agama = $agama == 'Islam') ? $gapok * 0.1 : $gapok;
        return $tunjanganKeluarga;
    }

    public function setZakatProfesi($agama,$jabatan){
        $this->agama = $agama;
        $this->jabatan = $jabatan;


    }

    public function cetak(){
        echo 'NIP Pegawai '.$this->nip;
        echo '<br>Nama Pegawai '.$this->nama;
        echo '<br>Jabatan '. $this->jabatan;
        echo '<br>Agama '.$this->agama;
        echo '<br>Status '.$this->status;
        echo '<br>Gaji Pokok Rp.'.number_format($this->setGajiPokok($this->jabatan),0,',','.');
        echo '<br>Tunjangan Jabatan '.number_format($this->setTunjanganJabatan($this->jabatan),0,',','.');
        echo '<br>Tunjangan Keluarga '.number_format($this->setTunjanganKeluarga($this->agama,$this->jabatan),0,',','.');
        echo '<hr>';

    }

}



?>