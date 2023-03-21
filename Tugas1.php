<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/Tugas1.css">
    <title>Document</title>
</head>
<body>
    
<?php
    if(isset($_POST['hitung_keliling'])) {
        $sisiA = $_POST['sisia'];
        $sisiB = $_POST['sisib'];
        $sisiC = $_POST['sisic'];
        $sisiD = $_POST['sisid'];

        $kelilingJajar = $sisiA + $sisiB + $sisiC + $sisiD;

    }

    if(isset($_POST['hitung_luas'])) {
        $alas = $_POST['alas'];
        $tinggi = $_POST['tinggi'];

        $luasJajar = $alas * $tinggi;
    } 
    ?>    

    <div>
        <form action="" method="post">
            <table>
                <thead>
                    <tr>
                        <td colspan="2">
                            <h3>Rumus Luas & Keliling Jajar Genjang</h3>
                        </td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <label for="SisiA">Sisi A : </label>
                            <br>
                            <input type="number" name="sisia" id="sisi_A" value="Masukkan Sisi A">
                            <br>
                            <label for="SisiA">Sisi B : </label>
                            <br>
                            <input type="number" name="sisib" id="sisi_B" value="Masukkan Sisi A">
                            <br>
                            <label for="SisiA">Sisi C : </label>
                            <br>
                            <input type="number" name="sisic" id="sisi_C" value="Masukkan Sisi A">
                            <br>
                            <label for="SisiA">Sisi D : </label>
                            <br>
                            <input type="number" name="sisid" id="sisi_D" value="Masukkan Sisi A">
                        </td>
                        <td>
                            <label for="Alas">Alas : </label>
                            <br>
                            <input type="number" name="alas" id="alaS">
                            <br>
                            <label for="Tinggi">Tinggi : </label>
                            <br>
                            <input type="number" name="tinggi" id="tinggI">
                            <br>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <button type="submit" name="hitung_keliling">Hitung Keliling</button>
                        </td>
                        <td>
                            <button type="submit" name="hitung_luas">Hitung Luas</button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="hasil">Hasil Keliling : </label>
                            <br>
                            <input type="text" id="hasil_luas" name="hasil_luas" value="<?php echo isset($kelilingJajar) ? $kelilingJajar: ''; ?>">
                        </td>
                        <td>
                            <label for="hasil">Hasil Luas : </label>
                            <br>
                            <input type="text" id="hasil_luas" name="hasil_luas" value="<?php echo isset($luasJajar) ? $luasJajar: ''; ?>">
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>


</body>
</html>