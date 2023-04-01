<?php
require_once "abstractLuasKelilingBidang.php";
class Lingkaran extends Bentuk2D {
    public $jari2;
    public function __construct($jari2){
        $this->jari2 = $jari2;
    }
    public function namaBidang(){
        echo "<center><h3>Lingkaran</h3></center>";
    }
    public function luasBidang(){
        $luas = 3.14 * $this->jari2 * $this->jari2;
        return $luas;
    }
    public function kelilingBidang(){
        $keliling = 2 * 3.14 * $this->jari2;
        return $keliling;
    }
    public function cetak(){
        echo "<table border=1 align=center cellpadding=10 cellspacing=0>
        <tr>
        <thead>
        <th colspan = 3>Hasil Perhitungan {$this->namaBidang()}
        </th>
        </thead>
        <td>
        Jari-Jari : {$this->jari2}
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