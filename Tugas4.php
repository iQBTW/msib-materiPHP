        <?php
        $ar_prodi = ["SI"=>"Sistem Informasi", "TI"=>"Teknik Informatika","ILKOM"=>"Ilmu Komputer","TE"=>"Teknik Elektro"];

        $ar_skill = ["HTML"=>10, "CSS"=>10, "Javascript"=>20, "RWD Bootstrap"=>20, "PHP"=>30, "MySQL"=>30,"Laravel"=>40];
        $domisili = ["Jakarta","Bandung","Bekasi","Malang","Surabaya", "lainnya"];

        ?>
        <fieldset style="background-color:aquamarine;">
            <legend>Form Registrasi Kelompok Belajar</legend>
        <table>
            <thead>
                <tr>
                    <th>Form Registrasi</th>
                </tr>
            </thead>
            <tbody>
                <form method="POST">
                    <tr>
                        <td>NIM : </td>
                        <td> 
                            <input type="text" name="nim" >
                        </td>
                    </tr>
                    <tr>
                        <td>Nama : </td>
                        <td> 
                            <input type="text" name="nama" >
                        </td>
                    </tr>
                    <tr>
                        <td>Jenis Kelamin : </td>
                        <td> 
                            <input type="radio" name="jk" value="Laki-laki" >Laki-Laki &nbsp;
                            <input type="radio" name="jk" value="Laki-laki" >Perempuan 
                        </td>
                    </tr>
                    <tr>
                        <td>Program Studi: </td>
                        <td> 
                            <select name="prodi">
                                <?php 

                                foreach($ar_prodi as $prodi => $v){
                                    ?>
                                    <option value="<?= $prodi ?>"><?= $v ?></option>
                            <?php } ?>
                                </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Skill Programming : </td>
                        <td> 
                            <?php 
                            foreach ($ar_skill as $skill => $s){
                                ?>
                            <input type="checkbox" name="skill[]" value="<?= $skill ?>" ><?= $skill ?>

                            <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Domisili: </td>
                        <td> 
                            <select name="domisili">
                                <?php 

                                foreach($domisili as $d){
                                    ?>
                                    <option value="<?= $d ?>"><?= $d ?></option>
                            <?php } ?>
                                </select>
                        </td>
                    </tr>
                    <tfoot>
                        <tr>
                            <th colspan="2">
                                <button name="proses">Submit</button>
                            </th>
                        </tr>
                    </tfoot>
            </table>
                    

        </fieldset>
        <?php

        if(isset($_POST['proses'])){
            $nim = $_POST['nim'];
            $nama = $_POST['nama'];
            $jk = $_POST['jk'];
            $prodi = $_POST['prodi'];
            $skill = $_POST['skill'];
            $domisili = $_POST['domisili'];

            $skor_skill = 0;
            foreach($skill as $s){
                $skor_skill += $ar_skill[$s];
            }

            function ket_skor($skor_skill){
                $keterangan = "";

                if($skor_skill == 0 ) {
                    $keterangan = "Tidak Memadai";
                } else if($skor_skill >= 1 && $skor_skill <= 40 ) {
                    $keterangan = "Kurang";
                } else if ($skor_skill > 40 && $skor_skill <= 60) {
                    $keterangan = "Cukup";
                } else if($skor_skill > 60 && $skor_skill <= 100) {
                    $keterangan = "Baik";
                } else if ($skor_skill > 100 && $skor_skill <= 150) {
                    $keterangan = "Sangat Baik";
                }

                return $keterangan;
            }

            }
            
        ?>
        <table border="1" cellpadding=5 cellspacing=0 width=100% align="center">
            <tr>
                <td><?= "Nama : ". $nama ?></td>
                <td><?= "NIM : ". $nim ?></td>
                <td><?= "Jenis Kelamin : " . $jk ?></td>
                <td><?= "Program Studi : ". $prodi ?></td>
                <td><?= "Skill : " ?> 
                <?php if(!empty($skill)) {
                    foreach($skill as $s){ ?>
                        <?= $s ?>,
                        <?php } 
                    } else {
                    echo "";
                    } ?>
                </td>
                <td><?= "Skor Skill : ". $skor_skill ?></td>
                <td><?= "Kategori Skill : ". ket_skor($skor_skill) ?></td>
                <td><?= "Domisili : ". $domisili ?></td>    
        </table>