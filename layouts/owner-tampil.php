<?php
   
   include "../app/class.php";

   $owner = new Owner();
   $rows = $owner->tampilOwner();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Owner</title>

    <link rel="stylesheet" href="assets/style/style-owner-tampil.css">
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
        <h1 style="text-align:center">Data Owner</h1>
        <div class="btn-tambah">
            <a href="owner-tambah.php">+ Tambah Owner</a>
        </div>

    <table>
        <tr>
            <th>ID</th>
            <th class="nama-owner">Nama Owner</th>
            <th class="umur-owner">Umur</th>
            <th colspan="2" class="aksi-owner">Aksi</t>
        </tr>
        <?php foreach ($rows as $row) { ?>
            <tr>
                <td class="id"><?php echo $row['id_owner']; ?></td>
                <td><?php echo $row['nama_owner']; ?></td>
                <td><?php echo $row['umur_owner']; ?> Tahun</td>
                <td><a href="owner-edit.php?id=<?php echo $row['id_owner']; ?>" class="edit">EDIT</a></td>
                <td><a href="owner-hapus.php?id=<?php echo $row['id_owner']; ?>" class="hapus">HAPUS</a></td>
            </tr>
            <?php } ?>     
    </table>

    </div>

    <footer>
        <p>Created by @Bagus Setiawan</p>
    </footer>
    
</body>
</html>


