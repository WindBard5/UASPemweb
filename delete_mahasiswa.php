<?php
require_once 'mhs_controller.php';

$controller = new MahasiswaController();

// Ambil ID dari URL
$id = isset($_GET['id']) ? $_GET['id'] : null;

if (!$id) {
    die("ID mahasiswa tidak ditemukan.");
}

// Proses penghapusan
$message = $controller->deleteMahasiswa($id);

// Redirect kembali ke form_handler.php dengan pesan sukses/hapus
header("Location: form_handler.php?message=" . urlencode($message));
exit;
?>