DROP TABLE IF EXISTS produk ;
CREATE TABLE produk (
	id int PRIMARY KEY AUTO_INCREMENT, 
	nama_produk varchar(255) default null, 
	keterangan varchar(255) default null, 
	harga int default null, 
	jumlah int default null
);

INSERT INTO produk (nama_produk,keterangan,harga,jumlah) values ("Indomie","Bumbu Masakan",2500,5); 
INSERT INTO produk (nama_produk,keterangan,harga,jumlah) values ("Mi Sedap","Bumbu Masakan",2500,5); 
INSERT INTO produk (nama_produk,keterangan,harga,jumlah) values ("Sirup ABC","Bumbu Masakan",2500,5); 
INSERT INTO produk (nama_produk,keterangan,harga,jumlah) values ("Kecap ABC","Bumbu Masakan",2500,5); 

select * FROM produk p ;
