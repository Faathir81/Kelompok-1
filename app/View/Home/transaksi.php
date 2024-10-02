<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Rincian Transaksi</title>
</head>

<body>
    <h2>Rincian Transaksi Buku</h2>
    <?php if ($book): ?>
    <p><strong>Judul:</strong> <?php echo htmlspecialchars($book['judul']); ?></p>
    <p><strong>Harga:</strong> <?php echo htmlspecialchars($book['harga']); ?></p>
    <p><strong>Pemilik:</strong> <?php echo htmlspecialchars($book['nama_pemilik']); ?></p>
    <p><strong>Status:</strong> <?php echo htmlspecialchars($book['status']); ?></p>

    <h3>Konfirmasi Pembelian</h3>
    <form method="POST" action="">
        <button type="submit">Beli</button>
    </form>
    <a href="/dashboard">Kembali ke Dashboard</a>
    <?php else: ?>
    <p>Buku tidak ditemukan.</p>
    <a href="/dashboard">Kembali ke Dashboard</a>
    <?php endif; ?>
</body>

</html>