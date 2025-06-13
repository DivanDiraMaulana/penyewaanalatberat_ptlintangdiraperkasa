CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nama VARCHAR(100),
  email VARCHAR(100) UNIQUE,
  password VARCHAR(255),
  role ENUM('admin', 'user') DEFAULT 'user'
);

CREATE TABLE alat_berat (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nama_alat VARCHAR(100),
  jenis VARCHAR(50),
  harga_per_hari INT,
  deskripsi TEXT,
  foto VARCHAR(255)
);

CREATE TABLE transaksi (
  id INT AUTO_INCREMENT PRIMARY KEY,
  id_user INT,
  id_alat INT,
  tanggal_sewa DATE,
  durasi INT,
  total_biaya INT,
  FOREIGN KEY (id_user) REFERENCES users(id),
  FOREIGN KEY (id_alat) REFERENCES alat_berat(id)
);

-- Tambahkan user admin default
INSERT INTO users (nama, email, password, role) VALUES (
  'admin',
  'admin@mail.com',
  'admin123',
  'admin'
);
