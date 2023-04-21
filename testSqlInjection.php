<?php

require_once __DIR__ . "/utility/connection.php";

$connection = getConnection();

// simulasi input parameter sql dari user
$username = $connection->quote("admin"); // mencegah sql injection dengan function quote
$password = $connection->quote("admin"); // mencegah sql injection dengan function quote

// query sql select where, balikannya pdo statement
$sql = "SELECT * FROM admin WHERE username = $username AND password = $password;";
// echo $sql . PHP_EOL;
$pdoStatement = $connection->query($sql);

// variable dengan value sementara
$sukses = false;
$findUser = null;

// melakukan itarasi data dari database
foreach($pdoStatement as $row){
    // ketika sukses
    $sukses = true;
    $findUser = $row["username"];
}

if($sukses){
    echo "Berhasil Login dengan username : $findUser" . PHP_EOL;
}else{
    echo "Gagal Login" . PHP_EOL;
}


$connection = null;