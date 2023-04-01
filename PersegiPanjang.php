<?php
require_once "AbstractLuasKelilingBidang.php";
class PersegiPanjang extends Bentuk2D {
    public $panjang;
    public $lebar;
    public function __construct($panjang,$lebar){
        $this->panjang = $panjang;
        $this->lebar = $lebar;
    }
    public function namaBidang(){
        echo "<center><h3>PersegiPanjang</h3></center>";
    }
    public function luasBidang(){
        $luas = $this->panjang * $this->lebar;
        return $luas;
    }
    public function kelilingBidang(){
        $keliling = ($this->panjang * 2) + ($this->lebar * 2);
        return $keliling;
    }
    public function cetak(){
        echo "<table border=1 align=center cellpadding=10 cellspacing=0>
        <tr>
        <thead>
        <th colspan = 4>Hasil Perhitungan {$this->namaBidang()}
        </th>
        </thead>
        <td>
        Panjang : {$this->panjang}
        </td>
        <td>
        Lebar : {$this->lebar}
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
