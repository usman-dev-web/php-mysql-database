<?php

require_once __DIR__ . "/utility/connection.php";

$connection = getConnection();

// membuat query select ke database
$sql = "SELECT id, name, email FROM customers";

// mengeksekusi query sql select menggunakan function query()
$pdoStatement = $connection->query($sql);

// melakukan iterasi dengan foreach karena result dari function query adalah iterator aggregate
foreach($pdoStatement as $row){

    // var_dump($row); // $row adalah sebuah array dengan key value

    $id = $row["id"]; 
    $name = $row["name"]; 
    $email = $row["email"]; 

    // menampilkan hasil iterasi
    echo "Id : $id" . PHP_EOL;
    echo "Name : $name" . PHP_EOL;
    echo "Email : $email" . PHP_EOL;
}

// menutup koneksi 
$connection = null;