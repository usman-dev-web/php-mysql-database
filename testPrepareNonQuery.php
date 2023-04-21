<?php

require_once __DIR__ . "/utility/connection.php";

// koneksi ke database
$conn = getConnection();

// contoh input parameter dari user
$username = "usman";
$password = "usman";

// membuat kode sql non query dengan prepare statement
$sql = "INSERT INTO admin(username, password) VALUES (:username, :password)";
$statement = $conn->prepare($sql);

// melakukan binding parameter
$statement->bindParam("username", $username);
$statement->bindParam("password", $password);

//execute
$statement->execute();

// tidak perlu melakukan iterasi ketika menggunakan kode non query karena tidak butuh hasil result
$conn = null;