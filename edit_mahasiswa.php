```php
<?php
require_once 'mhs_controller.php';

$controller = new MahasiswaController();

// Ambil ID mahasiswa
$id = isset($_GET['id']) ? $_GET['id'] : null;

if (!$id) {
    die("ID mahasiswa tidak ditemukan.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = isset($_POST['nama']) ? trim($_POST['nama']) : '';
    $nim = isset($_POST['nim']) ? trim($_POST['nim']) : '';
    $prodi = isset($_POST['prodi']) ? trim($_POST['prodi']) : '';

    if (!empty($nama) && !empty($nim) && !empty($prodi)) {
        $message = $controller->updateMahasiswa($id, $nim, $nama, $prodi);
        header("Location: form_handler.php?message=" . urlencode($message));
        exit;
    } else {
        $error = "Semua field harus diisi!";
    }
}

// Ambil data mahasiswa berdasarkan ID
$mahasiswa = $controller->getMahasiswaById($id);
if (!$mahasiswa) {
    die("Data mahasiswa tidak ditemukan.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h1 class="text-center">Edit Mahasiswa</h1>
        
        <?php if (isset($error)) : ?>
            <div class="alert alert-danger"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>

        <form method="POST">
            <div class="mb-3">
                <label for="nim" class="form-label">NIM</label>
                <input type="text" id="nim" name="nim" class="form-control" value="<?php echo htmlspecialchars($mahasiswa['mahasiswa_nim']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" id="nama" name="nama" class="form-control" value="<?php echo htmlspecialchars($mahasiswa['mahasiswa_nama']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="prodi" class="form-label">Prodi</label>
                <input type="text" id="prodi" name="prodi" class="form-control" value="<?php echo htmlspecialchars($mahasiswa['mahasiswa_prodi']); ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="form_handler.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>