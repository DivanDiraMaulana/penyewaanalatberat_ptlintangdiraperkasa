<?php
include 'config/db.php';
// session_start();
if (!isset($_SESSION['user_id'])) {
  header("Location: login.php");
  exit;
}
$nama_alat = htmlspecialchars($_POST['nama_alat']);
$tanggal = $_POST['tanggal_sewa'];
$durasi = intval($_POST['durasi']);

$query_alat = mysqli_query($conn, "SELECT * FROM alat_berat WHERE nama_alat='$nama_alat'");
$alat = mysqli_fetch_assoc($query_alat);

if ($alat) {
  $total = $durasi * $alat['harga_per_hari'];
  $id_user = $_SESSION['user_id'];
  $id_alat = $alat['id'];
  $insert = "INSERT INTO transaksi (id_user, id_alat, tanggal_sewa, durasi, total_biaya) VALUES ($id_user, $id_alat, '$tanggal', $durasi, $total)";
  mysqli_query($conn, $insert);
  echo "Sewa berhasil. Total biaya: Rp$total";
} else {
  echo "Alat tidak ditemukan.";
}
?>