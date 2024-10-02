<?php
session_start();
include __DIR__ . '/../config/Database.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: /login');
    exit;
}

// Cek apakah book_id ada dalam parameter URL
$book_id = $_GET['book_id'] ?? null;

if (!$book_id) {
    header('Location: /dashboard');
    exit;
}

// Ambil data buku berdasarkan book_id
$stmt = $pdo->prepare("SELECT * FROM books WHERE book_id = :book_id");
$stmt->execute(['book_id' => $book_id]);
$book = $stmt->fetch(PDO::FETCH_ASSOC);

// Jika buku tidak ditemukan, redirect ke dashboard
if (!$book) {
    header('Location: /dashboard');
    exit;
}

// Mengembalikan data buku
return $book;
