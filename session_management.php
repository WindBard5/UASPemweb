<?php
session_start();

// Inisialisasi sesi jika belum ada
if (!isset($_SESSION['page_clicks'])) {
    $_SESSION['page_clicks'] = [
        'page1' => 0,
        'page2' => 0
    ];
}

// Mendapatkan halaman yang diklik dari parameter URL
$page = isset($_GET['page']) ? $_GET['page'] : null;

if ($page && isset($_SESSION['page_clicks'][$page])) {
    // Tambah jumlah klik untuk halaman yang dipilih
    $_SESSION['page_clicks'][$page]++;
    
    // Redirect kembali ke halaman utama
    header("Location: session_management.php");
    exit;
}

// Fungsi untuk menentukan kelas warna tombol berdasarkan jumlah klik
function getButtonClass($clicks) {
    return $clicks > 0 ? 'btn-dark' : 'btn-primary';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>State Management with Session</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>State Management with Session</h1>
        <p>Halaman ini menampilkan jumlah klik pada Page 1 dan Page 2 menggunakan session.</p>
        
        <ul class="list-group">
            <!-- Tombol untuk Page 1 -->
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <a href="session_management.php?page=page1" class="btn <?php echo getButtonClass($_SESSION['page_clicks']['page1']); ?>">
                    Page 1
                </a>
                <span class="badge bg-light text-dark">
                    <?php echo $_SESSION['page_clicks']['page1']; ?>
                </span>
            </li>

            <!-- Tombol untuk Page 2 -->
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <a href="session_management.php?page=page2" class="btn <?php echo getButtonClass($_SESSION['page_clicks']['page2']); ?>">
                    Page 2
                </a>
                <span class="badge bg-light text-dark">
                    <?php echo $_SESSION['page_clicks']['page2']; ?>
                </span>
            </li>
        </ul>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
