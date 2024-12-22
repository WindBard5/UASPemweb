<?php
require_once 'koneksi.php';

class MahasiswaController {
    private $conn;

    public function __construct() {
        $this->conn = getConnection();
    }

    public function getAllMahasiswa() {
        $sql = "SELECT * FROM tblMahasiswa";
        $result = $this->conn->query($sql);
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }

    public function tambahMahasiswa($nim, $nama, $prodi, $ip_address, $browser) {
        $stmt = $this->conn->prepare("INSERT INTO tblMahasiswa (mahasiswa_nim, mahasiswa_nama, mahasiswa_prodi, ip_address, browser) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $nim, $nama, $prodi, $ip_address, $browser);

        if ($stmt->execute()) {
            return "Data berhasil disimpan!";
        } else {
            return "Terjadi kesalahan: " . $stmt->error;
        }
    }

    public function deleteMahasiswa($id) {
        $stmt = $this->conn->prepare("DELETE FROM tblMahasiswa WHERE mahasiswa_id = ?");
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            return "Data berhasil dihapus!";
        } else {
            return "Terjadi kesalahan saat menghapus: " . $stmt->error;
        }
    }

    public function updateMahasiswa($id, $nim, $nama, $prodi) {
        $stmt = $this->conn->prepare("UPDATE tblMahasiswa SET mahasiswa_nim = ?, mahasiswa_nama = ?, mahasiswa_prodi = ? WHERE mahasiswa_id = ?");
        $stmt->bind_param("sssi", $nim, $nama, $prodi, $id);

        if ($stmt->execute()) {
            return "Data berhasil diperbarui!";
        } else {
            return "Terjadi kesalahan saat memperbarui: " . $stmt->error;
        }
    }

    public function getMahasiswaById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM tblMahasiswa WHERE mahasiswa_id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }
}
