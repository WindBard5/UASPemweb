<?php
function getConnection() {
    $host = '127.0.0.1';
    $user = 'root';
    $password = '';
    $dbname = 'dbname';

    $conn = new mysqli($host, $user, $password, $dbname);

    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    return $conn;
}
?>


