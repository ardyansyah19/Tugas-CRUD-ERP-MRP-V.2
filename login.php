<?php
require_once __DIR__ . '/config/config.php';

if (is_logged_in()) {
    header('Location: index.php');
    exit;
}
$token = csrf_token();
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - CRUD Data Mahasiswa</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body class="auth-body">
  <div class="auth-card">
    <h1>CRUD Data Mahasiswa</h1>
    <p class="auth-subtitle">Silakan login untuk mengelola data.</p>
    <div id="alert"></div>
    <form id="loginForm">
      <input type="hidden" id="csrf_token" value="<?= htmlspecialchars($token) ?>">
      <label>Username
        <input id="username" name="username" required autofocus>
      </label>
      <label>Password
        <input id="password" name="password" type="password" required>
      </label>
      <button type="submit" class="btn btn-primary btn-block">Masuk</button>
    </form>
    <p class="auth-hint">Akun default: <code>admin</code> / <code>admin123</code></p>
  </div>
  <script src="js/login.js"></script>
</body>
</html>
