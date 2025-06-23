<head>
    <meta charset="UTF-8">
    <title>Dashboard User - PT. Lintang Dira Perkasa</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            width: 260px;
            background: linear-gradient(180deg, #0d6efd, #1e90ff);
            padding: 1.5rem 1rem;
            color: #fff;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
        }

        .sidebar h4 {
            font-weight: bold;
            letter-spacing: 1px;
        }

        .sidebar hr {
            border-top: 1px solid rgba(255, 255, 255, 0.3);
        }

        .sidebar .nav-link {
            color: #ffffffcc;
            padding: 0.7rem 1rem;
            border-radius: 0.5rem;
            display: flex;
            align-items: center;
            transition: all 0.2s ease;
        }

        .sidebar .nav-link i {
            font-size: 1.2rem;
        }

        .sidebar .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.15);
            color: #fff;
            padding-left: 1.3rem;
        }

        .sidebar .nav-link.active {
            background-color: rgba(255, 255, 255, 0.2);
            color: #fff;
            font-weight: 500;
        }
    </style>
</head>

<body>

    <!-- Sidebar -->
    <div class="sidebar d-flex flex-column">
        <h4 class="text-center mb-4"><i class="bi bi-buildings me-2"></i>PT. LDP</h4>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item mb-2">
                <a href="dashboard_user.php" class="nav-link"><i class="bi bi-house-door me-2"></i> Dashboard</a>
            </li>
            <li class="nav-item mb-2">
                <a href="alat_berat.php" class="nav-link"><i class="bi bi-truck me-2"></i> Daftar Alat</a>
            </li>
            <li class="nav-item mb-2">
                <a href="form_sewa.php" class="nav-link"><i class="bi bi-pencil-square me-2"></i> Form Sewa</a>
            </li>
            <li class="nav-item mb-2">
                <a href="riwayat_sewa.php" class="nav-link"><i class="bi bi-clock-history me-2"></i> Riwayat Sewa</a>
            </li>
            <li class="nav-item mb-2">
                <a href="profil.php" class="nav-link"><i class="bi bi-person-circle me-2"></i> <?php echo htmlspecialchars($_SESSION['nama']); ?></a>
            </li>
            <li class="nav-item mt-4">
                <a href="controller/logout.php" class="nav-link text-danger"><i class="bi bi-box-arrow-right me-2"></i> Logout</a>
            </li>
        </ul>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>