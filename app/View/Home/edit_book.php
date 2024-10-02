<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Buku</title>
</head>

<body>
    <h2>Edit Buku</h2>
    <a href="src/model/logout.php">Logout</a>

    <form method="POST" action="">
        <label for="judul">Judul Buku:</label>
        <input type="text" name="judul" value="<?php echo htmlspecialchars($book['judul']); ?>" required><br><br>
        <label for="harga">Harga:</label>
        <input type="number" name="harga" value="<?php echo htmlspecialchars($book['harga']); ?>" required><br><br>
        <label for="nama_pemilik">Author:</label>
        <input type="text" name="nama_pemilik" value="<?php echo htmlspecialchars($book['nama_pemilik']); ?>"
            required><br><br>
        <button type="submit">Simpan Perubahan</button>
    </form>
</body>

</html>