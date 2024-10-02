<?php
include __DIR__ . '/../config/Database.php';

// Ambil ID pengguna dari session
$user_id = $_SESSION['user_id'];

// Ambil buku yang tersedia
$stmt = $pdo->prepare("SELECT * FROM books WHERE status = 'available'");
$stmt->execute();
$availableBooks = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Ambil daftar buku yang sudah dibeli oleh pengguna
$stmt = $pdo->prepare("SELECT * FROM books WHERE pemilik = :pemilik");
$stmt->execute(['pemilik' => $user_id]);
$soldBooks = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Kembalikan data yang diperlukan untuk view
return [
    'title' => 'Dashboard Buyer',
    'availableBooks' => $availableBooks, // Data buku yang tersedia
    'soldBooks' => $soldBooks, // Data buku yang sudah terjual
];
