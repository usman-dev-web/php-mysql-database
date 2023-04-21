<?php

require_once __DIR__ . "/utility/connection.php";

// AUT0 INCREMENT
/**
 * kadang kita membuat id dengan auto increment
 * dan kadang pula kita ingin mengambil data id yang sudah kita insert ke dalam mysql
 * sebenarnya kita bisa melakukan query ulang ke database menggunakan select last_insert_id()
 * tapi untungnya di PDO ada cara yang lebih mudah
 * kita bisa menggunakan function lastInsertId() untuk mendapatkan id terakhir yang dibuat secara auto increment
 */

// kode function lastInsertId()
$connection = getConnection();

// kode sql
$sql = "INSERT INTO comments(email, comment) VALUES ('uus@test.com', 'hei')";
$id = $connection->exec($sql);

// untuk melihat id yang sudah kita insert
$id = $connection->lastInsertId();

var_dump($id);

$connection = null;