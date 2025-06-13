<?php
// session_start();
include 'config/db.php';
$result = mysqli_query($conn, "SELECT SUM(total_biaya) as total FROM transaksi");
$data = mysqli_fetch_assoc($result);
echo "<h3>Total Pendapatan: Rp{$data['total']}</h3>";
?>