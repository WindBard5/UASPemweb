<?php
require_once 'koneksi.php';

$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $nama = isset($_POST['nama']) ? trim($_POST['nama']) : '';
    $nim = isset($_POST['nim']) ? trim($_POST['nim']) : '';
    $prodi = isset($_POST['prodi']) ? trim($_POST['prodi']) : '';
    $ip_address = $_SERVER['REMOTE_ADDR'];
    $browser = $_SERVER['HTTP_USER_AGENT'];

    if (!empty($nama) && !empty($nim) && !empty($prodi)) {
        // Simpan data ke database
        $conn = getConnection();
        $stmt = $conn->prepare("INSERT INTO tblMahasiswa (mahasiswa_nim, mahasiswa_nama, mahasiswa_prodi, ip_address, browser) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $nim, $nama, $prodi, $ip_address, $browser);

        if ($stmt->execute()) {
            $message = "Data berhasil disimpan!";
        } else {
            $message = "Terjadi kesalahan: " . $stmt->error;
        }
        $stmt->close();
        $conn->close();
    } else {
        $message = "Semua field harus diisi!";
    }
}

// Mengambil data mahasiswa untuk tabel
$conn = getConnection();
$result = $conn->query("SELECT * FROM tblMahasiswa");
$dataMahasiswa = [];
if ($result && $result->num_rows > 0) {
    $dataMahasiswa = $result->fetch_all(MYSQLI_ASSOC);
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input dan Daftar Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h1 class="mb-4">Form Input Mahasiswa</h1>
        
        <!-- Pesan Notifikasi -->
        <?php if (!empty($message)) : ?>
            <div class="alert alert-success" role="alert">
                <?php echo htmlspecialchars($message); ?>
            </div>
        <?php endif; ?>

        <!-- Form Input -->
        <form action="form_handler.php" method="POST">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama:</label>
                <input type="text" id="nama" name="nama" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="nim" class="form-label">NIM:</label>
                <input type="text" id="nim" name="nim" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="prodi" class="form-label">Prodi:</label>
                <input type="text" id="prodi" name="prodi" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        <hr class="my-5">

        <!-- Tabel Data Mahasiswa -->
        <h2 class="mb-4">Daftar Mahasiswa</h2>
        <table class="table table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Prodi</th>
                    <th>IP Address</th>
                    <th>Browser</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($dataMahasiswa)) : ?>
                    <?php foreach ($dataMahasiswa as $mhs) : ?>
                        <tr>
                            <td><?php echo htmlspecialchars($mhs['mahasiswa_id']); ?></td>
                            <td><?php echo htmlspecialchars($mhs['mahasiswa_nim']); ?></td>
                            <td><?php echo htmlspecialchars($mhs['mahasiswa_nama']); ?></td>
                            <td><?php echo htmlspecialchars($mhs['mahasiswa_prodi']); ?></td>
                            <td><?php echo htmlspecialchars($mhs['ip_address']); ?></td>
                            <td><?php echo htmlspecialchars($mhs['browser']); ?></td>
                            <td>
                                <!-- Aksi Edit -->
                                <a href="edit_mahasiswa.php?id=<?php echo $mhs['mahasiswa_id']; ?>" 
                                   class="btn btn-warning btn-sm">Edit</a>
                                <!-- Aksi Delete -->
                                <a href="delete_mahasiswa.php?id=<?php echo $mhs['mahasiswa_id']; ?>" 
                                   class="btn btn-danger btn-sm" 
                                   onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="7" class="text-center">Tidak ada data mahasiswa.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
