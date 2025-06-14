<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Dashboard User - PT. Lintang Dira Perkasa</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            min-height: 100vh;
            display: flex;
        }

        .sidebar {
            width: 250px;
            background-color: #0d6efd;
            color: white;
        }

        .sidebar a {
            color: white;
            text-decoration: none;
        }

        .sidebar a:hover {
            background-color: #0b5ed7;
        }
    </style>
</head>

<body>

    <!-- Sidebar -->
    <div class="sidebar d-flex flex-column p-3">
        <h4 class="text-white text-center mb-4">PT. LDP</h4>
        <hr class="text-white">
        <ul class="nav nav-pills flex-column mb-auto">
            <li><a href="dashboard_user.php" class="nav-link text-white"><i class="bi bi-house-door me-2"></i> Dashboard</a></li>
            <li><a href="alat_berat.php" class="nav-link text-white"><i class="bi bi-truck me-2"></i> Daftar Alat</a></li>
            <li><a href="form_sewa.php" class="nav-link text-white"><i class="bi bi-pencil-square me-2"></i> Form Sewa</a></li>
            <li><a href="riwayat_sewa.php" class="nav-link text-white"><i class="bi bi-clock-history me-2"></i> Riwayat Sewa</a></li>
            <li><a href="profil.php" class="nav-link text-white"><i class="bi bi-person-circle me-2"></i> <?php echo htmlspecialchars($_SESSION['nama']); ?></a></li>
            <li><a href="logout.php" class="nav-link text-white"><i class="bi bi-box-arrow-right me-2"></i> Logout</a></li>
        </ul>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>