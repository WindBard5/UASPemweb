<?php
// Fungsi untuk menetapkan cookie
function setMyCookie($name, $value, $expire) {
    setcookie($name, $value, time() + $expire, "/");
}

// Fungsi untuk mendapatkan cookie
function getMyCookie($name) {
    return isset($_COOKIE[$name]) ? $_COOKIE[$name] : null;
}

// Fungsi untuk menghapus cookie
function deleteMyCookie($name) {
    setcookie($name, '', time() - 3600, "/");
}

// Jika form disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = isset($_POST['nama']) ? trim($_POST['nama']) : '';
    $nim = isset($_POST['nim']) ? trim($_POST['nim']) : '';

    if (!empty($nama) && !empty($nim)) {
        // Simpan ke cookie (1 jam)
        setMyCookie('user_nama', $nama, 3600);
        setMyCookie('user_nim', $nim, 3600);

        $message = "Data berhasil disimpan ke cookie.";
    } else {
        $message = "Nama dan NIM harus diisi!";
    }
}

// Hapus cookie jika diminta
if (isset($_GET['action']) && $_GET['action'] === 'clear') {
    deleteMyCookie('user_nama');
    deleteMyCookie('user_nim');
    header("Location: cookie_management.php?message=" . urlencode("Cookie telah dihapus."));
    exit;
}

// Pesan notifikasi
$message = isset($_GET['message']) ? $_GET['message'] : '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengelolaan State dengan Cookie</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Pengelolaan State dengan Cookie</h1>

        <?php if (!empty($message)) : ?>
            <div class="alert alert-info">
                <?php echo htmlspecialchars($message); ?>
            </div>
        <?php endif; ?>

        <form method="POST" class="mt-4">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama:</label>
                <input type="text" id="nama" name="nama" class="form-control" value="<?php echo htmlspecialchars(getMyCookie('user_nama') ?? ''); ?>" required>
            </div>
            <div class="mb-3">
                <label for="nim" class="form-label">NIM:</label>
                <input type="text" id="nim" name="nim" class="form-control" value="<?php echo htmlspecialchars(getMyCookie('user_nim') ?? ''); ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="cookie_management.php?action=clear" class="btn btn-danger">Hapus Cookie</a>
        </form>

        <div class="mt-5">
            <h2>Data dari Cookie</h2>
            <p>Nama: <?php echo htmlspecialchars(getMyCookie('user_nama') ?? 'Belum ada'); ?></p>
            <p>NIM: <?php echo htmlspecialchars(getMyCookie('user_nim') ?? 'Belum ada'); ?></p>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>