<?php
    
    include "../app/class.php";

    $id = $_GET['id'];
    $owner = new Owner();
    $rows = $owner->hapusOwner($id);
    
?>