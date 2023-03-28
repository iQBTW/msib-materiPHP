<?php 
$m1 = ['NIM'=>'01111021', 'nama'=>'Andi', 'nilai'=>80];
$m2 = ['NIM'=>'01111022', 'nama'=>'Ani', 'nilai'=>70];
$m3 = ['NIM'=>'01111023', 'nama'=>'Ari', 'nilai'=>50];
$m4 = ['NIM'=>'01111024', 'nama'=>'Aji', 'nilai'=>40];
$m5 = ['NIM'=>'01111025', 'nama'=>'Ali', 'nilai'=>90];
$m6 = ['NIM'=>'01111026', 'nama'=>'Ai', 'nilai'=>75];
$m7 = ['NIM'=>'01111027', 'nama'=>'Budi', 'nilai'=>30];
$m8 = ['NIM'=>'01111028', 'nama'=>'Bani', 'nilai'=>85];
$mahasiswa = [$m1,$m1,$m3,$m4,$m5,$m6,$m7,$m8];
$jumlah_mhs = count($mahasiswa); //Jumlah Mahasiswa
$nilai_mhs = array_column($mahasiswa,'nilai');
$max_nilai = max($nilai_mhs); //Nilai Tertinggi Mahasiswa
$min_nilai = min($nilai_mhs); //Nilai Terendah Mahasiswa
$total_nilai = array_sum($nilai_mhs);
$rata_rata = $total_nilai / $jumlah_mhs; //Rata Mahasiswa
$ar_judul = ['No','NIM','Nama','Nilai','Keterangan','Grade','Predikat'];
$Tfoot = ['Jumlah Mahasiswa', 'Nilai Tertinggi', 'Nilai Terendah', 'Rata-rata'];
?>

<table border="1px" width="100%" bgcolor="blue">
<thead>
    
    <tr>
    <?php 
    foreach($ar_judul as $judul){
        ?>
        <th><?= $judul ?></th>
        <?php }?>
    </tr>

</thead>
<tbody>
<?php
$no = 1;
foreach($mahasiswa as $mhs){
$ket = ($mhs['nilai']>= 60) ? 'Lulus' : 'Tidak lulus';
//grade 
if ($mhs['nilai'] >= 80 && $mhs['nilai'] <= 100) $grade = 'A';
else if ($mhs['nilai']>= 75 && $mhs['nilai'] < 80) $grade = 'B';
else if ($mhs['nilai']>= 60 && $mhs['nilai'] < 74) $grade = 'C';
else if ($mhs['nilai']>= 30 && $mhs['nilai'] < 59) $grade = 'D';
else if ($mhs['nilai']>= 0 && $mhs['nilai'] < 29) $grade = 'E';
else $grade = '';

//Predikat
switch($grade) {
    case "A": $predikat = "Memuaskan";
    break;
    case "B": $predikat = "Baik";
    break;
    case "C": $predikat = "Cukup";
    break;
    case "D": $predikat = "Kurang";
    break;
    case "E": $predikat = "Sangat Kurang";
    break;
    default: $predikat = "";
    break;
}
    ?>
    <tr>
        <td><?= $no ?> </td>
        <td><?= $mhs['NIM']?></td>
        <td><?= $mhs['nama']?></td>
        <td><?= $mhs['nilai']?></td>
        <td><?= $ket ?></td>
        <td><?= $grade ?></td>
        <td><?= $predikat ?></td>
</tr>
<?php $no++; } ?>
</tbody>
<tfoot>
    <tr>
        <?php 
        foreach($Tfoot as $judulTfoot){
            ?>
            <th colspan="2">
                <?= $judulTfoot ?>
            </th>
        <?php } ?>
    </tr> 
    <tr>
        <td colspan="2" align="center">
            <?= $jumlah_mhs ?>
        </td>
        <td colspan="2" align="center">
            <?= $max_nilai ?>
        </td>
        <td colspan="2" align="center">
            <?= $min_nilai ?>
        </td>
        <td colspan="2" align="center">
            <?= $rata_rata ?>
        </td>
    </tr>
</tfoot>