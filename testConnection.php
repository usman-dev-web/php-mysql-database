<?php

// membuaat koneksi ke database dengan PDO
$host = "localhost";
$port = 3306;
$database = "belajar_php_database";
$username = "root";
$password = "";

// membuat object PDO
// $connection = new PDO("mysql:host=$host:$port;dbname=$database", $username, $password);
// echo "sukses masuk ke database" . PHP_EOL;

// menggunakan try catch PDOException
try{
    // memasukan object yang bisa menyebabkan error
    $connection = new PDO("mysql:host=$host:$port;dbname=$database", $username, $password);

    // menutup koneksi ke database dengan men-set object pdo menjadi null
    $connection = null;
}catch(PDOException $e){
    echo "gagal terkoneksi ke database : " . $e->getMessage() . PHP_EOL;
}