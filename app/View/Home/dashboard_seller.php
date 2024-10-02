<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Dashboard Seller</title>
</head>
<style>
        body {
            background-image: url('https://images.unsplash.com/photo-1593642634443-44adaa06623a?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            color: azure;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            position: relative;
            flex-direction: column; /* Menambahkan fleksibilitas untuk elemen vertikal */
            text-align: center; /* Menyelaraskan teks ke tengah */
        }

        body::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: inherit;
            background-size: inherit;
            background-position: inherit;
            background-repeat: inherit;
            filter: blur(8px);
            z-index: -1;
        }

        h2, h3 {
            color: white;
        }
    </style>
<body>
    <h2>Dashboard Seller - <?= htmlspecialchars($_SESSION['username']); ?></h2>

    <form action="/logout" method="POST" style="display:inline;">
        <button type="submit">Logout</button>
    </form>

    <h3>Form Penjualan Buku</h3>
    <form method="POST" action="">
        <label for="judul">Judul Buku:</label>
        <input type="text" name="judul" required><br><br>
        <label for="harga">Harga:</label>
        <input type="number" name="harga" required><br><br>
        <label for="nama_pemilik">Nama Pemilik:</label>
        <input type="text" name="nama_pemilik" required><br><br> <!-- Input manual -->
        <button type="submit">Tambah Buku</button>
    </form>



    <h3>Buku yang Dijual</h3>
    <table border="1">
        <tr>
            <th>Book ID</th>
            <th>Judul</th>
            <th>Harga</th>
            <th>Status</th>
            <th>Nama Pemilik</th>
            <th>Aksi</th>
        </tr>
        <?php if (count($soldBooks) > 0): ?>
        <?php foreach ($soldBooks as $book): ?>
        <tr>
            <td><?php echo $book['book_id']; ?></td>
            <td><?php echo htmlspecialchars($book['judul']); ?></td>
            <td><?php echo htmlspecialchars($book['harga']); ?></td>
            <td><?php echo htmlspecialchars($book['status']); ?></td>
            <td><?php echo htmlspecialchars($book['nama_pemilik']); ?></td>
            <td>
                <a href="edit_book.php?book_id=<?php echo $book['book_id']; ?>">Edit</a>
            </td>
        </tr>
        <?php endforeach; ?>
        <?php else: ?>
        <tr>
            <td colspan="6">Tidak ada buku yang dijual.</td>
        </tr>
        <?php endif; ?>
    </table>
</body>

</html>
