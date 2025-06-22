<?php
session_start();
if (!isset($_SESSION['is_login'])) {
  header("Location: login.php");
  exit;
}

include 'config/db.php';

// Ambil data dari form
$id_user = $_SESSION['user_id'];
$id_alat = $_POST['id_alat'];
$tanggal_sewa = $_POST['tanggal_sewa'];
$durasi = (int) $_POST['durasi'];

// Validasi awal
if (!$id_alat || !$tanggal_sewa || $durasi < 1) {
  header("Location: form_sewa.php?status=gagal");
  exit;
}



// Ambil harga per hari
$q = mysqli_query($conn, "SELECT harga_per_hari FROM alat_berat WHERE id = '$id_alat'");
$data = mysqli_fetch_assoc($q);

if (!$data) {
  header("Location: form_sewa.php?status=gagal");
  exit;
}

$harga_per_hari = (int) $data['harga_per_hari'];
$total_biaya = $durasi * $harga_per_hari;

// Simpan ke DB
$sql = "INSERT INTO transaksi 
        (id_user, id_alat, tanggal_sewa, durasi, total_biaya, status) 
        VALUES 
        ('$id_user', '$id_alat', '$tanggal_sewa', '$durasi', '$total_biaya', 'menunggu')";

if (mysqli_query($conn, $sql)) {
  //status tabel alat berat
  $sqlab = "UPDATE alat_berat SET status='disewa' WHERE id='$id_alat'";
  mysqli_query($conn, $sqlab);

  header("Location: form_sewa.php?status=sukses");
} else {
  header("Location: form_sewa.php?status=gagal");
}
