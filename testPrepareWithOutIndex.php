<?php

require_once __DIR__ . "/utility/connection.php";

// koneksi ke database
$conn = getConnection();

// contoh input parameter dari user
$username = "admin";
$password = "admin";

// membuat kode sql dengan prepare statement index yang dimulai dari satu dan mengganti parameter input user dengan tanda tanya ?
$sql = "SELECT * FROM admin WHERE username = ? AND password = ?";
$statement = $conn->prepare($sql);

//execute statement tanpa bindParam, tetapi langsung memasukan parameter ke dalam function execute
$statement->execute([$username, $password]);

$sukses = false;
$findUser = null;

// melakukan iterasi
foreach($statement as $row){
    // ketika sukses
    $sukses = true;
    $findUser = $row["username"];
}

if($sukses){
    echo "Sukses Login dengan Username : $username" . PHP_EOL;
}else{
    echo "Gagal Login" . PHP_EOL;
}

$conn = null;