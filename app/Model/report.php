<?php
session_start();
include '/../config/Database.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

// Cek apakah book_id ada dalam parameter URL
if (!isset($_GET['book_id'])) {
    header('Location: dashboard.php'); // Kembali ke dashboard jika tidak ada book_id
    exit;
}

$book_id = $_GET['book_id'];

// Ambil data transaksi terakhir untuk buku tersebut
$stmt = $pdo->prepare("SELECT * FROM transactions WHERE book_id = :book_id ORDER BY transaction_id DESC LIMIT 1");
$stmt->execute(['book_id' => $book_id]);
$transaction = $stmt->fetch(PDO::FETCH_ASSOC);
