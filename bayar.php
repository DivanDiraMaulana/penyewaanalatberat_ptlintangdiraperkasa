<?php
session_start();
if (!isset($_SESSION['is_login'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Dashboard User - PT. Lintang Dira Perkasa</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        .content {
            margin-left: 250px;
            /* Menyesuaikan lebar sidebar */
            padding: 20px;
            background-color: #f8f9fa;
            min-height: 100vh;
        }
    </style>
</head>

<body>

    <?php
    include "partials/sidebar.php"
        ?>

    <!-- Main Content -->
    <div class="content mt-5">
        <h1>PEMBAYARAN</h1>
        <H2>Bayar ke Nomor Rekening dibawah ini</H2>
        <p> </p>
        <p>BCA 211011400975 an Muhammad Lintang Fahreza</p>
        <p>BSI 211011401032 an Divan Dira Maulana</p>
        <p>Kirim Bukti Pembayaran ke Nomor WhatsApp berikut 082110111030400975</p>
        <p>Cek Status setelah bayar akan menjadi berjalan</p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>