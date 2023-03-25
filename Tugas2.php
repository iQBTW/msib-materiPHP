<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/Tugas2.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <form action="" method="POST">
            <table border="1">
                <thead>
                    <tr>
                        <td>
                            <h3>Form Input Gaji</h3>
                        </td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <label for="">Nama : </label>
                            <input type="text" name="nama" id="input_nama" placeholder="Masukkan Nama">
                            <br>
                            <label for="">Jabatan : </label>
                            <select name="jabatan" id="">
                                <option value="">----Pilih Jabatan----</option>
                                <option value="Manager">Manager</option>
                                <option value="Asisten">Asisten</option>
                                <option value="Kepala Bagian">Kepala Bagian</option>
                                <option value="Staff">Staff</option>
                            </select>
                            <!-- <input type="text" name="jabatan" id="input_jabatan" placeholder="Masukkan Jabatan"> -->
                            <br>
                            <label for="">Agama : </label>
                            <select name="agama" id="">
                                <option value="">----Pilih Agama----</option>
                                <option value="Islam">Islam</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Kristen">Kristen</option>
                                <option value="Buddha">Buddha</option>
                            </select>
                            <!-- <input type="text" name="agama" id="input_agama" placeholder="Masukkan Agama"> -->
                            <br> 
                            <label for="">Status Keluarga : </label>
                            <select name="status" id="">
                                <option value="">----Pilih Status Keluarga----</option>
                                <option value="Menikah">Menikah</option>
                                <option value="Belum Menikah">Belum Menikah</option>
                            </select>
                            <!-- <input type="text" name="status" id="input_status" placeholder="Masukkan Status Keluarga"> -->
                            <br>
                            <label for="">Jumlah Anak : </label>
                            <input type="number" name="jmlhanak" id="input_jmlhanak" placeholder="Masukkan Jumlah Anak">
                            <br>
                        </td>
                    </tr>
                    <tr>
                        <td class="btn">
                            <button type="submit" name="proses">Submit</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
    <?php
    $nama = isset($_POST['nama']) ? $_POST['nama'] : '';
    $jabatan = isset($_POST['jabatan']) ? $_POST['jabatan'] : '';
    $status = isset($_POST['status']) ? $_POST['status'] : '';
    $agama = isset($_POST['agama']) ? $_POST['agama'] : '';
    $jumlahanak = isset($_POST['jmlhanak']) ? $_POST['jmlhanak'] : '';
    $gajiKotor = isset($_POST['gajiKotor']) ? $_POST['gajiKotor'] : '';

    switch($jabatan){
        case "Manager" : $gajipokok = 20000000;break;
        case "Asisten" : $gajipokok = 15000000;break;
        case "Kepala Bagian" : $gajipokok = 10000000;break;
        case "Staff" : $gajipokok = 4000000;break;
    }

    if($jabatan == "Manager" && $status == "Menikah" && $jumlahanak > 2 && $jumlahanak <=5) {
        $tunjangan = 0.2 * $gajipokok;
        $tunjanganKeluarga = 0.1 * $gajipokok;
        $gajiKotor = $gajipokok + $tunjangan + $tunjanganKeluarga;
    }else if($jabatan == "Manager" && $status == "Menikah" && $jumlahanak >= 1 && $jumlahanak <=2){
        $tunjangan = 0.2 * $gajipokok;
        $tunjanganKeluarga = 0.05 * $gajipokok;
        $gajiKotor = $gajipokok + $tunjangan + $tunjanganKeluarga;
    }else if($jabatan == "Manager" && $status == "Belum Menikah" && $jumlahanak < 1){
        $tunjangan = 0.2 * $gajipokok;
        $tunjanganKeluarga = 'Tidak dapat tunjangan keluarga';
        $gajiKotor = $gajipokok + $tunjangan;
    }

    if($jabatan == "Asisten" && $status == "Menikah" && $jumlahanak > 2 && $jumlahanak <=5) {
        $tunjangan = 0.2 * $gajipokok;
        $tunjanganKeluarga = 0.1 * $gajipokok;
        $gajiKotor = $gajipokok + $tunjangan + $tunjanganKeluarga;
    }else if($jabatan == "Asisten" && $status == "Menikah" && $jumlahanak >= 1 && $jumlahanak <=2){
        $tunjangan = 0.2 * $gajipokok;
        $tunjanganKeluarga = 0.05 * $gajipokok;
        $gajiKotor = $gajipokok + $tunjangan + $tunjanganKeluarga;
    }else if($jabatan == "Asisten" && $status == "Belum Menikah" && $jumlahanak < 1){
        $tunjangan = 0.2 * $gajipokok;
        $tunjanganKeluarga = 'Tidak dapat tunjangan keluarga';
        $gajiKotor = $gajipokok + $tunjangan;
    }

    if($jabatan == "Kepala Bagian" && $status == "Menikah" && $jumlahanak > 2 && $jumlahanak <=5){
        $tunjangan = 0.2 * $gajipokok;
        $tunjanganKeluarga = 0.1 * $gajipokok;
        $gajiKotor = $gajipokok + $tunjangan + $tunjanganKeluarga;
    }else if($jabatan == "Kepala Bagian" && $status == "Menikah" && $jumlahanak >= 1 && $jumlahanak <= 2 ){
        $tunjangan = 0.2 * $gajipokok;
        $tunjanganKeluarga = 0.05 * $gajipokok;
        $gajiKotor = $gajipokok + $tunjangan + $tunjanganKeluarga;
    }else if($jabatan == "Kepala Bagian" && $status == "Belum Menikah" && $jumlahanak < 1){
        $tunjangan = 0.2 * $gajipokok;
        $tunjanganKeluarga = 'Tidak dapat tunjangan keluarga';
        $gajiKotor = $gajipokok + $tunjangan;
    }

    if($jabatan == "Staff" && $status == "Menikah" && $jumlahanak > 2 && $jumlahanak <=5) {
        $tunjangan = 0.2 * $gajipokok;
        $tunjanganKeluarga = 0.1 * $gajipokok;
        $gajiKotor = $gajipokok + $tunjangan + $tunjanganKeluarga;
    }else if($jabatan == "Staff" && $status == "Menikah" && $jumlahanak >= 1 && $jumlahanak <=2) {
        $tunjangan = 0.2 * $gajipokok;
        $tunjanganKeluarga = 0.05 * $gajipokok;
        $gajiKotor = $gajipokok + $tunjangan + $tunjanganKeluarga;
    }else if($jabatan == "Staff" && $status == "Belum Menikah" && $jumlahanak < 1){
        $tunjangan = 0.2 * $gajipokok;
        $tunjanganKeluarga = 'Tidak dapat tunjangan keluarga';
        $gajiKotor = $gajipokok + $tunjangan;
    }

    $zakat_profesi = ($agama == "Islam") ? $gajiKotor - (0.025 * $gajiKotor) : $gajiKotor;

    if(isset($_POST['proses'])){
    ?>
    Nama : <?= isset($nama) ? $nama: ''; ?>
    <br> Agama : <?= $agama ?>
    <br> Jabatan : <?= $jabatan ?>
    <br> Gaji Pokok : <?= $gajipokok ?>
    <br> Status Keluarga : <?= $status ?>
    <br> Tunjangan Jabatan : <?= $tunjangan ?>
    <br> Tunjangan Keluarga : <?= $tunjanganKeluarga ?>
    <br> Gaji Kotor : <?= $gajiKotor ?>
    <br> Gaji Bersih : <?= $zakat_profesi ?>
    <?php } ?>
</body>
</html>