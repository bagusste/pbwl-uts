<?php
       
       include "../app/class.php";

       $jenis = new Jenis();
       $owner = new Owner();
       $barang = new Barang();
       $rows_jenis = $jenis->tampilJenis();
       $rows_owner = $owner->tampilOwner();
       $rows_barang = $barang->tambahBarang();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Barang</title>

    <link rel="stylesheet" href="assets/style/style-barang-tambah.css">
</head>
<body>
<div class="container">
        <div class="header">
            <img src="assets/img/header.jpg" alt="">
        </div>
        <div class="navigasi">
            <ul>
            <a href="dashboard.php"><li>Beranda</li></a>
                <a href="jenis-tampil.php"><li>Jenis</li></a>
                <a href="owner-tampil.php"><li>Owner</li></a>
                <a href="barang-tampil.php"><li>Barang</li></a>
            </ul>
        </div>
        <div class="logout">
            <ul>
                <a href="keluar.php">Keluar
                <a href="keluar.php"><li><img src="assets/img/logout.png" alt="tombol keluar"></li></a>
                </a>
            </ul>
        </div>
    </div>
    <div class="main">
        <h1>Tambah Barang</h1>
        <form action="" method="post">
            <ul>
                <li>Nama Barang</li>
                <li><input type="text" max-length="50" name="nama-barang" class="form-tambah-barang" required></li>
            </ul>
            <ul>
                <li>Jenis</li>
                <li>
                    <select class="jenis-barang" name="jenis-barang">
                        <option value="">Pilih</option>
                        <?php foreach ($rows_jenis as $row) { ?>
                            <option value="<?php echo $row['id_jenis']; ?>"><?php echo $row['nama_jenis']; ?></option>
                        <?php }     ?>
                    </select>
                 </li>
            </ul>
            <ul>
                <li>Harga Barang</li>
                <li><input type="text" class="form-tambah-barang" name="harga-barang" onkeypress="return event.charCode >= 48 && event.charCode <=57" required></li>
            </ul>
            <ul>
                <li>Owner</li>
                <li>
                <select class="owner-barang" name="owner-barang">
                        <option value="">Pilih</option>
                        <?php foreach ($rows_owner as $row) { ?>
                            <option value="<?php echo $row['id_owner']; ?>"><?php echo $row['nama_owner']; ?></option>
                        <?php } ?>
                    </select>
                 </li>
            </ul>
                    <input type="submit" value="Tambah" name="barang-btn-tambah" class="btn-tambah-barang">
        </form>
    </div>

    <footer>
        <p>Created by @Bagus Setiawan</p>
    </footer>
</body>
</html>

