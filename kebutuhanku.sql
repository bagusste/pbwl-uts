CREATE DATABASE dbkebutuhanku;

USE dbkebutuhanku;

CREATE TABLE tb_user(
id_user INT(4) NOT NULL AUTO_INCREMENT,
nama_user VARCHAR(50),
tgllahir_user DATETIME,
uname_user VARCHAR(50),
password VARCHAR(50),
PRIMARY KEY (id_user),
UNIQUE KEY (uname_user)
);

CREATE TABLE tb_jenis(
id_jenis INT(4) NOT NULL AUTO_INCREMENT,
nama_jenis VARCHAR(50),
PRIMARY KEY (id_jenis),
UNIQUE KEY (nama_jenis)
);

CREATE TABLE tb_owner(
id_owner INT(4) NOT NULL AUTO_INCREMENT,
nama_owner VARCHAR(100),
umur_owner INT(3),
PRIMARY KEY (id_owner),
UNIQUE KEY (nama_owner)
);

CREATE TABLE tb_barang(
id_barang INT(4) NOT NULL AUTO_INCREMENT,
nama_barang VARCHAR(100),
id_jenis_barang INT(4),
harga_barang DOUBLE,
id_owner_barang INT(4),
PRIMARY KEY (id_barang),
UNIQUE KEY (nama_barang),
FOREIGN KEY (id_jenis_barang) REFERENCES tb_jenis(id_jenis),
FOREIGN KEY (id_owner_barang) REFERENCES tb_owner(id_owner)
);

ALTER TABLE tb_jenis AUTO_INCREMENT=0;
ALTER TABLE tb_owner AUTO_INCREMENT=0;
ALTER TABLE tb_barang AUTO_INCREMENT=0;