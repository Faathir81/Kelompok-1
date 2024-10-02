<?php
include __DIR__ . '/../config/Database.php'; // Pastikan path benar

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];  // Ambil nilai email dari form
    $password = $_POST['password'];
    $role = $_POST['role'];  // Ambil nilai role dari form

    // Cek apakah username, email, password, dan role tidak kosong
    if (!empty($username) && !empty($email) && !empty($password) && !empty($role)) {
        // Simpan password apa adanya tanpa hashing
        $plainPassword = $password;

        // Simpan ke database
        $stmt = $pdo->prepare("INSERT INTO users (username, email, password, role) VALUES (:username, :email, :password, :role)");
        try {
            $stmt->execute([
                'username' => $username,
                'email' => $email,  // Simpan email
                'password' => $plainPassword,  // Password langsung disimpan tanpa hashing
                'role' => $role  // Simpan role
            ]);
            // Redirect ke halaman login setelah sukses
            header('Location: /login'); // Atau bisa menampilkan pesan sukses
            exit;
        } catch (PDOException $e) {
            if ($e->getCode() == 23000) {
                echo "Username atau email sudah ada!";
            } else {
                echo "Terjadi kesalahan: " . $e->getMessage();
            }
        }
    } else {
        echo "Username, email, password, dan role harus diisi.";
    }
}

return '';
