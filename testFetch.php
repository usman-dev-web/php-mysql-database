<?php

require_once __DIR__ . "/utility/connection.php";

/**
 * sebelumnya kita melakukan perulangan menggunakan foreach untuk melakukan iterasi terhadap object PDOStatement
 * permasalahannya, foreach akan melakukan seluruh perulangan di hasil result, bagaimana jika kita hanya ingin mengambil data pertama saja?
 * maka kita harus membuat counter secara manual
 * untungnya di PDOStatement memiliki sebuah function bernama fetch(), fetch() digunakan untuk menarik satu data dari hasil query, ketika kita memanggil function fetch lagi, maka
 * otomatis akan menarik data selanjutnya dan seterusnya
 * jika function fetch mengembalikan nilai false, artinya sudah tidak ada data lagi yang bisa diambil dari hasil query
 * jika kita ingin mengambil semua data sekaligus, kita bisa menggunakan fetchAll()
 */

 // kode function fetch
 $connection = getConnection(); // memanggil connection ke database
 
 // simulasi input dari user
 $username = "admin";
 $password = "admin";

 // kode sql
 $sql = "SELECT * FROM admin WHERE username = ? AND password = ?";
 $result = $connection->prepare($sql);
 $result->execute([$username, $password]);

 // iterasi
 if($row = $result->fetch()){
    echo "sukses login : " . $row["username"] . PHP_EOL;
 }else{
    echo "gagal login" . PHP_EOL;
 }

 $connection = null;