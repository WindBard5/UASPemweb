CREATE TABLE tblMahasiswa (
    mahasiswa_id INT NOT NULL AUTO_INCREMENT,
    mahasiswa_nim VARCHAR(15) NOT NULL,
    mahasiswa_nama VARCHAR(100) NOT NULL,
    mahasiswa_prodi VARCHAR(50) NOT NULL,
    ip_address VARCHAR(45),
    browser TEXT,
    PRIMARY KEY (mahasiswa_id),
    UNIQUE KEY mahasiswa_nim (mahasiswa_nim)
);
