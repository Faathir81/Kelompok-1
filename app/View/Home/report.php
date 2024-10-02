<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Laporan Pembelian</title>
</head>

<body>
    <h2>Laporan Pembelian</h2>
    <?php if ($transaction): ?>
        <p><strong>ID Transaksi:</strong> <?php echo $transaction['transaction_id']; ?></p>
        <p><strong>Judul Buku:</strong> <?php echo $transaction['book_id']; ?></p>
        <p><strong>Jumlah:</strong> <?php echo $transaction['amount']; ?></p>
        <p><strong>Tanggal Transaksi:</strong> <?php echo $transaction['transaction_date']; ?></p>
        <p><strong>Jenis Transaksi:</strong> <?php echo $transaction['transaction_type']; ?></p>
        <a href="dashboard.php">Kembali ke Dashboard</a>
    <?php else: ?>
        <p>Tidak ada laporan pembelian untuk buku ini.</p>
        <a href="dashboard.php">Kembali ke Dashboard</a>
    <?php endif; ?>
</body>

</html>