<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
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

        /* Gaya untuk tombol logout */
        .logout-button {
            background: none; /* Tanpa latar belakang */
            color: white; /* Warna teks */
            border: none; /* Tanpa border */
            text-decoration: underline; /* Garis bawah seperti tautan */
            cursor: pointer; /* Kursor sebagai pointer */
            font-size: 1rem; /* Ukuran font */
            margin: 10px 0; /* Jarak antar tombol */
        }

        .logout-button:hover {
            color: beige; /* Warna saat hover */
        }

        .logout-container {
            position: absolute; /* Posisi absolut untuk memindahkan logout ke kiri */
            top: 20px; /* Jarak dari atas */
            left: 20px; /* Jarak dari kiri */
            text-align: left; /* Rata kiri teks */
        }

        table {
            width: 80%; /* Lebar tabel 80% dari container */
            margin: 20px auto; /* Center tabel */
            border-collapse: collapse; /* Menghilangkan ruang antara sel */
            background-color: rgba(255, 255, 255, 0.8); /* Latar belakang tabel */
            border-radius: 10px; /* Sudut tabel yang melengkung */
            overflow: hidden; /* Memastikan sudut melengkung berfungsi */
        }

        th, td {
            padding: 12px; /* Jarak dalam sel */
            text-align: left; /* Rata kiri teks */
            border-bottom: 1px solid #ddd; /* Garis bawah sel */
            color: #333; /* Warna teks tabel */
        }

        th {
            background-color: rgba(0, 0, 0, 0.6); /* Latar belakang kolom header */
            color: white; /* Warna teks header */
        }

        tr:hover {
            background-color: rgba(255, 228, 196, 0.5); /* Warna saat hover */
        }

        a {
            color: #333;
            text-decoration: none; /* Menghilangkan garis bawah */
            background-color: beige; /* Latar belakang link */
            padding: 8px 12px; /* Jarak dalam link */
            border-radius: 5px; /* Sudut melengkung link */
            transition: background-color 0.3s ease;
        }

        a:hover {
            background-color: #f0e68c; /* Warna saat hover pada link */
        }
    </style>
</head>

<body>
    <div class="logout-container">
        <form action="/logout" method="POST" style="display:inline;">
            <button type="submit" class="logout-button">Logout</button>
        </form>
    </div>

    <h2>Selamat datang, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>

    <h3>Buku yang Tersedia</h3>
    <table>
        <tr>
            <th>Book ID</th>
            <th>Judul</th>
            <th>Harga</th>
            <th>Pencipta</th>
            <th>Aksi</th>
        </tr>
        <?php if (count($availableBooks) > 0): ?>
            <?php foreach ($availableBooks as $book): ?>
                <tr>
                    <td><?php echo htmlspecialchars($book['book_id']); ?></td>
                    <td><?php echo htmlspecialchars($book['judul']); ?></td>
                    <td><?php echo htmlspecialchars($book['harga']); ?></td>
                    <td><?php echo htmlspecialchars($book['nama_pemilik']); ?></td>
                    <td>
                        <a href="transaksi.php?book_id=<?php echo $book['book_id']; ?>">Transaksi</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="5">Tidak ada buku yang tersedia.</td>
            </tr>
        <?php endif; ?>
    </table>
</body>

</html>
