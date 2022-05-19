<?php
   
   include "../app/class.php";
   
   $id = $_GET['id'];
   $jenis = new Jenis();
   $rows= $jenis->hapusJenis($id);

?>