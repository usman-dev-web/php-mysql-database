<?php

require_once __DIR__ . "/utility/connection.php";

// memanggil function getConnection
$connection = getConnection();

// membuat script sql menggunakan string multi line
$sql = <<<SQL
    INSERT INTO customers(id, name, email)
    VALUES ("C003", "uus", "uus@test.com");
SQL;

// mengeksekusi perintah sql
$connection->exec($sql);

// menutup koneksi
$connection = null;