<?php
include __DIR__ . '/../config/Database.php';

if (isset($_SESSION['user_id'])) {
    if ($_SESSION['role'] === 'seller') {
        return 'dashboard_seller';
    } else {
        return 'dashboard_buyer';
    }
}

$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (!empty($username) && !empty($password)) {
        // Menyiapkan query untuk mengambil data pengguna berdasarkan username
        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->execute(['username' => $username]);
        $user = $stmt->fetch();

        // Memeriksa apakah pengguna ada dan password cocok
        if ($user && $password == $user['password']) {
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];

            // Kembalikan role untuk pengalihan di controller
            return $user['role'];
        } else {
            return "Username atau password salah."; // Kembalikan error jika salah
        }
    } else {
        return "Username dan password harus diisi."; // Kembalikan error jika kosong
    }
}

// Kembalikan error jika tidak ada
return $error;
