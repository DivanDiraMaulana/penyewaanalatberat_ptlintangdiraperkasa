<?php
include 'config/db.php';
session_start();

$email = $_POST['email'];
$password = $_POST['password'];

// Cek data user berdasarkan email
$result = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
$user = mysqli_fetch_assoc($result);

// Cek password dan role
if ($user && password_verify($password, $user['password'])) {
  $_SESSION['is_login'] = true;
  $_SESSION['user_id'] = $user['id'];
  $_SESSION['nama'] = $user['nama'];
  $_SESSION['role'] = $user['role'];

  // Redirect berdasarkan role
  if ($user['role'] === 'admin') {
    header("Location: admin/dashboard_admin.php");
  } elseif ($user['role'] === 'user') {
    header("Location: dashboard_user.php");
  } else {
    echo "Role tidak dikenal.";
  }
} else {
  echo "Login gagal. Coba lagi.";
}
