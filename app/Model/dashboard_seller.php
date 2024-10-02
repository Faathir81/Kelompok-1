<?php
include __DIR__ . '/../config/Database.php';

// Cek apakah pengguna sudah login dan adalah seller
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'seller') {
    header('Location: /login');
    exit;
}

// Menangani penambahan buku baru
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $judul = $_POST['judul'];
    $harga = $_POST['harga'];
    $pemilik = $_SESSION['user_id']; // Ambil ID pemilik dari session
    $nama_pemilik = $_POST['nama_pemilik']; // Ambil nama pemilik dari input manual

    if (!empty($judul) && !empty($harga) && !empty($nama_pemilik)) {
        // Simpan ke database
        $stmt = $pdo->prepare("INSERT INTO books (judul, harga, pemilik, status, nama_pemilik) VALUES (:judul, :harga, :pemilik, 'available', :nama_pemilik)");
        $stmt->execute([
            'judul' => $judul,
            'harga' => $harga,
            'pemilik' => $pemilik, // ID pemilik
            'nama_pemilik' => $nama_pemilik, // Nama pemilik dari input
        ]);
    }
}

// Ambil daftar buku yang dijual oleh seller
$stmt = $pdo->prepare("SELECT * FROM books WHERE pemilik = :pemilik");
$stmt->execute(['pemilik' => $_SESSION['user_id']]);
$soldBooks = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Kembalikan data buku
return $soldBooks;
