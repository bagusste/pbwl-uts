<?php

$vendor_path = dirname($_SERVER["PHP_SELF"]) == "/kebutuhanku/layouts" ? "../vendor/autoload.php":"vendor/autoload.php"; 


require $vendor_path;

use Respect\Validation\Validator as v;

class Koneksi{

    protected $db; 
        
        public function __construct() 
        { 
            try { 
            $this->db = new PDO("mysql:host=localhost;dbname=dbkebutuhanku", "root", "");
        }
        catch (PDOException $e) { 
            die ("Error " . $e->getMessage()); 
        } 
    }
}

class Users extends Koneksi {
    public function LoginUser()
    {
        if(isset($_POST['btn-masuk'])){
            $uname = $_POST['masuk-uname'];
            $password = MD5($_POST['masuk-password']);
    
    
            $sql = "SELECT * FROM tb_user WHERE uname_user= :uname AND password= :pass";
    
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(":uname", $uname);
            $stmt->bindParam(":pass", $password);
            $stmt->execute();
        
            $row = $stmt->rowCount();

    
            if($row == 1){
                $_SESSION['masuk-uname'] = $uname;
                header("location: layouts/dashboard.php");
                $_SESSION['is_login'] == 1;
            }else{
    
            header("location: layouts/pesan.php?pesan=1");
            }
        }
    }

    public function tambahUser()
    {
        if (isset($_POST['btn-daftar'])) {
            $nama = $_POST['daftar-nama'];
            $tgllahir = $_POST['daftar-tgllahir'];
            $uname = $_POST['daftar-uname'];
            $password = md5($_POST['daftar-password']);
            $error = false;
    
            echo "<div class='error'>";

            if(!v::date()->validate($tgllahir)) {
                echo "Tgl Error <br>";
                $error = true;
            }  
            
            if(!v::stringType()->length(3, 128)->validate($nama)) {
                echo "Nama Minimal 3 - 128 Karakter <br>";
                $error = true;
            }  
            
            if(!v::alpha(' ')->validate($nama)) {
                echo "Nama Hanya Menggunakan Huruf <br>";
                $error = true;
            } 
            
            if(!v::stringType()->length(6, 16)->validate($uname)) {
                echo "Username Minimal 6 - 16 Karakter <br>";
                $error = true;
            } 
            
            if(!v::alnum('.','_')->validate($uname)) {
                echo "Username Hanya Menggunakan Huruf dan Angka <br>";
                $error = true;
            }
            
            if(!v::alnum()->validate($password)) {
                echo "Password Hanya Menggunakan Huruf dan Angka <br>";
                $error = true;
            }

            if(!v::stringType()->length(8, 16)->validate($password)) {
                echo "Password Minimal 8 - 16 Karakter <br>";
                $error = true;
            }

            echo "</div>";
            if (!$error){
                $sql = "INSERT INTO tb_user (nama_user, tgllahir_user, uname_user, password)
                    VALUES(:nama_user, :tgllahir_user, :uname_user, :password)";
            
                $stmt = $this->db->prepare($sql);
                $stmt->bindParam(":nama_user", $nama);
                $stmt->bindParam(":tgllahir_user", $tgllahir);
                $stmt->bindParam(":uname_user", $uname);
                $stmt->bindParam(":password", $password);
                $stmt->execute();
            
                header("location: ../layouts/pesan.php?pesan=11");
            }
        }
    }

    public function exitUser()
    {
        session_start();
        session_destroy();
 
        header("Location: ../index.php");
    }
}

class Jenis extends Koneksi{
    public function tampilJenis()
    {
        $sql = "SELECT * FROM tb_jenis ORDER BY id_jenis ASC";
    
        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        $data = [];
        while ($rows = $stmt->fetch())
        {
            $data[] = $rows;
        }
        return $data;
    }

    public function tambahJenis()
    {
        if (isset($_POST['jenis-btn-tambah'])) {
           
            $jenis_nama = $_POST['nama-jenis'];

            $sql = "INSERT INTO tb_jenis (nama_jenis) VALUES
            (:nama_jenis)";

            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(":nama_jenis", $jenis_nama);
            $stmt->execute();
            
            header("location: pesan.php?pesan=9");
        }
    }

    public function getJenis($id)
    {
        $sql = "SELECT * FROM tb_jenis WHERE id_jenis=:id_jenis";
            
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":id_jenis", $id);
        $stmt->execute();
        
        $row = $stmt->fetch();

        return $row;
    }

    public function editJenis($id)
    {
        if (isset($_POST['jenis-btn-edit'])) {
            
            $jenis_nama = $_POST['nama-jenis'];
            
            $sql = "UPDATE tb_jenis SET nama_jenis=:nama_jenis WHERE id_jenis=:id_jenis";
            
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(":id_jenis", $id);
            $stmt->bindParam(":nama_jenis", $jenis_nama);
            $stmt->execute();
            
            header('location: pesan.php?pesan=3');
        }
    }

    public function hapusJenis($id)
    {
        if (isset($_GET['id'])) {
            $sql = "DELETE FROM tb_jenis WHERE id_jenis=:id_jenis";
            $sql2 = "SELECT id_barang FROM tb_barang WHERE id_jenis_barang=:id_jenis";

            $stmt = $this->db->prepare($sql2);
            $stmt->bindParam(":id_jenis", $id);
            $stmt->execute();
            
            if ($stmt->rowCount()) {
                header("location: pesan.php?pesan=13");
                exit();
            }

            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(":id_jenis", $id);
            $stmt->execute();

            header("location: pesan.php?pesan=6");
        }
    }
}

class Owner extends Koneksi{
    public function tampilOwner()
    {
        $sql = "SELECT * FROM tb_owner ORDER BY id_owner ASC";
    
        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        $data = [];
        while ($rows = $stmt->fetch())
        {
            $data[] = $rows;
        }
        return $data;
    }

    public function tambahOwner()
    {
        if (isset($_POST['owner-btn-tambah'])) {
   
            $owner_nama = $_POST['nama-owner'];
            $owner_umur = $_POST['umur-owner'];
            
            $sql = "INSERT INTO tb_owner (nama_owner, umur_owner) VALUES
            (:nama_owner, :umur_owner)";
            
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(":nama_owner", $owner_nama);
            $stmt->bindParam(":umur_owner", $owner_umur);
            $stmt->execute();
            
            header("location: pesan.php?pesan=10");
            }
    }

    public function getOwner($id)
    {
        if (isset($_GET['id'])) {
            $sql = "SELECT * FROM tb_owner WHERE id_owner=:id_owner";
        
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(":id_owner", $id);
            $stmt->execute();

            $row = $stmt->fetch();

            return $row;
        }
    }

    public function editOwner($id)
    {
        if (isset($_POST['owner-btn-edit'])) {
            
            $owner_nama = $_POST['nama-owner'];
            $owner_umur = $_POST['umur-owner'];
            
            $sql = "UPDATE tb_owner SET nama_owner=:nama_owner, umur_owner=:umur_owner WHERE id_owner=:id_owner";
            
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(":id_owner", $id);
            $stmt->bindParam(":nama_owner", $owner_nama);
            $stmt->bindParam(":umur_owner", $owner_umur);
            $stmt   ->execute();
            
            header('location: pesan.php?pesan=4');
        }
    }

    public function hapusOwner($id)
    {
        if (isset($_GET['id'])) {
             
            $sql = "SELECT id_barang FROM tb_barang WHERE id_owner_barang=:id_owner";
            $sql1 = "DELETE FROM tb_owner WHERE id_owner=:id_owner";
            
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(":id_owner", $id);
            $stmt->execute();
            
             if ($stmt->rowCount()) {
                 header("location: pesan.php?pesan=14");
                 exit();
            } 
     
            $stmt = $this->db->prepare($sql1);
            $stmt->bindParam(":id_owner", $id);
            $stmt->execute();
            
            header("location: pesan.php?pesan=7");
             
         }
    }
}

class Barang extends Koneksi{
    public function tampilBarang()
    {
        $sql = "SELECT * FROM tb_barang JOIN tb_jenis ON tb_jenis.id_jenis=tb_barang.id_jenis_barang 
        JOIN tb_owner ON tb_owner.id_owner=tb_barang.id_owner_barang
        ORDER BY id_barang ASC";

        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        $data = [];
        while ($rows = $stmt->fetch())
        {
            $data[] = $rows;
        }
        return $data;
    }

    public function tambahBarang()
    {
        if (isset($_POST['barang-btn-tambah'])) {
            
            $barang_nama = $_POST['nama-barang'];
            $barang_jenis = $_POST['jenis-barang'];
            $barang_harga = $_POST['harga-barang'];
            $barang_owner = $_POST['owner-barang'];
            //SQL
            $sql = "INSERT INTO tb_barang (nama_barang, id_jenis_barang, harga_barang, id_owner_barang) VALUES
            (:nama_barang, :id_jenis_barang, :harga_barang, :id_owner_barang)";
    
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(":nama_barang", $barang_nama);
            $stmt->bindParam(":id_jenis_barang", $barang_jenis);
            $stmt->bindParam(":harga_barang", $barang_harga);
            $stmt->bindParam(":id_owner_barang", $barang_owner);
            $stmt->execute();
            
            header("location: pesan.php?pesan=8");
        }
    }

    public function getBarang($id)
    {
        if (isset($_GET['id'])) {
            $sql = "SELECT * FROM tb_barang JOIN tb_jenis ON tb_barang.id_jenis_barang=tb_jenis.id_jenis 
                    JOIN tb_owner ON tb_barang.id_owner_barang=tb_owner.id_owner WHERE id_barang=:id_barang";
                
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(":id_barang", $id);
            $stmt->execute();
        
            $row = $stmt->fetch();

            return $row;
        }
    }

    public function editBarang($id)
    {
        if (isset($_POST['barang-btn-edit'])) {
            
            $barang_nama = $_POST['nama-barang'];
            $barang_jenis = $_POST['jenis-barang'];
            $barang_harga = $_POST['harga-barang'];
            $barang_owner = $_POST['owner-barang'];
            
            $sql = "UPDATE tb_barang SET nama_barang=:nama_barang, id_jenis_barang=:id_jenis_barang, harga_barang=:harga_barang, 
                    id_owner_barang=:id_owner_barang WHERE id_barang=:id_barang";
            
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(":id_barang", $id);
            $stmt->bindParam(":nama_barang", $barang_nama);
            $stmt->bindParam(":id_jenis_barang", $barang_jenis);
            $stmt->bindParam(":harga_barang", $barang_harga);
            $stmt->bindParam(":id_owner_barang", $barang_owner);
            $stmt->execute();
    
            header('location: pesan.php?pesan=2');
        }
    }

    public function hapusBarang($id)
    {
        if (isset($_GET['id'])) {
           
            $sql = "DELETE FROM tb_barang WHERE id_barang=:id_barang";
            
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(":id_barang", $id);
            $stmt->execute();
     
            header("location: pesan.php?pesan=5");
            }
    }
}

?>