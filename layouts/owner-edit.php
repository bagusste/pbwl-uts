<?php

    include "../app/class.php";

    $id = $_GET['id'];
    $owner = new Owner();
    $rows = $owner->getOwner($id);
    $rows1 = $owner->editOwner($id);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Owner</title>

    <link rel="stylesheet" href="assets/style/style-owner-edit.css">
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
        <h1>Edit Owner</h1>
        <form action="" method="post">
            <ul>
                <li>Nama Owner</li>
                <li><input type="text" max-length="50" name="nama-owner" class="form-tambah-owner" value="<?php echo $rows['nama_owner']; ?>" required></li>
            </ul>
            <ul>
                <li>Umur</li>
                <li><input type="text" max-length="50" name="umur-owner" class="form-tambah-owner" value="<?php echo $rows['umur_owner']; ?>" required></li>
            </ul>
                    <input type="submit" value="Simpan" name="owner-btn-edit" class="btn-edit-owner">
        </form>
    </div>

    <footer>
        <p>Created by @Bagus Setiawan</p>
    </footer>
</body>
</html>