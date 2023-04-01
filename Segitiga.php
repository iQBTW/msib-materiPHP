<?php
require_once "AbstractLuasKelilingBidang.php";
class Segitiga extends Bentuk2D {
    public $alas;
    public $tinggi;
    public $sisi1;
    public $sisi2;
    public $sisi3;
    public function __construct($alas,$tinggi,$sisi1,$sisi2,$sisi3){
        $this->alas = $alas;
        $this->tinggi = $tinggi;
        $this->sisi1 = $sisi1;
        $this->sisi2 = $sisi2;
        $this->sisi3 = $sisi3;
    }
    public function namaBidang(){
        echo "<center><h3>Segitiga</h3></center>";
    }
    public function luasBidang(){
        $luas = 0.5 * $this->alas * $this->tinggi;
        return $luas;
    }
    public function kelilingBidang(){
        $keliling = $this->sisi1 * $this->sisi2 * $this->sisi3;
        return $keliling;
    }
    public function cetak(){
        echo "<table border=1 align=center cellpadding=10 cellspacing=0>
        <tr>
        <thead>
        <th colspan = 7>Hasil Perhitungan {$this->namaBidang()}
        </th>
        </thead>
        <td>
        Alas : {$this->alas}
        </td>
        <td>
        Tinggi : {$this->tinggi}
        </td>
        <td>
        Sisi 1 : {$this->sisi1}
        </td>
        <td>
        Sisi 2 : {$this->sisi2}
        </td>
        <td>
        Sisi 3 : {$this->sisi3}
        </td>
        <td>
        Luas : {$this->luasBidang()}
        </td>
        <td>
        Keliling : {$this->kelilingBidang()}
        </td>
        </tr>
        </table>
        <hr>";
    }
}
?>
