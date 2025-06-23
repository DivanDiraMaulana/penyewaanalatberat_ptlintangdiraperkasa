<?php session_start(); ?>
<?php include 'config/db.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    /* Warna gradient untuk navbar */
    .navbar {
      background: linear-gradient(90deg, #007bff, #00c6ff);
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    .navbar-brand {
      font-weight: bold;
      letter-spacing: 1px;
      font-size: 1.25rem;
      transition: color 0.3s;
    }

    .navbar-nav .nav-link {
      color: #ffffffcc;
      padding: 0.5rem 1rem;
      border-radius: 0.375rem;
      transition: background 0.3s, color 0.3s;
    }

    .navbar-nav .nav-link:hover {
      background: rgba(255, 255, 255, 0.15);
      color: #fff;
    }

    .navbar-nav .nav-link.active {
      background: rgba(255, 255, 255, 0.3);
      color: #fff;
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container">
      <a class="navbar-brand d-flex align-items-center" href="index.php">
        <i class="bi bi-truck me-2"></i> PT.LINTANGDIRA PERKASA
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
          <!-- Jika login -->

          <li class="nav-item"><a class="nav-link" href="login.php"><i class="bi bi-box-arrow-in-right"></i> Login</a></li>
          <li class="nav-item"><a class="nav-link" href="register.php"><i class="bi bi-pencil-square"></i> Register</a></li>

        </ul>
      </div>
    </div>
  </nav>

  <div class="pt-5"></div> <!-- Spacer agar konten di bawah navbar tidak tertutup -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>