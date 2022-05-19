<?php

      include "../app/class.php";
  
      $id = $_GET['id'];
      $barang = new Barang();
      $rows = $barang->hapusBarang($id);
      
?>