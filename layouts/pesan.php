<?php
    if(isset($_GET['pesan'])){
        $pesan = $_GET['pesan'];

        if($pesan == 1){
            ?>
            <p style="text-align:center; position:relative; top:300px; font-weight:bolder;">Username atau Password salah, coba lagi!</p>
            <?php
            echo "<meta http-equiv='refresh' content='1;url=../index.php'>";

       } elseif($pesan == 2){
            ?>
            <p style="text-align:center; position:relative; top:300px; font-weight:bolder;">Data Berhasil Disimpan!</p>
            <?php
            echo "<meta http-equiv='refresh' content='1;url=barang-tampil.php'>";
        }elseif($pesan == 3){
            ?>
            <p style="text-align:center; position:relative; top:300px; font-weight:bolder;">Data Berhasil Disimpan!</p>
            <?php
            echo "<meta http-equiv='refresh' content='1;url=jenis-tampil.php'>";
        }elseif($pesan == 4){
            ?>
            <p style="text-align:center; position:relative; top:300px; font-weight:bolder;">Data Berhasil Disimpan!</p>
            <?php
            echo "<meta http-equiv='refresh' content='1;url=owner-tampil.php'>";
        }elseif($pesan == 5){
            ?>
            <p style="text-align:center; position:relative; top:300px; font-weight:bolder;">Data Berhasil Dihapus!</p>
            <?php
            echo "<meta http-equiv='refresh' content='1;url=barang-tampil.php'>";
        }elseif($pesan == 6){
            ?>
            <p style="text-align:center; position:relative; top:300px; font-weight:bolder;">Data Berhasil Dihapus!</p>
            <?php
            echo "<meta http-equiv='refresh' content='1;url=jenis-tampil.php'>";
        }elseif($pesan == 7){
            ?>
            <p style="text-align:center; position:relative; top:300px; font-weight:bolder;">Data Berhasil Dihapus!</p>
            <?php
            echo "<meta http-equiv='refresh' content='1;url=owner-tampil.php'>";
        }elseif($pesan == 8){
            ?>
            <p style="text-align:center; position:relative; top:300px; font-weight:bolder;">Data Berhasil Ditambah!</p>
            <?php
            echo "<meta http-equiv='refresh' content='1;url=barang-tampil.php'>";
        }elseif($pesan == 9){
            ?>
            <p style="text-align:center; position:relative; top:300px; font-weight:bolder;">Data Berhasil Ditambah!</p>
            <?php
            echo "<meta http-equiv='refresh' content='1;url=jenis-tampil.php'>";
        }elseif($pesan == 10){
            ?>
            <p style="text-align:center; position:relative; top:300px; font-weight:bolder;">Data Berhasil Ditambah!</p>
            <?php
            echo "<meta http-equiv='refresh' content='1;url=owner-tampil.php'>";
        }elseif($pesan == 11){
            ?>
            <p style="text-align:center; position:relative; top:300px; font-weight:bolder;">Pendaftaran Berhasil!</p>
            <?php
            echo "<meta http-equiv='refresh' content='1;url=../index.php'>";
        }elseif($pesan == 12){
            ?>
            <p style="text-align:center; position:relative; top:300px; font-weight:bolder;">Data Tidak Dapat Dihapus!</p>
            <?php
            echo "<meta http-equiv='refresh' content='1;url=../view/barang-tampil.php'>";
        }elseif($pesan == 13){
            ?>
            <p style="text-align:center; position:relative; top:300px; font-weight:bolder;">Data Tidak Dapat Dihapus!</p>
            <?php
            echo "<meta http-equiv='refresh' content='1;url=jenis-tampil.php'>";
        }elseif($pesan == 14){
            ?>
            <p style="text-align:center; position:relative; top:300px; font-weight:bolder;">Data Tidak Dapat Dihapus!</p>
            <?php
            echo "<meta http-equiv='refresh' content='1;url=owner-tampil.php'>";
        }
    }
?>