<?php
require_once __DIR__ . '/mhs_controller.php';

// Pesan sukses/hapus
$message = isset($_GET['message']) ? $_GET['message'] : '';

// Membuat objek controller dan mendapatkan data mahasiswa
$controller = new MahasiswaController();
$dataMahasiswa = $controller->getAllMahasiswa();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h1 class="text-center">Daftar Mahasiswa</h1>
        
        <?php if (!empty($message)) : ?>
            <div class="alert alert-success"><?php echo htmlspecialchars($message); ?></div>
        <?php endif; ?>

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
                                <a href="/UASPemweb/edit_mahasiswa.php?id=<?php echo $mhs['mahasiswa_id']; ?>" class="btn btn-warning btn-sm">Edit</a> 
                                <a href="/UASPemweb/delete_mahasiswa.php?id=<?php echo $mhs['mahasiswa_id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</a>
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
