<?php
    
    include "../app/class.php";

    $jenis = new Jenis();
    $rows = $jenis->tampilJenis();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Jenis</title>

    <link rel="stylesheet" href="assets/style/style-jenis-tampil.css">
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
        <h1 style="text-align:center">Data Jenis</h1>
        <div class="btn-tambah">
            <a href="jenis-tambah.php">+ Tambah Jenis</a>
        </div>

    <table>
        <tr>
            <th>ID</th>
            <th class="nama-jenis">Nama Jenis</th>
            <th colspan="2" class="aksi-jenis">Aksi</t>
        </tr>
        <?php foreach ($rows as $row) { ?>
            <tr>
                <td class="id"><?php echo $row['id_jenis']; ?></td>
                <td><?php echo $row['nama_jenis']; ?></td>
                <td><a href="jenis-edit.php?id=<?php echo $row['id_jenis']; ?>" class="edit">EDIT</a></td>
                <td><a href="jenis-hapus.php?id=<?php echo $row['id_jenis']; ?>" class="hapus">HAPUS</a></td>
            </tr>
            <?php } ?>     
    </table>

    </div>

    <footer>
        <p>Created by @Bagus Setiawan</p>
    </footer>
    
</body>
</html>


