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
        <h1>Bayar kesini ya</h1>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>