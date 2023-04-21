<?php

require_once __DIR__ . "/utility/connection.php";

// TRANSACTION DI PDO
/**
 * secara default, semua perintah sql yang kita kirim menggunakan pdo akan otomatis di commit atau istilahnya auto commit
 * namun kita bisa menggunakan fitur transaksi sehingga sql yang kita kirim tidak secara otomatis di commit ke database
 * untuk memulai transaksi kita bisa menggunakan function beginTransaction() di PDO
 * dan untuk commit transaksi kita bisa menggunakan function commit()
 * sedangkan jika kita ingin melakukan rollback, kita bisa menggunakan function rollback()
 */

 // kode transaction
 $connection = getConnection();

 // memulai transaction
 $connection->beginTransaction();

 // kode sql
 // function exec digunakan untuk mengeksekusi kode sql yang tidak membutuhkan result dari query nya
 $connection->exec("INSERT INTO comments(email, comment) VALUES ('maulana@test.com', 'test comment')");
 $connection->exec("INSERT INTO comments(email, comment) VALUES ('maulana@test.com', 'test comment lagi')");
 $connection->exec("INSERT INTO comments(email, comment) VALUES ('maulana@test.com', 'test comment dan lagi')");

 // commit untuk menyimpan ke database secara permanent
 $connection->commit();

 $connection = null;