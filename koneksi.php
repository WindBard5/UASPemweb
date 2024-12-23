<?php
function getConnection() {
    $host = 'autorack.proxy.rlwy.net:';
    $user = 'root';
    $password = 'BpRknejwWZfUtMIMGuMlKeRaLobiFlxw';
    $dbname = 'railway';
    $port = 48445;

    $conn = new mysqli($host, $user, $password, $dbname,$port);

    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    return $conn;
}
?>


