<?php
session_start();
include '/../config/Database.php';

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

// Ambil ID pengguna dari session
$user_id = $_SESSION['user_id'];

// Ambil book_id dari URL
if (isset($_GET['book_id'])) {
    $book_id = $_GET['book_id'];

    // Ambil detail buku dari database
    $stmt = $pdo->prepare("SELECT * FROM books WHERE book_id = :book_id AND pemilik = :pemilik");
    $stmt->execute(['book_id' => $book_id, 'pemilik' => $user_id]);
    $book = $stmt->fetch(PDO::FETCH_ASSOC);

    // Jika buku tidak ditemukan, redirect ke dashboard
    if (!$book) {
        header('Location: dashboard_seller.php');
        exit;
    }
} else {
    header('Location: dashboard_seller.php'); // Jika tidak ada book_id, redirect
    exit;
}

// Proses pembaruan data jika form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $judul = $_POST['judul'];
    $harga = $_POST['harga'];
    $nama_pemilik = $_POST['nama_pemilik'];

    // Update data buku dalam tabel books
    $stmt = $pdo->prepare("UPDATE books SET judul = :judul, harga = :harga, nama_pemilik = :nama_pemilik WHERE book_id = :book_id");
    $stmt->execute([
        'judul' => $judul,
        'harga' => $harga,
        'nama_pemilik' => $nama_pemilik,
        'book_id' => $book_id
    ]);

    header('Location: dashboard_seller.php'); // Redirect setelah pembaruan
    exit;
}
