<?php

    include "../app/class.php";

    $users = new Users();
    $rows = $users->tambahUser();
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>

    <link rel="stylesheet" href="../layouts/assets/style/style-daftar.css">
</head>
<body>
    <div class="header">
        <img src="../assets/img/header.jpg" alt="">
    </div>    
  <form action="" method="post" id="form-daftar" class="daftar">
  <h1>Registrasi</h1>
      <ul>
          <li class="biodata">Nama lengkap</li>
          <li><input type="text" name="daftar-nama" class="form-daftar" required></li>
      </ul>
      <ul>
          <li class="biodata">Tanggal Lahir</li>
          <li><input type="date" name="daftar-tgllahir" class="form-daftar" required></li>
      </ul>
      <ul>
          <li class="biodata">Username</li>
          <li><input type="text" name="daftar-uname" class="form-daftar" required></li>
      </ul>
      <ul>
          <li class="biodata">Password</li>
          <li><input type="password" name="daftar-password" class="form-daftar" required></li>
      </ul>
      <div style="text-align: center">
        <input type="submit" name="btn-daftar" value="Registrasi" id="btn-daftar"><br>
        <a href="../index.php">Masuk</a>
      </div>
  </form>
  <footer>
        <p>Created by @Bagus Setiawan</p>
    </footer>
</body>
</html>